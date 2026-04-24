<?php
// Récupérer le rôle depuis la session
$user_role = $_SESSION['role'] ?? 'etudiant';
$is_admin = ($user_role == 'admin');
$is_responsable = ($user_role == 'responsable');

$admin_nom = $_SESSION['admin_nom'] ?? "Utilisateur";
$admin_email = $_SESSION['admin_email'] ?? "email@exemple.com";
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>
            <i class="bi bi-book-half"></i> EduAdmin
        </h3>
        <p>Gestion pédagogique</p>
    </div>

    <!-- ========== MENU GESTION DES COURS (visible pour admin ET responsable) ========== -->
    <div class="menu-section">
        <i class="bi bi-grid-3x3-gap-fill me-2"></i> GESTION DES COURS
    </div>
    <ul class="list-unstyled components">
        <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'ajouter_matière.php' ? 'active' : ''; ?>">
            <a href="../cours/ajouter_matière.php">
                <i class="bi bi-journal-bookmark-fill"></i>
                <span>Ajouter Matière</span>
            </a>
        </li>
        <li>
            <a href="../cours/ajouter_classe.php">
                <i class="bi bi-people-fill"></i>
                <span>Ajouter Classe</span>
            </a>
        </li>
        <li>
            <a href="../cours/ajouter_lecon.php">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Ajouter Cours</span>
            </a>
        </li>
        <li>
            <a href="../cours/ajouter_chapitre.php">
                <i class="bi bi-bookmark-star-fill"></i>
                <span>Ajouter Chapitre</span>
            </a>
        </li>
        <li>
            <a href="../cours/ajouter_type_document.php">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Ajouter Type document</span>
            </a>
        </li>
        <li>
            <a href="../cours/ajout_document.php">
                <i class="bi bi-folder-fill"></i>
                <span>Ajouter Document</span>
            </a>
        </li>
    </ul>

    <!-- ========== MENU ADMINISTRATION (visible SEULEMENT pour admin) ========== -->
    <?php if ($is_admin): ?>
        <div class="menu-section">
            <i class="bi bi-gear-fill me-2"></i> ADMINISTRATION
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="../liste/liste_utilisateur.php">
                    <i class="bi bi-people"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="../liste/liste_admin.php">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Administrateurs</span>
                </a>
            </li>
        </ul>
    <?php endif; ?>

    <!-- ========== PROFIL UTILISATEUR DYNAMIQUE ========== -->
    <div class="p-4 mt-auto border-top border-white border-opacity-10">
        <div class="d-flex align-items-center">
            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($admin_nom); ?>&background=3498db&color=fff&size=50" 
                 class="rounded-circle me-3" width="45" height="45" alt="profile">
            <div>
                <p class="mb-0 fw-bold"><?php echo htmlspecialchars($admin_nom); ?></p>
                <p class="mb-0 small opacity-75"><?php echo htmlspecialchars($admin_email); ?></p>
            </div>
            <a href="../../authentification/logout.php" class="text-white text-decoration-none ms-auto">
                <i class="bi bi-box-arrow-right" style="cursor: pointer; opacity: 0.7;" title="Déconnexion"></i>
            </a>
        </div>
    </div>
</nav>