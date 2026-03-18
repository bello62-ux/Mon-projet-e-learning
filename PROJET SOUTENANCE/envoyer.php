<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $suggestion = $_POST['suggestion'];
    
    // Crée un lien Gmail prêt à être envoyé
    $sujet = "Suggestion de " . urlencode($nom);
    $corps = "Nom: $nom%0AEmail: $email%0A%0ASuggestion:%0A$suggestion%0A%0ADate: " . date('d/m/Y H:i');
    
    $lien_gmail = "https://mail.google.com/mail/?view=cm&fs=1&to=belloadjaho6213@gmail.com&su=$sujet&body=$corps";
    
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>📧 Prêt à envoyer !</title>
        <style>
            body { 
                font-family: Arial; 
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }
            .container { 
                background: white; 
                padding: 40px; 
                border-radius: 20px; 
                text-align: center; 
                max-width: 600px; 
                box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            }
            .gmail-btn {
                background: #ea4335;
                color: white;
                padding: 15px 40px;
                border-radius: 25px;
                text-decoration: none;
                font-size: 18px;
                font-weight: bold;
                display: inline-block;
                margin: 20px 0;
                transition: all 0.3s ease;
            }
            .gmail-btn:hover {
                background: #d33;
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(234, 67, 53, 0.3);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 style="color: #2c3e50;">📧 Message prêt à envoyer !</h1>
            <p>Clique sur le bouton ci-dessous pour ouvrir Gmail avec ton message pré-rempli :</p>
            
            <a href="<?php echo $lien_gmail; ?>" target="_blank" class="gmail-btn">
                📩 Ouvrir dans Gmail
            </a>
            
            <p><strong>Destinataire :</strong> belloadjaho6213@gmail.com</p>
            <p><strong>Sujet :</strong> Suggestion de <?php echo $nom; ?></p>
            
            <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; margin: 20px 0; text-align: left;">
                <strong>Message :</strong><br>
                <?php echo nl2br(htmlspecialchars($suggestion)); ?>
            </div>
            
            <p style="color: #666; font-size: 14px;">
                <strong>⚠️ Important :</strong> Tu dois être connecté à Gmail pour que ça marche.<br>
                Clique sur "Envoyer" dans la fenêtre Gmail qui s'ouvre.
            </p>
            
            <a href="apropos.php" style="color: #3498db; text-decoration: none;">
                ↩ Retour au formulaire
            </a>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>