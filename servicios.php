<?php
class Servicios
{
  public static function conectar()
  {
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bdd = "clientes";

    $conexion = mysqli_connect($servidor, $usuario, $clave, $bdd);
    return $conexion;
  }

  public static function insertar($nombre,$cedula,$direccion,$total)
  {
    $conexion = Servicios::conectar();
    $query = "
    insert into tbl_clientes(nombre_cliente,cedula_cliente,direccion_cliente,total_cliente) values ('$nombre','$cedula','$direccion','$total')
    ";
    $unir = mysqli_query($conexion, $query);
    return $unir;
  }

  public static function mostrar()
  {
    $conexion = Servicios::conectar();
    $query = "select * from tbl_clientes";
    $unir = mysqli_query($conexion, $query);
    return $unir;
  }
}
