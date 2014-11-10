
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "logindb");

$dbm = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

session_start();
//kolla om inloggad
if (isset($_SESSION["login"])) {
    echo "Logged in";
} else {


    
    
    $sql = "SELECT * FROM login";

    $stmt = $dbm->prepare($sql);

    $stmt->execute();

    $login = $stmt->fetchAll();
    var_dump($login);

    //skapa session för login
    $_SESSION["login"] = "SELECT * FROM login WHERE username='$username' and password='$password'";
    echo $_SESSION["login"];
}


if (isset($_POST["action"])) {
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width">
    </head>
    <body>
        <form method="POST">
            <label>Username:</label>
            <br>
            <input name="username" type="text" placeholder ="Username">
            <br>
            <br>
            <label>Password:</label>
            <br>
            <input name="password" type="password" placeholder="Password">
            <br>
            <br>
            <input type="submit" name="action" value="Login">
            <br>
            <a href="kill.php">Kill</a>
        </form>

    </body>
</html>