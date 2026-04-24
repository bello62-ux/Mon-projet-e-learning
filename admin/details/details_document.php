<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

// Vérifier si un document est sélectionné
if(!isset($_GET['document_id'])){
    header("Location: ../cours/ajout_document.php");
    exit();
}

$document_id = $_GET['document_id'];

// Récupérer les infos du document
$sql = "SELECT d.*, 
        td.libelle_typeDoc, 
        s.name as matiere_nom, 
        c.name as classe_nom
        FROM Document d
        LEFT JOIN TypeDocument td ON d.typedocument_id = td.typedocument_id
        LEFT JOIN Subject s ON d.subject_id = s.subject_id
        LEFT JOIN Classroom c ON d.classroom_id = c.classroom_id
        WHERE d.document_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $document_id);
$stmt->execute();
$document = $stmt->get_result()->fetch_assoc();

if(!$document){
    header("Location: ../cours/ajout_document.php");
    exit();
}

// Déterminer l'icône selon le type
$type_icon = '';
if(strtolower($document['libelle_typeDoc']) == 'pdf') {
    $type_icon = '<i class="fas fa-file-pdf" style="color: #ef4444; font-size: 1.2rem;"></i>';
} elseif(strtolower($document['libelle_typeDoc']) == 'vidéo' || strtolower($document['libelle_typeDoc']) == 'video') {
    $type_icon = '<i class="fas fa-video" style="color: #3b82f6; font-size: 1.2rem;"></i>';
} else {
    $type_icon = '<i class="fas fa-file-alt" style="color: #10b981; font-size: 1.2rem;"></i>';
}

// Photo par défaut
$photo_path = !empty($document["photo"]) ? '../../' . $document["photo"] : '../../media/images/default-document.jpg';

