<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7.6</title>
</head>
<body>
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