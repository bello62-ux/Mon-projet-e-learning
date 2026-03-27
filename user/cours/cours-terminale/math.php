<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/cours-francais.css">
    <title>Mathématiques Terminale</title>
</head>
<body>
    

    <div class="course-container">
        <!-- Sidebar avec chapitres -->
        <div class="sidebar">
            <div class="course-title">
                <h1>Mathématiques Terminale</h1>
                <div class="mobile-close-btn">×</div>
            </div>
            
            <div class="chapters">
                <div class="chapter">
                    <div class="chapter-title">Chapitre 1 : Suites numériques</div>
                    <ul class="lessons">
                        <li class="lesson active" data-lesson="suites">Limites et convergence</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 2 : Fonctions</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="fonctions">Dérivation et intégration</li>
                    </ul>
                </div>
                
                <div class="chapter">
                    <div class="chapter-title">Chapitre 3 : Géométrie dans l'espace</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="geometrie">Repérage et distances</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 4 : Nombres complexes</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="complexes">Forme algébrique et trigonométrique</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 5 : Probabilités</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="probabilites">Lois de probabilité et estimation</li>
                    </ul>
                </div>

                <div class="chapter">
                    <div class="chapter-title">Chapitre 6 : Algorithmique</div>
                    <ul class="lessons">
                        <li class="lesson" data-lesson="algorithmique">Boucles et structures conditionnelles</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content content-active">
            
            <!-- ========== CHAPITRE 1 : SUITES NUMÉRIQUES ========== -->
            <div class="lesson-content active" id="suites-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Suites numériques</h2>
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
                       <h1>VIDÉO - SUITES NUMÉRIQUES TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Définition et modes de génération</h3>

                        <div class="grammar-point">
                            <h4>Types de suites :</h4>
                            
                            <div class="example">
                                <strong>Suite arithmétique :</strong> u<sub>n+1</sub> = u<sub>n</sub> + r<br>
                                <strong>Suite géométrique :</strong> u<sub>n+1</sub> = u<sub>n</sub> × q<br>
                                <strong>Suite définie par récurrence :</strong> u<sub>n+1</sub> = f(u<sub>n</sub>)<br>
                                <strong>Suite définie explicitement :</strong> u<sub>n</sub> = f(n)<br>
                            </div>
                            <p>Une suite est une fonction définie sur ℕ (ou une partie de ℕ) à valeurs dans ℝ.</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Sens de variation</h3>
                        <p>Étude de la monotonie</p>
                        <div class="example">
                            <strong>Suite croissante :</strong> ∀n ∈ ℕ, u<sub>n+1</sub> ≥ u<sub>n</sub><br>
                            <strong>Suite décroissante :</strong> ∀n ∈ ℕ, u<sub>n+1</sub> ≤ u<sub>n</sub><br>
                            <strong>Méthodes d'étude :</strong><br>
                            • Signe de u<sub>n+1</sub> - u<sub>n</sub><br>
                            • Comparaison de u<sub>n+1</sub>/u<sub>n</sub> avec 1 (si u<sub>n</sub> > 0)<br>
                            • Étude de la fonction associée<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Limites</h3>
                        <p>Comportement asymptotique</p>
                        <div class="example">
                            <strong>Convergence vers L :</strong> lim u<sub>n</sub> = L (L fini)<br>
                            <strong>Divergence vers +∞ :</strong> lim u<sub>n</sub> = +∞<br>
                            <strong>Divergence vers -∞ :</strong> lim u<sub>n</sub> = -∞<br>
                            <strong>Théorème de comparaison :</strong> si u<sub>n</sub> ≤ v<sub>n</sub> et lim v<sub>n</sub> = -∞, alors lim u<sub>n</sub> = -∞<br>
                            <strong>Théorème des gendarmes :</strong> si v<sub>n</sub> ≤ u<sub>n</sub> ≤ w<sub>n</sub> et lim v<sub>n</sub> = lim w<sub>n</sub> = L, alors lim u<sub>n</sub> = L<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Suites arithmético-géométriques</h3>
                        <p class="content-text">
                            Suites de la forme u<sub>n+1</sub> = a.u<sub>n</sub> + b
                        </p>
                        <div class="example">
                            <strong>Méthode :</strong> recherche de point fixe ℓ = a.ℓ + b<br>
                            <strong>Si a ≠ 1 :</strong> ℓ = b/(1-a)<br>
                            <strong>Suite auxiliaire :</strong> v<sub>n</sub> = u<sub>n</sub> - ℓ est géométrique<br>
                            <strong>Expression explicite :</strong> u<sub>n</sub> = a<sup>n</sup>(u<sub>0</sub> - ℓ) + ℓ<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('suites')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 2 : FONCTIONS ========== -->
            <div class="lesson-content" id="fonctions-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Fonctions</h2>
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
                       <h1>VIDÉO - FONCTIONS TERMINALE</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Dérivation</h3>
                        <p class="content-text">
                           Approfondissement des concepts de première
                        </p>
                        <div class="example">
                            <strong>Nombre dérivé :</strong> f'(a) = lim<sub>h→0</sub> [f(a+h)-f(a)]/h<br>
                            <strong>Fonction dérivée :</strong> fonction qui à x associe f'(x)<br>
                            <strong>Dérivées usuelles :</strong><br>
                            • (x<sup>n</sup>)' = n.x<sup>n-1</sup><br>
                            • (e<sup>x</sup>)' = e<sup>x</sup><br>
                            • (ln x)' = 1/x<br>
                            • (sin x)' = cos x<br>
                            • (cos x)' = -sin x<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Intégration</h3>
                        <p class="content-text">
                            Calcul d'aires et primitives
                        </p>
                        <div class="example">
                            <strong>Primitive :</strong> F telle que F' = f<br>
                            <strong>Intégrale :</strong> ∫<sub>a</sub><sup>b</sup> f(x)dx = F(b) - F(a)<br>
                            <strong>Propriétés :</strong><br>
                            • Linéarité : ∫(αf+βg) = α∫f + β∫g<br>
                            • Relation de Chasles : ∫<sub>a</sub><sup>b</sup> + ∫<sub>b</sub><sup>c</sup> = ∫<sub>a</sub><sup>c</sup><br>
                            • Positivité : si f ≥ 0 sur [a,b], alors ∫<sub>a</sub><sup>b</sup> f ≥ 0<br>
                            <strong>Intégration par parties :</strong> ∫u'v = [uv] - ∫uv'<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Fonctions logarithmes et exponentielles</h3>
                        <p class="content-text">
                            Propriétés fondamentales
                        </p>
                        <div class="example">
                            <strong>Fonction exponentielle :</strong> exp(x) = e<sup>x</sup><br>
                            • e<sup>0</sup> = 1<br>
                            • e<sup>x+y</sup> = e<sup>x</sup>.e<sup>y</sup><br>
                            • (e<sup>x</sup>)' = e<sup>x</sup><br>
                            <strong>Fonction logarithme népérien :</strong> ln(x)<br>
                            • ln(1) = 0<br>
                            • ln(xy) = ln x + ln y<br>
                            • (ln x)' = 1/x<br>
                            • ln(e<sup>x</sup>) = x et e<sup>ln x</sup> = x<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Fonctions trigonométriques</h3>
                        <p class="content-text">
                           Dérivées et propriétés
                        </p>
                        <div class="example">
                            <strong>Dérivées :</strong><br>
                            • (sin x)' = cos x<br>
                            • (cos x)' = -sin x<br>
                            • (tan x)' = 1 + tan²x = 1/cos²x<br>
                            <strong>Formules :</strong><br>
                            • sin²x + cos²x = 1<br>
                            • sin(a+b) = sin a cos b + cos a sin b<br>
                            • cos(a+b) = cos a cos b - sin a sin b<br>
                            <strong>Équations :</strong> sin x = a et cos x = a<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('fonctions')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 3 : GÉOMÉTRIE DANS L'ESPACE ========== -->
            <div class="lesson-content" id="geometrie-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Géométrie dans l'espace</h2>
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
                        <h1>VIDÉO - GÉOMÉTRIE DANS L'ESPACE TERMINALE</h1>
                    </div>
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Repérage dans l'espace</h3>
                        <p class="content-text">
                           Système de coordonnées
                        </p>
                        <div class="example">
                            <strong>Repère orthonormé :</strong> (O, i, j, k)<br>
                            <strong>Coordonnées d'un point :</strong> M(x, y, z)<br>
                            <strong>Coordonnées d'un vecteur :</strong> u(x, y, z)<br>
                            <strong>Norme d'un vecteur :</strong> ||u|| = √(x² + y² + z²)<br>
                            <strong>Distance entre deux points :</strong> AB = √[(x<sub>B</sub>-x<sub>A</sub>)² + (y<sub>B</sub>-y<sub>A</sub>)² + (z<sub>B</sub>-z<sub>A</sub>)²]<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Produit scalaire</h3>
                        <p class="content-text">
                            Définition et propriétés
                        </p>
                        <div class="example">
                            <strong>Définition :</strong> u.v = ||u||.||v||.cos(u,v)<br>
                            <strong>Expression analytique :</strong> si u(x,y,z) et v(x',y',z'), alors u.v = xx' + yy' + zz'<br>
                            <strong>Propriétés :</strong><br>
                            • Symétrie : u.v = v.u<br>
                            • Bilinéarité<br>
                            • u.u = ||u||²<br>
                            <strong>Orthogonalité :</strong> u ⊥ v ⇔ u.v = 0<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Équations de droites et plans</h3>
                        <p class="content-text">
                           Représentations paramétriques
                        </p>
                        <div class="example">
                            <strong>Droite passant par A et de vecteur directeur u :</strong><br>
                            M ∈ D ⇔ AM = t.u, t ∈ ℝ<br>
                            x = x<sub>A</sub> + t.x<sub>u</sub><br>
                            y = y<sub>A</sub> + t.y<sub>u</sub><br>
                            z = z<sub>A</sub> + t.z<sub>u</sub><br>
                            <strong>Plan passant par A et de vecteurs directeurs u et v :</strong><br>
                            M ∈ P ⇔ AM = t.u + s.v, (t,s) ∈ ℝ²<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Intersections et positions relatives</h3>
                        <p class="content-text">
                            Étude des configurations spatiales
                        </p>
                        <div class="example">
                            <strong>Intersection droite/plan :</strong> résolution d'un système<br>
                            <strong>Positions relatives de deux droites :</strong><br>
                            • Sécantes : un point commun<br>
                            • Parallèles : vecteurs directeurs colinéaires<br>
                            • Non coplanaires<br>
                            <strong>Distance point/plan :</strong> d(M,P) = |ax<sub>M</sub>+by<sub>M</sub>+cz<sub>M</sub>+d|/√(a²+b²+c²)<br>
                            avec P: ax+by+cz+d=0<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('geometrie')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 4 : NOMBRES COMPLEXES ========== -->
            <div class="lesson-content" id="complexes-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Nombres complexes</h2>
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
                       <h1>VIDÉO - NOMBRES COMPLEXES TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Forme algébrique</h3>
                        <div class="grammar-point">
                            <h4>Définition et opérations :</h4>
                            <div class="example">
                                <strong>Nombre complexe :</strong> z = a + ib avec a,b ∈ ℝ et i² = -1<br>
                                <strong>Partie réelle :</strong> Re(z) = a<br>
                                <strong>Partie imaginaire :</strong> Im(z) = b<br>
                                <strong>Addition :</strong> (a+ib) + (c+id) = (a+c) + i(b+d)<br>
                                <strong>Multiplication :</strong> (a+ib)(c+id) = (ac-bd) + i(ad+bc)<br>
                                <strong>Conjugué :</strong> z̄ = a - ib<br>
                                <strong>Module :</strong> |z| = √(a²+b²)<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Forme trigonométrique</h3>
                        <p>Représentation géométrique</p>
                        <div class="example">
                            <strong>Forme trigonométrique :</strong> z = r(cosθ + i sinθ)<br>
                            <strong>Module :</strong> r = |z| ≥ 0<br>
                            <strong>Argument :</strong> θ = arg(z) modulo 2π<br>
                            <strong>Passage algébrique → trigonométrique :</strong><br>
                            r = √(a²+b²)<br>
                            cosθ = a/r, sinθ = b/r<br>
                            <strong>Multiplication :</strong> zz' = rr'[cos(θ+θ') + i sin(θ+θ')]<br>
                            <strong>Division :</strong> z/z' = (r/r')[cos(θ-θ') + i sin(θ-θ')]<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Forme exponentielle</h3>
                        <p>Notation d'Euler</p>
                        <div class="example">
                            <strong>Formule d'Euler :</strong> e<sup>iθ</sup> = cosθ + i sinθ<br>
                            <strong>Forme exponentielle :</strong> z = re<sup>iθ</sup><br>
                            <strong>Propriétés :</strong><br>
                            • e<sup>iθ</sup>.e<sup>iθ'</sup> = e<sup>i(θ+θ')</sup><br>
                            • (e<sup>iθ</sup>)<sup>n</sup> = e<sup>inθ</sup> (Formule de Moivre)<br>
                            • |e<sup>iθ</sup>| = 1<br>
                            • arg(e<sup>iθ</sup>) = θ<br>
                            <strong>Formule de Moivre :</strong> (cosθ + i sinθ)<sup>n</sup> = cos(nθ) + i sin(nθ)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Résolution d'équations</h3>
                        <p class="content-text">
                            <strong>Équation du second degré :</strong> az²+bz+c=0, a≠0<br>
                            Δ = b²-4ac<br>
                            Si Δ ≥ 0 : solutions réelles<br>
                            Si Δ < 0 : solutions complexes conjuguées<br>
                            <strong>Racines n-ièmes :</strong> z<sup>n</sup> = a<br>
                            Solutions : z<sub>k</sub> = r<sup>1/n</sup>e<sup>i(θ+2kπ)/n</sup>, k=0,...,n-1<br>
                            <strong>Équations trigonométriques :</strong> utilisation des complexes<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Transformation du plan</h3>
                        <p>Applications géométriques</p>
                        <div class="example">
                            <strong>Translation :</strong> z' = z + b<br>
                            <strong>Homothétie :</strong> z' = kz (k ∈ ℝ)<br>
                            <strong>Rotation :</strong> z' = e<sup>iθ</sup>z<br>
                            <strong>Similitude directe :</strong> z' = az + b (a ∈ ℂ*)<br>
                            <strong>Configurations géométriques :</strong><br>
                            • Alignement : arg((z<sub>C</sub>-z<sub>A</sub>)/(z<sub>B</sub>-z<sub>A</sub>)) = 0 mod π<br>
                            • Orthogonalité : arg((z<sub>C</sub>-z<sub>A</sub>)/(z<sub>B</sub>-z<sub>A</sub>)) = π/2 mod π<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('complexes')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 5 : PROBABILITÉS ========== -->
            <div class="lesson-content" id="probabilites-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Probabilités</h2>
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
                       <h1>VIDÉO - PROBABILITÉS TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Lois de probabilité discrètes</h3>
                        <div class="grammar-point">
                            <h4>Principales lois :</h4>
                            <div class="example">
                                <strong>Loi de Bernoulli :</strong> X ∼ B(p)<br>
                                • X prend valeurs 0 ou 1<br>
                                • P(X=1) = p, P(X=0) = 1-p<br>
                                • E(X) = p, V(X) = p(1-p)<br>
                                <strong>Loi binomiale :</strong> X ∼ B(n,p)<br>
                                • P(X=k) = C<sub>n</sub><sup>k</sup> p<sup>k</sup>(1-p)<sup>n-k</sup><br>
                                • E(X) = np, V(X) = np(1-p)<br>
                                <strong>Loi géométrique :</strong> nombre d'essais jusqu'au premier succès<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Lois de probabilité continues</h3>
                        <p>Variables aléatoires à densité</p>
                        <div class="example">
                            <strong>Densité de probabilité :</strong> fonction f ≥ 0 telle que ∫<sub>ℝ</sub> f = 1<br>
                            <strong>Probabilité :</strong> P(a ≤ X ≤ b) = ∫<sub>a</sub><sup>b</sup> f(x)dx<br>
                            <strong>Loi uniforme sur [a,b] :</strong> f(x) = 1/(b-a) si x ∈ [a,b], 0 sinon<br>
                            <strong>Loi exponentielle de paramètre λ :</strong> f(x) = λe<sup>-λx</sup> si x ≥ 0, 0 sinon<br>
                            • E(X) = 1/λ, V(X) = 1/λ²<br>
                            • Propriété d'absence de mémoire : P(X>t+s|X>s) = P(X>t)<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Loi normale</h3>
                        <p>Loi de Gauss</p>
                        <div class="example">
                            <strong>Loi normale centrée réduite :</strong> X ∼ N(0,1)<br>
                            • Densité : φ(x) = (1/√(2π))e<sup>-x²/2</sup><br>
                            • Fonction de répartition : Φ(x) = P(X ≤ x)<br>
                            <strong>Loi normale générale :</strong> Y ∼ N(μ,σ²)<br>
                            • Y = μ + σX avec X ∼ N(0,1)<br>
                            • Densité : f(x) = (1/(σ√(2π)))e<sup>-(x-μ)²/(2σ²)</sup><br>
                            • E(Y) = μ, V(Y) = σ²<br>
                            <strong>Intervalle de fluctuation :</strong> [μ-1,96σ; μ+1,96σ] pour 95%<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Estimation</h3>
                        <p class="content-text">
                            <strong>Échantillonnage :</strong> étude d'un échantillon de taille n<br>
                            <strong>Fluctuation d'échantillonnage :</strong> variabilité des résultats selon les échantillons<br>
                            <strong>Intervalle de confiance :</strong> estimation d'un paramètre inconnu<br>
                            <strong>Pour une proportion :</strong> I<sub>c</sub> = [p - 1/√n; p + 1/√n] au niveau 0.95<br>
                            <strong>Prise de décision :</strong> test d'hypothèses<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Convergence des lois</h3>
                        <p>Théorèmes limites</p>
                        <div class="example">
                            <strong>Loi des grands nombres :</strong><br>
                            Si X<sub>1</sub>,...,X<sub>n</sub> iid de moyenne μ, alors (X<sub>1</sub>+...+X<sub>n</sub>)/n → μ<br>
                            <strong>Théorème de Moivre-Laplace :</strong><br>
                            Si X<sub>n</sub> ∼ B(n,p), alors (X<sub>n</sub>-np)/√(np(1-p)) → N(0,1)<br>
                            <strong>Théorème central limite :</strong><br>
                            Si X<sub>1</sub>,...,X<sub>n</sub> iid de moyenne μ et variance σ², alors<br>
                            (X<sub>1</sub>+...+X<sub>n</sub>-nμ)/(σ√n) → N(0,1)<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('probabilites')">Marquer comme terminé ✓</button>
                    </div>
                </div>
            </div>

            <!-- ========== CHAPITRE 6 : ALGORITHMIQUE ========== -->
            <div class="lesson-content" id="algorithmique-content">
                <div class="lesson-header">
                    <div class="mobile-lesson-title">
                        <h2>Algorithmique</h2>
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
                       <h1>VIDÉO - ALGORITHMIQUE TERMINALE</h1>  
                    </div>   
                </div>

                <!-- CONTENU ÉCRIT -->
                <div class="written-content">
                    <div class="content-section">
                        <h3>Structures de contrôle</h3>
                        <div class="grammar-point">
                            <h4>Bases de la programmation :</h4>
                            <div class="example">
                                <strong>Instruction conditionnelle :</strong><br>
                                SI condition ALORS<br>
                                &nbsp;&nbsp;instructions<br>
                                SINON<br>
                                &nbsp;&nbsp;instructions<br>
                                FIN SI<br>
                                <strong>Boucle POUR :</strong><br>
                                POUR i DE début À fin [PAS pas]<br>
                                &nbsp;&nbsp;instructions<br>
                                FIN POUR<br>
                                <strong>Boucle TANT QUE :</strong><br>
                                TANT QUE condition<br>
                                &nbsp;&nbsp;instructions<br>
                                FIN TANT QUE<br>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Variables et types</h3>
                        <p>Gestion des données</p>
                        <div class="example">
                            <strong>Types de variables :</strong><br>
                            • Entier (INTEGER)<br>
                            • Réel (REAL)<br>
                            • Booléen (BOOLEAN)<br>
                            • Chaîne de caractères (STRING)<br>
                            <strong>Affectation :</strong> variable ← valeur<br>
                            <strong>Tableaux :</strong> collection d'éléments de même type<br>
                            • Déclaration : T[1..n] DE type<br>
                            • Accès : T[i] pour l'élément à l'indice i<br>
                            <strong>Fonctions :</strong> retournent une valeur<br>
                            <strong>Procédures :</strong> effectuent des actions sans retour<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Algorithmes sur les suites</h3>
                        <p>Implémentation des concepts mathématiques</p>
                        <div class="example">
                            <strong>Suite arithmétique :</strong><br>
                            u ← u0<br>
                            POUR n DE 1 À N<br>
                            &nbsp;&nbsp;u ← u + r<br>
                            FIN POUR<br>
                            <strong>Suite géométrique :</strong><br>
                            u ← u0<br>
                            POUR n DE 1 À N<br>
                            &nbsp;&nbsp;u ← u × q<br>
                            FIN POUR<br>
                            <strong>Recherche de limite :</strong><br>
                            u ← u0<br>
                            TANT QUE |u - L| > ε<br>
                            &nbsp;&nbsp;u ← f(u)<br>
                            FIN TANT QUE<br>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Algorithmes de tri et recherche</h3>
                        <p class="content-text">
                            <strong>Tri par sélection :</strong> recherche du minimum et échange<br>
                            <strong>Tri à bulles :</strong> échanges successifs des éléments mal placés<br>
                            <strong>Recherche séquentielle :</strong> parcours linéaire du tableau<br>
                            <strong>Recherche dichotomique :</strong> nécessite un tableau trié<br>
                            &nbsp;&nbsp;• Divise l'intervalle de recherche par deux à chaque étape<br>
                            &nbsp;&nbsp;• Complexité O(log n)<br>
                            <strong>Complexité algorithmique :</strong> estimation du temps d'exécution<br>
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Applications aux probabilités</h3>
                        <p>Simulations et méthodes de Monte-Carlo</p>
                        <div class="example">
                            <strong>Générateur de nombres aléatoires :</strong> RANDOM()<br>
                            <strong>Simulation d'une loi de Bernoulli :</strong><br>
                            SI RANDOM() < p ALORS<br>
                            &nbsp;&nbsp;résultat ← 1<br>
                            SINON<br>
                            &nbsp;&nbsp;résultat ← 0<br>
                            FIN SI<br>
                            <strong>Simulation d'une loi binomiale :</strong><br>
                            succès ← 0<br>
                            POUR i DE 1 À n<br>
                            &nbsp;&nbsp;SI RANDOM() < p ALORS<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;succès ← succès + 1<br>
                            &nbsp;&nbsp;FIN SI<br>
                            FIN POUR<br>
                            <strong>Méthode de Monte-Carlo :</strong> estimation d'intégrales par simulation<br>
                        </div>
                    </div>

                    <!-- BOUTON MARQUER COMME TERMINÉ -->
                    <div class="navigation">
                        <button class="nav-btn prev" onclick="window.location.href='../../cours.php'">← Retour aux cours</button>
                        <button class="nav-btn complete" onclick="markAsComplete('algorithmique')">Marquer comme terminé ✓</button>
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

        // Fonction pour marquer un cours comme terminé - MATHÉMATIQUES TERMINALE
        function markAsComplete(chapitreId) {
            const coursMathIds = {
                'suites': 37,          // Suites numériques
                'fonctions': 38,       // Fonctions
                'geometrie': 39,       // Géométrie dans l'espace
                'complexes': 40,       // Nombres complexes
                'probabilites': 41,    // Probabilités
                'algorithmique': 42    // Algorithmique
            };
            
            const coursId = coursMathIds[chapitreId];
            
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