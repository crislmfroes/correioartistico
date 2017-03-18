<!DOCTYPE html>
<html>

	<head>
		<link rel="icon" href="icone.png">
		<title>
			Correio Artístico
		</title>

		<meta charset="UTF-8">

		<style rel="stylesheet">

			body {
				background-image: url(a.jpg);
				background-position: center;
			}

		</style>

	</head>

	<style>

		.select {
			width: 270px;
			height: 30px;
			text-align: center;
			font-size: 20px;
		}

		.btn-menu {
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			border-radius: 0;
			border: 0;
			font-family: Arial;
			color: #ff00ea;
			font-size: 23px;
			padding: 11.5px;
			margin: -4px;
			background: #381c42;
			text-decoration: none;
			transition: background-color 0.3s;
			cursor: pointer;
			position: relative;
			left: 4px;
		}

		.btn-menu:hover {
		  background: #4e1b54;
		  text-decoration: none;
		}

		select#nomes:hover {
			background-color: rgba(255,255,255,.5);
			cursor: pointer;
		}

		div#option {
			text-align: center;
			font-size: 20px;
		}


		div#interface {
			width:1280px;
			height:1000px;
			background-color: rgba(255,255,255,.5);
			margin: 20px auto 10px auto;
			box-shadow: 0px 0px 20px black;
			padding: 10px;
		}

		nav#menu {
			display: block;
		}

		nav#menu ul {
			list-style: none;
			position: relative;
			top: -27px;
			text-align: left;
			left: -36px;
		}

		nav#menu li {
			display: inline-block;
			background-color: #381c42;
			padding: 11.9px;
			margin: -4px;
			transition: background-color 0.3s;
		}

		nav#menu li:hover {
			background-color: #4e1b54;
		}

		nav#menu a {
			color: #ff00ea;
			text-decoration: none;
		}

		nav#menu a:hover {
			color: #dcb9d9;
			transition: color 0.3s;
		}

		header#cabecalho {
			border-bottom: 1px #606060 solid;
			height: 200px;

		}

		body {
			font-family: sans-serif;
			font-size: 18pt;
			text-align: justify;
		}

		p {
			height: 30px;
		}


	</style>

	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
		</script>

		<script type="text/javascript">
	      function mostra() {
	        var menu = document.querySelector('nav');
	        menu.style.display = 'block';
	      }
	      function oculta() {
	        var menu = document.querySelector('nav');
	        menu.style.display = 'none';
	      }
	    </script>

		<div id="interface">

			<header id="cabecalho"  style="border-style: none;">
				<img src="logo.jpg"/>

				<button class="btn-menu" onmouseover="mostra()" onmouseout="oculta()">≡</button>

				<nav id="menu" style="display: none;" onmouseover="mostra()" onmouseout="oculta()">
					<ul>
						<li><a href="index.html"> HOME </a></li>
						<li><a href="carta.html"> CARTA </a></li>
					</ul>
				</nav>
			</header>

			<form id="f1">
			<div style="text-indent: 60px;">
				<p></p>
				<p><label for="nomes"> Selecione seu nome: </label>
				<input type="text" list="option" placeholder="Seu nome/ núm. matricula">

					<datalist id="option">
						<option> 11030297 - Adrian </option>
						<option> 11030278 - Alan </option>
						<option> 11030285 - Bernardo </option>
						<option> 11030276 - Brenda </option>
						<option> 11030277 - Caroline </option>
						<option> 11030283 - Cristhian </option>
						<option> 11030266 - Davi </option>
						<option> 11030281 - Guilherme </option>
						<option> 11030288 - Helena </option>
						<option> 11030274 - João </option>
						<option> 11030298 - Kanon </option>
						<option> 11030265 - Lívia </option>
						<option> 11030289 - Lorrana </option>
						<option> 11030175 - Luis </option>
						<option> 11030279 - Maurício </option>
						<option> 11030260 - Mouses </option>
						<option> 11030253 - Rodrigo </option>
						<option> 11030292 - Suélen </option>
						<option> 11030247 - Thamyris </option>
						<option> 11030287 - Vitor </option>
						<option> 11030280 - Zaidnei </option>

						<option> 11040277 - Ana Carolina </option>
						<option> 11040295 - Ana Carolina </option>
						<option> 11040276 - Beatriz </option>
						<option> 11040285 - Breno </option>
						<option> 11040284 - Fabyanne </option>
						<option> 11040296 - Flórence </option>
						<option> 11040300 - Gabriel </option>
						<option> 11040287 - Gloria </option>
						<option> 11040269 - Helen </option>
						<option> 11040292 - Henrique </option>
						<option> 11040286 - Isabel </option>
						<option> 11040280 - Janaina </option>
						<option> 11040281 - Johan </option>
						<option> 11040270 - Juliana </option>
						<option> 11040264 - Larissa </option>
						<option> 11040283 - Larissa </option>
						<option> 11040271 - Lauren </option>
						<option> 11040265 - Lídia </option>
						<option> 11040282 - Lívia </option>
						<option> 11040272 - Lorayne </option>
						<option> 11040239 - Lucas </option>
						<option> 11040274 - Maíra </option>
						<option> 11040244 - Marco Antônio </option>
						<option> 11040298 - Maria Rita </option>
						<option> 11040256 - Matheus </option>
						<option> 11040229 - Mikaela </option>
						<option> 11040289 - Rafaella </option>
						<option> 11040275 - Thalya </option>
						<option> 11040228 - Larissa </option>
					</datalist>
					<input type="button" id="teste" value="clica ae" onclick="revel_match()" >


				</p>
			</div>
			<div style="text-indent: 60px;">
				Número da carta que deve ser adquirida: 3
				Da Turma: 2-C;
			</div>
			</form>
		</div>
		<script>
			var nome = document.getElementById('option');
			var par = ""; // resultado da carta

			function revel_match(){
				var cartas = JSON.parse(
					<?php
					$data_estd = 'u343668054_kmkz';
					$connect = mysql_connect('mysql.hostinger.com.br', 'u343668054_kmkz', 'c11bb875ddef1f7');
					mysql_select_db($data_estd, $connect);
					$cartas = mysql_query("SELECT numero, estudantes FROM cartas");
					echo $cartas;
					?>
				);
			}

		</script>
	</body>
</html>
