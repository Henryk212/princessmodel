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
		<h3 style="margin:2%; margin-top:150px;">CADASTRO DE NOVOS USUÁRIOS </h3>
		<form method="post" action="gravanewuser.php" style="width:40%; padding-bottom:10%;" class="formulario">
		<input type="text" name="fnome" required placeholder="Nome" class="campo">		
		<input type="email" name="femail" required placeholder="E-mail" class="campo">		
		<input type="text" name="fuser" required placeholder="Usuário" class="campo">		
		<input type="password" name="fpass" required placeholder="Senha" class="campo">
		<select name="fnivel" required class="campo">
			<option value="">Escolha o nível de acesso do usuário</option>
			<option value="admin">Administrador</option>
			<option value="editor">Editor</option>
		</select>	
		<input type="submit" value="SALVAR" class="botao">
		</form>
		<hr>
		<br><br><br>
		<table width="60%" class="linhas" cellpadding="15" style="border:2px solid #999999">
			<tr>
				<td><strong>Nome</strong></td>
				<td><strong>E-mail</strong></td>
				<td><strong>Nível de Acesso</strong></td>
			</tr>
			<?php
				// conexão com o banco de dados 

				include_once("conecta.php");

				// buscando todos os usuarios do banco 

				$dados=mysqli_query($conexao, "SELECT * FROM usuarios ORDER BY id DESC");

				//loop para listar todos os usuários 

				while($item=mysqli_fetch_array($dados)){ ?>
					<tr>
						<td><?=$item["nome"]?></td>
						<td><?=$item["email"]?></td>
						<td width="170" align="center"><?=$item["nivel"]?></td>
						<td width="10" class="iconedit"><a href="#"><a href="editauser.php?id=<?=$item["id"]?>"><i class="fa fa-edit"></i></a></td>
						<td width="10" class="iconedit"><a href="#" onclick="validauser(<?=$item["id"]?>)"><i class="fa fa-trash"></i></a></td>

					</tr>
				<?php } ?>
				<tr><td style="padding:0;">&nbsp;</tr></td>
		</table>
	</center>

</body>
</html>
<?php
}else{
	$erro=md5(2);
	header("location:index.php?e=".$erro);
}
?>