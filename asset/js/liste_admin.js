function confirmDelete(id, nom) {
            var modal = document.getElementById('modalConfirmationSuppression');
            var btnConfirmer = document.getElementById('btnConfirmSupprimer');
            var message = document.getElementById('modalSuppressionMessage');
            
            btnConfirmer.href = '../../traitement/traitement_admin.php?action=delete&user_id=' + id;
            message.innerHTML = 'Voulez-vous vraiment supprimer l\'administrateur <strong>' + nom + '</strong> ?';
            
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }
        
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
        
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);