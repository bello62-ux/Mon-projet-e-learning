function initSummernote(element) {
    $(element).summernote({
        height: 140,
        placeholder: 'Rédigez le contenu de votre section...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ]
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Initialiser la première section
    initSummernote('.summernote-editor');
            
    let sectionCount = 1;
    const container = document.getElementById('sections-container');
    const ajouterBtn = document.getElementById('ajouterLigne');
            
    function ajouterSection() {
        sectionCount++;
        const newSection = document.createElement('div');
        newSection.style.background = 'white';
        newSection.style.borderRadius = '16px';
        newSection.style.marginBottom = '20px';
        newSection.style.border = '1px solid #e9ecef';
        newSection.style.boxShadow = '0 1px 3px rgba(0,0,0,0.05)';
        newSection.innerHTML = `
        <div style="padding: 14px 20px; background: #fafbfc; border-bottom: 1px solid #eef2f6; border-radius: 16px 16px 0 0; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <span style="font-weight: 600; font-size: 0.95rem; color: black">Section ${sectionCount}</span>
            </div>
            <button type="button" class="remove-section" style="background: transparent; border: 1px solid #ffe0e7; color: #f72585; padding: 5px 12px; border-radius: 30px; font-size: 0.75rem; font-weight: 500;">
                <i class="bi bi-trash me-1"></i> Supprimer
            </button>
        </div>

        <div style="padding: 24px;">
            <div class="row">
                <div class="col-12 mb-4">
                    <label style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; margin-bottom: 6px; display: block;">Titre</label>
                    <input type="text" name="titles[]" style="width: 100%; padding: 10px 14px; font-size: 0.9rem; border: 1.5px solid #e9ecef; border-radius: 10px; background: white;" placeholder="Ex: Introduction" required>
                </div>
                <div class="col-12 mb-4">
                    <label style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; margin-bottom: 6px; display: block;">Statut</label>
                    <select name="status[]" style="width: 100%; padding: 10px 14px; font-size: 0.9rem; border: 1.5px solid #e9ecef; border-radius: 10px; background: white;">
                        <option value="1">Actif</option>
                        <option value="0">Inactif</option>
                    </select>
                </div>
                <div class="col-12">
                    <label style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; margin-bottom: 6px; display: block;">Description</label>
                    <textarea class="summernote-editor-new" name="descriptions[]" rows="4" required></textarea>
                </div>
            </div>
        </div>
                `;
        container.appendChild(newSection);
                
        // Initialiser Summernote pour la nouvelle section
        initSummernote(newSection.querySelector('.summernote-editor-new'));
                
        const removeBtn = newSection.querySelector('.remove-section');
        removeBtn.addEventListener('click', function() {
            newSection.remove();
            reindexSections();
        });
    }
            
    function reindexSections() {
        const sections = document.querySelectorAll('#sections-container > div');
        sections.forEach((section, index) => {
            const numberSpan = section.querySelector('span');
            if (numberSpan) numberSpan.textContent = `Section ${index + 1}`;
            const removeBtn = section.querySelector('.remove-section');
            if (sections.length === 1 && removeBtn) {
                removeBtn.style.display = 'none';
            }else if (removeBtn) {
                removeBtn.style.display = 'block';
            }
        });
        sectionCount = sections.length;
    }
            
    ajouterBtn.addEventListener('click', ajouterSection);
            
    const firstRemoveBtn = document.querySelector('.remove-section');
    if (firstRemoveBtn) {
        firstRemoveBtn.style.display = 'none';
    }
});

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



// Fonction pour ouvrir le modal de suppression
function ouvrirModalSuppression(id, nom, chapter_id) {
    var modal = document.getElementById('modalConfirmationSuppression');
    var btnConfirmer = document.getElementById('btnConfirmSupprimer');
            var message = document.getElementById('modalSuppressionMessage');
            
    // Mettre à jour le lien de suppression avec chapter_id
    btnConfirmer.href = '../../delete/supprimer_section.php?section_id=' + id + '&chapter_id=' + chapter_id;
            
    // Mettre à jour le message avec le nom de la section
    if(message) {
        message.innerHTML = 'Voulez-vous vraiment supprimer la section <strong>' + nom + '</strong> ?';
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