// Affichage du prix
$prix_display = '';
if($document['prix'] > 0) {
    $prix_display = '<div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <i class="fas fa-tag" style="color: #e67e22; font-size: 0.7rem;"></i>
                            <span style="font-size: 0.55rem; color: #64748b;">PRIX</span>
                        </div>
                        <span style="font-weight: 700; color: #e67e22; font-size: 0.9rem;">' . number_format($document['prix'], 0, ',', ' ') . ' FCFA</span>
                    </div>';
} else {
    $prix_display = '<div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <i class="fas fa-gift" style="color: #10b981; font-size: 0.7rem;"></i>
                            <span style="font-size: 0.55rem; color: #64748b;">PRIX</span>
                        </div>
                        <span style="font-weight: 600; color: #10b981; font-size: 0.8rem;">Gratuit</span>
                    </div>';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($document['nom_document']); ?> - Détails du document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>
<body style="background: #f3f4f6; font-family: system-ui, -apple-system, sans-serif;">
    <div class="wrapper">
        <?php include '../layout/sidebar.php'; ?>

        <div id="content">
            <?php include '../layout/appbar.php'; ?>

            <div style="padding: 1rem;">
                <div class="row">
                    <div class="col-12">
                        
                        <!-- Fil d'Ariane -->
                        <div style="margin-bottom: 1rem;">
                            <nav>
                                <ol style="display: flex; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; gap: 6px;">
                                    <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 1rem;">Accueil</a> <span style="color: #cbd5e1;">/</span></li>
                                    <li><a href="../cours/ajout_document.php" style="color: #6c757d; text-decoration: none; font-size: 1rem;">Documents</a> <span style="color: #cbd5e1;">/</span></li>
                                    <li><span style="color: #6366f1; font-size: 1rem;">Détails</span></li>
                                </ol>
                            </nav>
                        </div>
                        
                        <!-- Carte principale -->
                        <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                            
                            <!-- En-tête -->
                            <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #eef2ff;">
                                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem;">
                                    <div>
                                        <span style="display: inline-flex; align-items: center; gap: 6px; background: #eef2ff; padding: 4px 12px; border-radius: 40px;">
                                            <?php echo $type_icon; ?>
                                            <span style="color: #4b5563; font-size: 0.8rem; font-weight: 500;"><?php echo strtoupper($document['libelle_typeDoc'] ?? 'DOCUMENT'); ?></span>
                                        </span>
                                    </div>
                                    <div>
                                        <span style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 40px; background: <?php echo $document['active'] == 1 ? '#10b981' : '#ef4444'; ?>;">
                                            <i class="fas fa-circle" style="font-size: 5px; color: white;"></i>
                                            <span style="font-size: 0.6rem; font-weight: 600; color: white;">
                                                <?php echo $document['active'] == 1 ? 'ACTIF' : 'INACTIF'; ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="padding: 1.2rem;">
                                <div class="row g-3">
                                    
                                    <!-- Colonne gauche : Image de couverture -->
                                    <div class="col-md-4">
                                        <div style="background: #f8fafc; border-radius: 20px; padding: 0.8rem; text-align: center;">
                                            <img src="<?php echo $photo_path; ?>" 
                                                 alt="<?php echo htmlspecialchars($document['nom_document']); ?>" 
                                                 style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 16px;">
                                        </div>
                                    </div>
                                    
                                    <!-- Colonne droite : Informations -->
                                    <div class="col-md-8">
                                        <h1 style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 0.8rem;">
                                            <?php echo htmlspecialchars($document['nom_document']); ?>
                                        </h1>
                                        
                                        <!-- Grille d'informations -->
                                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.6rem; margin-bottom: 1rem;">
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-building" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">CLASSE</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo htmlspecialchars($document['classe_nom'] ?? '—'); ?></span>
                                            </div>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-book" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">MATIÈRE</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo htmlspecialchars($document['matiere_nom'] ?? '—'); ?></span>
                                            </div>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-user" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">AUTEUR</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo htmlspecialchars($document['auteur_document'] ?? '—'); ?></span>
                                            </div>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-calendar" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">ANNÉE</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo $document['annee'] ? $document['annee'] : '—'; ?></span>
                                            </div>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-file-alt" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">PAGES</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.8rem;"><?php echo $document['nbre_page'] ? $document['nbre_page'] . ' pages' : '—'; ?></span>
                                            </div>
                                            <?php echo $prix_display; ?>
                                            <div style="background: #f8fafc; border-radius: 14px; padding: 0.6rem 0.8rem;">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                                                    <i class="fas fa-calendar-plus" style="color: #6366f1; font-size: 0.7rem;"></i>
                                                    <span style="font-size: 0.55rem; color: #64748b;">CRÉATION</span>
                                                </div>
                                                <span style="font-weight: 600; color: #0f172a; font-size: 0.75rem;"><?php echo date('d M Y', strtotime($document['date_creation'])); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Description -->
                                <div style="margin-top: 1rem;">
                                    <div style="background: #fefce8; border-radius: 18px; padding: 1rem; border: 1px solid #fde047;">
                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 0.8rem;">
                                            <i class="fas fa-align-left" style="color: #854d0e;"></i>
                                            <h3 style="font-weight: 600; color: #854d0e; margin: 0; font-size: 0.85rem;">Description</h3>
                                        </div>
                                        <div style="color: #334155; line-height: 1.5; font-size: 0.8rem;">
                                            <?php echo !empty($document['description_document']) ? nl2br(htmlspecialchars($document['description_document'])) : 'Aucune description fournie.'; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Bouton Retour -->
                                <div style="margin-top: 1.5rem; display: flex; justify-content: flex-end; gap: 0.5rem;">
                                    <a href="../cours/ajout_document.php" style="background: #f1f5f9; border: none; padding: 8px 20px; border-radius: 40px; font-weight: 500; font-size: 0.8rem; color: #475569; text-decoration: none;">
                                        <i class="fas fa-arrow-left"></i> Retour
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        function handleResize() {
            if (window.innerWidth <= 768) {
                document.getElementById('sidebar').classList.add('active');
            } else {
                document.getElementById('sidebar').classList.remove('active');
            }
        }
        window.addEventListener('resize', handleResize);
        handleResize();
    </script>
</body>
</html>