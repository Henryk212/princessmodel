<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="imagens\logos\logoicon.png" rel="icon">
	
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="js/jquery-3.6.1.min.js"></script>
	<script src="js/slick/slick.min.js"></script>
	<link href="js/slick/slick-theme.css" rel="stylesheet">
	<link href="js/slick/slick.css" rel="stylesheet">
	<script src="js/script.js"></script>
	<link href="css/styles.css" rel="stylesheet">
	
<title>Princess Model-Especialisata em moda feminina</title>
</head>

<body>
<?php 
	include_once("nav.php"); 
	include_once("header.php"); 
		
?>
	<section class="corpo">
	<article style="width: 15%; float: left; border-right: 5px solid #666666;">
		<p class="barrafiltro">FILTROS</p>
		<form method="post" action="loja.php" class="formfiltro">
			<strong>Tamanho:</strong><br>
			<label><p><input type="checkbox" value="P" name="ftamanho">P</p></label>
			<label><p><input type="checkbox" value="M" name="ftamanho">M</p></label>
			<label><p><input type="checkbox" value="G" name="ftamanho">G</p></label>
			<label><p><input type="checkbox" value="GG" name="ftamanho">GG</p></label>
			<br><br><br><br>
			<strong>Preço:</strong>
			<br><br>
			<input type="range"min="0" max="1000" step="10" value="0"
			 oninput="displaymin.value=value" onChange="displaymin.value=value"><br>
			 <strong><small>Valor mínimo</small></strong><br>
			 R$<input type="number" id="displaymin" value="0" readonly class="campo" style="width:45%;border: none;
			padding:0; padding-left: 5%; padding-top: 8%; text-align: center;">,00
			<br>
			<input type="range"min="0" max="10000" step="10" value="0"
			 oninput="displaymax.value=value" onChange="displaymax.value=value"><br>
			 <strong><small>Valor máximo</small></strong><br>
			 R$<input type="number" id="displaymax" value="0" readonly class="campo" style="width:45%;border: none;
			padding:0; padding-left: 5%; padding-top: 8%; text-align: center;">,00 
			<br><br><br>
			<input type="submit" value="FILTRAR" class="botao" style="width: 146%; margin-left: -55px;">

		</form>
	</article>
	<article style="width: 85%; float: left;">

	

		<?php
			// conexã com o banco de dados 
			include_once("restrito/conecta.php");

			// buscando todos os produtos no banco para listar, mias serão listados apenas 8 

			if($_GET){
				$rectype=$_GET["type"];
				$recprod=mysqli_query($conexao, "SELECT * FROM produtos WHERE $rectype='on' ORDER BY RAND()");
			}else{
				$recprod=mysqli_query($conexao, "SELECT * FROM produtos ORDER BY RAND()");
			}
		
			
			// fazendo o loop para mostrar os produtos 

			while($dados=mysqli_fetch_array($recprod)){ ?>
				<div class="produtos" style="width: 31%;">
					<img src="imagens\produtos/<?=$dados["foto"]?>" height="200" style="width:auto;">
					<h4><?=$dados["produto"]?></h4>
					<h3>R$:<?=number_format($dados["valor"],2,",",".")?></h3>
					<a href="descriprod.php?id=<?=$dados["id"]?>"><input type="button" value="COMPRAR"></a>
				</div>
			<?php } ?>

		
		</article>			
	</section>
<?php
	include_once("footer.php"); 
?>	
	

	
 
</body>
</html>

