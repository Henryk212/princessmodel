<?php
    //dados para a conexão local

    $host="localhost";
    $usuario="root";
    $senha="";
    $nomedobanco="princess_2005";


    //criando a conexão
    $conexao=mysqli_connect($host, $usuario, $senha, $nomedobanco);

    //validação
    if(!$conexao){
        print("Ocorreu uma falha de conexão com o banco de dados, favor contate o administrador do sistema");
    }
?>