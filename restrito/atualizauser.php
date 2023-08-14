<?php
// conexão com o banco de dados 

include_once("conecta.php");

// recebendo dados via post 
$recid=$_POST["fid"];
$recnome=$_POST["fnome"];
$recemail=$_POST["femail"];
$recuser=$_POST["fuser"];
$recpass=$_POST["fpass"];
$recnivel=$_POST["fnivel"];

// enviando para o banco de dados as atualizações recebidas 

mysqli_query($conexao, "UPDATE usuarios SET id='$recid', nome='$recnome', email='$recemail', user='$recuser',
    pass='$recpass', nivel='$recnivel' WHERE id=$recid");

    // redirecionar 

    header("location:usuarios.php");


?>