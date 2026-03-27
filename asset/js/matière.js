 document.addEventListener('DOMContentLoaded', function() {
    var modalModifier = document.getElementById('modalModifierMatiere');
    modalModifier.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        document.getElementById('modif_subject_id').value = button.getAttribute('data-id');
        document.getElementById('modif_nom').value = button.getAttribute('data-nom');
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

function ouvrirModalSuppression(id, nom) {
    var modal = document.getElementById('modalConfirmationSuppression');
    var btnConfirmer = document.getElementById('btnConfirmSupprimer');
    var message = document.getElementById('modalSuppressionMessage');
            
    // Mettre à jour le lien de suppression
    btnConfirmer.href = '../../delete/supprimer.php?subject_id=' + id;
            
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