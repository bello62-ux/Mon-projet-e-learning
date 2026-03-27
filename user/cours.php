<?php
// Définir le titre de la page
$page_title = "Nos Cours - Plateforme Éducative";

// Inclure le header
require_once '../layout/header.php';

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);

// ========== DONNÉES DES COURS ==========
$cours = [
    // CM2
    [
        'niveau'     => 'cm2',
        'matiere'    => 'Français',
        'titre'      => 'Grammaire et conjugaison',
        'duree'      => '40 minutes',
        'description'=> '📝 Maîtrisez les bases de la grammaire • 📚 Apprenez à conjuguer les verbes',
        'image'      => '../media/images/livre.jpg',
        'lien'       => 'details-cours.php?id=1&niveau=cm2&matiere=francais'
    ],
    [
        'niveau'     => 'cm2',
        'matiere'    => 'Anglais',
        'titre'      => 'Vocabulaire de base',
        'duree'      => '35 minutes',
        'description'=> '🗣️ Apprenez vos premiers mots • 🌍 Découvrez une nouvelle langue',
        'image'      => '../media/images/anglais.jpg',
        'lien'       => 'details-cours.php?id=2&niveau=cm2&matiere=anglais'
    ],
    [
        'niveau'     => 'cm2',
        'matiere'    => 'Mathématiques',
        'titre'      => 'Introduction aux fractions',
        'duree'      => '45 minutes',
        'description'=> '🧮 Comprendre les parts et proportions • 📐 Maîtrisez les opérations de base',
        'image'      => '../media/images/mathématique.jpg',
        'lien'       => 'details-cours.php?id=3&niveau=cm2&matiere=mathematiques'
    ],
    // 3ème
    [
        'niveau'     => '3eme',
        'matiere'    => 'Mathématiques',
        'titre'      => 'Théorème de Pythagore',
        'duree'      => '1 heure',
        'description'=> '📐 Découvrez ce théorème essentiel • 📏 Résolvez des problèmes géométriques',
        'image'      => '../media/images/math3.jpg.avif',
        'lien'       => 'details-cours.php?id=4&niveau=3eme&matiere=mathematiques'
    ],
    [
        'niveau'     => '3eme',
        'matiere'    => 'SVT',
        'titre'      => 'La reproduction humaine',
        'duree'      => '50 minutes',
        'description'=> '🔬 Comprenez le corps humain • 🧬 Étudiez les mécanismes biologiques',
        'image'      => '../media/images/svt.jpg',
        'lien'       => 'details-cours.php?id=5&niveau=3eme&matiere=svt'
    ],
    [
        'niveau'     => '3eme',
        'matiere'    => 'Physique',
        'titre'      => 'Électricité et circuits',
        'duree'      => '55 minutes',
        'description'=> '⚡ Découvrez les circuits électriques • 🔌 Comprenez les lois fondamentales',
        'image'      => '../media/images/physique.jpg',
        'lien'       => 'details-cours.php?id=6&niveau=3eme&matiere=physique'
    ],
    // Terminale
    [
        'niveau'     => 'terminale',
        'matiere'    => 'Mathématiques',
        'titre'      => 'Fonctions exponentielles',
        'duree'      => '1h30',
        'description'=> '📈 Étudiez la croissance exponentielle • 🧮 Maîtrisez les fonctions avancées',
        'image'      => '../media/images/mathT.jpg',
        'lien'       => 'details-cours.php?id=7&niveau=terminale&matiere=mathematiques'
    ],
    [
        'niveau'     => 'terminale',
        'matiere'    => 'SVT',
        'titre'      => 'Génétique et évolution',
        'duree'      => '1h15',
        'description'=> '🧬 Explorez l\'ADN et l\'hérédité • 🐒 Comprenez les mécanismes de l\'évolution',
        'image'      => '../media/images/svt.jpg',
        'lien'       => 'details-cours.php?id=8&niveau=terminale&matiere=svt'
    ],
    [
        'niveau'     => 'terminale',
        'matiere'    => 'Physique',
        'titre'      => 'Mécanique quantique',
        'duree'      => '1h20',
        'description'=> '⚛️ Initiation à la physique moderne • 🔭 Découvrez l\'infiniment petit',
        'image'      => '../media/images/physique.jpg',
        'lien'       => 'details-cours.php?id=9&niveau=terminale&matiere=physique'
    ]
];
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
    
    .cours-card h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0.5rem 1.5rem 0.8rem;
        line-height: 1.3;
        letter-spacing: -0.2px;
    }
    
    .cours-card .description {
        font-size: 0.9rem;
        color: #5a6e7c;
        line-height: 1.5;
        margin: 0 1.5rem 1.2rem;
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
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    
    .cours-card button:hover {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(46,204,113,0.3);
    }
    
    .cours-card.hidden {
        display: none;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .cours-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        .cours-card .meta {
            margin: 1rem 1rem 0.5rem;
        }
        .cours-card h2,
        .cours-card .description {
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .cours-card button {
            width: calc(100% - 2rem);
        }
    }
    
    @media (max-width: 768px) {
        .filters-container {
            gap: 0.75rem;
            margin: 1.5rem 0 2rem;
        }
        .filter-btn {
            padding: 0.5rem 1.2rem;
        }
        .filter-btn h2 {
            font-size: 0.85rem;
        }
        .cours-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            padding: 0.5rem;
        }
        .cours-card .meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
            margin: 1rem 1rem 0;
        }
        .cours-card h2,
        .cours-card .description {
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .cours-card button {
            width: calc(100% - 2rem);
        }
        h1 {
            font-size: 2.2rem !important;
        }
    }
    
    @media (max-width: 576px) {
        .filter-btn {
            padding: 0.4rem 1rem;
        }
        .filter-btn h2 {
            font-size: 0.75rem;
        }
        .cours-card img {
            height: 160px;
        }
        .cours-card h2 {
            font-size: 1.2rem;
        }
        .cours-card button {
            padding: 0.7rem;
            font-size: 0.85rem;
        }
        h1 {
            font-size: 1.8rem !important;
        }
    }
    
    @media (max-width: 480px) {
        .cours-card {
            border-radius: 1.2rem;
        }
        .cours-card img {
            height: 140px;
        }
        .cours-card h2 {
            font-size: 1.1rem;
            margin: 0.5rem 1rem 0.5rem;
        }
        .cours-card .description {
            font-size: 0.85rem;
            margin: 0 1rem 1rem;
        }
        .cours-card button {
            padding: 0.6rem;
            font-size: 0.8rem;
        }
        h1 {
            font-size: 1.6rem !important;
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
        <div class="filter-btn" data-level="cm2">
            <h2>CM2</h2>
        </div>
        <div class="filter-btn" data-level="3eme">
            <h2>3ème</h2>
        </div>
        <div class="filter-btn" data-level="terminale">
            <h2>Terminale</h2>
        </div>
    </div>

    <!-- Grille des cours -->
    <div class="cours-grid">
        <?php foreach ($cours as $cours_item): ?>
            <div class="cours-card" data-level="<?php echo $cours_item['niveau']; ?>">
                <div>
                    <img src="<?php echo $cours_item['image']; ?>" alt="<?php echo $cours_item['matiere']; ?>">
                </div>
                <div class="meta">
                    <span><?php echo $cours_item['matiere']; ?> • <?php echo strtoupper($cours_item['niveau']); ?></span>
                    <span>⏱️ <?php echo $cours_item['duree']; ?></span>
                </div>
                <h2><?php echo $cours_item['titre']; ?></h2>
                <div class="description">
                    <?php echo $cours_item['description']; ?>
                </div>
                <button onclick="window.location.href='<?php echo $cours_item['lien']; ?>'">
                    Voir les détails →
                </button>
            </div>
        <?php endforeach; ?>
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