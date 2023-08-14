<?php
    // conexão com o banco de dados 
    include_once("conecta.php");

    //recebendo dados enviados via GET

$recid=$_GET["id"];
// excluir o cadastro do banco com o meso ID recebido 

mysqli_query($conexao, "DELETE FROM usuarios WHERE id='$recid'");





// redirecionar 

header("location:usuarios.php");


?>