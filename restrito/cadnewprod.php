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
    <?php include_once("header.php");?>
	<center>
		<h3 style="margin:2%; margin-top:150px;">CADASTRO DE NOVOS PRODUTOS</h3>
		<form method="post" action="gravanewprod.php" style="width:40%; padding-bottom:10%;" class="formulario" enctype="multipart/form-data">
		<input type="text" name="fproduto" required placeholder="Produto" class="campo" >
		<input type="text" name="fvalor" required placeholder="Valor" class="campo" onKeyPress="mascara(this,moeda)" >
		<br><br>
		Tamanho:&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="P">P</label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="M">M</label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="G">G</label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="GG">GG</label>
		<br><br>
		<textarea name="fdescri" required placeholder="Descrição" class="campo" rows="10"></textarea>
		<br><br>
		<label> Lançamento: <input type="checkbox" name="flanc"></label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label> Promoção: <input type="checkbox" name="fpromo"></label>
		<br><br><br>
		<input type="file" name="ffoto" required class="campo">
		<input type="submit" value="SALVAR" class="botao">
	</center>

</body>
</html>
<?php
}else{
	$erro=md5(2);
	header("location:index.php?e=".$erro);
}
?>