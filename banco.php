<?php
	class modelo {
		public $nome;
		public $turma;
		public $matricula;
		public $carta;
		public $rua;
		public $comp;
		public $bairro;
		public $cep;
		public $local;

		public function retornanome() {
			return $this->nome;
		}
		public function retornaturma() {
			return $this->turma;
		}
		public function retornamatricula() {
			return $this->matricula;
		}
		public function retornacarta() {
			return $this->carta;
		}
		public function retornarua() {
			return $this->rua;
		}
		public function retornacomp() {
			return $this->comp;
		}
		public function retornabairro() {
			return $this->bairro;
		}
		public function retornacep() {
			return $this->cep;
		}
		public function retornalocal() {
			return $this->local;
		}
	}

	error_reporting() (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	$nome = $_POST['nome'];
	$turma = $_POST['turma'];
	$matricula = $_POST['matricula'];
	$carta = $_POST['carta'];
	$rua = $_POST['endereco'];
	$comp = $_POST['comp'];
	$bairro = $_POST['bairro'];
	$cep = $_POST['cep'];
	$local = $_POST['local'];

	$connect = mysql_connect('mysql.hostinger.com.br', 'u343668054_kmkz', 'c11bb875ddef1f7');

	mysql_select_db('u343668054_kmkz', $connect);

	$query_insert = "INSERT INTO usuarios (nome, turma, matricula, carta, rua, comp, bairro, cep, local) 
					VALUES ('$nome','$turma','$matricula','$carta ','$rua ','$comp ','$bairro ','$cep ','$local')";
	$insert = mysql_query($query_insert, $connect);