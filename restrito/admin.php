<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="imagens\logos\logoicon.png" rel="icon">
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

	<p class="menu" style="text-align:left;">
		<a href="cadnewprod.php"><i class="fa fa-shopping-cart"></i>CADASTRO DE PRODUTOS</a>
	</p>
	<form action="admin.php" method="post" style="width: 40%; float: right;">
		<input type="search" name="fbusca" class="campo" placeholder="O que você esta procurando ?" style="width: 80%; float: left; padding: 15px;">
		<input type="submit" value="procurar" class="botao" style="width: 20%";>
	</form>	
	<br>
	<table width="100%" cellpadding="10" cellspacing="0" class="linhas">
		<tr align="center" height="40">
			<td><strong>Foto</strong></td>
			<td><strong>Produto</strong></td>
			<td><strong>Tamanho</strong></td>
			<td><strong>Preço</strong></td>
			<td><strong>Descrição</strong></td>
			<td><strong>Lançamento</strong></td>
			<td><strong>Promoção</strong></td>

		</tr>
		<?php
		// conexão com o banco de dados 
			include_once("conecta.php");

			if($_GET){
				$pagina=$_GET["pag"];
			}else{
				$pagina=1;
			}

			// variavel que contem a quantidade de cadastros que aparece por página

			$limite=4;

			// determinar por qual cadastro inicia cada página 

			$inicio=$pagina*$limite-$limite;

			// buscando todos os produtos para serem listados
			if(isset($_POST["fbusca"])){ 
			$recbusca=$_POST["fbusca"];
			if($recbusca !=""){
				$dados=mysqli_query($conexao, "SELECT*FROM produtos WHERE produto 
					LIKE '%$recbusca%' OR descri LIKE '%$recbusca%' ORDER BY id DESC ");
			}}else{
				$dados=mysqli_query($conexao, "SELECT*FROM produtos ORDER BY id DESC 
				LIMIT $inicio, $limite");
			}
			//criando um laço de repetição para listar todos os produtos
			while($item=mysqli_fetch_array($dados)){ ?>
				<tr>
					<td align="center" width="5%">
						<img src="..\imagens\produtos\<?=$item["foto"]?>" width="50">
					</td>
					<td width="25%" align="center"><?=$item["produto"]?></td>
					<td width="25%" align="center"><?=$item["tamanho"]?></td>
					<td width="10%" align="center">R$<?=number_format($item["valor"],2,",",".")?></td>
					<td><?=substr($item["descri"],0,100)." ..."?></td>
					<td width="10" align="center"><?=$item["lanc"]?></td>
					<td width="10" align="center"><?=$item["promo"]?></td>

					<td class="iconedit"><a href="editaprod.php?id=<?=$item["id"]?>&pag=<?=$pagina?>"><i class="fa fa-edit"></i></a></td>

					<td class="iconedit"><?php if($_SESSION["nivel"]== "admin"){?><a href="#" onclick="verifica('<?=$item["id"]?>','<?=$item["foto"]?>','<?=$pagina?>','<?=$limite?>')">
					<i class="fa fa-trash"></i></a><?php }?></td>
				</tr>
		<?php }?>
		<tr align="center">
			<td colspan="9">
				<hr>
				<?php
					// buscar todos os dados da tabela para saber quantos produtos tem cadastrado 
					$pegadados=mysqli_query($conexao, "SELECT * FROM produtos");

					// contando quantos tem (conta linhas )

					$total=mysqli_num_rows($pegadados);

					$totalpg=ceil($total/$limite); // comando ceil arredonda a conta para cima, não gerando numeros quebrados 

					$anterior=$pagina-1;
					$proximo=$pagina+1;

					if($pagina >  1){
						print("<a href='admin.php?pag=1' title='Inicio' class='iconpg'>
						<i class='fa fa-backward'></i></a>");
						print("<a href='admin.php?pag=$anterior' title='Voltar' class='iconpg'>
						<i class='fa fa-step-backward'></i></a>");
					}
					print("<strong><big>".$pagina."de".$totalpg."</big></strong>");
					if($pagina<$totalpg){
						print("<a href='admin.php?pag=$proximo' title='Próximo' class='iconpg'>
						<i class='fa fa-step-forward'></i></a>");
						print("<a href='admin.php?pag=$totalpg' title='Último' class='iconpg'>
						<i class='fa fa-step-forward'></i></a>");
					}
				?>
	</table>
	<br>
	<br>
	<br>



</body>
</html>
<?php
}else{
	$erro=md5(2);
	header("location:index.php?e=".$erro);
}
?>