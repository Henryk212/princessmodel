<?php
include_once("conecta.php");

//recebendo dados enviados via GET

$recid=$_GET["id"];
$recfoto=$_GET["foto"];
$recpag=$_GET["pag"];
$reclimite=$_GET["limite"];

// Excluir dados gravados no banco 

mysqli_query($conexao, "DELETE FROM produtos WHERE id=$recid");

// excluir a imagem do produto 

if(file_exists("..\imagens\produtos/$recfoto")){
    unlink("..\imagens\produtos/$recfoto");
}

// contar quantos cadastros restaram no banco para definir nova quantidade de páginas 
// e retornar na pagina em que o cadastro foi excluido 

$pegadados=mysqli_query($conexao, "SELECT * FROM produtos");
$total=mysqli_num_rows($pegadados);

// total de páginas

$totalpg=ceil($total/$reclimite);

if($recpag > $totalpg){
    $recpag= $recpag-1;
}

//redirecionamento

header("location:admin.php?pag=$recpag");



?>