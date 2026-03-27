<?php
// Définir le titre de la page
$page_title = "Abonnement - Nournours";

// Inclure le header
require_once '../layout/header.php';

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);
?>

<link rel="stylesheet" href="../asset/css/abonnement.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

<div class="subscription-page">
    <!-- Hero section -->
    <div class="subscription-hero">
        <div class="subscription-hero-text">
            <h1>Choisissez une formule<br>d'abonnement</h1>
            <p>Sélectionnez la formule d'abonnement qui vous correspond ci-dessous.</p>
        </div>
        <div class="subscription-hero-image">
            <img src="../media/images/diplome2.webp" alt="Diplôme">
        </div>
    </div>

    <!-- Grille des formules -->
    <div class="pricing-grid">
        <div class="pricing-card pricing-card-free">
            <div class="pricing-card-header">
                <i class="fas fa-gift" style="font-size: 2rem; margin-bottom: 10px; color: #3498db;"></i>
                <h3>GRATUIT</h3>
            </div>
            <div class="pricing-card-content">
                <ul class="pricing-features">
                    <li>❌ Cours vidéo non inclus pour le CM2</li>
                    <li>❌ Cours vidéo non inclus pour la 3ème</li>
                    <li>❌ Cours vidéo non inclus pour la Terminale</li>
                </ul>
                <div class="pricing-price">0 FCFA</div>
                <?php if ($is_logged_in): ?>
                    <a href="../ACCUEIL/cours.php" class="pricing-btn btn-free">Sélectionner</a>
                <?php else: ?>
                    <a href="../AUTHENTIFICATION/login.php" class="pricing-btn btn-free">Se connecter pour choisir</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="pricing-card pricing-card-basic">
            <div class="pricing-card-header">
                <i class="fas fa-rocket" style="font-size: 2rem; margin-bottom: 10px; color: #2ecc71;"></i>
                <h3>BASIQUE</h3>
            </div>
            <div class="pricing-card-content">
                <ul class="pricing-features">
                    <li>❌ Cours vidéo non inclus pour le CM2</li>
                    <li>✅ Cours vidéo inclus pour la 3ème</li>
                    <li>✅ Cours vidéo inclus pour la Terminale</li>
                </ul>
                <div class="pricing-price">7 000 FCFA/mois</div>
                <?php if ($is_logged_in): ?>
                    <a href="#" class="pricing-btn btn-basic">Sélectionner</a>
                <?php else: ?>
                    <a href="../AUTHENTIFICATION/login.php" class="pricing-btn btn-basic">Se connecter pour choisir</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="pricing-card pricing-card-premium">
            <div class="pricing-card-header">
                <i class="fas fa-crown" style="font-size: 2rem; margin-bottom: 10px; color: #e67e22;"></i>
                <h3>PREMIUM</h3>
            </div>
            <div class="pricing-card-content">
                <ul class="pricing-features">
                    <li>✅ Cours vidéo inclus pour le CM2</li>
                    <li>✅ Cours vidéo inclus pour la 3ème</li>
                    <li>✅ Cours vidéo inclus pour la Terminale</li>
                </ul>
                <div class="pricing-price">40 000 FCFA/an</div>
                <?php if ($is_logged_in): ?>
                    <a href="#" class="pricing-btn btn-premium">Sélectionner</a>
                <?php else: ?>
                    <a href="../AUTHENTIFICATION/login.php" class="pricing-btn btn-premium">Se connecter pour choisir</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Section FAQ -->
    <div class="faq-section">
        <div class="faq-header">
            <h2>Foire Aux Questions</h2>
            <p>Tout ce que vous devez savoir</p>
        </div>
        <div class="faq-grid">
            <details>
                <summary>À qui s'adresse cette plateforme ?</summary>
                <div class="faq-answer">
                    <p>Cette plateforme est destinée aux élèves de <strong>CM2</strong>, <strong>3ème</strong> et <strong>Terminale</strong> qui souhaitent mieux comprendre leurs cours, améliorer leurs résultats et se préparer efficacement aux examens.</p>
                </div>
            </details>
            <details>
                <summary>Les cours sont-ils vraiment adaptés au programme scolaire ?</summary>
                <div class="faq-answer">
                    <p>Oui. Tous les cours sont conformes aux programmes officiels et expliqués de manière simple, progressive et accessible à chaque niveau.</p>
                </div>
            </details>
            <details>
                <summary>Y a-t-il des cours gratuits ?</summary>
                <div class="faq-answer">
                    <p>Oui. Nous proposons des cours gratuits pour permettre aux élèves et aux parents de découvrir la qualité de notre contenu avant de passer aux formations payantes.</p>
                </div>
            </details>
            <details>
                <summary>Quelle est la différence entre les cours gratuits et les cours payants ?</summary>
                <div class="faq-answer">
                    <p>Les cours gratuits couvrent les bases, tandis que les cours payants offrent des explications plus détaillées, des exercices corrigés, un suivi plus approfondi.</p>
                </div>
            </details>
            <details>
                <summary>Comment payer les cours payants ?</summary>
                <div class="faq-answer">
                    <p>Les paiements se font de manière sécurisée via les moyens de paiement disponibles sur la plateforme.</p>
                </div>
            </details>
            <details>
                <summary>Est-ce que les parents peuvent suivre le progrès de leur enfant ?</summary>
                <div class="faq-answer">
                    <p>Oui. Les parents peuvent suivre leur évolution à travers les cours étudiés.</p>
                </div>
            </details>
            <details>
                <summary>Est-ce que les cours remplacent l'école ?</summary>
                <div class="faq-answer">
                    <p>Non. La plateforme est un complément à l'école pour renforcer la compréhension, réviser à la maison et mieux réussir en classe.</p>
                </div>
            </details>
            <details>
                <summary>Que faire en cas de problème technique ou de question ?</summary>
                <div class="faq-answer">
                    <p>Une équipe d'assistance est disponible. Vous pouvez nous contacter via <a href="https://wa.me/22962130248" target="_blank">WhatsApp</a> ou par e-mail <a href="mailto:Saizonoubello@gmail.com">Saizonoubello@gmail.com</a>, et nous vous répondrons rapidement.</p>
                </div>
            </details>
        </div>
    </div>
</div>

<style>
    /* Styles supplémentaires pour les boutons */
    .pricing-btn {
        display: block;
        text-align: center;
        padding: 12px 20px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: auto;
    }
    
    .pricing-card-free .pricing-btn {
        background: #3498db;
        color: white;
    }
    
    .pricing-card-basic .pricing-btn {
        background: #2ecc71;
        color: white;
    }
    
    .pricing-card-premium .pricing-btn {
        background: #e67e22;
        color: white;
    }
    
    .pricing-btn:hover {
        transform: translateY(-2px);
        filter: brightness(0.95);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const details = document.querySelectorAll('.faq-grid details');
        
        details.forEach(detail => {
            let timeout = null;
            
            detail.addEventListener('mouseenter', function() {
                if (timeout) clearTimeout(timeout);
                this.open = true;
            });
            
            detail.addEventListener('mouseleave', function() {
                timeout = setTimeout(() => {
                    this.open = false;
                }, 200);
            });
        });
    });
</script>

<?php require_once '../layout/footer.php'; ?>