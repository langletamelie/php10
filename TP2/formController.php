<?php
//déclaration de la regex pour la société
$regexFirm = '/^[A-Za-z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ\,\;\:\&\!\?\.\%\$\€\=\)\(\-\"\'\#\[\]\°\+ ]+$/';
//déclaration de la regex pour les noms
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//déclaration de la regex pour l'âge
$regexAge = '/^[0-9]+$/';
//déclaration du tableau d'erreur
$formError = array();
//déclaration du tableau du select civility
$civilityArray = array(0 => 'Veuillez choisir votre civilité', 1 => 'Monsieur', 2 => 'Madame');
//Si lastname existe , faire un test regex, si c'est valide on stocke la valeur dans $lastname sinon c'est vide
if (isset($_POST['lastname'])) {
    //déclaration de la variable lastname avec le htmlspecialchar
    $lastname = htmlspecialchars($_POST['lastname']);
    if (!preg_match($regexName, $lastname)) {
        //test avec la regex pour vérifier la validité du champs lastname
        $formError['lastname'] = 'La saisie de votre nom est invalide';
    }
    if (empty($lastname)) { // verifie si le champs de nom et vide 
        //stocker dans le tableau le rapport d'erreur
        $formError['lastname'] = 'Veuillez indiquer votre nom';
    }
}
if (isset($_POST['firstname'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexName, $firstname)) {
        $formError['firstname'] = 'La saisie de votre prénom est invalide';
    }
    if (empty($firstname)) {
        $formError['firstname'] = 'Veuillez indiquer votre nom';
    }
}
if (isset($_POST['age'])) {
    $age = htmlspecialchars($_POST['age']);
    if (!preg_match($regexAge, $age)) {
        $formError['age'] = 'La saisie de votre âge est invalide';
    }
    if (empty($age)) {
        $formError['age'] = 'Veuillez indiquer votre âge';
    }
}
if (isset($_POST['firm'])) {
    $firm = htmlspecialchars($_POST['firm']);
    if (!preg_match($regexFirm, $firm)) {
        $formError['firm'] = 'La saisie de votre société est invalide';
    }
    if (empty($firm)) {
        $formError['firm'] = 'Veuillez indiquer votre société';
    }
}
//lors de la validation du formulaire, on vérifie si la clé existe sinon on affiche un msg d'erreur
if (isset($_POST['civility'])) {
    $civility = $civilityArray[$_POST['civility']];
} else if(isset($_POST['submit']) && !array_key_exists ('civility', $_POST)) {
    $formError['civility'] = 'Veuillez choisir votre civilité';
        }
?>