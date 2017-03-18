<?php
$connect = mysqli_connect('mysql.hostinger.com.br', 'u343668054_kmkz', 'c11bb875ddef1f7');
mysqli_select_db('u343668054_kmkz', $connect);
$db_estudantes = mysqli_query($connect, "SELECT matricula, cartas, esta_disponivel, turma FROM estudantes");
$db_cartas = mysqli_query($connect, "SELECT numero, estudantes, data_entrega FROM cartas");
if ($db_cartas) {
	$db_cartas = mysqli_fetch_all($db_cartas);
}
if ($db_estudantes) {
	$db_estudantes = mysqli_fetch_all($db_estudantes);
}
$matriculas_2c = array();
$matriculas_2d = array();
foreach ($db_estudantes as $estudante) {
	if($estudante["turma"] == "2C"){
		array_push($matriculas_2c, $estudante["matricula"]);
	} else {
		array_push($matriculas_2d, $estudante["matricula"]);
	}
}
foreach ($db_cartas as $carta) {
	if ($carta["data_entrega"] == date("Y/m/d")) {
		$estudantes_indisp = unserialize($carta["estudantes"]);
		foreach ($db_estudantes as $estudante) {
			if (!$estudante["esta_disponivel"]) {
				array_push($estudantes_indisp, $estudante["matricula"]);
			}
		}
		$nova_matricula = array_rand(array_diff($matriculas, $estudantes_indisp));
	}
}
?>
