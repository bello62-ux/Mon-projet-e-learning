<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Votre CSS original (conservé) -->
    <link rel="stylesheet" href="../asset/css/style3.css">
    <title>Nournours - Cours en ligne</title>
    <style>
       
    </style>
</head>
<body>
    <?php require(__DIR__ . '/layout/header.php'); ?>
    
    <main>
        <!-- ========== VOTRE CODE ANCIEN (100% CONSERVÉ AVEC BOOTSTRAP RESPONSIVE) ========== -->
        <div class="hero-section">
            <div class="hero-content">
                <h1>Réussissez votre scolarité avec nos cours en ligne</h1>
                <h3>Programme scolaire des différentes classes d'examens</h3>
                <div class="hero-buttons">
                    <a href="../user/apropos.php" class="btn btn-blue">Demander l'accès de préparation</a>
                    <a href="../user/cours.php" class="btn btn-orange">Faire cours en ligne</a>
                </div>
            </div>
        </div>
        
        <div class="content-container">
            <div class="main-content">
                <section class="levels-section">
                    <h2>Niveaux scolaires</h2>
                    <div class="cards-grid">
                        <div class="card">
                            <img src="./media/images/idea.jpg.png" alt="CM2">
                            <p>CM2</p>
                        </div>
                        <div class="card">
                            <img src="./media/images/target.jpg.png" alt="3ème">
                            <p>3ème</p>
                        </div>
                        <div class="card">
                            <img src="./media/images/graduation.jpg.png" alt="Terminale">
                            <p>Terminale</p>
                        </div>
                    </div>
                </section>
                
                <section class="success-section">
                    <h2>Votre parcours de réussite</h2>
                    <div class="cards-grid">
                        <div class="card">
                            <img src="./media/images/online-lesson.jpg.png" alt="Parcours Complet">
                            <p>Parcours Complet</p>
                        </div>
                        <div class="card">
                            <img src="./media/images/programmer.jpg.png" alt="Programmes">
                            <p>Nos différents programmes</p>
                        </div>
                        <div class="card">
                            <img src="./media/images/youtube.jpg.png" alt="Cours en Vidéo">
                            <p>Cours en Vidéo</p>
                        </div>
                    </div>
                </section>
            </div>
            
            <aside class="sidebar">
                <div class="how-it-works">
                    <h2>Comment ça marche ?</h2>
                    <div class="info-card">
                        <img src="./media/images/comments.jpg.png" alt="Commentaire">
                        <p>Les apprenants s'inscrivent gratuitement, choisissent leur niveau scolaire et accèdent à des cours interactifs adaptés à leur programme</p>
                    </div>
                </div>
                
            </aside>
        </div>
        <!-- ========== FIN DE VOTRE CODE ANCIEN ========== -->

        <!-- ========== NOUVELLES SECTIONS AJOUTÉES ========== -->
        
        <!-- Statistiques -->
        <section class="stats-section">
            <div class="container">
                <div class="row text-center g-4">
                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                        <div class="stat-number">500+</div>
                        <div>Élèves inscrits</div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="stat-number">50+</div>
                        <div>Cours disponibles</div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-number">15+</div>
                        <div>Enseignants experts</div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-number">95%</div>
                        <div>Taux de satisfaction</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Témoignages -->
        <section class="testimonials-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Ce que disent nos élèves</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Des retours qui nous motivent chaque jour</p>
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-card">
                            <div class="testimonial-text">
                                <i class="fas fa-quote-left text-primary me-2"></i>
                                Grâce à Nournours, ma fille a nettement amélioré ses résultats en mathématiques. Les cours sont clairs et bien expliqués.
                            </div>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=60&h=60&fit=crop" alt="Parent">
                                <div>
                                    <strong>Mme. K.</strong>
                                    <div class="small text-muted">Parent d'élève CM2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-card">
                            <div class="testimonial-text">
                                <i class="fas fa-quote-left text-primary me-2"></i>
                                J'ai adoré la flexibilité des cours. Je peux apprendre à mon rythme et revoir les leçons autant de fois que nécessaire.
                            </div>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=60&h=60&fit=crop" alt="Élève">
                                <div>
                                    <strong>Jean B.</strong>
                                    <div class="small text-muted">Élève en 3ème</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-card">
                            <div class="testimonial-text">
                                <i class="fas fa-quote-left text-primary me-2"></i>
                                Une plateforme sérieuse et bien organisée. Les professeurs sont compétents et à l'écoute des besoins des élèves.
                            </div>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop" alt="Parent">
                                <div>
                                    <strong>Mr. D.</strong>
                                    <div class="small text-muted">Parent d'élève Terminale</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Questions fréquentes</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Tout ce que vous devez savoir</p>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        À qui s'adresse cette plateforme ?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Cette plateforme est destinée aux élèves de CM2, 3ème et Terminale qui souhaitent mieux comprendre leurs cours, améliorer leurs résultats et se préparer efficacement aux examens.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Les cours sont-ils gratuits ?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Nous proposons des cours gratuits pour permettre aux élèves et aux parents de découvrir la qualité de notre contenu. Des formules payantes offrent des fonctionnalités supplémentaires comme les cours vidéo et un accompagnement personnalisé.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Comment payer les cours payants ?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Les paiements se font de manière sécurisée via les moyens de paiement disponibles sur la plateforme (Mobile Money, carte bancaire, etc.).
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        Est-ce que les parents peuvent suivre le progrès de leur enfant ?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Oui. Les parents peuvent suivre leur évolution à travers les cours étudiés et les progrès réalisés via leur espace parent.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <!-- Call to Action Section -->
<section class="cta-section">
    <div class="container">
        <h2 data-aos="fade-up">Prêt à réussir ?</h2>
        <p data-aos="fade-up" data-aos-delay="100">Rejoignez des milliers d'élèves qui progressent chaque jour avec Nournours</p>
        <div class="cta-buttons" data-aos="fade-up" data-aos-delay="200">
            <a href="./AUTHENTIFICATION/register.php" class="cta-btn btn-primary-cta">S'inscrire gratuitement →</a>
            <a href="../user/cours.php" class="cta-btn btn-secondary-cta">Découvrir nos cours →</a>
        </div>
    </div>
</section>


    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>
<?php require(__DIR__ . '/layout/footer.php'); ?>