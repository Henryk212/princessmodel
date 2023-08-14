<img src="..\imagens\logos\logo.png" alt="Logo Princess" width="150" align="left">
	<p style="text-align:right; padding: 2%; font-weight: bold;">Olá <?=$_SESSION["user"]?></p>
	<h2 align="center">Seja bem vindo a área administrativa da Princess Model </h2>
	<nav class="links">
		<a href="admin.php"><i class="fa fa-archive"></i>PRODUTOS</a>
		<a href="banners.php"><i class="fa fa-map-o"></i>BANNERS</a>
    <?php
        if($_SESSION["nivel"] == "admin"){?>
		<a href="usuarios.php"><i class="fa fa-user"></i>USUÁRIOS</a>
    <?php } ?>
        <a href="logoff.php"><i class="fa fa-sign-out"></i>SAIR</a>
	</nav>