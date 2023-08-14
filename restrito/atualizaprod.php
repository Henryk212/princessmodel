<?php
// conexão com banco de dados 
include_once("conecta.php");


//recebe dados enviados pelo formulário 

$recpag=$_GET["pag"];
$recid=$_POST["fid"];
$recnomefoto=$_POST["fnomefoto"];
$recproduto=$_POST["fproduto"];
$recvalor=$_POST["fvalor"];
$rectamanho=$_POST["ftamanho"];
$recdescri=$_POST["fdescri"];
$reclanc=$_POST["flanc"];
$recpromo=$_POST["fpromo"];
$recfoto=$_FILES["ffoto"]["name"];

//envio da nova foto caso tenha sido feita a troca 

if($recfoto !=""){
    move_uploaded_file($_FILES["ffoto"]["tmp_name"],"..\imagens\produtos/$recnomefoto");
}

//ajustar o valor no padrão do banco de dados para gravar por cima 
$recvalor= str_replace("R$","",$recvalor);
$recvalor= str_replace(".","",$recvalor);
$recvalor= str_replace(",",".",$recvalor);




// enviando para o banco de dados as atualizações recebidas 

mysqli_query($conexao, "UPDATE produtos SET produto='$recproduto', valor='$recvalor', tamanho='$rectamanho', descri='$recdescri',
    lanc='$reclanc', promo='$recpromo' WHERE id=$recid");



header("location:admin.php?pag=$recpag");




?>