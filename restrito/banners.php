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
		<h3 style="margin:2%; margin-top:150px;">CADASTRO DE NOVOS BANNERS</h3>
		<form method="post" action="gravanewbanner.php" style="width:40%; padding-bottom:10%;" class="formulario" enctype="multipart/form-data">
		<input type="file" name="fbanner" required class="campo">
		<input type="submit" value="SALVAR" class="botao">
		</form>
		<hr style="margin-bottom:10px">

		<table>
			<?php
				// conexão com o banco de dados 

				include_once("conecta.php");

				// buscra todos os banners para listar 

				$allbanners=mysqli_query($conexao, "SELECT * FROM banners ORDER BY id DESC");

				while($item=mysqli_fetch_array($allbanners)){?>
				<tr>
					<td><img src="../imagens/banners/<?=$item["banner"]?>" width="300"></td>
					<td class="iconedit" style="width: 40px;" align="right">
						<?php if($_SESSION["nivel"]=="admin"){ ?>
						<a href="#" onclick="verificabanner('<?=$item["banner"]?>')"><i class="fa fa-trash"></i></a>
						<?php } ?>	
					</td>
				</tr>	

				<?php } ?>
			
			


		</table>

	</center>
	<p style="margin:100px;">&nbsp;</p>

</body>
</html>
<?php
}else{
	$erro=md5(2);
	header("location:index.php?e=".$erro);
}
?>