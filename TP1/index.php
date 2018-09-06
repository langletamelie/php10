<?php
//déclaration des différentes regex utilisées pour le formulaire
//regex autorisant les chiffres, les majuscules et certains caractères spéciaux pour les textes
$regexText = '/^[A-Za-z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ\,\;\:\!\?\.\%\$\€\=\)\(\-\"\'\#\[\]\°\+ ]+$/';
//regex pour le numéro de téléphone (commençant obligatoirement par un 0 et contenant 10 chiffres)
$regexPhoneNumber = '/^0[1-68][0-9]{8}/';
//regex pour la date de naissance (aaaa-mm-jj)
$regexBirthDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
//regex pour l'adresse mail (autorisation chiffres lettres, obligation de l'@ et .
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
//regex pour le nombre de badges 
$regexBadge = '/[0-9]+$/';
//regex pour le lien codecademy (obligation http ou https plus caractéristiques d'une url)
$regexURL = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
//regex pour l'adresse postale
$regexAddress = '/^[0-9A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° ]+$/';
//regex pour les noms, prénoms
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//création du tableau d'erreurs
$formError = array();
/*déclaration des conditions (en ternaire) pour savoir si les champs sont remplis et appliquer la regex afin d'afficher 
 * un message d'erreur si les 2 conditions ne sont pas remplies */
/*si une valeur existe, 
 * on lui attribut le nom d'une variable
 * si la saisie n'est pas valide 
 * on affiche *saisie invalide 
 * si le champs est est vide 
 * on affiche  *obligatoire
 */
