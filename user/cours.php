<?php
// Définir le titre de la page
$page_title = "Nos Cours - Plateforme Éducative";

// Inclure le header
require_once '../layout/header.php';

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);

// Connexion à la BDD
require_once '../config/db.php';


$sql_lessons = "SELECT l.*, c.name as niveau_name, s.name as matiere_name
                FROM Lessons l
                JOIN Classroom c ON l.classroom_id = c.classroom_id
                JOIN Subject s ON l.subject_id = s.subject_id
                WHERE l.is_active = 1
                ORDER BY l.lessons_id";
$result_lessons = $conn->query($sql_lessons);

$tous_les_cours = [];
if ($result_lessons && $result_lessons->num_rows > 0) {
    while ($row = $result_lessons->fetch_assoc()) {
        
        // Récupérer l'image depuis Media
        $sql_image = "SELECT media_path FROM Media 
                      WHERE media_type = 'image' 
                      AND (lessons_id = " . $row['lessons_id'] . " 
                           OR chapter_id IN (SELECT chapter_id FROM Chapters WHERE lessons_id = " . $row['lessons_id'] . "))
                      LIMIT 1";
        $result_image = $conn->query($sql_image);
        $image_row = $result_image->fetch_assoc();
        
        // Déterminer l'image
        $image_path = '../media/images/default-course.jpg';
        if ($image_row && !empty($image_row['media_path'])) {
            $media_path = $image_row['media_path'];
            if (strpos($media_path, 'uploads/') === 0) {
                $image_path = '../' . $media_path;
            } elseif (strpos($media_path, '../') !== 0 && strpos($media_path, 'media/') !== 0) {
                $image_path = '../' . $media_path;
            } else {
                $image_path = $media_path;
            }
        }
        
        $tous_les_cours[] = [
            'niveau'     => strtolower($row['niveau_name']),
            'niveau_aff' => strtoupper($row['niveau_name']),
            'matiere'    => $row['matiere_name'],
            'titre'      => $row['title'],
            'duree'      => $row['time'] ? $row['time'] . ' minutes' : 'Durée variable',
            'description'=> $row['description'],
            'image'      => $image_path,
            'lien'       => 'details-cours.php?lessons_id=' . $row['lessons_id']
        ];
    }
}

// Récupérer les niveaux uniques pour les filtres
$niveaux_filtres = [];
foreach ($tous_les_cours as $c) {
    if (!in_array($c['niveau'], $niveaux_filtres)) {
        $niveaux_filtres[] = $c['niveau'];
    }
}
?>

