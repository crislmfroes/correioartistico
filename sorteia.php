<?php
$connect = mysqli_connect('mysql.hostinger.com.br', 'u343668054_kmkz', 'c11bb875ddef1f7');
mysqli_select_db('u343668054_kmkz', $connect);
$db_estudantes = mysqli_query($connect, "SELECT matricula, turma FROM estudantes");
if ($db_estudantes) {
	$db_estudantes = mysqli_fetch_all($db_estudantes);
} else {
	die();
}
if(!mysqli_query($connect, "SELECT 1 FROM cartas RESTRICT 1")){
	foreach ($db_estudantes as $estudante) {
		$numero = $estudante["carta"];
		$matricula = serialize(array($estudante["matricula"]));
		mysqli_query($connect, "INSERT INTO cartas(numero, estudantes) VALUES ('$numero', '$matricula')");
	}
}
$db_cartas = mysqli_query($connect, "SELECT numero, estudantes, id FROM cartas");
if($db_cartas){
	$db_cartas = mysqli_fetch_all($db_cartas);
}
else{
	die();
}
$matriculas_2c = array();
$matriculas_2d = array();
$nao_disponiveis = array();
foreach ($db_estudantes as $estudante) {
	if ($estudante["turma"] == "2C") {
		array_push($matriculas_2c, $estudante["matricula"]);
	} else {
		array_push($matriculas_2d, $estudante["matricula"]);
	}
}
foreach ($db_cartas as $carta) {
	$estudantes_carta = unserialize($carta["estudantes"]);
	$turma = "";
	foreach ($db_estudantes as $estudante) {
		if ($estudante["matricula"] == end($estudantes_carta)) {
			$turma = $estudante["turma"];
		}
	}
	if ($turma == "2C") {
		$nova_matricula = array_rand(array_diff($matriculas_2d, $estudantes_carta, $nao_disponiveis));
		array_push($nao_disponiveis, $nova_matricula);
		$carta["estudantes"] = serialize(array_push($estudantes_carta, $nova_matricula));
	} else {
		$nova_matricula = array_rand(array_diff($matriculas_2c, $estudantes_carta, $nao_disponiveis));
		array_push($nao_disponiveis, $nova_matricula);
		$carta["estudantes"] = serialize(array_push($estudantes_carta, $nova_matricula));
	}
	$n_estudantes = $carta["estudantes"];
	$id = $carta["id"];
	if (mysqli_query($connect, "UPDATE cartas SET estudantes='$n_estudantes' WHERE id='$id")) {
		echo "Sistema atualizado com sucesso!";
	}
}
?>
