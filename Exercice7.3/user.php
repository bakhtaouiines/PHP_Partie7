<?php
    if(!empty($_GET['lastname'])) {                                      //empty — Détermine si une variable est vide
        $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/' ;{
            if(preg_match($regex, $_GET['lastname'])) {                 //preg_match — Effectue une recherche de correspondance avec une expression rationnelle standard
                $lastname = htmlspecialchars($_GET['lastname']);        //htmlspecialchars — Convertit les caractères spéciaux en entités HTML
            } else {
                $lastNameAlert = 'Les caractères saisis ne sont pas valides. Seuls les lettres avec des accents le sont pour le nom.';
                }
            }
        } else {
            $lastNameAlert = 'Nom de famille manquant';
        }

    if(!empty($_GET['firstname'])) {
        $regex = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/' ;{
            if(preg_match($regex, $_GET['firstname'])){            
                $firstname = htmlspecialchars($_GET['firstname']); 
            } else {
                $firstNameAlert = 'Les caractères saisis ne sont pas valides. Seuls les lettres avec des accents le sont pour le prénom.';
                }
            }
        } else {
            $firstNameAlert = 'Prénom manquant';
        }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7.3</title>
</head>
<body>
    <p><?= isset($lastname) ? $lastname : $lastNameAlert;?></p>
    <p><?= isset($firstname) ? $firstname : $firstNameAlert;?></p>
</body>
</html>
<!-- regex nom /^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/ -->