<style>
    /* ========== DESIGN MODERNE ========== */
    :root {
        --primary: #2ecc71;
        --primary-dark: #27ae60;
        --secondary: #3498db;
        --dark: #2c3e50;
        --light: #f8f9fa;
        --gray: #6c757d;
        --shadow-sm: 0 10px 20px rgba(0,0,0,0.05);
        --shadow-md: 0 15px 30px rgba(0,0,0,0.1);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.12);
        --border-radius: 1.5rem;
    }
    /* Filtres */
    .filters-container {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin: 2rem 0 3rem;
        flex-wrap: wrap;
    }
    
    .filter-btn {
        background: white;
        border: none;
        border-radius: 3rem;
        padding: 0.6rem 1.8rem;
        font-weight: 600;
        transition: all 0.25s ease;
        cursor: pointer;
        box-shadow: var(--shadow-sm);
    }
    
    .filter-btn.active {
        background: var(--primary);
        color: white;
        box-shadow: 0 6px 14px rgba(46,204,113,0.3);
        transform: translateY(-2px);
    }
    
    .filter-btn.active h2 {
        color: white;
    }
    
    .filter-btn:hover:not(.active) {
        background: var(--light);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    .filter-btn h2 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
        text-transform: uppercase;
    }
    
    /* Grille des cartes */
    .cours-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        padding: 1rem;
        max-width: 1280px;
        margin: 0 auto;
    }
    
    .cours-card {
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(0,0,0,0.03);
        position: relative;
        z-index: 1;
        height: 100%;
    }
    
    .cours-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(46,204,113,0.03) 0%, rgba(52,152,219,0.03) 100%);
        border-radius: inherit;
        opacity: 0;
        transition: opacity 0.4s;
        z-index: -1;
    }
    
    .cours-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }
    
    .cours-card:hover::before {
        opacity: 1;
    }
    
    .cours-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .cours-card:hover img {
        transform: scale(1.03);
    }
    
    .cours-card .meta {
        margin: 1.2rem 1.5rem 0.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--gray);
    }
    
    .cours-card .meta span:first-child {
        background: rgba(46,204,113,0.1);
        padding: 0.2rem 0.8rem;
        border-radius: 2rem;
        color: var(--primary-dark);
        font-weight: 600;
    }
    
    .cours-card .meta span:last-child {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        background: rgba(0,0,0,0.03);
        padding: 0.2rem 0.8rem;
        border-radius: 2rem;
    }
    
    .cours-card h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0.5rem 1.5rem 0.8rem;
        line-height: 1.3;
    }
    
    .cours-card .description {
        font-size: 0.9rem;
        color: #5a6e7c;
        line-height: 1.5;
        margin: 0 1.5rem 1.2rem;
        flex: 1;
    }
    
    .cours-card button {
        width: calc(100% - 3rem);
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, var(--dark) 0%, #1e2a3a 100%);
        color: white;
        border: none;
        border-radius: 3rem;
        padding: 0.8rem;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s;
        cursor: pointer;
        margin-top: auto;
    }
    
    .cours-card button:hover {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        transform: translateY(-2px);
    }
    
    .cours-card.hidden {
        display: none;
    }
    
    .empty-message {
        text-align: center;
        padding: 3rem;
    background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
    }
    
    .empty-message i {
        font-size: 3rem;
        color: #cbd5e1;
    }
    
    .empty-message p {
        color: #94a3b8;
        margin-top: 1rem;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .cours-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        .filters-container {
            gap: 0.75rem;
        }
        .filter-btn {
            padding: 0.5rem 1.2rem;
        }
        .filter-btn h2 {
            font-size: 0.85rem;
        }
    }
</style>

<div>
    <h1 style="font-size: 50px; text-align: center; margin-top: 20px; margin-bottom: 20px;">Nos Cours</h1>
    
    <!-- Filtres -->
    <div class="filters-container">
        <div class="filter-btn active" data-level="all">
            <h2>Tous</h2>
        </div>
        <?php foreach ($niveaux_filtres as $niveau_filtre): ?>
            <div class="filter-btn" data-level="<?php echo $niveau_filtre; ?>">
                <h2><?php echo strtoupper($niveau_filtre); ?></h2>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Grille des cours -->
    <div class="cours-grid">
        <?php if (count($tous_les_cours) > 0): ?>
            <?php foreach ($tous_les_cours as $cours_item): ?>
                <div class="cours-card" data-level="<?php echo $cours_item['niveau']; ?>">
                    <img src="<?php echo $cours_item['image']; ?>" alt="<?php echo $cours_item['matiere']; ?>">
                    <div class="meta">
                        <span><?php echo $cours_item['matiere']; ?> • <?php echo $cours_item['niveau_aff']; ?></span>
                        <span>⏱️ <?php echo $cours_item['duree']; ?></span>
                    </div>
                    <h3><?php echo $cours_item['titre']; ?></h3>
                    <div class="description"><?php echo $cours_item['description']; ?></div>
                    <button onclick="window.location.href='<?php echo $cours_item['lien']; ?>'">
                        Voir les détails →
                    </button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-message" style="grid-column: 1/-1;">
                <i class="bi bi-inbox"></i>
                <p>Aucun cours disponible pour le moment.</p>
                <p style="font-size: 0.85rem;">Les administrateurs vont bientôt ajouter des cours.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Filtrage
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const coursCards = document.querySelectorAll('.cours-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const selectedLevel = this.getAttribute('data-level');
                
                coursCards.forEach(card => {
                    const cardLevel = card.getAttribute('data-level');
                    if (selectedLevel === 'all') {
                        card.classList.remove('hidden');
                    } else {
                        if (cardLevel === selectedLevel) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    }
                });
            });
        });
    });
</script>

<?php require_once '../layout/footer.php'; ?>