<?php
// Définir le titre de la page
$page_title = "Détails du cours - Nournours";

// Inclure le header
require_once '../layout/header.php';

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);

// Récupérer l'ID du cours depuis l'URL
$cours_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$niveau = isset($_GET['niveau']) ? $_GET['niveau'] : '';
$matiere = isset($_GET['matiere']) ? $_GET['matiere'] : '';

// Définir les informations des cours selon l'ID
$cours_info = [
    // COURS CM2
    1 => [
        'titre' => 'Français CM2 - Grammaire et conjugaison',
        'description' => 'Maîtrisez les bases de la grammaire française et apprenez à conjuguer les verbes correctement.',
        'niveau' => 'CM2',
        'matiere' => 'Français',
        'duree' => '40 minutes',
        'chapitres' => 4,
        'video' => false,
        'image' => '../media/images/livre.jpg',
        'url' => '../user/cours/cours-cm2/francais.php',
        'objectifs' => [
            'Comprendre les règles de base de la grammaire',
            'Maîtriser la conjugaison des verbes au présent',
            'Identifier les différentes catégories grammaticales',
            'Construire des phrases correctes'
        ],
        'programme' => [
            'Chapitre 1 : Introduction à la grammaire',
            'Chapitre 2 : Les adjectifs qualificatifs',
            'Chapitre 3 : Le futur simple',
            'Chapitre 4 : Le passé composé'
        ]
    ],
    2 => [
        'titre' => 'Anglais CM2 - Vocabulaire de base',
        'description' => 'Apprenez les bases de l\'anglais avec ce cours interactif : salutations, couleurs, famille et objets du quotidien.',
        'niveau' => 'CM2',
        'matiere' => 'Anglais',
        'duree' => '35 minutes',
        'chapitres' => 3,
        'video' => false,
        'image' => '../media/images/anglais.jpg',
        'url' => '../user/cours/cours-cm2/anglais.php',
        'objectifs' => [
            'Maîtriser les salutations de base',
            'Apprendre les couleurs en anglais',
            'Connaître le vocabulaire de la famille',
            'Identifier les objets de la classe'
        ],
        'programme' => [
            'Chapitre 1 : Vocabulaire de base',
            'Chapitre 2 : Simple present',
            'Chapitre 3 : Structures de Communication'
        ]
    ],
    3 => [
        'titre' => 'Mathématiques CM2 - Introduction aux fractions',
        'description' => 'Découvrez les fractions et apprenez à les manipuler. Comprenez les parts, proportions et opérations de base.',
        'niveau' => 'CM2',
        'matiere' => 'Mathématiques',
        'duree' => '45 minutes',
        'chapitres' => 4,
        'video' => false,
        'image' => '../media/images/mathématique.jpg',
        'url' => '../user/cours/cours-cm2/math.php',
        'objectifs' => [
            'Comprendre la notion de fraction',
            'Savoir comparer des fractions',
            'Additionner et soustraire des fractions simples',
            'Convertir fractions en nombres décimaux'
        ],
        'programme' => [
            'Chapitre 1 : Les nombres jusqu\'à 999 999',
            'Chapitre 2 : Calcul avec (+ - x ÷)',
            'Chapitre 3 : Fractions et nombres décimaux',
            'Chapitre 4 : Géométrie'
        ]
    ],
    // COURS 3ÈME
    4 => [
        'titre' => 'Mathématiques 3ème - Théorème de Pythagore',
        'description' => 'Maîtrisez le théorème de Pythagore et ses applications pour résoudre des problèmes géométriques.',
        'niveau' => '3ème',
        'matiere' => 'Mathématiques',
        'duree' => '1 heure',
        'chapitres' => 6,
        'video' => true,
        'image' => '../media/images/math3.jpg.avif',
        'url' => '../user/cours/cours-3eme/math.php',
        'objectifs' => [
            'Comprendre et appliquer le théorème de Pythagore',
            'Calculer des longueurs dans un triangle rectangle',
            'Reconnaître un triangle rectangle',
            'Résoudre des problèmes concrets'
        ],
        'programme' => [
            'Chapitre 1 : Calcul Numérique',
            'Chapitre 2 : Calcul Littéral',
            'Chapitre 3 : Équations et Inéquations',
            'Chapitre 4 : Fonctions',
            'Chapitre 5 : Géométrie',
            'Chapitre 6 : Statistiques'
        ]
    ],
    5 => [
        'titre' => 'SVT 3ème - La reproduction humaine',
        'description' => 'Découvrez le fonctionnement du corps humain et les mécanismes de la reproduction.',
        'niveau' => '3ème',
        'matiere' => 'SVT',
        'duree' => '50 minutes',
        'chapitres' => 6,
        'video' => true,
        'image' => '../media/images/svt.jpg',
        'url' => '../user/cours/cours-3eme/svt.php',
        'objectifs' => [
            'Comprendre l\'anatomie du système reproducteur',
            'Étudier le processus de fécondation',
            'Comprendre le développement de l\'embryon',
            'Connaître les mécanismes biologiques'
        ],
        'programme' => [
            'Chapitre 1 : Génétique',
            'Chapitre 2 : Évolution',
            'Chapitre 3 : Reproduction',
            'Chapitre 4 : Micro-organismes',
            'Chapitre 5 : Risques infectieux',
            'Chapitre 6 : Responsabilité humaine'
        ]
    ],
    6 => [
        'titre' => 'Physique 3ème - Électricité et circuits',
        'description' => 'Initiez-vous aux circuits électriques, comprenez les lois fondamentales de l\'électricité.',
        'niveau' => '3ème',
        'matiere' => 'Physique',
        'duree' => '55 minutes',
        'chapitres' => 6,
        'video' => true,
        'image' => '../media/images/physique.jpg',
        'url' => '../user/cours/cours-3eme/physique.php',
        'objectifs' => [
            'Comprendre le fonctionnement d\'un circuit électrique',
            'Maîtriser les lois de l\'électricité',
            'Calculer l\'intensité, la tension et la résistance',
            'Savoir monter un circuit'
        ],
        'programme' => [
            'Chapitre 1 : Mouvement',
            'Chapitre 2 : Énergie',
            'Chapitre 3 : Électricité',
            'Chapitre 4 : Lumière',
            'Chapitre 5 : Sons',
            'Chapitre 6 : Chimie'
        ]
    ],
    // COURS TERMINALE
    7 => [
        'titre' => 'Mathématiques Terminale - Fonctions exponentielles',
        'description' => 'Étudiez la croissance exponentielle, maîtrisez les fonctions avancées pour réussir le bac.',
        'niveau' => 'Terminale',
        'matiere' => 'Mathématiques',
        'duree' => '1h30',
        'chapitres' => 6,
        'video' => true,
        'image' => '../media/images/mathT.jpg',
        'url' => '../user/cours/cours-terminale/math.php',
        'objectifs' => [
            'Comprendre la fonction exponentielle',
            'Étudier les propriétés et limites',
            'Résoudre des équations exponentielles',
            'Appliquer aux problèmes concrets'
        ],
        'programme' => [
            'Chapitre 1 : Suites numériques',
            'Chapitre 2 : Fonctions',
            'Chapitre 3 : Géométrie dans l\'espace',
            'Chapitre 4 : Nombres complexes',
            'Chapitre 5 : Probabilités',
            'Chapitre 6 : Algorithmique'
        ]
    ],
    8 => [
        'titre' => 'SVT Terminale - Génétique et évolution',
        'description' => 'Explorez l\'ADN, l\'hérédité et les mécanismes de l\'évolution des espèces.',
        'niveau' => 'Terminale',
        'matiere' => 'SVT',
        'duree' => '1h15',
        'chapitres' => 6,
        'video' => true,
        'image' => '../media/images/svt.jpg',
        'url' => '../user/cours/cours-terminale/svt.php',
        'objectifs' => [
            'Comprendre la structure de l\'ADN',
            'Étudier les mécanismes évolutifs',
            'Analyser l\'arbre phylogénétique',
            'Comprendre la sélection naturelle'
        ],
        'programme' => [
            'Chapitre 1 : Génétique et évolution',
            'Chapitre 2 : Écologie',
            'Chapitre 3 : Neurone et synapse',
            'Chapitre 4 : Mécanismes immunitaires',
            'Chapitre 5 : Glycémie et diabète',
            'Chapitre 6 : Géologie'
        ]
    ],
    9 => [
        'titre' => 'Physique Terminale - Mécanique quantique',
        'description' => 'Initiez-vous à la physique moderne, découvrez l\'infiniment petit et la dualité onde-particule.',
        'niveau' => 'Terminale',
        'matiere' => 'Physique',
        'duree' => '1h20',
        'chapitres' => 6,
        'video' => true,
        'image' => '../media/images/physique.jpg',
        'url' => '../user/cours/cours-terminale/physique.php',
        'objectifs' => [
            'Comprendre la dualité onde-particule',
            'Étudier le modèle atomique',
            'Découvrir la radioactivité',
            'Explorer la mécanique quantique'
        ],
        'programme' => [
            'Chapitre 1 : Mécanique',
            'Chapitre 2 : Ondes et signaux',
            'Chapitre 3 : Électromagnétisme',
            'Chapitre 4 : Physique quantique',
            'Chapitre 5 : Physique nucléaire',
            'Chapitre 6 : Thermodynamique'
        ]
    ]
];

