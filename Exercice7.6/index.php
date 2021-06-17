<?php
$genderList = ['Monsieur' => 'M', 'Madame' => 'Mme'];
$formErrorList = [];
// je vérifie que le formulaire a bien été soumis
if (isset($_REQUEST['register'])) {
    // Vérification REGEX + valeur Nom                                  
    $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/';

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
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7.6</title>
</head>

<body>
    <h1>Exercice 6 Partie 7 : Les Formulaires PHP</h1>
    <?php
    if (isset($_REQUEST['register']) && empty($formErrorList)) { ?>
        <p><?= $firstname ?></p>
    <?php
    } else {
    ?>
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
            if(!empty($formErrorList['choiceGender'])) {
                ?>
            <span class="error">* <p><?= $formErrorList['choiceGender']; ?></p></span>
                <?php
            }
            ?>     
            <input type="text" name="lastname" placeholder="Nom">
            <?php
            if(!empty($formErrorList['lastname'])) {
                ?>
            <span class="error">* <p><?= $formErrorList['lastname']; ?></p></span>
                <?php
            }
            ?>  
            <input type="text" name="firstname" placeholder="Prénom">
            <?php
            if(!empty($formErrorList['firstname'])) {
                ?>
            <span class="error">* <p><?= $formErrorList['firstname']; ?></p></span>
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