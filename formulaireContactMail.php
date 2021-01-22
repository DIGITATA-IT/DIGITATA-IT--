<?php
	
if(isset($_POST['formMail']))
{
	if(!empty($_POST['fName']) AND !empty($_POST['lName']) AND !empty($_POST['eMail']) AND !empty($_POST['message']))
	{
		$header = "MIME-Version: 1.0\r\n";
		$header .= 'From:"Turpin.com"<contact@turpin.com>' . "\n";
		$header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
		$header .= 'Content-Transfer-Encoding: 8bit';

		$message = '

			<html>
				<body>
					<div align="center">
						<img src="http://primfx.com/mailing/banniere.png" /> <br />
                        <p> Nom de l\'expédiyeur :' . $_POST['fName'] . '</p>
                        <p> Prénom de l\'expédiyeur :' . $_POST['lName'] . '</p>
						<p> Mail de l\'expédiyeur :' . $_POST['eMail'] . '</p>
						<p>' . nl2br($_POST['message']). '</p>
						<img src="http://primfx.com/mailing/separation.png" />
					</div>
				</body>
			</html>


		';

	mail("testturpin@gmail.com", "Contact - monsite.com", $message, $header);

	$msg = "Votre message a bien été envoyé !";

	}
	else
	{
		$msg = "Tous les champs doivent être complétés !";
	}

	
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Entreprise de service numérique">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/app.js" defer></script>
    <script src="./js/defilement.js"></script>
    <script src="./js/main.js" async></script>
    <script src="https://kit.fontawesome.com/f785a36f23.js" crossorigin="anonymous"></script>
    <title>Entreprise de services numériques &amp;</title>
</head>

<body class="with--sidebar">
    <div class="site-container">
        <div class="site-pusher">
            <header id="mainHeader">
                <a href="#" class="header__icon" id="header__icon"></a>
                <div class="headerLogo">
                    <figure class="headerLogoFig">
                        <img class="headerLogoFigImg" src="./images/Logo_choisi.jpg" alt="logo Digitata">
                    </figure>
                </div>
                <nav class="NavBar">
                    <a class="active" href="index.html" title="Information sur l'entreprise">
                        <div class="icone">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="texte">
                            À l'Accueil
                            <span>Page d'accueil du site</span>
                        </div>
                    </a>
                    <a href="propos.html" title="Information sur l'entreprise">
                        <div class="icone">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="texte">
                            À propos
                            <span>Tout savoir sur DIGITATA-IT</span>
                        </div>
                    </a>
                    <a href="index.html#expertisePage" title="les compétences de l'entreprise">
                        <div class="icone">
                            <i class="fas fa-brush"></i>
                        </div>
                        <div class="texte">
                            Expertises
                            <span>Toutes nos réalisations</span>
                        </div>
                    </a>
                    <a href="equipe.html" title="découvrir notre équipe">
                        <div class="icone">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="texte">
                            Équipe
                            <span>Une équipe efficace</span>
                        </div>
                    </a>
                    <a href="service.html" title="les prestations de l'entreprise">
                        <div class="icone">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="texte">
                            Services
                            <span>Tous nos services</span>
                        </div>
                    </a>
                    <a href="contact.html" title="nous contactez">
                        <div class="icone">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="texte">
                            Contact
                            <span>Contactez-nous !</span>
                        </div>
                    </a>
                    <a href="contact.html" title="nous contactez">
                        <div class="icone">
                            <i class="fas fa-phone-square-alt"></i>
                        </div>
                        <div class="texte">
                            06 68 85 59 55
                            <span>Contactez-nous !</span>
                        </div>
                    </a>
                </nav>
            </header>
            <main class="site-content">
                <section class="pageContent main">
                    <h1>Contactez-nous</h1>
                    <p>Merci de compléter le formulaire suivant pour nous contacter. Tous les champs de ce formulaire sont requis.</p>
                    <form id="frmContact" methode="POST" action="formulaireContactMail.php">
                        <div id="leftCol">
                            <div>
                                <label for="fName">Prénom</label>
                                <input type="text" name="fName" id="fName"value="<?php if(isset($_POST['fName'])) { echo $_POST['fName']; } ?>" required><br/> <br/>
                            </div>
                            <div>
                                <label for="lName">Nom de Famille</label>
                                <input type="text" name="lName" id="lName" value="<?php if(isset($_POST['lName'])) { echo $_POST['lName']; } ?>" required><br/> <br/>
                            </div>
                            <div>
                                <label for="eMail">Adresse e-mail</label>
                                <input type="email" name="eMail" id="eMail"value="<?php if(isset($_POST['eMail'])) { echo $_POST['eMail']; } ?>" required><br/> <br/>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="accepter" required>
                                <label class="form-check-label" for="accepter">Accepter les conditions</label>
                            </div>
                        </div>
                        <div id="rightCol">
                            <div>
                                <label for="message">Votre Message</label>
                                <textarea id="message" name="message"  required><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea>
                            </div>
                        </div>

                        <button type="submit" name="formMail" value="Envoyer !">Envoyer</button>
					</form><br/> <br/>
					

					<?php 
		if(isset($msg))
		{
			echo $msg;
		}
 
	?>
                </section>
                <footer id="footer">
                    <div class="container">
                        <ul class="icons">
                            <li>
                                <a href="#"><img src="./images/tweet.PNG" alt="twitter"></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/Digitatait"><img src="./images/face.PNG" alt="facebook"></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/rpa-factory"><img src="./images/link.PNG" alt="linkedln"></a>
                            </li>
                            <li>
                                <a href="#"><img src="./images/insta.PNG" alt="Instagram"></a>
                            </li>
                            <li>
                                <a href="#"><img src="./images/youtube.JPG" alt="YouTube"></a>
                            </li>
                        </ul>
                        <ul class="copyright">
                            <li>&copy; Copyright DIGITATA-IT - 2021</li>
                            <li><a href="#">Mentions Légales</a></li>
                            <li><a href="#">Politique de confidentialité</a></li>
                        </ul>
                    </div>
                </footer>
                <!--Ici se termine le #mainFooter-->
            </main>
            <div class="site-cache" id="site-cache"></div>
        </div>

    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</body>
</html>
