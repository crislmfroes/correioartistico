<?php

	error_reporting() (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	$nome = $_POST['nome'];
	$turma = $_POST['turma'];
	$matricula = intval($_POST['matricula']);
	$carta = intval($_POST['carta']);
	$rua = $_POST['endereco'];
	$comp = $_POST['comp'];
	$endereco = $_POST['endereco'];
	$cep = intval($_POST['cep']);
	$local = $_POST['local'];
	$acao = $_POST['acao'];

	$data_estd = 'u343668054_kmkz';

	$estd_table = "estudantes(
		id INT(3) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
		matricula INT(8) UNSIGNED NOT NULL,
		nome VARCHAR(30) NOT NULL,
		turma ENUM('2C','2D'),
		cep INT(8) UNSIGNED NOT NULL,
		carta INT(3) UNSIGNED,
		endereco VARCHAR(20) NOT NULL,
		)";

	$cartas_table = "cartas(
		id INT(3) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
		n_carta INT(3) UNSIGNED NOT NULL,
		local VARCHAR(100) NOT NULL,
		comp TINYTEXT,
		estudantes VARCHAR(40)
		)";
	function cria_tabela(){
		if(mysql_query($connect, "CREATE TABLE '$estd_table'")){
			echo "Tabela de estudantes criada com sucesso!";
		} else{
			echo "Erro ao criar tabela de estudantes: ", mysql_error($connect);
		}
		if(mysql_query($connect, "CREATE TABLE '$cartas_table'")){
			echo "Tabela de cartas criada com sucesso!";
		} else{
			echo "Erro ao criar tabela de cartas: ", mysql_error($connect);
		}
	}

	function verifica_se_tabela_existe(){
		if(mysql_query($connect, "SELECT 1 FROM '$estd_table' LIMIT 1") || mysql_query($connect, "SELECT 1 FROM '$cartas_table' LIMIT 1")){
			return true;
		}
		else{
			return false;
		}
	}

	$connect = mysql_connect('mysql.hostinger.com.br', 'u343668054_kmkz', 'c11bb875ddef1f7');
	mysql_select_db($data_estd, $connect);

	if ($connect->connect_error) {
    die("Erro de conexão: " . $connect->connect_error);
	}

	if(!verifica_se_tabela_existe()){
		cria_tabela();
	}

	function cadastra_estudante(){
		if(mysql_query($connect, "INSERT INTO '$estd_table' VALUES(
			'$matricula',
			'$nome',
			'$turma',
			'$cep',
			'$carta',
			'$endereco'
		)")){
			echo "Estudante cadastrade com sucesso!";
		}
	}

	function sorteia_estudante(){
		$matriculas_carta = mysql_query($connect, "SELECT estudantes, n_carta FROM cartas");
		$carta_estudantes = mysql_query($connect, "SELECT carta, matricula FROM estudantes");
		if(mysql_num_rows($matriculas_carta) && mysql_num_rows($carta_estudantes)){
			while(mysql_fetch_row($carta_estudantes)){
				if(mysql_fetch_row($carta_estudantes)["matricula"] == $matricula){
					while(mysql_fetch_row($matriculas_carta)){
						if(mysql_fetch_row($matriculas_carta)["n_carta"] == mysql_fetch_row($carta_estudantes)["carta"]){
							$estudantes_invd = array_map("intval", explode(";",$matriculas_carta["estudantes"]));
						}
					}
				}
			}
		}
	}

	if($acao = "CADASTRAR"){
		cadastra_estudante();
	} elseif ($acao = "SORTEAR") {
		sorteia_estudante();
	}

?>
