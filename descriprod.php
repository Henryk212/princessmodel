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
		// conexão com o banco de dados 
		include_once("restrito\conecta.php");

		// recebendo o ID enviado via get 

		$recid=$_GET["id"];

		// buscando o ID no banco de dados 

		$recprod=mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$recid");
		// separando dados em uma array 
		$dados=mysqli_fetch_array($recprod);
	?>
	<div class="foto">
		<img src="imagens\produtos/<?=$dados["foto"]?>">
	</div>
	<div class="descri">
		Produto:
		<h2><?=$dados["produto"]?></h2>
		<br>
		<h4>Tamanho:<?=$dados["produto"]?></h4>
		<br><br>
		Valor:
		<h2>R$<?=number_format($dados["valor"],2,",",".")?></h2>
		<br><br>
		Descrição:
		<h4><?=$dados["descri"]?></h4>
		<br><br><br>

		<!-- Declaração do formulário -->  
<form method="post" target="pagseguro"  
action="https://pagseguro.uol.com.br/v2/checkout/cart.html?action=add">  
          
        <!-- Campos obrigatórios -->  
        <input name="receiverEmail" type="hidden" value="onoratok2@gmail.com">  
        <input name="currency" type="hidden" value="BRL">  
  
        <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
        <input name="itemId" type="hidden" value="<?=$dados["id"]?>">  
        <input name="itemDescription" type="hidden" value="<?=$dados["produto"]?>">  
        <input name="itemAmount" type="hidden" value="<?=number_format($dados["valor"],2,".",".")?>">  
		<br><br>
		Quantidade:
        <input name="itemQuantity" type="number" value="1" class="qtde"> 
		<br><br><br>

  
        <!-- submit do form (obrigatório) -->  
        <input type="submit" value="ADICIONAR AO CARRINHO" class="botao"/>  
          
</form>

	</div>
		
</section>
<?php
	include_once("footer.php"); 
?>	
</body>
</html>

