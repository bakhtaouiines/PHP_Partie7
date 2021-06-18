<?php
$genderList = ['Monsieur' => 'M', 'Madame' => 'Mme'];
$formErrorList = [];

///////////////////////////////////////////////////////// je vérifie que le formulaire a bien été soumis

if (isset($_REQUEST['register'])) {
    // Vérification REGEX + valeur Nom                                  
    $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/';
    /*  $file = strtr($file, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
        -> On remplace les lettres accentutées par les non accentuées dans $file.
        -> En dessous, il y a l'expression régulière qui remplace tout ce qui n'est pas une lettre non accentuées ou un chiffre dans $file par un tiret "-" et qui place le résultat dans $fichier.
    $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);*/

    if (!empty($_REQUEST['lastname'])) {
        if (preg_match($regex, $_REQUEST['lastname'])) {
            $lastname = htmlspecialchars($_REQUEST['lastname']);
        } else {
            $formErrorList['lastname'] = 'Les caractères saisis ne sont pas valides. Seuls les lettres avec des accents le sont pour le nom.';
        }
    } else {
        $formErrorList['lastname'] = 'Nom de famille manquant';
    }

    // Vérification REGEX + valeur Prénom
    if (!empty($_REQUEST['firstname'])) {
        if (preg_match($regex, $_REQUEST['firstname'])) {
            $firstname = htmlspecialchars($_REQUEST['firstname']);
        } else {
            $formErrorList['firstname'] = 'Les caractères saisis ne sont pas valides. Seuls les lettres avec des accents le sont pour le prénom.';
        }
    } else {
        $formErrorList['firstname'] = 'Prénom manquant';
    }

    // Vérification sur le genre
    if (!empty($_REQUEST['choiceGender'])) {
        if (in_array($_REQUEST['choiceGender'], $genderList)) {
            $choiceGender = htmlspecialchars($_REQUEST['choiceGender']);
        } else {
            $formErrorList['choiceGender'] = 'Vous n\'avez pas sélectionné un des genres proposé';
        }
    } else {
        $formErrorList['choiceGender'] = 'Genre manquant';
    }
    // Vérification sur l'upload du fichier
    if (!empty($_REQUEST['file'])) {
        $file = basename($_REQUEST['file']);

        // Vérification Extension du fichier
        $fileType = pathinfo($file, PATHINFO_EXTENSION); //pathinfo - Retourne des informations sur un chemin système + option => spécifie quel élément sera retourné
        $authorizedType = ['pdf'];
        if ($fileType != $authorizedType[0]) {
            $formErrorList['file'] = 'Seuls les fichiers PDF sont autorisés';
        } else {
            $formErrorList['file'] = 'Aucun fichier n\'a été téléchargé!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7.8</title>
</head>

<body>
    <h1>Exercice 8 Partie 7 : Les Formulaires PHP</h1>
    <!-- Test sur les données pour savoir si elles ont bien été envoyé ET qu'il n'y a pas d'erreur -->
    <?php
    if (isset($_REQUEST['register']) && empty($formErrorList)) { ?>
        <p>Bonjour <?= $choiceGender ?> <?= $firstname ?> <?= $lastname ?></p>
        <?php
        if (isset($_REQUEST['file']) && empty($formErrorList)) { ?>
            <p>Fichier téléchargé:
                <?= $file ?>
            </p>
        <?php } ?>
    <?php
    } else {
    ?>
        <!---------------------------------- Affichage du formulaire si tout est OK ------------------------------>
        <form method="POST" action="index.php">
            <select name="choiceGender">
                <option value="" disabled selected>Veuillez choisir votre civilité</option>
                <?php
                foreach ($genderList as $text => $value) { ?>
                    <option value="<?= $value ?>"><?= $text ?></option>
                <?php
                }
                ?>
            </select>
            <?php
            if (!empty($formErrorList['choiceGender'])) {
            ?>
                <span style="color:#FF0000">* <p><?= $formErrorList['choiceGender']; ?></p></span>
            <?php
            }
            ?>
            <input type="text" name="lastname" placeholder="Nom">
            <?php
            if (!empty($formErrorList['lastname'])) {
            ?>
                <span style="color:#FF0000">* <p><?= $formErrorList['lastname']; ?></p></span>
            <?php
            }
            ?>
            <input type="text" name="firstname" placeholder="Prénom">
            <?php
            if (!empty($formErrorList['firstname'])) {
            ?>
                <span style="color:#FF0000">* <p><?= $formErrorList['firstname']; ?></p></span>
            <?php
            }
            ?>
            <!--Envoi de fichier-->
            <input type="file" name="file">
            <?php
            if (!empty($formErrorList['file'])) {
            ?>
                <span style="color:#FF0000">* <p><?= $formErrorList['file']; ?></p></span>
            <?php
            }
            ?>
            <input type="submit" name="register" value="S'enregistrer">
        </form>

    <?php
    }
    ?>
</body>

</html>