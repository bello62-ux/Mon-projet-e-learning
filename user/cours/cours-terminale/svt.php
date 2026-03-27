<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/cours-francais.css">
    <title>SVT Terminale</title>
</head>
<body>
    

    <div class="course-container">
        <!-- Sidebar avec chapitres -->
        <div class="sidebar">
            <div class="course-title">
                <h1>SVT Terminale</h1>
                <div class="mobile-close-btn">×</div>
            </div>
            
            <div class="chapters">
                <div class="chapter">
                    <div class="chapter-title">Chapitre 1 : Génétique et évolution</div>
                    <ul class="lessons">
                        <li class="lesson active" data-lesson="genetique">Mécanismes évolutifs</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 2 : Écologie</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="ecologie">Écosystèmes et flux d'énergie</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 3 : Neurone et synapse</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="neurone">Communication nerveuse</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 4 : Mécanismes immunitaires</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="immunitaire">Défenses adaptatives</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 5 : Glycémie et diabète</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="glycemie">Régulation hormonale</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 6 : Géologie</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="geologie">Tectonique des plaques</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content content-active">
            
            <!-- ========== CHAPITRE 1 : GÉNÉTIQUE ET ÉVOLUTION ========== -->
            <div class="lesson-content active" id="genetique-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Génétique et évolution</h2>
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
                       <h1>VIDÉO - GÉNÉTIQUE ET ÉVOLUTION TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Mécanismes de l'évolution</h3>

                        <div class="grammar-point">
                            <h4>Forces évolutives :</h4>
                            
                            <div class="example">
                                <strong>Mutation :</strong> modification aléatoire de l'ADN<br>
                                <strong>Dérive génétique :</strong> fluctuations aléatoires des fréquences alléliques<br>
                                <strong>Sélection naturelle :</strong> survie différentielle des génotypes<br>
                                <strong>Migration :</strong> échange de gènes entre populations<br>
                            </div>
                            <p>Ces mécanismes modifient la fréquence des allèles dans les populations au cours des générations.</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Spéciation</h3>
                        <p>Formation de nouvelles espèces</p>
                        <div class="example">
                            <strong>Spéciation allopatrique :</strong> isolement géographique<br>
                            <strong>Spéciation sympatrique :</strong> sans isolement géographique<br>
                            <strong>Isolants reproducteurs :</strong> empêchent la reproduction<br>
                            <strong>Spéciation adaptative :</strong> radiation évolutive<br>
                            <strong>Exemple :</strong> pinsons des Galapagos (radiation adaptative)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Évolution moléculaire</h3>
                        <p>Horloge moléculaire</p>
                        <div class="example">
                            <strong>Taux de mutation constant :</strong> permet de dater les divergences<br>
                            <strong>ADN mitochondrial :</strong> hérité uniquement de la mère<br>
                            <strong>Ève mitochondriale :</strong> ancêtre commune par les femmes<br>
                            <strong>Adam chromosome Y :</strong> ancêtre commun par les hommes<br>
                            <strong>Phylogénie moléculaire :</strong> arbres basés sur les séquences d'ADN<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Génétique des populations</h3>
                        <p class="content-text">
                            Lois de Hardy-Weinberg
                        </p>
                        <div class="example">
                            <strong>Équilibre de Hardy-Weinberg :</strong> p² + 2pq + q² = 1<br>
                            <strong>Conditions :</strong> population infinie, panmixie, pas de sélection, pas de mutation, pas de migration<br>
                            <strong>Déviation :</strong> indique une évolution en cours<br>
                            <strong>Dépression de consanguinité :</strong> réduction de la fitness<br>
                            <strong>Effet fondateur :</strong> perte de diversité génétique<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('genetique')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 2 : ÉCOLOGIE ========== -->
            <div class="lesson-content" id="ecologie-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Écologie</h2>
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
                       <h1>VIDÉO - ÉCOLOGIE TERMINALE</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Structure et fonctionnement des écosystèmes</h3>
                        <p class="content-text">
                           Niveaux d'organisation
                        </p>
                        <div class="example">
                            <strong>Individu → Population → Communauté → Écosystème → Biosphère</strong><br>
                            <strong>Producteurs primaires :</strong> autotrophes (photosynthèse)<br>
                            <strong>Consommateurs :</strong> hétérotrophes (herbivores, carnivores)<br>
                            <strong>Décomposeurs :</strong> recyclent la matière organique<br>
                            <strong>Réseaux trophiques :</strong> chaînes alimentaires interconnectées<br>
                            <strong>Pyramides écologiques :</strong> énergie, biomasse, nombres<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Flux d'énergie et cycles biogéochimiques</h3>
                        <p class="content-text">
                            Transferts et transformations
                        </p>
                        <div class="example">
                            <strong>Rendement écologique :</strong> seulement 10% de l'énergie passe d'un niveau à l'autre<br>
                            <strong>Cycle du carbone :</strong> photosynthèse, respiration, combustion<br>
                            <strong>Cycle de l'azote :</strong> fixation, nitrification, dénitrification<br>
                            <strong>Cycle de l'eau :</strong> évaporation, précipitation, infiltration<br>
                            <strong>Cycle du phosphore :</strong> pas de phase gazeuse importante<br>
                            <strong>Rétroactions :</strong> positives (amplifient) et négatives (stabilisent)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Biodiversité et services écosystémiques</h3>
                        <p class="content-text">
                            Valeur et menaces
                        </p>
                        <div class="example">
                            <strong>Services d'approvisionnement :</strong> nourriture, eau, bois<br>
                            <strong>Services de régulation :</strong> climat, qualité de l'air, pollinisation<br>
                            <strong>Services culturels :</strong> loisirs, esthétique, éducation<br>
                            <strong>Services de support :</strong> formation des sols, cycle des nutriments<br>
                            <strong>Facteurs d'érosion :</strong> destruction des habitats, espèces invasives, pollution, changement climatique<br>
                            <strong>Indicateurs :</strong> richesse spécifique, équitabilité, endémisme<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Dynamique des populations</h3>
                        <p class="content-text">
                           Modèles mathématiques
                        </p>
                        <div class="example">
                            <strong>Croissance exponentielle :</strong> dN/dt = rN<br>
                            <strong>Croissance logistique :</strong> dN/dt = rN(1-N/K)<br>
                            <strong>Capacité porteuse (K) :</strong> population maximale supportable<br>
                            <strong>Stratégies r/K :</strong> r (nombreux descendants, peu de soins) vs K (peu de descendants, beaucoup de soins)<br>
                            <strong>Interactions interspécifiques :</strong> compétition, prédation, mutualisme, commensalisme<br>
                            <strong>Succion écologique :</strong> remplacement progressif des communautés<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('ecologie')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 3 : NEURONE ET SYNAPSE ========== -->
            <div class="lesson-content" id="neurone-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Neurone et synapse</h2>
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
                        <h1>VIDÉO - NEURONE ET SYNAPSE TERMINALE</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Structure et fonctionnement du neurone</h3>
                        <p class="content-text">
                           Cellules spécialisées dans la communication
                        </p>
                        <div class="example">
                            <strong>Dendrites :</strong> réception des signaux<br>
                            <strong>Corps cellulaire :</strong> intégration des informations<br>
                            <strong>Axone :</strong> conduction du potentiel d'action<br>
                            <strong>Nœuds de Ranvier :</strong> propagation saltatoire<br>
                            <strong>Gaine de myéline :</strong> isolant, accélère la conduction<br>
                            <strong>Potentiel de repos :</strong> -70 mV (intérieur négatif)<br>
                            <strong>Pompe Na⁺/K⁺ :</strong> maintient les gradients ioniques<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Potentiel d'action</h3>
                        <p class="content-text">
                            Signal électrique propagé
                        </p>
                        <div class="example">
                            <strong>Seuil d'excitation :</strong> -55 mV<br>
                            <strong>Phase de dépolarisation :</strong> entrée de Na⁺<br>
                            <strong>Pic :</strong> +40 mV<br>
                            <strong>Phase de repolarisation :</strong> sortie de K⁺<br>
                            <strong>Période réfractaire :</strong> absolue (pas de nouveau PA) et relative (seuil augmenté)<br>
                            <strong>Loi du tout ou rien :</strong> amplitude constante si seuil atteint<br>
                            <strong>Codage en fréquence :</strong> intensité du stimulus → fréquence des PA<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Transmission synaptique</h3>
                        <p class="content-text">
                           Communication entre neurones
                        </p>
                        <div class="example">
                            <strong>Synapse chimique :</strong> libération de neurotransmetteurs<br>
                            <strong>Fente synaptique :</strong> 20-40 nm<br>
                            <strong>Vésicules synaptiques :</strong> contiennent les neurotransmetteurs<br>
                            <strong>Exocytose :</strong> libération calcique dépendante<br>
                            <strong>Récepteurs postsynaptiques :</strong> ionotropiques (rapides) ou métabotropiques (lents)<br>
                            <strong>PSP :</strong> potentiels postsynaptiques (excitateurs ou inhibiteurs)<br>
                            <strong>Sommation :</strong> spatiale et temporelle<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Neurotransmetteurs et neuromodulateurs</h3>
                        <p class="content-text">
                            Molécules de la communication
                        </p>
                        <div class="example">
                            <strong>Acétylcholine :</strong> mémoire, contrôle musculaire<br>
                            <strong>Dopamine :</strong> plaisir, motivation, mouvement<br>
                            <strong>Sérotonine :</strong> humeur, sommeil, appétit<br>
                            <strong>GABA :</strong> principal neurotransmetteur inhibiteur<br>
                            <strong>Glutamate :</strong> principal neurotransmetteur excitateur<br>
                            <strong>Endorphines :</strong> analgésiques naturels<br>
                            <strong>Neuromodulateurs :</strong> modulent l'efficacité synaptique<br>
                            <strong>Récupération :</strong> recapture, dégradation enzymatique<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('neurone')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 4 : MÉCANISMES IMMUNITAIRES ========== -->
            <div class="lesson-content" id="immunitaire-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Mécanismes immunitaires</h2>
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
                       <h1>VIDÉO - MÉCANISMES IMMUNITAIRES TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Immunité adaptative</h3>
                        <div class="grammar-point">
                            <h4>Spécificité et mémoire :</h4>
                            <div class="example">
                                <strong>Lymphocytes :</strong> B et T<br>
                                <strong>Spécificité :</strong> reconnaissance antigénique<br>
                                <strong>Diversité :</strong> réarrangement génique (V(D)J)<br>
                                <strong>Mémoire :</strong> lymphocytes mémoire<br>
                                <strong>Tolérance :</strong> élimination des lymphocytes autoréactifs<br>
                                <strong>CMH :</strong> complexe majeur d'histocompatibilité<br>
                                <strong>Présentation antigénique :</strong> CMH I (cellules infectées) et CMH II (cellules présentatrices)<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Réponse humorale</h3>
                        <p>Production d'anticorps</p>
                        <div class="example">
                            <strong>Lymphocytes B :</strong> produisent les anticorps<br>
                            <strong>Activation :</strong> nécessite lymphocytes T auxiliaires<br>
                            <strong>Différenciation :</strong> plasmocytes (production) et lymphocytes B mémoire<br>
                            <strong>Structure des anticorps :</strong> 2 chaînes lourdes, 2 chaînes légères<br>
                            <strong>Classes d'anticorps :</strong> IgM (première réponse), IgG (seconde réponse), IgA (muqueuses), IgE (allergies)<br>
                            <strong>Neutralisation :</strong> blocage des sites de fixation<br>
                            <strong>Opsonisation :</strong> marquage pour phagocytose<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Réponse cellulaire</h3>
                        <p>Lymphocytes T cytotoxiques</p>
                        <div class="example">
                            <strong>Lymphocytes T cytotoxiques (CD8⁺) :</strong> destruction des cellules infectées<br>
                            <strong>Reconnaissance :</strong> antigène présenté par CMH I<br>
                            <strong>Mécanismes d'action :</strong> perforine, granzymes, Fas-FasL<br>
                            <strong>Lymphocytes T auxiliaires (CD4⁺) :</strong> orchestrent la réponse<br>
                            <strong>Th1 :</strong> réponse cellulaire (macrophages)<br>
                            <strong>Th2 :</strong> réponse humorale (lymphocytes B)<br>
                            <strong>Régulation :</strong> lymphocytes T régulateurs (Treg)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Vaccination et immunothérapie</h3>
                        <p class="content-text">
                            <strong>Vaccins vivants atténués :</strong> virus/bactéries affaiblis<br>
                            <strong>Vaccins inactivés :</strong> pathogènes tués<br>
                            <strong>Vaccins sous-unitaires :</strong> protéines spécifiques<br>
                            <strong>Vaccins à ARNm :</strong> nouvelles technologies<br>
                            <strong>Immunothérapie :</strong> anticorps monoclonaux, CAR-T cells<br>
                            <strong>Auto-immunité :</strong> défaillance de la tolérance (diabète type 1, polyarthrite)<br>
                            <strong>Immunodéficience :</strong> SIDA (VIH cible CD4⁺), déficits congénitaux<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Allergies et hypersensibilités</h3>
                        <p>Réponses immunitaires inappropriées</p>
                        <div class="example">
                            <strong>Type I (immédiate) :</strong> IgE, mastocytes, histamine (asthme, urticaire)<br>
                            <strong>Type II (cytotoxique) :</strong> anticorps anti-tissus (anémie hémolytique)<br>
                            <strong>Type III (complexes immuns) :</strong> dépôts tissulaires (lupus)<br>
                            <strong>Type IV (retardée) :</strong> lymphocytes T (eczéma de contact)<br>
                            <strong>Tests cutanés :</strong> prick tests, patch tests<br>
                            <strong>Désensibilisation :</strong> administration progressive de l'allergène<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('immunitaire')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 5 : GLYCÉMIE ET DIABÈTE ========== -->
            <div class="lesson-content" id="glycemie-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Glycémie et diabète</h2>
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
                       <h1>VIDÉO - GLYCÉMIE ET DIABÈTE TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Régulation de la glycémie</h3>
                        <div class="grammar-point">
                            <h4>Homéostasie glucidique :</h4>
                            <div class="example">
                                <strong>Valeur normale :</strong> 0,8 - 1,2 g/L (4,4 - 6,6 mmol/L)<br>
                                <strong>Insuline :</strong> baisse la glycémie (sécrétion par cellules β pancréas)<br>
                                <strong>Glucagon :</strong> augmente la glycémie (cellules α pancréas)<br>
                                <strong>Adrénaline :</strong> hormone du stress, hyperglycémiante<br>
                                <strong>Cortisol :</strong> hormone glucocorticoïde, hyperglycémiante<br>
                                <strong>Rétrocontrôle :</strong> glycémie → sécrétion hormonale<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Mécanismes d'action de l'insuline</h3>
                        <p>Signalisation cellulaire</p>
                        <div class="example">
                            <strong>Récepteur à l'insuline :</strong> tyrosine kinase<br>
                            <strong>Voie PI3K/Akt :</strong> translocation des GLUT4<br>
                            <strong>GLUT4 :</strong> transporteur glucose insulino-dépendant<br>
                            <strong>Effets :</strong><br>
                            • Augmentation captation glucose (muscles, tissu adipeux)<br>
                            • Stimulation glycogénèse (foie, muscles)<br>
                            • Inhibition néoglucogenèse (foie)<br>
                            • Stimulation lipogenèse<br>
                            • Inhibition lipolyse<br>
                            <strong>Insulinorésistance :</strong> diminution réponse cellulaire<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Diabète sucré</h3>
                        <p>Pathologies de la régulation</p>
                        <div class="example">
                            <strong>Diabète type 1 :</strong> auto-immun, destruction cellules β<br>
                            <strong>Diabète type 2 :</strong> insulinorésistance + déficit sécrétion<br>
                            <strong>Symptômes :</strong> polyurie, polydipsie, polyphagie, amaigrissement<br>
                            <strong>Complications :</strong> rétinopathie, néphropathie, neuropathie, cardiopathie<br>
                            <strong>Diagnostic :</strong> glycémie à jeun ≥ 1,26 g/L, HbA1c ≥ 6,5%<br>
                            <strong>HGPO :</strong> hyperglycémie provoquée par voie orale<br>
                            <strong>Traitements :</strong> insuline (type 1), metformine, sulfamides (type 2)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Nutrition et métabolisme</h3>
                        <p class="content-text">
                            <strong>Index glycémique :</strong> capacité à élever la glycémie<br>
                            <strong>Charge glycémique :</strong> index × quantité glucides<br>
                            <strong>Équilibre énergétique :</strong> apports = dépenses<br>
                            <strong>Besoins :</strong> 50-55% glucides, 30-35% lipides, 10-15% protéines<br>
                            <strong>Régimes :</strong> méditerranéen, DASH, végétarien<br>
                            <strong>Syndrome métabolique :</strong> obésité abdominale + insulinorésistance + hypertension + dyslipidémie<br>
                            <strong>Prévention :</strong> activité physique, alimentation équilibrée, poids santé<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Technologies médicales</h3>
                        <p>Suivi et traitement</p>
                        <div class="example">
                            <strong>Glucomètre :</strong> mesure capillaire<br>
                            <strong>Capteur glucose continu :</strong> mesure interstitielle<br>
                            <strong>Pompe à insuline :</strong> délivrance continue + bolus<br>
                            <strong>Boucle fermée :</strong> pompe + capteur (pancréas artificiel)<br>
                            <strong>Greffe d'îlots :</strong> Edmonton protocol<br>
                            <strong>Cellules souches :</strong> différenciation en cellules β<br>
                            <strong>Immunothérapie :</strong> prévention diabète type 1<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('glycemie')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 6 : GÉOLOGIE ========== -->
            <div class="lesson-content" id="geologie-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Géologie</h2>
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
                       <h1>VIDÉO - GÉOLOGIE TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Tectonique des plaques</h3>
                        <div class="grammar-point">
                            <h4>Modèle actuel :</h4>
                            <div class="example">
                                <strong>Lithosphère :</strong> rigide (croûte + manteau supérieur)<br>
                                <strong>Asthénosphère :</strong> ductile, permet le mouvement<br>
                                <strong>Limites divergentes :</strong> dorsales, création lithosphère<br>
                                <strong>Limites convergentes :</strong> subduction, collision<br>
                                <strong>Limites transformantes :</strong> coulissage (faille de San Andreas)<br>
                                <strong>Panthalassa → Pacifique :</strong> océan en fermeture<br>
                                <strong>Téthys → Méditerranée :</strong> océan disparu<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Subduction et collision</h3>
                        <p>Processus géodynamiques</p>
                        <div class="example">
                            <strong>Subduction :</strong> plongée lithosphère océanique<br>
                            <strong>Zone de Benioff :</strong> séismes jusqu'à 700 km<br>
                            <strong>Volcanisme andésitique :</strong> arcs volcaniques<br>
                            <strong>Prisme d'accrétion :</strong> sédiments raclés<br>
                            <strong>Collision continentale :</strong> formation chaînes de montagnes<br>
                            <strong>Racine crustale :</strong> compensation isostatique<br>
                            <strong>Chevauchenents :</strong> charriage, nappes de recouvrement<br>
                            <strong>Exemple :</strong> Himalaya (Inde-Asie), Alpes (Afrique-Europe)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Magmatisme et métamorphisme</h3>
                        <p>Transformations minérales</p>
                        <div class="example">
                            <strong>Roches magmatiques :</strong> volcaniques (extrusives) et plutoniques (intrusives)<br>
                            <strong>Série de Bowen :</strong> séquence cristallisation<br>
                            <strong>Basalte :</strong> dorsales, points chauds<br>
                            <strong>Andésite :</strong> zones de subduction<br>
                            <strong>Granite :</strong> racines des chaînes<br>
                            <strong>Métamorphisme :</strong> pression, température, fluides<br>
                            <strong>Faciès métamorphiques :</strong> schistes verts, schistes bleus, éclogites<br>
                            <strong>Foliation :</strong> orientation des minéraux (schistosité)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Datation relative et absolue</h3>
                        <p class="content-text">
                            <strong>Principes de superposition :</strong> couches plus jeunes au-dessus<br>
                            <strong>Principes de recoupement :</strong> structure qui en coupe une autre est plus jeune<br>
                            <strong>Principes d'inclusion :</strong> fragment inclus est plus ancien<br>
                            <strong>Principes d'identité paléontologique :</strong> mêmes fossiles = même âge<br>
                            <strong>Radiochronologie :</strong> ⁴⁰K/⁴⁰Ar, ⁸⁷Rb/⁸⁷Sr, ²³⁸U/²⁰⁶Pb<br>
                            <strong>Demi-vie :</strong> temps pour que la moitié des atomes se désintègrent<br>
                            <strong>Échelle des temps géologiques :</strong> éons, ères, périodes, époques<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Géodynamique interne et externe</h3>
                        <p>Processus superficiels</p>
                        <div class="example">
                            <strong>Altération :</strong> physique (thermoclastie, cryoclastie) et chimique (hydrolyse, oxydation)<br>
                            <strong>Érosion :</strong> transport des particules<br>
                            <strong>Sédimentation :</strong> dépôt (terrigène, biogène, chimique)<br>
                            <strong>Diagenèse :</strong> compaction, cimentation<br>
                            <strong>Cycle des roches :</strong> magmatiques → sédimentaires → métamorphiques<br>
                            <strong>Risques naturels :</strong> séismes, tsunamis, éruptions, glissements<br>
                            <strong>Prévention :</strong> zonage, construction parasismique, surveillance<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../accueil/cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('geologie')">Marquer comme terminé ✓</button>
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

        // Fonction pour marquer un cours comme terminé - SVT TERMINALE
        function markAsComplete(chapitreId) {
            const coursSVTIds = {
                'genetique': 43,       // Génétique et évolution
                'ecologie': 44,        // Écologie
                'neurone': 45,         // Neurone et synapse
                'immunitaire': 46,     // Mécanismes immunitaires
                'glycemie': 47,        // Glycémie et diabète
                'geologie': 48         // Géologie
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