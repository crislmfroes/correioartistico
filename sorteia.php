<?php
$connect = mysqli_connect('mysql.hostinger.com.br', 'u343668054_kmkz', 'c11bb875ddef1f7');
mysqli_select_db('u343668054_kmkz', $connect);

class Estudante {
  $this->__cartas = [];
  $this->__ocup = false;
  function __construct($matricula, $carta){
    $this->__matricula = $matricula;
    array_push($carta, $this->__cartas);
  }
  function get_matricula(){
    return $this->__matricula;
  }
  function get_cartas(){
    return $this->__cartas;
  }
  function adiciona_carta($carta){
    if(!in_array($carta, $this->__cartas) &&(!$this->__ocup)){
      array_push($carta, $this->__cartas);
    }
  }
  function envia_carta($outro){
    if($outro->esta_disponivel()){
      $this->__ocup = false;
      $outro->adiciona_carta(end($this->__cartas));
    }
  }
  function esta_disponivel(){
    return !$this->__ocup;
  }
}

class Carta {
  $this->__estudantes = [];
  function __construct($numero){
    $this->__numero = $numero;
  }
  function get_numero(){
    return $this->__numero;
  }
  function adiciona_estudante($estudante){
    if(!in_array($estudante, $this->__estudantes)){
      array_push($estudante, $this->__estudantes);
    }
  }
  function get_estudantes(){
    return $this->__estudantes;
  }
}

?>
