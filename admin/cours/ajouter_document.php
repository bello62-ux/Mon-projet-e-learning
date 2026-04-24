<?php
session_start();
$admin_nom = $_SESSION['admin_nom'] ?? "Admin Principal";
$admin_email = $_SESSION['admin_email'] ?? "admin@ecole.fr";

require_once '../../config/db.php';

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
    <title>Ajouter un document - Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
                        
                        <nav style="margin-bottom: 1rem;">
                            <ol style="display: flex; flex-wrap: wrap; list-style: none; padding: 0; margin: 0; gap: 8px;">
                                <li><a href="../layout/dashboard.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;">Accueil</a> <span style="color: #adb5bd;">/</span></li>
                                <li><a href="ajout_document.php" style="color: #6c757d; text-decoration: none; font-size: 1rem; font-weight: 500;">Documents</a> <span style="color: #adb5bd;">/</span></li>
                                <li><span style="color: #6366f1; font-size: 1rem; font-weight: 500;">Ajouter un document</span></li>
                            </ol>
                        </nav>
                        
                        <div style="margin-bottom: 1.5rem;">
                            <h2 style="font-size: 1.5rem; font-weight: 600; color: #0f172a;">Ajouter un document</h2>
                            <p class="text-muted mt-1">Téléchargez un document (PDF, vidéo, etc.) et associez-le à une classe et une matière</p>
                        </div>
                        
                        <div style="background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); padding: 1.5rem;">
                            <form action="../../traitement/traitement_document.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Type de document -->
                                    <div class="col-md-6 mb-3">
                                        <label for="typedocument_id" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Type de document <span style="color: #ef4444;">*</span></label>
                                        <select name="typedocument_id" id="typedocument_id" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                            <option value="">Sélectionnez un type</option>
                                            <?php while($type = $types->fetch_assoc()): ?>
                                                <option value="<?php echo $type['typedocument_id']; ?>"><?php echo htmlspecialchars($type['libelle_typeDoc']); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    
                                    <!-- Classe -->
                                    <div class="col-md-6 mb-3">
                                        <label for="classroom_id" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Classe <span style="color: #ef4444;">*</span></label>
                                        <select name="classroom_id" id="classroom_id" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                            <option value="">Sélectionnez une classe</option>
                                            <?php while($classe = $classes->fetch_assoc()): ?>
                                                <option value="<?php echo $classe['classroom_id']; ?>"><?php echo htmlspecialchars($classe['name']); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <!-- Matière -->
                                    <div class="col-md-6 mb-3">
                                        <label for="subject_id" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Matière <span style="color: #ef4444;">*</span></label>
                                        <select name="subject_id" id="subject_id" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                            <option value="">Sélectionnez une matière</option>
                                            <?php while($matiere = $matieres->fetch_assoc()): ?>
                                                <option value="<?php echo $matiere['subject_id']; ?>"><?php echo htmlspecialchars($matiere['name']); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    
                                    <!-- Fichier -->
                                    <div class="col-md-6 mb-3">
                                        <label for="fichier" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Fichier <span style="color: #ef4444;">*</span></label>
                                        <input type="file" name="fichier" id="fichier" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                        <small class="text-muted" id="format_indicatif">Formats acceptés : PDF, MP4, AVI, MOV, WebM</small>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <!-- Nom du document -->
                                    <div class="col-md-6 mb-3">
                                        <label for="nom_document" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Nom du document <span style="color: #ef4444;">*</span></label>
                                        <input type="text" name="nom_document" id="nom_document" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" required>
                                    </div>
                                    
                                    <!-- Auteur -->
                                    <div class="col-md-6 mb-3">
                                        <label for="auteur_document" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Auteur</label>
                                        <input type="text" name="auteur_document" id="auteur_document" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <!-- Année -->
                                    <div class="col-md-3 mb-3">
                                        <label for="annee" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Année</label>
                                        <input type="number" name="annee" id="annee" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" placeholder="Ex: 2024">
                                    </div>
                                    
                                    <!-- Nombre de pages - sera masqué pour les vidéos -->
                                    <div class="col-md-3 mb-3" id="nbre_page_container">
                                        <label for="nbre_page" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Nombre de pages</label>
                                        <input type="number" name="nbre_page" id="nbre_page" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;">
                                    </div>
                                    
                                    <!-- Prix -->
                                    <div class="col-md-3 mb-3">
                                        <label for="prix" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Prix (FCFA)</label>
                                        <input type="number" name="prix" id="prix" class="form-control" step="0.01" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" placeholder="Ex: 5000">
                                        <small class="text-muted">Laissez vide ou 0 pour gratuit</small>
                                    </div>
                                    
                                    <!-- Active -->
                                    <div class="col-md-3 mb-3">
                                        <label for="active" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Statut</label>
                                        <select name="active" id="active" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;">
                                            <option value="1">Actif</option>
                                            <option value="0">Inactif</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description_document" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Description</label>
                                    <textarea name="description_document" id="description_document" class="form-control" rows="4" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;"></textarea>
                                </div>
                                
                                <!-- Photo de couverture -->
                                <div class="mb-3">
                                    <label for="photo" style="font-weight: 500; color: #0f172a; margin-bottom: 0.5rem; display: block;">Photo de couverture (optionnel)</label>
                                    <input type="file" name="photo" id="photo" class="form-control" style="border-radius: 10px; border: 1px solid #e2e8f0; padding: 0.6rem 1rem; width: 100%;" accept="image/*">
                                    <small class="text-muted">Image de couverture pour le document (JPG, PNG, GIF)</small>
                                </div>
                                
                                <!-- Boutons -->
                                <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 1.5rem;">
                                    <a href="ajout_document.php" style="background: transparent; border: 1px solid #cbd5e1; padding: 0.6rem 1.5rem; border-radius: 10px; color: #475569; font-weight: 500; text-decoration: none;">
                                        Annuler
                                    </a>
                                    <button type="submit" name="ajouter" style="background: #3b82f6; border: none; padding: 0.6rem 1.5rem; border-radius: 10px; font-weight: 500; color: white; cursor: pointer;">
                                        Ajouter le document
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Gestion de l'affichage selon le type de document
        document.getElementById('typedocument_id').addEventListener('change', function() {
            var formatMsg = document.getElementById('format_indicatif');
            var fileInput = document.getElementById('fichier');
            var nbrePageContainer = document.getElementById('nbre_page_container');
            
            var selectedOption = this.options[this.selectedIndex];
            var libelleType = selectedOption.textContent.trim().toLowerCase();
            
            if (libelleType == 'pdf') {
                formatMsg.innerHTML = '📄 Formats acceptés : PDF uniquement';
                fileInput.accept = '.pdf';
                if (nbrePageContainer) nbrePageContainer.style.display = 'block';
            } else if (libelleType == 'vidéo' || libelleType == 'video') {
                formatMsg.innerHTML = '🎬 Formats acceptés : MP4, AVI, MOV, WebM';
                fileInput.accept = 'video/mp4,video/avi,video/quicktime,video/webm';
                if (nbrePageContainer) nbrePageContainer.style.display = 'none';
                document.getElementById('nbre_page').value = '';
            } else {
                formatMsg.innerHTML = '📎 Formats acceptés : PDF, MP4, AVI, MOV, WebM';
                fileInput.accept = '';
                if (nbrePageContainer) nbrePageContainer.style.display = 'block';
            }
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            var event = new Event('change');
            document.getElementById('typedocument_id').dispatchEvent(event);
        });
    </script>
</body>
</html>