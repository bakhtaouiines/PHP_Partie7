<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7.7</title>
</head>
<body>
    <h1>Exercice 7 Partie 7 : Les Formulaires PHP</h1>
    <form action="" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" spécifie le type de contenu à utiliser lors de la soumission du formulaire-->
        <select name="choice">
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
        </select>
        <input type="text" name="lastname" placeholder="Nom" value="Nemare">
        <input type="text" name="firstname" placeholder="Prénom" value="Jean">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="submit">
    </form>
    <?php
    // $targetDir = "uploads/"; spécifie le répertoire où le fichier va être placé
    $nameFile = $_FILES['fileToUpload']['name']; //"name" contient le nom qu'avait le fichier dans l'espace de l'utilisateur
    $pathFile = pathinfo($nameFile); //spécifie le chemin du fichier à télécharger
    $fileType = $pathFile['extension']; //contient l'extension de fichier du fichier
    $authorizedType = ['pdf']; 

    // Vérifications des données du formulaires + affichage
    if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['choice']))
    {
        echo $_POST['choice']. ' ' .$_POST['lastname']. ' '.$_POST['firstname'];
        
    }
    // Autoriser certains formats
    if( $fileType != $authorizedType[0])
    {?>
        <p><?= 'Uniquement les fichiers PDF sont autorisés';}?></p>
    
    
     <p><?php 
    // Upload du fichier
    if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) 
    {
        echo 'Le fichier '. basename( $_FILES['fileToUpload']['tmp_name']). ' a bien été téléchargé.';
    } else {
        echo 'Erreur au téléchargement.';
    }
    
    ?>
</body>
</html>