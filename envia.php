<?php

if(isset($_POST['femail']) && !empty($_POST['femail'])){
	// receber dados enviado pelo formulário 

	$recnome= addslashes($_POST["fnome"]);
	$recemail=addslashes($_POST["femail"]);
	$recassunto= addslashes($_POST["fassunto"]);
	$recmsg=addslashes($_POST["fmsg"]);


	// definir destinatario (Quem vai receber )
	$desinatario="onoratok2@gmail.com";
	$assunto="Contato pelo site";

	// configurar a mensagem que será enviada 

	
	 $arquivo= 
       "Nome: ".$recnome. "\n".
      "Email: ".$recemail. "\n".
      "Assunto: ".$recassunto. "\n".
     "Mensagem: ".$recmsg. ""; 
      
// ocnfiguração do envio 

$headers .= "From: onoratok2@gmail.com" . "\r\n" ."Replay-To" .$recemail."\r\n"."X=Mailer:PHP/".phpversion();

// comando de envio

mail($desinatario, $recassunto, $arquivo, $headers);

//redirecionamento

header("location:index.php?send=1");

}
?>
