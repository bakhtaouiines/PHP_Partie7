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
    <form action="" method="POST">
        <select name="choice">
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
        </select>
        <input type="text" name="lastname" placeholder="Nom" value="Nemare">
        <input type="text" name="firstname" placeholder="Prénom" value="Jean">
        <input type="submit" name="submit">
    </form>

    <p>
    <?php
    if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['choice']))
        {
        echo $_POST['choice']. ' ' .$_POST['lastname']. ' '.$_POST['firstname'];
        }
    ?>
    </p>
</body>
</html>