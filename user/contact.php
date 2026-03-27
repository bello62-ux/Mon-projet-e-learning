<?php
// Définir le titre de la page
$page_title = "Contact - Nournours";

// Inclure le header (layout)
require_once '../layout/header.php';
?>

<link rel="stylesheet" href="../asset/css/contact.css">

<div class="contact-page">
    <div class="contact-grid">
        <!-- Colonne gauche : informations -->
        <div class="contact-card">
            <h2>📞 Contactez-Nous</h2>
            <div class="contact-info">
                <div class="info-item">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-text">
                        <h6>Adresse</h6>
                        <p>Porto-Novo, Bénin</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon"><i class="fas fa-home"></i></div>
                    <div class="info-text">
                        <h6>Résidence</h6>
                        <p>Résidence BELLO ROUFAI, Appartement B2</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon"><i class="fab fa-whatsapp"></i></div>
                    <div class="info-text">
                        <h6>Téléphone / WhatsApp</h6>
                        <a href="https://wa.me/22962130248" target="_blank">+229 62 13 02 48</a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-text">
                        <h6>Email</h6>
                        <a href="mailto:belloadjaho6213@gmail.com">belloadjaho6213@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colonne droite : formulaire -->
        <div class="contact-card">
            <h4>📝 Laissez-nous vos suggestions</h4>
            <form method="post" action="envoyer.php" class="contact-form">
                <div class="form-group">
                    <label for="nom">Nom complet</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                </div>
                <div class="form-group">
                    <label for="suggestion">Votre suggestion</label>
                    <textarea id="suggestion" name="suggestion" rows="4" placeholder="Partagez votre avis..." required></textarea>
                </div>
                <button type="submit" class="btn-submit" name="submit">Envoyer le message →</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php'; ?>