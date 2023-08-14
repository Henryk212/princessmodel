<?php
    // conexão com o banco de dados 

    include_once("conecta.php");

    //recebendo dados do formulário

    $recnome=$_POST["fnome"];
    $recemail=$_POST["femail"];
    $recuser=$_POST["fuser"];
    $recpass=$_POST["fpass"];
    $recnivel=$_POST["fnivel"];

    //gravando dados recebidos no banco 

    mysqli_query($conexao, "INSERT INTO usuarios (nome, email, user, pass, nivel) VALUES ('$recnome','$recemail',
    '$recuser','$recpass','$recnivel')");

    // redirecionando 

    header("location:usuarios.php");

?>