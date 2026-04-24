<?php
// Définir le titre de la page
$page_title = "Bibliothèque - Documents";

// Inclure le header
require_once '../layout/header.php';

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);

// Connexion à la BDD
require_once '../config/db.php';

// ========== RÉCUPÉRER LES DOCUMENTS DEPUIS LA BDD ==========
$sql_documents = "SELECT d.*, 
                         td.libelle_typeDoc, 
                         s.name as matiere_nom, 
                         c.name as classe_nom
                  FROM Document d
                  LEFT JOIN TypeDocument td ON d.typedocument_id = td.typedocument_id
                  LEFT JOIN Subject s ON d.subject_id = s.subject_id
                  LEFT JOIN Classroom c ON d.classroom_id = c.classroom_id
                  WHERE d.active = 1
                  ORDER BY d.document_id DESC";
$result_documents = $conn->query($sql_documents);

$tous_les_documents = [];
if ($result_documents && $result_documents->num_rows > 0) {
    while ($row = $result_documents->fetch_assoc()) {
        // Déterminer l'icône selon le type
        $type_icon = '';
        if(strtolower($row['libelle_typeDoc']) == 'pdf') {
            $type_icon = '<i class="fas fa-file-pdf" style="color: #ef4444;"></i>';
        } elseif(strtolower($row['libelle_typeDoc']) == 'vidéo' || strtolower($row['libelle_typeDoc']) == 'video') {
            $type_icon = '<i class="fas fa-video" style="color: #3b82f6;"></i>';
        } else {
            $type_icon = '<i class="fas fa-file-alt" style="color: #10b981;"></i>';
        }
        
        // Photo par défaut
        $photo_path = !empty($row["photo"]) ? '../' . $row["photo"] : '../media/images/default-document.jpg';
        
        // Badge de prix
        $prix_badge = '';
        $prix_text = '';
        if($row['prix'] > 0) {
            $prix_badge = '<span class="prix-badge payant"><i class="fas fa-tag"></i> ' . number_format($row['prix'], 0, ',', ' ') . ' FCFA</span>';
            $prix_text = 'payant';
        } else {
            $prix_badge = '<span class="prix-badge gratuit"><i class="fas fa-gift"></i> Gratuit</span>';
            $prix_text = 'gratuit';
        }
        
        $tous_les_documents[] = [
            'document_id' => $row['document_id'],
            'classe'     => strtolower($row['classe_nom']),
            'classe_aff' => strtoupper($row['classe_nom']),
            'matiere'    => $row['matiere_nom'],
            'type'       => $row['libelle_typeDoc'],
            'type_icon'  => $type_icon,
            'titre'      => $row['nom_document'],
            'auteur'     => $row['auteur_document'] ?? 'Auteur inconnu',
            'description'=> $row['description_document'],
            'image'      => $photo_path,
            'pages'      => $row['nbre_page'],
            'annee'      => $row['annee'],
            'chemin'     => $row['chemin_document'],
            'prix_badge' => $prix_badge,
            'prix_text'  => $prix_text
        ];
    }
}

