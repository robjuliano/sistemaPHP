<?PHP


session_start();
unset($_SESSION["login1"]);
header("refresh:0; url=index.php");


?>