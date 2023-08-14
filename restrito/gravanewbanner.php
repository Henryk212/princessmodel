<?php
// conexão com o banco de dados 

include_once("conecta.php");

// recebendo os dados enviados pelo formulário 

$recbanner=$_FILES["fbanner"]["name"];

 //renomeando o arquivo(foto) para criptografar o nome

 $ext=strtolower(pathinfo($recbanner, PATHINFO_EXTENSION));
 $data=date("d/m/Y"); // pega a data e hora atual, em dia mes ano 
 $hora=time(); //pega a hora atual, no formato  hh/mm/ss
 $novonome=md5($recbanner.$data.$hora).".".$ext;

 // envio do arquivo para uma pasta especifica do servidor (upload do arquivo )
 move_uploaded_file($_FILES["fbanner"]["tmp_name"],"../imagens/banners/$novonome");


  // gravando os dados no banco
  mysqli_query($conexao, "INSERT INTO banners (banner)VALUES ('$recbanner')");

 header("location:banners.php");


?>