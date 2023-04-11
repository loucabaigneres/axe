<!-- Back-end du formulaire d'inscription -->
<?php 
require_once '../conf/database.php';

if (isset($_POST['envoi'])) {
    if (!empty($_POST['user_name']) && !empty($_POST['user_nickname']) && !empty($_POST['user_mail']) && !empty($_POST['user_password']) && !empty($_POST['user_pic'])) {
        $user_name = htmlspecialchars($_POST['user_name']);
        $user_nickname = htmlspecialchars($_POST['user_nickname']);
        $user_mail = htmlspecialchars($_POST['user_mail']);
        $user_password = sha1($_POST['user_password']);
        $user_pic = htmlspecialchars($_POST['user_pic']);
        $data = [$user_name, $user_nickname, $user_mail, $user_password, $user_pic];

        $user_insert = $database->prepare('INSERT INTO user(user_name, user_nickname, user_mail, user_password, user_pic)VALUES(?, ?, ?, ?, ?)');
        $user_insert->execute($data);
        header('Location: ../index.php');
        die();
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>

<!-- Back-end du formulaire de connexion -->