// Vérifier si le cours existe
if (!isset($cours_info[$cours_id])) {
    header('Location: cours.php');
    exit();
}

$cours = $cours_info[$cours_id];
?>

<link rel="stylesheet" href="../asset/css/details-cours.css">

<div class="course-detail-container">
    <div class="course-detail-header">
        <span class="course-badge"><?php echo $cours['niveau']; ?> • <?php echo $cours['matiere']; ?></span>
        <h1><?php echo $cours['titre']; ?></h1>
        <div class="course-meta">
            <div class="meta-item">
                <i class="fas fa-clock"></i> <?php echo $cours['duree']; ?>
            </div>
            <div class="meta-item">
                <i class="fas fa-book"></i> <?php echo $cours['chapitres']; ?> chapitres
            </div>
            <div class="meta-item">
                <i class="fas <?php echo $cours['video'] ? 'fa-video' : 'fa-file-alt'; ?>"></i>
                <?php echo $cours['video'] ? 'Cours vidéo inclus' : 'Cours écrit'; ?>
            </div>
        </div>
        <p style="margin-top: 20px; font-size: 1.1rem;"><?php echo $cours['description']; ?></p>
    </div>
    
    <div class="course-detail-grid">
        <div class="course-info-card">
            <h3>🎯 Objectifs pédagogiques</h3>
            <ul class="objectives-list">
                <?php foreach ($cours['objectifs'] as $objectif): ?>
                    <li><?php echo $objectif; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="course-sidebar">
            <img src="<?php echo $cours['image']; ?>" alt="<?php echo $cours['titre']; ?>" class="course-image">
            
            <?php if ($is_logged_in): ?>
                <!-- Utilisateur connecté : bouton actif -->
                <a href="<?php echo $cours['url']; ?>" class="btn-start">▶ Commencer le cours</a>
            <?php else: ?>
                <!-- Utilisateur non connecté : message avec lien vers connexion -->
                <div class="login-required">
                    <div class="login-message">
                        <i class="fas fa-lock"></i>
                        <p>Vous devez être connecté pour accéder à ce cours</p>
                        <a href="../AUTHENTIFICATION/login.php" class="btn-login-required">Se connecter</a>
                        <a href="../AUTHENTIFICATION/register.php" class="btn-register-required">S'inscrire gratuitement</a>
                    </div>
                </div>
            <?php endif; ?>
            
            <a href="../ACCUEIL/cours.php" class="btn-start btn-back">← Retour à la liste des cours</a>
        </div>
    </div>
    
    <div class="course-info-card" style="margin-top: 40px;">
        <h3>📚 Programme du cours</h3>
        <ul class="programme-list">
            <?php foreach ($cours['programme'] as $chapitre): ?>
                <li><?php echo $chapitre; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<style>
    /* Styles pour le message de connexion requis */
    .login-required {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        margin-bottom: 15px;
        border: 1px solid #e9ecef;
    }
    
    .login-message i {
        font-size: 2rem;
        color: #e74c3c;
        margin-bottom: 10px;
        display: block;
    }
    
    .login-message p {
        color: #666;
        margin-bottom: 15px;
        font-size: 0.9rem;
    }
    
    .btn-login-required, .btn-register-required {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        margin: 5px;
        transition: all 0.3s ease;
    }
    
    .btn-login-required {
        background: #2ecc71;
        color: white;
    }
    
    .btn-login-required:hover {
        background: #27ae60;
        transform: translateY(-2px);
    }
    
    .btn-register-required {
        background: transparent;
        color: #2ecc71;
        border: 2px solid #2ecc71;
    }
    
    .btn-register-required:hover {
        background: #2ecc71;
        color: white;
        transform: translateY(-2px);
    }
</style>

<?php require_once '../layout/footer.php'; ?>