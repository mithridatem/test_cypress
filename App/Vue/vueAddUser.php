<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/asset/style/style.css">
    <title>Ajouter un compte : </title>
</head>
<body>
    <form action="" method="post">
        <h1>Ajouter un compte</h1>
        <label for="nom">Saisir votre nom :</label>
        <input type="text" name="nom">
        <label for="prenom">Saisir votre prénom :</label>
        <input type="text" name="prenom">
        <label for="mail">Saisir votre mail :</label>
        <input type="email" name="mail">
        <label for="mdp">Saisir un mot de passe :</label>
        <input type="password" name="mdp">
        <input type="submit" value="Ajouter" name="submit">
        <div id="msgzone"><?=$msg?></div>
    </form>
    
</body>
</html>