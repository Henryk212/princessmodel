<?php
    // conexão com o banco de dados 

    include_once("conecta.php");

    // recebendo os dados via get para função js

    $recbanner=$_GET["banner"];

    //excluido a imagem do banner 

    unlink("../imagens/banners/$recbanner");

    //excluir cadastro do banco 

    mysqli_query($conexao, "DELETE FROM banners WHERE banner='$recbanner'");

    //redirecionamento 

    header("location:banners.php");

?>