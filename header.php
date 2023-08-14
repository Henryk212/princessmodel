<header>
	<div class="slides">
		<?php
			//conexão com o banco de dados 

			include_once("restrito/conecta.php");

			//buscar todos os banner na tabela 

			$allbanners=mysqli_query($conexao, "SELECT * FROM banners ORDER BY id DESC");

			while($item=mysqli_fetch_array($allbanners)){ ?>
				<div>
					<img src="imagens\banners/<?=$item["banner"]?>">
				</div>	
		<?php } ?>
			
			
	</div>
	</header>