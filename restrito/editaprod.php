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

	//conexão com o banco de dados 
	
	include_once("conecta.php");

	// recebendo os dados enviados via get 

	$recid=$_GET["id"];
	$recpag=$_GET["pag"];

	// buscar o cadastro no banco que tenha o mesmo ID 


	$dados=mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$recid");

	// separando os dados com  array

	$item=mysqli_fetch_array($dados);
	
	?>
	<center>
		<h3 style="margin:2%; margin-top:150px;">ALTERAÇÃO DE PRODUTOS</h3>
		<form method="post" action="atualizaprod.php?pag=<?=$recpag?>" style="width:40%; padding-bottom:10%;" class="formulario" enctype="multipart/form-data">
		<input type="hidden" name="fid" value="<?=$item["id"]?>">
		<input type="hidden" name="fnomefoto" value="<?=$item["foto"]?>">
		<input type="text" name="fproduto" required placeholder="Produto" class="campo" value="<?=$item["produto"]?>" >
		<input type="text" name="fvalor" required placeholder="Valor" class="campo" onKeyPress="mascara(this,moeda)" value="R$ <?=number_format($item["valor"],2,",",""."?>")?>">
		<br><br>
		Tamanho:&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="P" <?php if($item["tamanho"] == "P"){print("checked");};?>> P </label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="M" <?php if($item["tamanho"] == "M"){print("checked");};?>> M </label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="G" <?php if($item["tamanho"] == "G"){print("checked");};?>> G </label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="ftamanho" required placeholder="GG" <?php if($item["tamanho"] == "GG"){print("checked");};?>> GG </label>
		<br><br>
		<textarea name="fdescri" required placeholder="Descrição" class="campo" rows="10"><?=$item["descri"]?></textarea>
		<br><br>
		<label> Lançamento: <input type="checkbox" name="flanc" <?php if($item["lanc"] == "on"){print("checked");};?>></label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label> Promoção: <input type="checkbox" name="fpromo" <?php if($item["promo"] == "on"){print("checked");};?>></label>
		<br><br><br>
		<img src="..\imagens\produtos\<?=$item["foto"]?>" width="100" align="middle">
		<input type="file" name="ffoto" >
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