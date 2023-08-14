<?php
    //dados para a conexão local

    $host="localhost";
    $usuario="cd6tecno_onorato";
    $senha="princess@2005";
    $nomedobanco="cd6tecno_princess_2005_onorato";


    //criando a conexão
    $conexao=mysqli_connect($host, $usuario, $senha, $nomedobanco);

    //validação
    if(!$conexao){
        print("Ocorreu uma falha de conexão com o banco de dados, favor contate o administrador do sistema");
    }
?>