<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["nivel"]);
session_destroy();

header("location:index.php");

?>