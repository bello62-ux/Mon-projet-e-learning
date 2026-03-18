<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Nournours</title>
    <link rel="stylesheet" href="apropos.css">
</head>
<body>
    <header>
        <div>
            <img src="logo.jpg" alt="Logo Nournours" id="nournours">
            <nav>
                <ul>
                    <a href="acceuil.html"><li>Accueil</li></a>
                    <a href="cours.html"><li>Cours</li></a>
                    <a href="abonnement.html"><li>Abonnement</li></a>
                    <a href="apropos.html"><li>A propos</li></a>
                    <a href="profil.php"><li>Profil</li></a>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-card">
                    <h2 class="text-center mb-4">📞 Contactez-Nous</h2>

                    <div class="contact-info">
                        <div class="info-item">
                            <div class="icon">📍</div>
                            <div class="info-text">
                                <h6>Adresse :</h6>
                                <p class="text-muted">PORTO-NOVO, BÉNIN</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="icon">🏠</div>
                            <div class="info-text">
                                <h6>Résidence :</h6>
                                <p class="text-muted">Résidence BELLO ROUFAI, Appartement B2</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="icon">📞</div>
                            <div class="info-text">
                                <h6>Téléphone :</h6>
                                <a href="https://wa.me/22962130248" target="_blank">+229 62 13 02 48</a>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="icon">✉️</div>
                            <div class="info-text">
                                <h6>Email :</h6>
                                <a href="mailto:belloadjaho6213@gmail.com">belloadjaho6213@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="contact-card">
                    <h4 class="text-center mb-3">📝 Laissez-nous vos suggestions</h4>
                    
                    <form method="post" action="envoyer.php" class="needs-validation">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="suggestion">Suggestion sur nos plats</label>
                            <textarea id="suggestion" name="suggestion" rows="4" required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn-submit" name="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>