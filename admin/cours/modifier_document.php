<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

// Vérifier si un document est sélectionné
if(!isset($_GET['document_id'])){
    header("Location: ajout_document.php");
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
    header("Location: ajout_document.php");
    exit();
}

// Récupérer les listes pour les selects
$sql_types = "SELECT typedocument_id, libelle_typeDoc FROM TypeDocument ORDER BY libelle_typeDoc";
$types = $conn->query($sql_types);

$sql_matieres = "SELECT subject_id, name FROM Subject ORDER BY name";
$matieres = $conn->query($sql_matieres);

$sql_classes = "SELECT classroom_id, name FROM Classroom ORDER BY name";
$classes = $conn->query($sql_classes);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un document - Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="../../asset/css/dashboard.css">
</head>
<body style="background: #f3f4f6;">
    <div class="wrapper">
        <?php include '../layout/sidebar.php'; ?>

        <div id="content">
            <?php include '../layout/appbar.php'; ?>

            <div style="padding: 1.2rem;">
                <div class="row">
                    <div class="col-12">
                        
                        <!-- Fil d'Ariane -->
                        <nav style="margin-bottom: 1rem;">
                            <ol style="display: flex; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; gap: 8px;">
                                <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;">Accueil</a> <span style="color: #adb5bd;">/</span></li>
                                <li><a href="ajout_document.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;">Documents</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;">Modifier un document</span></li>
                            </ol>
                        </nav>
                        
                        <!-- Titre -->
                        <div style="margin-bottom: 1.2rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Modifier un document</h2>
                        </div>

                        <!-- Formulaire de modification -->
                        <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                            <div style="padding: 1.5rem;">
                                <form action="../../traitement/traitement_modification_document.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="document_id" value="<?php echo $document['document_id']; ?>">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Nom du document</label>
                                                <input type="text" class="form-control" name="nom_document" value="<?php echo htmlspecialchars($document['nom_document']); ?>" required style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Auteur</label>
                                                <input type="text" class="form-control" name="auteur_document" value="<?php echo htmlspecialchars($document['auteur_document'] ?? ''); ?>" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Type de document</label>
                                                <select class="form-select" name="typedocument_id" style="border-radius: 10px;" required>
                                                    <option value="">Sélectionner</option>
                                                    <?php while($type = $types->fetch_assoc()): ?>
                                                        <option value="<?php echo $type['typedocument_id']; ?>" <?php echo ($type['typedocument_id'] == $document['typedocument_id']) ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($type['libelle_typeDoc']); ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Classe</label>
                                                <select class="form-select" name="classroom_id" style="border-radius: 10px;" required>
                                                    <option value="">Sélectionner</option>
                                                    <?php 
                                                    $classes->data_seek(0);
                                                    while($classe = $classes->fetch_assoc()): ?>
                                                        <option value="<?php echo $classe['classroom_id']; ?>" <?php echo ($classe['classroom_id'] == $document['classroom_id']) ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($classe['name']); ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Matière</label>
                                                <select class="form-select" name="subject_id" style="border-radius: 10px;" required>
                                                    <option value="">Sélectionner</option>
                                                    <?php 
                                                    $matieres->data_seek(0);
                                                    while($matiere = $matieres->fetch_assoc()): ?>
                                                        <option value="<?php echo $matiere['subject_id']; ?>" <?php echo ($matiere['subject_id'] == $document['subject_id']) ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($matiere['name']); ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Année</label>
                                                <input type="number" class="form-control" name="annee" value="<?php echo $document['annee']; ?>" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Nombre de pages</label>
                                                <input type="number" class="form-control" name="nbre_page" value="<?php echo $document['nbre_page']; ?>" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Prix (FCFA)</label>
                                                <input type="number" class="form-control" name="prix" step="0.01" value="<?php echo $document['prix']; ?>" style="border-radius: 10px;" placeholder="0 = gratuit">
                                                <small class="text-muted">Laissez 0 pour gratuit</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Statut</label>
                                                <select class="form-select" name="active" style="border-radius: 10px;">
                                                    <option value="1" <?php echo $document['active'] == 1 ? 'selected' : ''; ?>>Actif</option>
                                                    <option value="0" <?php echo $document['active'] == 0 ? 'selected' : ''; ?>>Inactif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Fichier (optionnel) -->
                                    <div class="mb-3">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Fichier</label>
                                        <input type="file" class="form-control" name="fichier" accept=".pdf,.mp4,.avi,.mov,.webm" style="border-radius: 10px;">
                                        <small style="color: #94a3b8;">Laissez vide pour garder le fichier actuel</small>
                                        <?php if(!empty($document['chemin_document'])): ?>
                                            <div class="mt-2">
                                                <span class="text-muted">Fichier actuel : <?php echo basename($document['chemin_document']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Photo de couverture (optionnel) -->
                                    <div class="mb-3">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Photo de couverture</label>
                                        <input type="file" class="form-control" name="photo" accept="image/*" style="border-radius: 10px;">
                                        <small style="color: #94a3b8;">Laissez vide pour garder la photo actuelle</small>
                                        <?php if(!empty($document['photo'])): ?>
                                            <div class="mt-2">
                                                <img src="../../<?php echo $document['photo']; ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                                <span class="text-muted ms-2">Photo actuelle</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <label style="font-weight: 500; font-size: 0.8rem; color: #1e293b;">Description</label>
                                        <textarea class="form-control summernote" name="description_document" rows="6" style="border-radius: 10px;"><?php echo htmlspecialchars($document['description_document'] ?? ''); ?></textarea>
                                    </div>
                                    
                                    <!-- Boutons -->
                                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                        <a href="ajout_document.php" class="btn btn-secondary px-4" style="border-radius: 40px; text-decoration: none;">Annuler</a>
                                        <button type="submit" class="btn btn-primary px-4" name="modifier" style="border-radius: 40px;">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({ 
                height: 180, 
                toolbar: [['style', ['bold', 'italic', 'underline']], ['para', ['ul', 'ol']], ['view', ['codeview']]] 
            });
        });

        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        function handleResize() {
            if (window.innerWidth <= 768) document.getElementById('sidebar').classList.add('active');
            else document.getElementById('sidebar').classList.remove('active');
        }
        window.addEventListener('resize', handleResize);
        handleResize();
    </script>
</body>
</html>