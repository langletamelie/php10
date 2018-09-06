<?php include 'formController.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <title>partie10 TP2</title>
    </head>
    <body>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="civility">Civilité</label>
                    <select type="text" class="form-control col-7" name="civility" id="civility" value="" <?= !empty($civility) ? $civility : '' ?>>
                        <option selected disabled>---</option>
                        <option value="1" <?= ((!empty($civility)) && ($civility == 1)) ? 'selected' : ''?>>Monsieur</option>
                        <option value="2" <?= ((!empty($civility)) && ($civility == 2)) ? 'selected' : ''?>>Madame</option>
                    </select>
                   <?php if(!empty($_POST)){ ?><p class="text-danger"><?= isset($formError['civility']) ? $formError['civility'] : '' ?></p><?php }?>
                </div>
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control col-7" name="lastname" id="lastname" placeholder="Nom" value="<?= isset($lastname) ? $lastname : '' ?>"/>
                    <p class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control col-7" name="firstname" id="firstname" placeholder="Prénom" value="<?= isset($firstname) ? $firstname : '' ?>"/>
                    <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control col-7" name="age" id="age" placeholder="Age" value="<?= isset($age) ? $age : '' ?>"/>
                    <p class="text-danger"><?= isset($formError['age']) ? $formError['age'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="firm">Société</label>
                    <input type="text" class="form-control col-7" name="firm" id="firm" placeholder="Société" value="<?= isset($firm) ? $firm : '' ?>"/>
                    <p class="text-danger"><?= isset($formError['firm']) ? $formError['firm'] : '' ?></p>
            </div>
            <input type="submit" name="submit" id="submit" value="VALIDATION"/>
        </form>
           <?php //affiche les résultats si aucune erreur est comptée dans le tableau
        if (isset($_POST['submit']) && (count($formError) == 0)) { ?>
            <p><?= $civility ?></p>
            <p><?= $lastname ?></p>
            <p><?= $firstname ?></p>
            <p><?= $age ?></p>
            <p><?= $firm ?></p>
           <?php } ?>
    </body>
</html>