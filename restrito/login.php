<?php

// dados usuario 

$recuser=$_POST["fuser"];
$recpass=$_POST["fpass"];

// conectar ao banco 
include_once("conecta.php");

// dados a pegar do banco, verifiando se existe usuário e senha cadastrado

$login=mysqli_query($conexao, "SELECT * FROM usuarios WHERE user='$recuser' AND pass='$recpass'");

// validando o nosso login 

if(mysqli_num_rows($login)> 0){
    $dados=mysqli_fetch_array($login);
    $recnome=$dados["nome"];
    $recnivel=$dados["nivel"];
    session_start();
    $_SESSION["user"]=$recnome;
    $_SESSION["nivel"]=$recnivel;
    header("location:admin.php");
}else{
    //criptografia da mensagem de erro
    $erro=md5(1);
    header("location:index.php?e=".$erro);

}

?>