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
		<?php
			// conexã com o banco de dados 
			include_once("restrito/conecta.php");

			// buscando todos os produtos no banco para listar, mias serão listados apenas 8 

			$recprod=mysqli_query($conexao, "SELECT * FROM produtos ORDER BY RAND() LIMIT 8");

			// fazendo o loop para mostrar os produtos 

			while($dados=mysqli_fetch_array($recprod)){ ?>
				<div class="produtos">
					<img src="imagens\produtos/<?=$dados["foto"]?>" height="200">
					<h4><?=$dados["produto"]?></h4>
					<h3>R$:<?=number_format($dados["valor"],2,",",".")?></h3>
					<a href="descriprod.php?id=<?=$dados["id"]?>"><input type="button" value="COMPRAR"></a>
				</div>
			<?php } ?>

		

	</section>
<?php
	include_once("footer.php"); 
?>	
	

	
 
</body>
</html>

