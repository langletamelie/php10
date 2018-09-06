<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>partie10 TP3</title>
    </head>
    <body>
        <?php include 'controllerTp3.php'; ?>
        <?php

        //la fonction showArray($array) se répète pour chaque tableau $portrait
        function showArray($array) {
        //Affiche l'élément de la clé name
            ?>
            <div>
                <p><?= $array['name'] . ' ' . $array['firstname'] . ' ' ?></p>
                <p><img src=" <?= $array['portrait']; ?>" height = "400px"  width = "350px" /></p>
            </div> <?php } ?>
    </body>
</html>