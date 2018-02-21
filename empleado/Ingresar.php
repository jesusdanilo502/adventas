<?php
    session_start();
	include_once("../clases/clsEmpleado.php");
    // captura lo datos del usuario desde el form para el inicio de sessión
    $objEmpleado = new clsEmpleado;
    //if(!isset($_POST['txtUsuario'])) {

        if(isset($_POST['txtPassword'])) {

            $result=$objEmpleado->Ingresar_Sistema2($_POST['txtUsuario'],$_POST['txtPassword']);
            // se modifica palabra reservada mysql por mysqli ya que la primera pertenece a php5 y el proyecto fue migrado a php 7
            if($row=mysqli_fetch_array($result)) {

                $_SESSION["id"] = $row['IdEmpleado'];
                $_SESSION["usuario"] = $row['Nombre'];

                header("Location:../inicio.php");
            } else {
                header("Location:../index.php");
            }
        }
    //}