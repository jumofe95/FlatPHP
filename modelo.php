<?php

define("NOMBRE_HOST", "localhost");
define("BASE_DE_DATOS", "superheroes");
define("USUARIO", "root");

function abrir_bbdd(){
  $enlace = new PDO(
                'mysql:host=' . NOMBRE_HOST .
                ';dbname=' . BASE_DE_DATOS . ";",
                USUARIO);

  return $enlace;
}

function cerrar_bbdd(&$enlace){
  $enlace = null;
}

function devolver_entradas(){
  $enlace = abrir_bbdd();

  $comando = $enlace->query("SELECT id, titulo, descripcion FROM entradas");

  $entradas = array();

  while ($fila = $comando->fetch(PDO::FETCH_ASSOC)){
    $entradas[] = $fila;
  }

  cerrar_bbdd($enlace);

  return $entradas;
}

function devolver_entrada_id($id){
  $enlace = abrir_bbdd();

  $comando = "SELECT id, titulo, descripcion FROM entradas WHERE id = ?";

  $sentencia = $enlace->prepare($comando);
  $sentencia->bindParam(1, $id, PDO::PARAM_INT);
  $sentencia->execute();

  $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

  cerrar_bbdd($enlace);

  return $resultado;
}

?>
