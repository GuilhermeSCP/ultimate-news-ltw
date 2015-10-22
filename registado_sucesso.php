<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ultimate News</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="home.css">
	</head>
	<body>
		<div id="cabecalho">
			<div class="bg">
				<div class="container">
					<div class="cima">
						<div class="wrapper">
							<div class="nome_site">
								<h2>Ultimate News</h2>
								<h3>Tás a ler?	...  Tás a ler?  ...  Tás a ler?</h3>
							</div>
							<ul class="sessao">
								<?php
								if(isset($_SESSION['nome']))
									echo "<li><h4>Tudo bem ".$_SESSION['nome']."? <a href='logout.php'>Sair</a></h4></li>";
								else 
									echo "<li><h4>Não tem sessão activa.</h4></li>";
								?>
							</ul>
						</div>
					</div>
					<div class="meio">
						<ul class="menu">
							<li><a href="home.php">Home</a></li>
							<li><a href="todas_noticias.php">Noticias</a></li>
							<li><a href="registar.php">Registar</a></li>
							<li><a href="login.php">Login</a></li>
						</ul>
					</div>
					<div class = "baixo">
						<?php
						if(isset($_SESSION['permissao'])){
							if($_SESSION["permissao"]=="0"){
								echo "Pesquisar por Data<br>(formato ISO8601 'YYYY-MM-DDTHH:MM:SS')
								<form method='get' action='api/news.php'>
								<br>Data inicial:<br>
								<input type='text' name='start_date' cols='50' maxlength='255' >
								<br>Data final:<br>
								<input type='text' name='end_date' cols='50' maxlength='255' >
								<br><input type='submit' value='Pesquisar'>
								</form>";
								}
							else if($_SESSION["permissao"]=="1"){
								echo "<p><a href='inserir_noticia.php'>Escrever Notícia</a></p>";
								echo "Pesquisar por Data<br>(formato ISO8601 'YYYY-MM-DDTHH:MM:SS')
								<form method='get' action='api/news.php'>
								<br>Data inicial:<br>
								<input type='text' name='start_date' cols='50' maxlength='255' >
								<br>Data final:<br>
								<input type='text' name='end_date' cols='50' maxlength='255' >
								<br><input type='submit' value='Pesquisar'>
								</form>";
								}
							else if($_SESSION["permissao"]=="2"){
								echo "<p><a href='admin.php'>Admnistrar página</a></p>";
								echo "<p><a href='inserir_noticia.php'>Escrever Notícia</a></p>";
								echo "Pesquisar por Data<br>(formato ISO8601 'YYYY-MM-DDTHH:MM:SS')
								<form method='get' action='api/news.php'>
								<br>Data inicial:<br>
								<input type='text' name='start_date' cols='50' maxlength='255' >
								<br>Data final:<br>
								<input type='text' name='end_date' cols='50' maxlength='255' >
								<br><input type='submit' value='Pesquisar'>
								</form>";
							}
						}
						else 
							echo "Pesquisar por Data<br>(formato ISO8601 'YYYY-MM-DDTHH:MM:SS')
								<form method='get' action='api/news.php'>
								<br>Data inicial:<br>
								<input type='text' name='start_date' cols='50' maxlength='255' >
								<br>Data final:<br>
								<input type='text' name='end_date' cols='50' maxlength='255' >
								<br><input type='submit' value='Pesquisar'>
								</form>";
						?>
					</div>
				</div>
			</div>
		</div>
		<div id ="conteudo">
			<div class="container">
				<div class="wrapper">
					<div class="lateral">
						<div class="noticias_lado">
							<h2>Ultimas Noticias</h2>
							<dl class="ultimas_noticias">
								<?php
									$db = new PDO('sqlite:database.db');
									$result = $db->query('SELECT * FROM noticias ORDER BY data desc LIMIT 20');
									foreach($result as $row)
									{
										echo "<dt>". utf8_decode($row['data'])."</dt>";
										echo "<dd>". utf8_decode($row['titulo'])."</dd>";
									}
								?>
							</dl>
						</div>
					</div>
					<div class="conteudo_principal">
						<div class="conteudo_centro">
							<h2> Sucesso! </h2>
							O utilizador foi registado com sucesso, pode agora voltar à página principal e fazer login com a sua conta.
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="rodape">
			<div class="bg">
				<div class="texto_rodape">
						<h4>Desenvolvido por: Daniel Teixeira e Guilherme Martins</h4>
				</div>
			</div>
		</div>
	</body>
</html>