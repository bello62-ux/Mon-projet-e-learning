<?php
// Définir le titre de la page
$page_title = "À propos - Nournours";

// Inclure le header
require_once '../layout/header.php';
?>

<link rel="stylesheet" href="../asset/css/apropos.css">
<!-- Font Awesome (si pas déjà inclus dans le header) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<div class="apropos-page">
    
    <!-- Hero Section avec animation -->
    <section class="hero-about">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="hero-content animate-fade-up">
                <div class="hero-badge"><i class="fas fa-star"></i> À propos de nous</div>
                <h1>Une plateforme éducative<br>au service de la réussite</h1>
                <p>Nourrissons les esprits, cultivons l'excellence</p>
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Élèves formés</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Cours disponibles</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">15+</span>
                        <span class="stat-label">Enseignants experts</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Mission -->
    <section class="mission-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Notre mission</span>
                <h2>Pourquoi nous existons</h2>
                <p class="section-subtitle">Une vision claire au service de l'éducation</p>
            </div>
            <div class="mission-grid">
                <div class="mission-text animate-slide-right">
                    <div class="mission-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>Rendre l'éducation accessible à tous</h3>
                    <p>Chez <strong>Nournours</strong>, nous croyons que chaque élève mérite une éducation de qualité, où qu'il se trouve. Notre mission est de fournir des cours en ligne interactifs et complets pour aider les élèves de la CM2 à la Terminale à exceller dans leur scolarité.</p>
                    <div class="mission-points">
                        <div class="point">
                            <span class="point-icon"><i class="fas fa-check"></i></span>
                            <span>Contenus conformes aux programmes officiels</span>
                        </div>
                        <div class="point">
                            <span class="point-icon"><i class="fas fa-check"></i></span>
                            <span>Apprentissage à son rythme</span>
                        </div>
                        <div class="point">
                            <span class="point-icon"><i class="fas fa-check"></i></span>
                            <span>Accompagnement personnalisé</span>
                        </div>
                    </div>
                </div>
                <div class="mission-image animate-slide-left">
                    <img src="../media/images/éléve.jpg" alt="élèves">
                    <div class="image-overlay"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Vision -->
    <section class="vision-section">
        <div class="container">
            <div class="vision-grid">
                <div class="vision-image animate-slide-right">
                    <img src="../media/images/eleve.jpg" alt="eleve">
                    <div class="image-overlay"></div>
                </div>
                <div class="vision-text animate-slide-left">
                    <div class="vision-icon"><i class="fas fa-eye"></i></div>
                    <h3>Notre vision pour l'avenir</h3>
                    <p>Devenir la référence en matière de soutien scolaire en ligne au Bénin et en Afrique francophone. Nous aspirons à créer un écosystème éducatif où l'apprentissage est un plaisir et la réussite est à la portée de tous.</p>
                    <div class="vision-quote">
                        <span class="quote-icon">"</span>
                        <p>L'éducation est l'arme la plus puissante pour changer le monde.</p>
                        <cite>— Nelson Mandela</cite>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Valeurs -->
    <section class="values-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Nos valeurs</span>
                <h2>Ce qui nous guide au quotidien</h2>
                <p class="section-subtitle">Des principes fondamentaux qui font notre différence</p>
            </div>
            <div class="values-grid">
                <div class="value-card animate-scale">
                    <div class="value-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h3>Excellence</h3>
                    <p>Des contenus pédagogiques de la plus haute qualité, rigoureusement conformes aux programmes officiels.</p>
                </div>
                <div class="value-card animate-scale">
                    <div class="value-icon"><i class="fas fa-handshake"></i></div>
                    <h3>Accessibilité</h3>
                    <p>Des cours accessibles à tous, avec des formules adaptées et des ressources gratuites pour découvrir.</p>
                </div>
                <div class="value-card animate-scale">
                    <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>Innovation</h3>
                    <p>Des technologies modernes pour rendre l'apprentissage interactif, engageant et efficace.</p>
                </div>
                <div class="value-card animate-scale">
                    <div class="value-icon"><i class="fas fa-heart"></i></div>
                    <h3>Bienveillance</h3>
                    <p>Un accompagnement personnalisé avec patience et écoute, respectant le rythme de chacun.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Équipe -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Notre équipe</span>
                <h2>Des passionnés à votre service</h2>
                <p class="section-subtitle">Des experts dédiés à votre réussite</p>
            </div>
            <div class="team-grid">
                <div class="team-card animate-scale">
                    <div class="team-image">
                        <img src="../media/images/BELLO Adjaho.jpg" alt="Bello Adjaho">
                        <img src="../media/images/SAÏZONOU Hamid.jpg" alt="SAÏZONOU Hamid">
                    </div>
                    <div class="team-info">
                        <h3>Bello Adjaho & SAÏZONOU Hamid</h3>
                        <p class="team-role">Fondateur & Directeur Pédagogique</p>
                        <p class="team-bio">Passionné par l'éducation et les nouvelles technologies, il a créé Nournours pour aider les élèves à réussir.</p>
                    </div>
                </div>
                <div class="team-card animate-scale">
                    <div class="team-image">
                        <img src="../media/images/hamid.jpg" alt="Dr. SAÏZONOU">
                    </div>
                    <div class="team-info">
                        <h3>Dr. SAÏZONOU</h3>
                        <p class="team-role">Responsable des Programmes</p>
                        <p class="team-bio">Expert en pédagogie, il supervise l'élaboration des contenus conformes aux programmes officiels.</p>
                    </div>
                </div>
                <div class="team-card animate-scale">
                    <div class="team-image">
                        <img src="../media/images/bello-roufai.jpg" alt="Dr. Bello-Roufai">
                    </div>
                    <div class="team-info">
                        <h3>Dr.BELLO-ROUFAÏ</h3>
                        <p class="team-role">Coordinateur des Cours</p>
                        <p class="team-bio">IL veille à la qualité des cours et à l'accompagnement personnalisé des élèves.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Témoignages -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Ils nous font confiance</span>
                <h2>Ce que nos élèves disent</h2>
                <p class="section-subtitle">Des retours qui nous motivent chaque jour</p>
            </div>
            <div class="testimonials-slider">
                <div class="testimonial-card animate-fade">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">"</div>
                        <p>Grâce à Nournours, ma fille a nettement amélioré ses résultats en mathématiques. Les cours sont clairs et bien expliqués. Une vraie bouffée d'air pour notre famille !</p>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="../media/images/dame.jpg" alt="Mme. K">
                            </div>
                            <div class="author-info">
                                <strong>Mme. K.</strong>
                                <span>Parent d'élève CM2</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card animate-fade">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">"</div>
                        <p>J'ai adoré la flexibilité des cours. Je peux apprendre à mon rythme et revoir les leçons autant de fois que nécessaire. Merci Nournours !</p>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="../media/images/afdol.jpg" alt="Afdol.">
                            </div>
                            <div class="author-info">
                                <strong>Afdol.</strong>
                                <span>Élève en 3ème</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card animate-fade">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">"</div>
                        <p>Une plateforme sérieuse et bien organisée. Les professeurs sont compétents et à l'écoute des besoins des élèves. Je recommande vivement !</p>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="../media/images/monsieur.jpg" alt="Monsieur.">
                            </div>
                            <div class="author-info">
                                <strong>Mr. D.</strong>
                                <span>Parent d'élève Terminale</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Appel à l'action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content animate-fade-up">
                <h2>Prêt à transformer votre scolarité ?</h2>
                <p>Rejoignez des milliers d'élèves qui progressent chaque jour avec Nournours</p>
                <div class="cta-buttons">
                    <a href="../AUTHENTIFICATION/register.php" class="btn btn-primary">S'inscrire gratuitement →</a>
                    <a href="../user/cours.php" class="btn btn-secondary">Découvrir nos cours →</a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php require_once '../layout/footer.php'; ?>