$lastname = !empty($_POST['lastname']) && (preg_match($regexName, $_POST['lastname'])) ? htmlspecialchars($_POST['lastname']) : 'Veuillez entrer correctement votre nom';
$firstname = !empty($_POST['firstname']) && (preg_match($regexName, $_POST['firstname'])) ? htmlspecialchars($_POST['firstname']) : 'Veuillez entrer correctement votre prénom';
$birthDate = !empty($_POST['birthDate']) && (preg_match($regexBirthDate, $_POST['birthDate'])) ? htmlspecialchars($_POST['birthDate']) : 'Veuillez entrer correctement votre date de naissance';
$country = !empty($_POST['country']) && (preg_match($regexName, $_POST['country'])) ? htmlspecialchars($_POST['country']) : 'Veuillez entrer correctement votre pays';
$nationality = !empty($_POST['nationality']) && (preg_match($regexName, $_POST['nationality'])) ? htmlspecialchars($_POST['nationality']) : 'Veuillez entrer correctement votre nationalité';
$address = !empty($_POST['address']) && (preg_match($regexText, $_POST['address'])) ? htmlspecialchars($_POST['address']) : 'Veuillez entrer correctement votre adresse';
$mail = !empty($_POST['mail']) && (preg_match($regexMail, $_POST['mail'])) ? htmlspecialchars($_POST['mail']) : 'Veuillez entrer correctement votre e-mail';
$phoneNumber = !empty($_POST['phoneNumber']) && (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) ? htmlspecialchars($_POST['phoneNumber']) : 'Veuillez entrer correctement votre numéro de téléphone';
$degree = !empty($_POST['degree']) && (preg_match($regexText, $_POST['degree'])) ? htmlspecialchars($_POST['degree']) : 'Veuillez entrer correctement votre diplôme';
$poleEmploi = !empty($_POST['poleEmploi']) && (preg_match($regexText, $_POST['poleEmploi'])) ? htmlspecialchars($_POST['poleEmploi']) : 'Veuillez entrer correctement votre numéro pole emploi';
$badgeNumber = !empty($_POST['badgeNumber']) && (preg_match($regexText, $_POST['badgeNumber'])) ? htmlspecialchars($_POST['badgeNumber']) : 'Veuillez entrer correctement votre nombre de badge';
$codecademy = !empty($_POST['codecademy']) && (preg_match($regexURL, $_POST['codecademy'])) ? htmlspecialchars($_POST['codecademy']) : 'Veuillez entrer correctement votre lien codecademy';
$hero = !empty($_POST['hero']) && (preg_match($regexText, $_POST['hero'])) ? htmlspecialchars($_POST['hero']) : 'Veuillez entrer correctement votre champs héro';
$hacks = !empty($_POST['hacks']) && (preg_match($regexText, $_POST['hacks'])) ? htmlspecialchars($_POST['hacks']) : 'Veuillez entrer correctement votre champs hacks';
$experience = !empty($_POST['experience']) && (preg_match($regexText, $_POST['experience'])) ? htmlspecialchars($_POST['experience']) : 'Veuillez entrer correctement votre champs expérience';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <title>partie10 TP1</title>
    </head>
    <body>
      <!-- si les champs sont remplis et corrects, afficher les variables -->
        <?php
        if (isset($_POST['submit']) && (count($formError) === 0)) { ?> 
        <p><?= $lastname; ?></p>
        <p><?= $firstname; ?></p>
        <p><?= $birthDate; ?></p>
        <p><?= $country; ?></p>
        <p><?= $nationality; ?></p>
        <p><?= $address; ?></p>
        <p><?= $mail; ?></p>
        <p><?= $phoneNumber; ?></p>
        <p><?= $degree; ?></p>
        <p><?= $poleEmploi; ?></p>
        <p><?= $badgeNumber; ?></p>
        <p><?= $codecademy; ?></p>
        <p><?= $hero; ?></p>
        <p><?= $hacks; ?></p>
        <p><?= $experience; ?></p>
        <?php } else { ?>   
  <!-- formulaire avec les messages d'erreurs si il y en a -->
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control col-7" name="lastname" id="lastname" placeholder="Nom" />
                    <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control col-7" name="firstname" id="firstname" placeholder="Prénom" />
                     <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="birthDate">Date de naissance</label>
                    <input type="date" class="form-control col-7" name="birthDate" id="birthDate" placeholder="jj/mm/aaaa" />
                     <p class="text-danger"><?= isset($formError['birthDate']) ? $formError['birthDate'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="country">Pays de naissance</label>
                    <input type="text" class="form-control col-7" name="country" id="country" placeholder="Pays de naissance" />
                     <p class="text-danger"><?= isset($formError['country']) ? $formError['country'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationalité</label>
                    <input type="text" class="form-control col-7" name="nationality" id="nationality" placeholder="Nationalité" />
                     <p class="text-danger"><?= isset($formError['nationality']) ? $formError['nationality'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control col-7" name="address" id="address" placeholder="Adresse" />
                     <p class="text-danger"><?= isset($formError['address']) ? $formError['address'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="mail">E-mail</label>
                    <input type="text" class="form-control col-7" name="mail" id="mail" placeholder="E-mail" />
                     <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Téléphone</label>
                    <input type="text" class="form-control col-7" name="phoneNumber" id="phoneNumber" placeholder="Téléphone" />
                     <p class="text-danger"><?= isset($formError['phoneNumber']) ? $formError['phoneNumber'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="degree">Diplôme</label>
                    <select type="text" class="form-control col-7" name="degree" id="degree">
                        <option selected disabled>---</option>
                        <option>sans</option>
                        <option>Bac</option>
                        <option>Bac+2</option>
                        <option>Bac+3 ou supérieur</option>
                    </select>
                     <p class="text-danger"><?= isset($formError['degree']) ? $formError['degree'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="poleEmploi">Numéro pôle emploi</label>
                    <input type="text" class="form-control col-7" name="poleEmploi" id="poleEmploi" placeholder="Numéro pôle emploi" />
                     <p class="text-danger"><?= isset($formError['poleEmploi']) ? $formError['poleEmploi'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="badgeNumber">Nombre de badge</label>
                    <input type="text" class="form-control col-7" name="badgeNumber" id="badgeNumber" placeholder="Nombre de badge" />
                     <p class="text-danger"><?= isset($formError['badgeNumber']) ? $formError['badgeNumber'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="codecademy">Liens codecademy</label>
                    <input type="text" class="form-control col-7" name="codecademy" id="codecademy" placeholder="Liens codecademy" />
                     <p class="text-danger"><?= isset($formError['codecademy']) ? $formError['codecademy'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="hero">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi?</label>
                    <textarea type="text" class="form-control col-7" name="hero" id="hero" placeholder="Super-héros"></textarea>
                     <p class="text-danger"><?= isset($formError['hero']) ? $formError['hero'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="hacks">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label>
                    <textarea type="text" class="form-control col-7" name="hacks" id="hacks" placeholder="Hacks"></textarea>
                     <p class="text-danger"><?= isset($formError['hacks']) ? $formError['hacks'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="experience">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</label>
                    <textarea type="text" class="form-control col-7" name="experience" id="experience" placeholder="Expérience informatique"></textarea>
                     <p class="text-danger"><?= isset($formError['experience']) ? $formError['experience'] : '' ?></p>
                </div>
                <input type="submit" name="submit" id="submit" value="VALIDATION"/>
            </form>
        <?php }
        ?>
    </body>
</html>