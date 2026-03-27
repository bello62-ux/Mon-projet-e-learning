<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/cours-francais.css">
    <title>Physique Terminale</title>
</head>
<body>


    <div class="course-container">
        <!-- Sidebar avec chapitres -->
        <div class="sidebar">
            <div class="course-title">
                <h1>Physique Terminale</h1>
                <div class="mobile-close-btn">×</div>
            </div>
            
            <div class="chapters">
                <div class="chapter">
                    <div class="chapter-title">Chapitre 1 : Mécanique</div>
                    <ul class="lessons">
                        <li class="lesson active" data-lesson="mecanique">Lois de Newton et énergie</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 2 : Ondes et signaux</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="ondes">Propagation et diffraction</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 3 : Électromagnétisme</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="electromagnetisme">Champs et induction</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 4 : Physique quantique</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="quantique">Dualité onde-particule</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 5 : Physique nucléaire</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="nucleaire">Radioactivité et énergie nucléaire</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 6 : Thermodynamique</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="thermodynamique">Transferts thermiques</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content content-active">
            
            <!-- ========== CHAPITRE 1 : MÉCANIQUE ========== -->
            <div class="lesson-content active" id="mecanique-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Mécanique</h2>
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
                       <h1>VIDÉO - MÉCANIQUE TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Lois de Newton</h3>

                        <div class="grammar-point">
                            <h4>Principes fondamentaux :</h4>
                            
                            <div class="example">
                                <strong>Première loi (inertie) :</strong> Un corps persévère dans son état de repos ou de mouvement rectiligne uniforme<br>
                                <strong>Deuxième loi (fondamentale) :</strong> ΣF = m.a (somme des forces = masse × accélération)<br>
                                <strong>Troisième loi (action-réaction) :</strong> À toute action correspond une réaction égale et opposée<br>
                                <strong>Quantité de mouvement :</strong> p = m.v (masse × vitesse)<br>
                            </div>
                            <p>Ces lois s'appliquent dans des référentiels galiléens.</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Travail et énergie</h3>
                        <p>Énergies mécaniques et conservation</p>
                        <div class="example">
                            <strong>Travail d'une force :</strong> W = F.d.cos(θ)<br>
                            <strong>Énergie cinétique :</strong> E<sub>c</sub> = ½mv²<br>
                            <strong>Énergie potentielle de pesanteur :</strong> E<sub>pp</sub> = mgh<br>
                            <strong>Énergie mécanique :</strong> E<sub>m</sub> = E<sub>c</sub> + E<sub>pp</sub><br>
                            <strong>Théorème de l'énergie cinétique :</strong> ΔE<sub>c</sub> = ΣW<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Mouvements dans un champ uniforme</h3>
                        <p>Chute libre et projectiles</p>
                        <div class="example">
                            <strong>Chute libre verticale :</strong> a = g = 9,81 m/s²<br>
                            <strong>Mouvement parabolique :</strong> combinaison MRU horizontal + MRUV vertical<br>
                            <strong>Portée :</strong> distance horizontale maximale<br>
                            <strong>Flèche :</strong> altitude maximale atteinte<br>
                            <strong>Temps de vol :</strong> durée totale du mouvement<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Systèmes oscillants</h3>
                        <p class="content-text">
                            Mouvements périodiques et oscillateurs
                        </p>
                        <div class="example">
                            <strong>Pendule simple :</strong> T = 2π√(L/g) (période)<br>
                            <strong>Oscillateur harmonique :</strong> x(t) = X<sub>max</sub>cos(ωt + φ)<br>
                            <strong>Énergie d'un oscillateur :</strong> constante si pas d'amortissement<br>
                            <strong>Résonance :</strong> amplification à la fréquence propre<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('mecanique')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 2 : ONDES ET SIGNAUX ========== -->
            <div class="lesson-content" id="ondes-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Ondes et signaux</h2>
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
                       <h1>VIDÉO - ONDES ET SIGNAUX TERMINALE</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Caractéristiques des ondes</h3>
                        <p class="content-text">
                           Ondes mécaniques et électromagnétiques
                        </p>
                        <div class="example">
                            <strong>Onde progressive :</strong> perturbation qui se propage<br>
                            <strong>Célérité :</strong> vitesse de propagation (v)<br>
                            <strong>Fréquence (f) et période (T) :</strong> f = 1/T<br>
                            <strong>Longueur d'onde (λ) :</strong> λ = v/f = v.T<br>
                            <strong>Double périodicité :</strong> dans le temps et dans l'espace<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Diffraction et interférences</h3>
                        <p class="content-text">
                           Phénomènes caractéristiques des ondes
                        </p>
                        <div class="example">
                            <strong>Diffraction :</strong> étalement après une ouverture<br>
                            <strong>Condition de diffraction :</strong> dimension obstacle ≈ λ<br>
                            <strong>Interférences :</strong> superposition de deux ondes cohérentes<br>
                            <strong>Franges d'interférence :</strong> alternance de maxima et minima<br>
                            <strong>Différence de marche :</strong> δ = différence de chemin optique<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Effet Doppler</h3>
                        <p class="content-text">
                            Changement de fréquence perçu
                        </p>
                        <div class="example">
                            <strong>Décalage Doppler :</strong> Δf/f = v/c (pour v ≪ c)<br>
                            <strong>Source s'approche :</strong> fréquence perçue augmente (bleu)<br>
                            <strong>Source s'éloigne :</strong> fréquence perçue diminue (rouge)<br>
                            <strong>Applications :</strong> radar, médecine, astronomie<br>
                            <strong>Expansion de l'Univers :</strong> décalage vers le rouge des galaxies<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Signaux numériques</h3>
                        <p class="content-text">
                           Transmission de l'information
                        </p>
                        <div class="example">
                            <strong>Signal analogique :</strong> variation continue<br>
                            <strong>Signal numérique :</strong> valeurs discrètes (0 et 1)<br>
                            <strong>Échantillonnage :</strong> prélèvement à intervalles réguliers<br>
                            <strong>Quantification :</strong> attribution d'une valeur numérique<br>
                            <strong>Codage binaire :</strong> représentation en bits<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('ondes')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 3 : ÉLECTROMAGNÉTISME ========== -->
            <div class="lesson-content" id="electromagnetisme-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Électromagnétisme</h2>
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
                        <h1>VIDÉO - ÉLECTROMAGNÉTISME TERMINALE</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Champ magnétique</h3>
                        <p class="content-text">
                           Sources et propriétés
                        </p>
                        <div class="example">
                            <strong>Aimant permanent :</strong> pôles Nord et Sud<br>
                            <strong>Courant électrique :</strong> crée un champ magnétique (Oersted)<br>
                            <strong>Loi de Biot et Savart :</strong> calcul du champ créé par un courant<br>
                            <strong>Forces de Laplace :</strong> force sur un conducteur parcouru par un courant dans un champ B<br>
                            <strong>Lorentz :</strong> F = q(v × B) (force sur une charge en mouvement)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Induction électromagnétique</h3>
                        <p class="content-text">
                            Production de courant par variation de flux
                        </p>
                        <div class="example">
                            <strong>Flux magnétique :</strong> Φ = B.S.cos(θ)<br>
                            <strong>Loi de Faraday :</strong> e = -dΦ/dt (force électromotrice induite)<br>
                            <strong>Loi de Lenz :</strong> le courant induit s'oppose à la cause qui le produit<br>
                            <strong>Auto-induction :</strong> induction dans le circuit lui-même<br>
                            <strong>Inductance (L) :</strong> coefficient d'auto-induction (Henry)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Ondes électromagnétiques</h3>
                        <p class="content-text">
                           Équations de Maxwell
                        </p>
                        <div class="example">
                            <strong>Équations de Maxwell :</strong> description unifiée de l'électromagnétisme<br>
                            <strong>Spectre EM :</strong> des ondes radio aux rayons gamma<br>
                            <strong>Vitesse dans le vide :</strong> c = 3×10⁸ m/s<br>
                            <strong>Énergie des photons :</strong> E = h.f (h = constante de Planck)<br>
                            <strong>Polarisation :</strong> orientation du champ électrique<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Circuits RLC</h3>
                        <p class="content-text">
                            Comportement en régime variable
                        </p>
                        <div class="example">
                            <strong>Impédance (Z) :</strong> opposition au courant alternatif<br>
                            <strong>Résonance :</strong> courant maximal à la fréquence propre<br>
                            <strong>Filtres :</strong> passe-bas, passe-haut, passe-bande<br>
                            <strong>Déphasage :</strong> décalage temporel tension-courant<br>
                            <strong>Puissance active :</strong> P = U.I.cos(φ)<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('electromagnetisme')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 4 : PHYSIQUE QUANTIQUE ========== -->
            <div class="lesson-content" id="quantique-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Physique quantique</h2>
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
                       <h1>VIDÉO - PHYSIQUE QUANTIQUE TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Dualité onde-particule</h3>
                        <div class="grammar-point">
                            <h4>Révolution conceptuelle :</h4>
                            <div class="example">
                                <strong>Photons :</strong> particules de lumière (Einstein)<br>
                                <strong>Effet photoélectrique :</strong> E = h.f - W (énergie cinétique des électrons)<br>
                                <strong>Hypothèse de De Broglie :</strong> λ = h/p (longueur d'onde associée)<br>
                                <strong>Électrons :</strong> comportement ondulatoire (expérience de Davisson-Germer)<br>
                                <strong>Microscopie électronique :</strong> utilisation des propriétés ondulatoires<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Modèle atomique</h3>
                        <p>Structure quantique de l'atome</p>
                        <div class="example">
                            <strong>Modèle de Bohr :</strong> orbites stationnaires<br>
                            <strong>Quantification de l'énergie :</strong> E<sub>n</sub> = -13,6/n² eV<br>
                            <strong>Transitions :</strong> ΔE = h.f (absorption/émission)<br>
                            <strong>Raies spectrales :</strong> signature des éléments<br>
                            <strong>Modèle quantique actuel :</strong> orbitales électroniques<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Fonction d'onde</h3>
                        <p>Description probabiliste</p>
                        <div class="example">
                            <strong>Ψ(x,t) :</strong> fonction d'onde complexe<br>
                            <strong>|Ψ|² :</strong> densité de probabilité de présence<br>
                            <strong>Équation de Schrödinger :</strong> iħ∂Ψ/∂t = ĤΨ<br>
                            <strong>Paquet d'ondes :</strong> superposition d'ondes planes<br>
                            <strong>Inégalité de Heisenberg :</strong> Δx.Δp ≥ ħ/2<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Applications technologiques</h3>
                        <p class="content-text">
                            <strong>LASER :</strong> Light Amplification by Stimulated Emission of Radiation<br>
                            <strong>Cellules photovoltaïques :</strong> conversion lumière-électricité<br>
                            <strong>LED :</strong> diodes électroluminescentes<br>
                            <strong>Micro-électronique :</strong> transistors, puces<br>
                            <strong>Cryptographie quantique :</strong> sécurité par principe d'incertitude<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Physique des solides</h3>
                        <p>Propriétés collectives</p>
                        <div class="example">
                            <strong>Bandes d'énergie :</strong> conduction/valence<br>
                            <strong>Semiconducteurs :</strong> Si, Ge (dopage n et p)<br>
                            <strong>Supraconductivité :</strong> résistance nulle en dessous de T<sub>c</sub><br>
                            <strong>Effet tunnel :</strong> franchissement de barrière par effet quantique<br>
                            <strong>Microscopie à effet tunnel :</strong> visualisation atomique<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('quantique')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 5 : PHYSIQUE NUCLÉAIRE ========== -->
            <div class="lesson-content" id="nucleaire-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Physique nucléaire</h2>
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
                       <h1>VIDÉO - PHYSIQUE NUCLÉAIRE TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Structure du noyau</h3>
                        <div class="grammar-point">
                            <h4>Constituants et forces :</h4>
                            <div class="example">
                                <strong>Nucléons :</strong> protons (Z) et neutrons (N)<br>
                                <strong>Nombre de masse :</strong> A = Z + N<br>
                                <strong>Rayon nucléaire :</strong> R = R₀.A¹⁄³ (R₀ ≈ 1,2 fm)<br>
                                <strong>Force nucléaire :</strong> intense, à courte portée<br>
                                <strong>Énergie de liaison :</strong> ΔE = Δm.c² (défaut de masse)<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Radioactivité</h3>
                        <p>Désintégrations spontanées</p>
                        <div class="example">
                            <strong>Loi de décroissance :</strong> N(t) = N₀.e<sup>-λt</sup><br>
                            <strong>Période radioactive (T) :</strong> temps pour que N diminue de moitié<br>
                            <strong>Activité :</strong> A = -dN/dt = λN (Becquerel)<br>
                            <strong>Alpha (α) :</strong> noyau d'hélium (⁴He)<br>
                            <strong>Bêta (β) :</strong> électron ou positron + neutrino<br>
                            <strong>Gamma (γ) :</strong> photon de haute énergie<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Réactions nucléaires</h3>
                        <p>Transformations contrôlées</p>
                        <div class="example">
                            <strong>Fission :</strong> division d'un noyau lourd (U, Pu)<br>
                            <strong>Fusion :</strong> union de noyaux légers (H → He)<br>
                            <strong>Énergie libérée :</strong> ΔE = Δm.c² (équation d'Einstein)<br>
                            <strong>Criticité :</strong> réaction en chaîne auto-entretenue<br>
                            <strong>Modérateur :</strong> ralentit les neutrons (eau, graphite)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Applications médicales</h3>
                        <p class="content-text">
                            <strong>Imagerie :</strong> scintigraphie, TEP, IRM<br>
                            <strong>Radiothérapie :</strong> traitement des cancers<br>
                            <strong>Curiethérapie :</strong> source radioactive interne<br>
                            <strong>Radiopharmacie :</strong> médicaments radiomarqués<br>
                            <strong>Protection :</strong> temps, distance, écrans (plomb, béton)<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Enjeux énergétiques</h3>
                        <p>Production et gestion</p>
                        <div class="example">
                            <strong>Réacteurs nucléaires :</strong> PWR (Réacteur à Eau Pressurisée)<br>
                            <strong>Cycle du combustible :</strong> extraction, enrichissement, retraitement<br>
                            <strong>Déchets radioactifs :</strong> classification et stockage<br>
                            <strong>Sûreté nucléaire :</strong> systèmes de sécurité multiples<br>
                            <strong>Fusion contrôlée :</strong> ITER, tokamaks<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('nucleaire')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 6 : THERMODYNAMIQUE ========== -->
            <div class="lesson-content" id="thermodynamique-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Thermodynamique</h2>
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
                       <h1>VIDÉO - THERMODYNAMIQUE TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Principes fondamentaux</h3>
                        <div class="grammar-point">
                            <h4>Lois de la thermodynamique :</h4>
                            <div class="example">
                                <strong>0ᵉ loi :</strong> définition de l'équilibre thermique<br>
                                <strong>1ᵉʳ loi :</strong> conservation de l'énergie (ΔU = Q + W)<br>
                                <strong>2ᵉ loi :</strong> irréversibilité des phénomènes (entropie)<br>
                                <strong>3ᵉ loi :</strong> entropie nulle au zéro absolu<br>
                                <strong>Énergie interne (U) :</strong> somme des énergies microscopiques<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Transformations thermodynamiques</h3>
                        <p>Échanges d'énergie</p>
                        <div class="example">
                            <strong>Transformations réversibles :</strong> idéales, quasi-statiques<br>
                            <strong>Transformations irréversibles :</strong> réelles, avec dissipation<br>
                            <strong>Isochore :</strong> volume constant (W = 0)<br>
                            <strong>Isobare :</strong> pression constante (W = -PΔV)<br>
                            <strong>Isotherme :</strong> température constante<br>
                            <strong>Adiabatique :</strong> pas d'échange de chaleur (Q = 0)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Machines thermiques</h3>
                        <p>Conversion chaleur-travail</p>
                        <div class="example">
                            <strong>Moteurs :</strong> Q<sub>c</sub> → W + Q<sub>f</sub><br>
                            <strong>Rendement :</strong> η = W/Q<sub>c</sub> (toujours < 1)<br>
                            <strong>Cycle de Carnot :</strong> rendement maximal théorique<br>
                            <strong>η<sub>Carnot</sub> = 1 - T<sub>f</sub>/T<sub>c</sub></strong><br>
                            <strong>Réfrigérateurs :</strong> transfert de chaleur du froid vers le chaud<br>
                            <strong>Efficacité :</strong> ε = Q<sub>f</sub>/W<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Statistiques et fluctuations</h3>
                        <p class="content-text">
                            <strong>Agitation thermique :</strong> mouvement brownien<br>
                            <strong>Distribution de Maxwell-Boltzmann :</strong> répartition des vitesses<br>
                            <strong>Entropie statistique :</strong> S = k.ln(Ω) (Boltzmann)<br>
                            <strong>Fluctuations :</strong> variations spontanées autour des valeurs moyennes<br>
                            <strong>Théorème de fluctuation-dissipation :</strong> lien entre réponse et fluctuations<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Transferts thermiques</h3>
                        <p>Modes de propagation de la chaleur</p>
                        <div class="example">
                            <strong>Conduction :</strong> φ = -λ.S.(dT/dx) (loi de Fourier)<br>
                            <strong>Convection :</strong> transport par mouvement de matière<br>
                            <strong>Rayonnement :</strong> φ = σ.ε.S.T⁴ (loi de Stefan-Boltzmann)<br>
                            <strong>Bilan thermique :</strong> équilibre entre apports et pertes<br>
                            <strong>Isolation :</strong> réduction des transferts (laine de verre, double vitrage)<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('thermodynamique')">Marquer comme terminé ✓</button>
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

        // Fonction pour marquer un cours comme terminé - PHYSIQUE TERMINALE
        function markAsComplete(chapitreId) {
            const coursPhysiqueIds = {
                'mecanique': 31,          // Mécanique
                'ondes': 32,              // Ondes et signaux
                'electromagnetisme': 33,  // Électromagnétisme
                'quantique': 34,          // Physique quantique
                'nucleaire': 35,          // Physique nucléaire
                'thermodynamique': 36     // Thermodynamique
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