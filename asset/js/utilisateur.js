 // Fonction pour ouvrir le modal de blocage
        function ouvrirModalBloquer(id, nom) {
            var modal = document.getElementById('modalConfirmationBloquer');
            var btnConfirmer = document.getElementById('btnConfirmBloquer');
            var message = document.getElementById('modalBloquerMessage');
            
            btnConfirmer.href = '../../traitement/traitement_utilisateur.php?action=block&user_id=' + id;
            
            if(message) {
                message.innerHTML = 'Voulez-vous vraiment bloquer l\'utilisateur <strong>' + nom + '</strong> ?';
            }
            
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }
        
        // Fonction pour ouvrir le modal de déblocage
        function ouvrirModalDebloquer(id, nom) {
            var modal = document.getElementById('modalConfirmationDebloquer');
            var btnConfirmer = document.getElementById('btnConfirmDebloquer');
            var message = document.getElementById('modalDebloquerMessage');
            
            btnConfirmer.href = '../../traitement/traitement_utilisateur.php?action=unblock&user_id=' + id;
            
            if(message) {
                message.innerHTML = 'Voulez-vous vraiment débloquer l\'utilisateur <strong>' + nom + '</strong> ?';
            }
            
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }
        
        // Fonction pour ouvrir le modal de suppression
        function ouvrirModalSuppression(id, nom) {
            var modal = document.getElementById('modalConfirmationSuppression');
            var btnConfirmer = document.getElementById('btnConfirmSupprimer');
            var message = document.getElementById('modalSuppressionMessage');
            
            btnConfirmer.href = '../../traitement/traitement_utilisateur.php?action=delete&user_id=' + id;
            
            if(message) {
                message.innerHTML = 'Voulez-vous vraiment supprimer l\'utilisateur <strong>' + nom + '</strong> ?';
            }
            
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }

        // Gestion de la sidebar
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        if (sidebarCollapse) {
            sidebarCollapse.addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
            });
        }

        function handleResize() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) {
                if (window.innerWidth <= 768) {
                    sidebar.classList.add('active');
                } else {
                    sidebar.classList.remove('active');
                }
            }
        }
        window.addEventListener('resize', handleResize);
        handleResize();
        
        // Auto-fermeture des alertes après 5 secondes
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);