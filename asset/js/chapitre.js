document.getElementById('sidebarCollapse').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
});

function handleResize() {
    if (window.innerWidth <= 768) document.getElementById('sidebar').classList.add('active');
    else document.getElementById('sidebar').classList.remove('active');
}
window.addEventListener('resize', handleResize);
handleResize();

function ouvrirModalSuppression(id, nom) {
    var modal = document.getElementById('modalConfirmationSuppression');
    var btnConfirmer = document.getElementById('btnConfirmSupprimer');
    var message = document.getElementById('modalSuppressionMessage');
            
    // Mettre à jour le lien de suppression
    btnConfirmer.href = '../../delete/supprimer_chapitre.php?chapter_id=' + id;
            
    // Mettre à jour le message avec le nom de la matière
    if(message) {
        message.innerHTML = 'Voulez-vous vraiment supprimer la matière <strong>' + nom + '</strong> ?';
    }
            
    // Ouvrir le modal
    var modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
}

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