<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Princess Model- Área Administrativa</title>
<link href="../imagem/logos/logoicon.png" rel="icon">
	<link href="../css/styles.css" rel="stylesheet">
</head>

<body>
	<img src="../imagem/logos/logo.png" alt="" width="120">
	<center>
		<h2>Área Administrativa</h2>
		<br><br><br><br>
		<h3>Acesso Restrito</h3>
		<br><br><br><br><br><br>
		<h4>Favor entar com usuário e senha</h4>
		<br>
		<form method="post" action="login.php" style="width: 20%">
			<input type="text" placeholder="Usuario" required name="fuser" class="campo">
			<input type="password" placeholder="Senha" required name="fpass" class="campo">
			<input type="submit" class="botao" value="ENTRAR">
		</form>
		<?php
			if($_GET){
				$recerro=$_GET["e"];
				if($recerro == md5(1)){
					$resposta= "Usuário e/ou senha incorreto(s), favor tentar novamente";
				}else if($recerro == md5(2)){
					$resposta="A página que esta tentando acessar é restrita, favor entrar com usuário e senha";
				}
				print("<h3 style='color:#FF0000; margin-top:4%;'>".$resposta."</h3>");
			}
		?>
	</center>
	
</body>
</html>