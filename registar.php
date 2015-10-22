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
							<li><a href="registar.php" class="current">Registar</a></li>
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
						<!--<p><a href="inserir_noticia.php">Escrever Notícia</a></p>
						Pesquisar por Data<br>(formato ISO8601 "YYYY-MM-DDTHH:MM:SS")
						<form method="get" action="api/news.php">
							<br>Data inicial:<br>
							<input type="text" name="start_date" cols="50" maxlength="255" >
							<br>Data final:<br>
							<input type="text" name="end_date" cols="50" maxlength="255" >
							<br><input type="submit" value="Pesquisar">
						</form> -->
					</div>
				</div>
			</div>
		</div>
		<div id = "conteudo" action="" type="">
			<div class="container">
				<div class="wrapper">
					<div class="lateral">
						<div class="noticias_lado">
							<h2>Últimas Notícias</h2>
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
					<script type="text/javascript" src="scripts/validacao.js"></script>
					<div class="conteudo_principal">
						<div class="conteudo_centro">
							<h2> Registar </h2>
							<form id="formulario" action="verificacao_registo.php" method="POST" onsubmit="return validarRegisto(this);">
								<fieldset>
								<div class = "field">
									<label>Introduza o seu endereço de e-mail:</label>
									<input type="text" name="mail" maxlength=255 onChange="validarEmail(this,'O e-mail não é válido');"/>
								</div>
								<div class = "field">
									<label>Introduza o seu nome de utilizador:</label>
									<input type="text" name="nome" maxlength="255" />
								</div>
								<div class = "field">
									<label>Introduza a sua password:</label>
									<input type="password" name="pass" maxlength="255" />
								</div>
								<div class = "field">
									<label>Confirme a sua password:</label>
									<input type="password" name="pass2" maxlength="255" />
								</div>				
								<div class = "field">
									<input type="submit" value="Registar">
								</div>
								</fieldset>
							</form>
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