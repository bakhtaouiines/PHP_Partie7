<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7.5</title>
</head>
<body>
    <h1>Exercice 5 Partie 7 : Les Formulaires PHP</h1>
    <form action="index.php" method="POST">
        <select name="choice">
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
        </select>
        <input type="text" name="lastname" placeholder="Nom">
        <input type="text" name="firstname" placeholder="Prénom">
        <input type="submit" name="submit" value="Valider le formulaire">
    </form>
</body>
</html>