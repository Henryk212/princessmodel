<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="..\imagens\logos\logoicon.png" rel="icon">
	<link href="..\font-awesome-4.7.0\css\font-awesome.min.css" rel="stylesheet">
	<script src="..\js\jquery-3.6.1.min.js"></script>
	<script src="..\js\slick\slick.min.js"></script>
	<link href="..\js\slick\slick-theme.css" rel="stylesheet">
	<link href="..\js\slick\slick.css" rel="stylesheet">
	<script src="..\js\script.js"></script>
	<link href="..\css\styles.css" rel="stylesheet">
	
<title>Princess Model-Área administrativa</title>
</head>
<body>
    <?php 
		include_once("header.php");
		// conexão com o banco de dados 

		include_once("conecta.php");

		// receber dados via get
		$recid=$_GET["id"];

		// selecionando usuário cadastrado que tenha o mesmo ID

		$dados=mysqli_query($conexao, "SELECT * FROM usuarios WHERE id=$recid");
		// separando os dados com  array

		$item=mysqli_fetch_array($dados);


	?>
	<center>
		<h3 style="margin:2%; margin-top:150px;">ALTERAÇÃO DE USUÁRIOS </h3>
		<form method="post" action="atualizauser.php" style="width:40%; padding-bottom:10%;" class="formulario">
		<input type="hidden" name="fid" value="<?=$item["id"]?>">
		<input type="text" name="fnome" required placeholder="Nome" class="campo" value="<?=$item["nome"]?>">		
		<input type="email" name="femail" required placeholder="E-mail" class="campo" value="<?=$item["email"]?>">		
		<input type="text" name="fuser" required placeholder="Usuário" class="campo" value="<?=$item["user"]?>">		
		<input type="password" name="fpass" required placeholder="Senha" class="campo" value="<?=$item["pass"]?>">
		<select name="fnivel" required class="campo">
			<option value="">Escolha o nível de acesso do usuário</option>
			<option value="admin"<?php if($item["nivel"]=="admin"){print("selected");}?>>Administrador</option>
			<option value="editor"<?php if($item["nivel"]=="editor"){print("selected");}?>>Editor</option>
		</select>	
		<input type="submit" value="SALVAR" class="botao">
		</form>
		<hr>
		<br><br><br>

	</center>

</body>
</html>
<?php
}else{
	$erro=md5(2);
	header("location:index.php?e=".$erro);
}
?>