// Récupérer les classes uniques pour les filtres
$classes_filtres = [];
foreach ($tous_les_documents as $d) {
    if (!in_array($d['classe'], $classes_filtres)) {
        $classes_filtres[] = $d['classe'];
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
    .documents-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        padding: 1rem;
        max-width: 1280px;
        margin: 0 auto;
    }
    
    .document-card {
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
    
    .document-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(46,204,113,0.03) 0%, rgba(52,152,219,0.03) 100%);
        border-radius: inherit;
        opacity: 0;
        transition: opacity 0.4s;
        z-index: -1;
    }
    
    .document-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }
    
    .document-card:hover::before {
        opacity: 1;
    }
    
    .document-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .document-card:hover img {
        transform: scale(1.03);
    }
    
    .document-card .meta {
        margin: 1.2rem 1.5rem 0.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--gray);
    }
    
    .document-card .meta span:first-child {
        background: rgba(46,204,113,0.1);
        padding: 0.2rem 0.8rem;
        border-radius: 2rem;
        color: var(--primary-dark);
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .document-card .meta span:last-child {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        background: rgba(0,0,0,0.03);
        padding: 0.2rem 0.8rem;
        border-radius: 2rem;
    }
    
    .document-card h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0.5rem 1.5rem 0.5rem;
        line-height: 1.3;
    }
    
    .document-card .info {
        margin: 0 1.5rem 0.5rem;
        font-size: 0.8rem;
        color: var(--gray);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .document-card .info i {
        margin-right: 0.3rem;
    }
    
    /* Badge de prix */
    .prix-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    
    .prix-badge.payant {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        color: #92400e;
        border: 1px solid #fbbf24;
    }
    
    .prix-badge.gratuit {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        color: #065f46;
        border: 1px solid #10b981;
    }
    
    .document-card .description {
        font-size: 0.85rem;
        color: #5a6e7c;
        line-height: 1.5;
        margin: 0 1.5rem 1rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .document-card button {
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
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .document-card button:hover {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        transform: translateY(-2px);
    }
    
    .document-card.hidden {
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
        .documents-grid {
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
        .document-card .info {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div>
    <h1 style="font-size: 50px; text-align: center; margin-top: 20px; margin-bottom: 20px;">Bibliothèque de documents</h1>
    <p style="text-align: center; color: var(--gray); margin-bottom: 30px;">Documents PDF, vidéos et ressources par classe et par matière</p>
    
    <!-- Filtres -->
    <div class="filters-container">
        <div class="filter-btn active" data-level="all">
            <h2>Tous</h2>
        </div>
        <?php foreach ($classes_filtres as $classe_filtre): ?>
            <div class="filter-btn" data-level="<?php echo $classe_filtre; ?>">
                <h2><?php echo strtoupper($classe_filtre); ?></h2>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Grille des documents -->
    <div class="documents-grid">
        <?php if (count($tous_les_documents) > 0): ?>
            <?php foreach ($tous_les_documents as $document): ?>
                <div class="document-card" data-level="<?php echo $document['classe']; ?>">
                    <img src="<?php echo $document['image']; ?>" alt="<?php echo $document['titre']; ?>">
                    <div class="meta">
                        <span>
                            <?php echo $document['type_icon']; ?>
                            <?php echo $document['matiere']; ?> • <?php echo $document['classe_aff']; ?>
                        </span>
                        <span>
                            <?php if($document['pages']): ?>
                                <i class="fas fa-file-alt"></i> <?php echo $document['pages']; ?> pages
                            <?php else: ?>
                                <i class="fas fa-video"></i> Vidéo
                            <?php endif; ?>
                        </span>
                    </div>
                    <h3><?php echo htmlspecialchars($document['titre']); ?></h3>
                    <div class="info">
                        <div>
                            <i class="fas fa-user"></i> <?php echo htmlspecialchars($document['auteur']); ?>
                            <?php if($document['annee']): ?>
                                &nbsp;|&nbsp; <i class="fas fa-calendar"></i> <?php echo $document['annee']; ?>
                            <?php endif; ?>
                        </div>
                        <?php echo $document['prix_badge']; ?>
                    </div>
                    <div class="description">
                        <?php echo htmlspecialchars(substr($document['description'], 0, 120)) . (strlen($document['description']) > 120 ? '...' : ''); ?>
                    </div>
                    <button onclick="window.location.href='../<?php echo $document['chemin']; ?>'" download>
                        <i class="fas fa-download"></i> Télécharger
                    </button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-message" style="grid-column: 1/-1;">
                <i class="bi bi-inbox"></i>
                <p>Aucun document disponible pour le moment.</p>
                <p style="font-size: 0.85rem;">Des documents seront bientôt ajoutés par les administrateurs.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Filtrage
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const documentCards = document.querySelectorAll('.document-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const selectedLevel = this.getAttribute('data-level');
                
                documentCards.forEach(card => {
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