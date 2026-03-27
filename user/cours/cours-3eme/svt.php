<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/cours-francais.css">
    <title>SVT  - Nournours</title>
</head>
<body>
    

    <div class="course-container">
        <!-- Sidebar avec chapitres -->
        <div class="sidebar">
            <div class="course-title">
                <h1>SVT</h1>
                <div class="mobile-close-btn">×</div>
            </div>
            
            <div class="chapters">
                <div class="chapter">
                    <div class="chapter-title">Chapitre 1 : Génétique</div>
                    <ul class="lessons">
                        <li class="lesson active" data-lesson="genetique">Chromosomes et ADN</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 2 : Évolution</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="evolution">Sélection naturelle</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 3 : Reproduction</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="reproduction">Système reproducteur</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 4 : Micro-organismes</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="microorganismes">Bactéries et virus</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 5 : Risques infectieux</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="risques">Prévention et traitements</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 6 : Responsabilité</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="responsabilite">Santé et environnement</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content content-active">
            
            <!-- ========== CHAPITRE 1 : GÉNÉTIQUE ========== -->
            <div class="lesson-content active" id="genetique-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Génétique et Hérédité</h2>
                        <button class="mobile-toggle-btn">☰ Menu</button>
                    </div>
                </div>

                <div class="lesson-type">
                    <button class="type-btn active" data-type="video">Vidéo du cours</button>
                    <button class="type-btn" data-type="written">Cours écrit</button>
                </div>

                <!-- CONTENU VIDÉO -->
                <div class="video-content">
                    <div class="video-placeholder">
                       <h1>VIDÉO - GÉNÉTIQUE 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>La molécule d'ADN</h3>
                        <p class="content-text">
                            L'ADN (Acide DésoxyriboNucléique) est la molécule qui contient l'information génétique de tous les êtres vivants.
                        </p>
                        
                        <div class="grammar-point">
                            <h4>Structure de l'ADN :</h4>
                            <div class="example">
                                <strong>Double hélice</strong> → forme caractéristique en spirale<br>
                                <strong>Nucléotides</strong> → unités de base (A, T, C, G)<br>
                                <strong>Chromosomes</strong> → ADN compacté dans le noyau<br>
                                <strong>Gènes</strong> → segments d'ADN portant une information<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Chromosomes et caryotype</h3>
                        <p class="content-text">
                            Chaque cellule humaine contient 46 chromosomes organisés en 23 paires.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>22 paires d'autosomes</strong> → chromosomes non sexuels<br>
                                <strong>1 paire de chromosomes sexuels</strong> → XX (femme) ou XY (homme)<br>
                                <strong>Caryotype</strong> → photographie des chromosomes classés par taille<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Transmission des caractères</h3>
                        <p class="content-text">
                            Comment les caractères se transmettent-ils de parents à enfants ?
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Allèles</strong> → versions différentes d'un même gène<br>
                                <strong>Dominant/récessif</strong> → expression des caractères<br>
                                <strong>Génotype</strong> → information génétique<br>
                                <strong>Phénotype</strong> → expression visible des caractères<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Mutations génétiques</h3>
                        <p class="content-text">
                            Les mutations sont des modifications de la séquence d'ADN.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Mutations neutres</strong> → sans conséquence visible<br>
                                <strong>Mutations délétères</strong> → responsables de maladies<br>
                                <strong>Mutations bénéfiques</strong> → source d'évolution<br>
                                <strong>Exemples</strong> → drépanocytose, mucoviscidose<br>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('genetique')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 2 : ÉVOLUTION ========== -->
            <div class="lesson-content" id="evolution-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Évolution des êtres vivants</h2>
                        <button class="mobile-toggle-btn">☰ Menu</button>
                    </div>
                </div>

                <div class="lesson-type">
                    <button class="type-btn active" data-type="video">Vidéo du cours</button>
                    <button class="type-btn" data-type="written">Cours écrit</button>
                </div>

                <!-- CONTENU VIDÉO -->
                <div class="video-content">
                    <div class="video-placeholder">
                       <h1>VIDÉO - ÉVOLUTION 3ÈME</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Théorie de l'évolution</h3>
                        <p class="content-text">
                            Charles Darwin et la sélection naturelle expliquent comment les espèces évoluent.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Variabilité</strong> → différences entre individus d'une même espèce<br>
                                <strong>Sélection</strong> → survie des mieux adaptés<br>
                                <strong>Reproduction</strong> → transmission des caractères avantageux<br>
                                <strong>Exemple</strong> → phalènes du bouleau<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Preuves de l'évolution</h3>
                        <p class="content-text">
                            Plusieurs arguments montrent la parenté entre les espèces.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Fossiles</strong> → formes intermédiaires<br>
                                <strong>Anatomie comparée</strong> → structures homologues<br>
                                <strong>Embryologie</strong> → similitudes du développement<br>
                                <strong>Génétique</strong> → ADN commun entre espèces<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Biodiversité</h3>
                        <p class="content-text">
                            Diversité des espèces et des écosystèmes.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Espèces actuelles</strong> → environ 8,7 millions<br>
                                <strong>Espèces disparues</strong> → plus de 99% des espèces<br>
                                <strong>Crises biologiques</strong> → extinctions massives<br>
                                <strong>Biodiversité menacée</strong> → déforestation, pollution<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Classification du vivant</h3>
                        <p class="content-text">
                            Arbre phylogénétique et parenté.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Règnes</strong> → animal, végétal, champignons, etc.<br>
                                <strong>Embranchements</strong> → vertébrés, arthropodes<br>
                                <strong>Ordres, familles, genres, espèces</strong><br>
                                <strong>Exemple</strong> → Homo sapiens<br>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('evolution')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 3 : REPRODUCTION ========== -->
            <div class="lesson-content" id="reproduction-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Reproduction humaine</h2>
                        <button class="mobile-toggle-btn">☰ Menu</button>
                    </div>
                </div>

                <div class="lesson-type">
                    <button class="type-btn active" data-type="video">Vidéo du cours</button>
                    <button class="type-btn" data-type="written">Cours écrit</button>
                </div>

                <!-- CONTENU VIDÉO -->
                <div class="video-content">
                    <div class="video-placeholder">
                       <h1>VIDÉO - REPRODUCTION 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Système reproducteur masculin</h3>
                        <p class="content-text">
                            Organes et fonctionnement.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Testicules</strong> → production de spermatozoïdes<br>
                                <strong>Épididyme</strong> → maturation des spermatozoïdes<br>
                                <strong>Vésicules séminales, prostate</strong> → production du liquide séminal<br>
                                <strong>Pénis</strong> → organe de copulation<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Système reproducteur féminin</h3>
                        <p class="content-text">
                            Anatomie et cycle menstruel.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Ovaires</strong> → production d'ovocytes<br>
                                <strong>Trompes de Fallope</strong> → lieu de la fécondation<br>
                                <strong>Utérus</strong> → nidation et développement de l'embryon<br>
                                <strong>Vagin</strong> → organe de copulation et accouchement<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Fécondation et développement</h3>
                        <p class="content-text">
                            De la rencontre à l'embryon.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Fécondation</strong> → fusion ovocyte/spermatozoïde<br>
                                <strong>Zygote</strong> → première cellule<br>
                                <strong>Division cellulaire</strong> → morula, blastocyste<br>
                                <strong>Nidation</strong> → implantation dans l'utérus<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Grossesse et accouchement</h3>
                        <p class="content-text">
                            Les étapes de la maternité.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Trimestres de grossesse</strong> → développement fœtal<br>
                                <strong>Placenta</strong> → échanges mère-fœtus<br>
                                <strong>Accouchement</strong> → travail, expulsion, délivrance<br>
                                <strong>Allaitement</strong> → nutrition du nouveau-né<br>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('reproduction')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 4 : MICRO-ORGANISMES ========== -->
            <div class="lesson-content" id="microorganismes-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Micro-organismes et santé</h2>
                        <button class="mobile-toggle-btn">☰ Menu</button>
                    </div>
                </div>

                <div class="lesson-type">
                    <button class="type-btn active" data-type="video">Vidéo du cours</button>
                    <button class="type-btn" data-type="written">Cours écrit</button>
                </div>

                <!-- CONTENU VIDÉO -->
                <div class="video-content">
                    <div class="video-placeholder">
                       <h1>VIDÉO - MICRO-ORGANISMES 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Bactéries</h3>
                        <p class="content-text">
                            Caractéristiques des bactéries.
                        </p>
                        
                        <div class="grammar-point">
                            <h4>Caractéristiques :</h4>
                            <div class="example">
                                <strong>Procaryotes</strong> → sans noyau<br>
                                <strong>Taille</strong> → 1 à 10 micromètres<br>
                                <strong>Formes</strong> → cocci, bacilles, spirilles<br>
                                <strong>Rôles</strong> → pathogènes ou utiles<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Virus</h3>
                        <p class="content-text">
                            Entités à la frontière du vivant.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Structure</strong> → matériel génétique + capside<br>
                                <strong>Reproduction</strong> → besoin d'une cellule hôte<br>
                                <strong>Exemples</strong> → grippe, VIH, COVID-19<br>
                                <strong>Transmission</strong> → air, contact, vecteurs<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Système immunitaire</h3>
                        <p class="content-text">
                            Défenses de l'organisme.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Barrières</strong> → peau, muqueuses<br>
                                <strong>Immunité innée</strong> → phagocytes, inflammation<br>
                                <strong>Immunité adaptative</strong> → lymphocytes, anticorps<br>
                                <strong>Mémoire immunitaire</strong> → vaccination<br>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('microorganismes')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 5 : RISQUES INFECTIEUX ========== -->
            <div class="lesson-content" id="risques-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Risques infectieux</h2>
                        <button class="mobile-toggle-btn">☰ Menu</button>
                    </div>
                </div>

                <div class="lesson-type">
                    <button class="type-btn active" data-type="video">Vidéo du cours</button>
                    <button class="type-btn" data-type="written">Cours écrit</button>
                </div>

                <!-- CONTENU VIDÉO -->
                <div class="video-content">
                    <div class="video-placeholder">
                       <h1>VIDÉO - RISQUES INFECTIEUX 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Prévention des infections</h3>
                        <p class="content-text">
                            Mesures d'hygiène essentielles.
                        </p>
                        
                        <div class="grammar-point">
                            <h4>Mesures d'hygiène :</h4>
                            <div class="example">
                                <strong>Lavage des mains</strong> → technique correcte<br>
                                <strong>Vaccination</strong> → protection collective<br>
                                <strong>Stérilisation</strong> → matériel médical<br>
                                <strong>Isolement</strong> → patients contagieux<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Épidémies et pandémies</h3>
                        <p class="content-text">
                            Diffusion des maladies.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Épidémie</strong> → augmentation localisée<br>
                                <strong>Pandémie</strong> → diffusion mondiale<br>
                                <strong>Endémie</strong> → présence permanente<br>
                                <strong>Exemples</strong> → peste noire, grippe espagnole, COVID-19<br>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('risques')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 6 : RESPONSABILITÉ ========== -->
            <div class="lesson-content" id="responsabilite-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Responsabilité humaine</h2>
                        <button class="mobile-toggle-btn">☰ Menu</button>
                    </div>
                </div>

                <div class="lesson-type">
                    <button class="type-btn active" data-type="video">Vidéo du cours</button>
                    <button class="type-btn" data-type="written">Cours écrit</button>
                </div>

                <!-- CONTENU VIDÉO -->
                <div class="video-content">
                    <div class="video-placeholder">
                       <h1>VIDÉO - RESPONSABILITÉ 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Santé et environnement</h3>
                        <p class="content-text">
                            Impacts réciproques.
                        </p>
                        
                        <div class="grammar-point">
                            <h4>Impacts réciproques :</h4>
                            <div class="example">
                                <strong>Pollution</strong> → air, eau, sol<br>
                                <strong>Changement climatique</strong> → maladies émergentes<br>
                                <strong>Urbanisation</strong> → modes de vie sédentaires<br>
                                <strong>Agriculture intensive</strong> → pesticides, antibiotiques<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Comportements responsables</h3>
                        <p class="content-text">
                            Choix individuels et collectifs.
                        </p>
                        
                        <div class="grammar-point">
                            <div class="example">
                                <strong>Alimentation</strong> → équilibrée, locale, bio<br>
                                <strong>Activité physique</strong> → prévention des maladies<br>
                                <strong>Hygiène de vie</strong> → sommeil, stress<br>
                                <strong>Consommation</strong> → durable, raisonnée<br>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('responsabilite')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navigation entre les leçons
        const lessons = document.querySelectorAll('.lesson');
        const typeButtons = document.querySelectorAll('.type-btn');
        const lessonContents = document.querySelectorAll('.lesson-content');
        const mainContent = document.querySelector('.main-content');
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const mobileCloseBtn = document.querySelector('.mobile-close-btn');
        const sidebar = document.querySelector('.sidebar');
        const mobileToggleBtns = document.querySelectorAll('.mobile-toggle-btn');

        // Gestion des leçons actives
        lessons.forEach(lesson => {
            lesson.addEventListener('click', function() {
                // Retirer active de toutes les leçons
                lessons.forEach(l => l.classList.remove('active'));
                // Activer la leçon cliquée
                this.classList.add('active');
                
                // Afficher le contenu correspondant
                const lessonId = this.getAttribute('data-lesson');
                showLessonContent(lessonId);
                
                // Sur mobile, cacher la sidebar après sélection
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                }
            });
        });

        // Gestion des types de contenu (vidéo/écrit)
        typeButtons.forEach(button => {
            button.addEventListener('click', function() {
                typeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const contentType = this.getAttribute('data-type');
                toggleContentType(contentType);
            });
        });

        function showLessonContent(lessonId) {
            // Cacher tous les contenus de leçon
            lessonContents.forEach(content => content.classList.remove('active'));
            // Afficher le contenu de la leçon sélectionnée
            const targetContent = document.getElementById(lessonId + '-content');
            if (targetContent) {
                targetContent.classList.add('active');
            }
            
            // Remettre en mode vidéo par défaut
            toggleContentType('video');
            typeButtons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('data-type') === 'video') {
                    btn.classList.add('active');
                }
            });
        }

        function toggleContentType(type) {
            if (type === 'video') {
                mainContent.classList.remove('written-active');
                mainContent.classList.add('content-active');
            } else {
                mainContent.classList.remove('content-active');
                mainContent.classList.add('written-active');
            }
        }

        // Gestion du menu mobile
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.add('active');
            });
        }

        if (mobileCloseBtn) {
            mobileCloseBtn.addEventListener('click', function() {
                sidebar.classList.remove('active');
            });
        }

        mobileToggleBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                sidebar.classList.add('active');
            });
        });

        // Fermer la sidebar en cliquant à l'extérieur sur mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768 && 
                sidebar.classList.contains('active') &&
                !sidebar.contains(event.target) &&
                (!mobileMenuBtn || !mobileMenuBtn.contains(event.target)) &&
                !event.target.classList.contains('mobile-toggle-btn')) {
                sidebar.classList.remove('active');
            }
        });

        // Au chargement, afficher la leçon active
        document.addEventListener('DOMContentLoaded', function() {
            const activeLesson = document.querySelector('.lesson.active');
            if (activeLesson) {
                const lessonId = activeLesson.getAttribute('data-lesson');
                showLessonContent(lessonId);
            }
            
            // Ajuster l'affichage sur mobile
            if (window.innerWidth <= 768) {
                toggleContentType('written');
                typeButtons.forEach(btn => {
                    btn.classList.remove('active');
                    if (btn.getAttribute('data-type') === 'written') {
                        btn.classList.add('active');
                    }
                });
            }
        });

        // Fonction pour marquer un cours comme terminé - SVT 3ÈME
        function markAsComplete(chapitreId) {
            const coursSVTIds = {
                'genetique': 19,       // Génétique et Hérédité
                'evolution': 20,       // Évolution
                'reproduction': 21,    // Reproduction
                'microorganismes': 22, // Micro-organismes
                'risques': 23,         // Risques infectieux
                'responsabilite': 24   // Responsabilité humaine
            };
            
            const coursId = coursSVTIds[chapitreId];
            
            if (!coursId) {
                alert('Erreur : ID du cours non trouvé pour: ' + chapitreId);
                return;
            }
            
            fetch('mark_complete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `cours_id=${coursId}&chapitre_id=${chapitreId}`
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    const lessonElement = document.querySelector(`.lesson[data-lesson="${chapitreId}"]`);
                    if (lessonElement) {
                        lessonElement.style.backgroundColor = '#2ecc71';
                        lessonElement.style.color = 'white';
                        lessonElement.innerHTML += ' ✓';
                    }
                    alert('Cours marqué comme terminé !');
                } else {
                    alert('Erreur serveur: ' + data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Erreur de connexion: ' + error);
            });
        }
    </script>
</body>
</html>