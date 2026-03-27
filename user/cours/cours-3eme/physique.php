<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/cours-francais.css">
    <title>Physique- Nournours</title>
</head>
<body>
  

    <div class="course-container">
        <!-- Sidebar avec chapitres -->
        <div class="sidebar">
            <div class="course-title">
                <h1>Physique</h1>
                <div class="mobile-close-btn">×</div>
            </div>
            
            <div class="chapters">
                <div class="chapter">
                    <div class="chapter-title">Chapitre 1 : Mouvement</div>
                    <ul class="lessons">
                        <li class="lesson active" data-lesson="mouvement">Mouvements et forces</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 2 : Énergie</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="energie">Formes et conversions</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 3 : Électricité</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="electricite">Circuits et puissance</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 4 : Lumière</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="lumiere">Propagation et couleurs</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 5 : Sons</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="sons">Propagation des sons</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 6 : Chimie</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="chimie">Atomes et molécules</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content content-active">
            
            <!-- ========== CHAPITRE 1 : MOUVEMENT ========== -->
            <div class="lesson-content active" id="mouvement-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Mouvement et interactions</h2>
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
                       <h1>VIDÉO - MOUVEMENT ET INTERACTIONS 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Décrire un mouvement</h3>

                        <div class="grammar-point">
                            <h4>Notions essentielles :</h4>
                            
                            <div class="example">
                                <strong>Trajectoire :</strong> ligne décrite par un point<br>
                                <strong>Vitesse :</strong> distance parcourue par unité de temps<br>
                                <strong>Référentiel :</strong> objet de référence pour décrire le mouvement<br>
                                <strong>Mouvement rectiligne uniforme :</strong> vitesse constante en ligne droite<br>
                            </div>
                            <p><strong>Formule :</strong> v = d/t (vitesse = distance ÷ temps)</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Les forces</h3>
                        <p>Une force modifie le mouvement d'un objet ou le déforme</p>
                        <div class="example">
                            <strong>Caractéristiques d'une force :</strong> point d'application, direction, sens, intensité<br>
                            <strong>Poids :</strong> attraction exercée par la Terre<br>
                            <strong>Réaction du support :</strong> force exercée par un appui<br>
                            <strong>Frottements :</strong> forces qui s'opposent au mouvement<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Actions mécaniques</h3>
                        <p>Différents types d'interactions</p>
                        <div class="example">
                            <strong>Action de contact :</strong> nécessite un contact physique<br>
                            <strong>Action à distance :</strong> exercée sans contact (gravité, magnétisme)<br>
                            <strong>Interaction gravitationnelle :</strong> force d'attraction entre masses<br>
                            <strong>Interaction électrique :</strong> force entre charges électriques<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Équilibre d'un système</h3>
                        <p class="content-text">
                            Conditions pour qu'un objet soit immobile
                        </p>
                        <div class="example">
                            <strong>Deux forces égales et opposées s'annulent</strong><br>
                            <strong>Résultante des forces nulle</strong><br>
                            <strong>Exemple : livre posé sur une table</strong><br>
                            <strong>Poids du livre = Réaction de la table</strong>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('mouvement')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 2 : ÉNERGIE ========== -->
            <div class="lesson-content" id="energie-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Énergie</h2>
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
                       <h1>VIDÉO - ÉNERGIE 3ÈME</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Les formes d'énergie</h3>
                        <p class="content-text">
                           L'énergie se présente sous différentes formes
                        </p>
                        <div class="example">
                            <strong>Énergie mécanique :</strong> mouvement et position<br>
                            <strong>Énergie thermique :</strong> chaleur<br>
                            <strong>Énergie électrique :</strong> courant électrique<br>
                            <strong>Énergie chimique :</strong> contenue dans les liaisons chimiques<br>
                            <strong>Énergie lumineuse :</strong> lumière<br>
                            <strong>Énergie nucléaire :</strong> noyau des atomes<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Conversions d'énergie</h3>
                        <p class="content-text">
                           Transformations d'une forme d'énergie en une autre
                        </p>
                        <div class="example">
                            <strong>Centrale thermique :</strong> chimique → thermique → mécanique → électrique<br>
                            <strong>Pile :</strong> chimique → électrique<br>
                            <strong>Lampe :</strong> électrique → lumineuse + thermique<br>
                            <strong>Moteur électrique :</strong> électrique → mécanique<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Puissance et rendement</h3>
                        <p class="content-text">
                            Mesures de l'efficacité énergétique
                        </p>
                        <div class="example">
                            <strong>Puissance (P) :</strong> énergie convertie par unité de temps (Watt)<br>
                            <strong>Formule : P = E/t</strong><br>
                            <strong>Rendement :</strong> rapport énergie utile/énergie reçue<br>
                            <strong>Formule : η = E utile / E reçue</strong><br>
                            <strong>Toujours inférieur à 1 (pertes)</strong>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('energie')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 3 : ÉLECTRICITÉ ========== -->
            <div class="lesson-content" id="electricite-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Électricité</h2>
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
                        <h1>VIDÉO - ÉLECTRICITÉ 3ÈME</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Courant électrique</h3>
                        <p class="content-text">
                           Déplacement de charges électriques
                        </p>
                        <div class="example">
                            <strong>Intensité (I) :</strong> quantité de charges par seconde (Ampère)<br>
                            <strong>Tension (U) :</strong> différence de potentiel (Volt)<br>
                            <strong>Résistance (R) :</strong> opposition au passage du courant (Ohm)<br>
                            <strong>Loi d'Ohm :</strong> U = R × I<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Circuits électriques</h3>
                        <p class="content-text">
                            Organisation des composants
                        </p>
                        <div class="example">
                            <strong>Circuit en série :</strong> un seul chemin pour le courant<br>
                            <strong>Circuit en dérivation :</strong> plusieurs chemins parallèles<br>
                            <strong>Lois des nœuds :</strong> ΣI entrant = ΣI sortant<br>
                            <strong>Loi des mailles :</strong> ΣU dans une maille = 0<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Puissance et énergie électrique</h3>
                        <p class="content-text">
                           Calcul et mesure
                        </p>
                        <div class="example">
                            <strong>Puissance électrique :</strong> P = U × I (Watt)<br>
                            <strong>Énergie électrique :</strong> E = P × t (Joule ou kWh)<br>
                            <strong>1 kWh = 3,6 × 10⁶ J</strong><br>
                            <strong>Compteur électrique :</strong> mesure la consommation<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('electricite')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 4 : LUMIÈRE ========== -->
            <div class="lesson-content" id="lumiere-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Lumière et vision</h2>
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
                       <h1>VIDÉO - LUMIÈRE ET VISION 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Propagation de la lumière</h3>
                        <div class="grammar-point">
                            <h4>Caractéristiques :</h4>
                            <div class="example">
                                <strong>Vitesse :</strong> 300 000 km/s dans le vide<br>
                                <strong>Rectiligne :</strong> en ligne droite dans un milieu homogène<br>
                                <strong>Source primaire :</strong> émet sa propre lumière (Soleil, ampoule)<br>
                                <strong>Source secondaire :</strong> diffuse la lumière reçue (Lune, objets)<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Ombre et pénombre</h3>
                        <p>Formation des ombres</p>
                        <div class="example">
                            <strong>Ombre propre :</strong> côté non éclairé d'un objet<br>
                            <strong>Ombre portée :</strong> zone non éclairée derrière l'objet<br>
                            <strong>Éclipse :</strong> ombre de la Lune sur la Terre ou vice-versa<br>
                            <strong>Source ponctuelle :</strong> ombre nette<br>
                            <strong>Source étendue :</strong> ombre + pénombre<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Les couleurs</h3>
                        <p>Vision et perception</p>
                        <div class="example">
                            <strong>Lumière blanche :</strong> mélange de toutes les couleurs<br>
                            <strong>Décomposition :</strong> prisme ou goutte d'eau (arc-en-ciel)<br>
                            <strong>Couleurs primaires :</strong> rouge, vert, bleu (synthèse additive)<br>
                            <strong>Couleurs complémentaires :</strong> cyan, magenta, jaune (synthèse soustractive)<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('lumiere')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 5 : SONS ========== -->
            <div class="lesson-content" id="sons-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Sons et audition</h2>
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
                       <h1>VIDÉO - SONS ET AUDITION 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Production et propagation</h3>
                        <div class="grammar-point">
                            <h4>Caractéristiques des sons :</h4>
                            <div class="example">
                                <strong>Vibration :</strong> source sonore vibre<br>
                                <strong>Milieu matériel :</strong> nécessaire pour la propagation<br>
                                <strong>Longitudinal :</strong> vibration parallèle à la propagation<br>
                                <strong>Vitesse :</strong> environ 340 m/s dans l'air<br>
                                <strong>Plus rapide dans les solides que dans les liquides</strong>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Caractéristiques physiques</h3>
                        <p>Paramètres mesurables</p>
                        <div class="example">
                            <strong>Hauteur :</strong> liée à la fréquence (grave/aigu)<br>
                            <strong>Fréquence (f) :</strong> nombre d'oscillations par seconde (Hz)<br>
                            <strong>Intensité :</strong> liée à l'amplitude (fort/faible)<br>
                            <strong>Timbre :</strong> permet de reconnaître la source<br>
                            <strong>Échelle des fréquences audibles :</strong> 20 Hz à 20 000 Hz<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>L'oreille et l'audition</h3>
                        <p>Perception des sons</p>
                        <div class="example">
                            <strong>Oreille externe :</strong> pavillon, conduit auditif<br>
                            <strong>Oreille moyenne :</strong> tympan, osselets (marteau, enclume, étrier)<br>
                            <strong>Oreille interne :</strong> cochlée (organe de Corti)<br>
                            <strong>Dommages auditifs :</strong> exposition au bruit intense<br>
                            <strong>Protections :</strong> casques, bouchons d'oreille<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('sons')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 6 : CHIMIE ========== -->
            <div class="lesson-content" id="chimie-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Chimie et matériaux</h2>
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
                       <h1>VIDÉO - CHIMIE ET MATÉRIAUX 3ÈME</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Atomes et molécules</h3>
                        <div class="grammar-point">
                            <h4>Structure de la matière :</h4>
                            <div class="example">
                                <strong>Atome :</strong> plus petite partie d'un élément<br>
                                <strong>Noyau :</strong> protons (+) et neutrons<br>
                                <strong>Électrons :</strong> particules négatives autour du noyau<br>
                                <strong>Molécule :</strong> assemblage d'atomes<br>
                                <strong>Formule chimique :</strong> H₂O (eau), CO₂ (dioxyde de carbone)<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>États de la matière</h3>
                        <p>Les trois états principaux</p>
                        <div class="example">
                            <strong>Solide :</strong> forme et volume propres<br>
                            <strong>Liquide :</strong> volume propre, prend la forme du récipient<br>
                            <strong>Gaz :</strong> pas de forme ni volume propres<br>
                            <strong>Changements d'état :</strong> fusion, solidification, vaporisation, condensation<br>
                            <strong>Température constante pendant le changement d'état</strong>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Transformations chimiques</h3>
                        <p>Réactions entre substances</p>
                        <div class="example">
                            <strong>Réactifs :</strong> substances initiales<br>
                            <strong>Produits :</strong> substances formées<br>
                            <strong>Équation chimique :</strong> CH₄ + 2O₂ → CO₂ + 2H₂O<br>
                            <strong>Conservation de la masse :</strong> masse totale constante<br>
                            <strong>Combustion :</strong> réaction avec le dioxygène (flamme)<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('chimie')">Marquer comme terminé ✓</button>
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

        // Fonction pour marquer un cours comme terminé - PHYSIQUE 3ÈME
        function markAsComplete(chapitreId) {
            const coursPhysiqueIds = {
                'mouvement': 25,      // Mouvement et interactions
                'energie': 26,        // Énergie
                'electricite': 27,    // Électricité
                'lumiere': 28,        // Lumière et vision
                'sons': 29,           // Sons et audition
                'chimie': 30          // Chimie et matériaux
            };
            
            const coursId = coursPhysiqueIds[chapitreId];
            
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