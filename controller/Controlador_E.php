<?php
    require_once "../config/Conexion.php";
    require_once "../model/Modelo_E.php";
     //Variable global Consulta
    $consulta = new Modelo_E($conexion);

    //Listar la tabla Empleado
    if(isset($_GET['accion'])){
        echo $consulta->Listar_E();
    }

    //Acción de agregar nuevo empleado
    if(isset($_GET['agregar'])){
        $agregar = $_GET['agregar'];
        if($agregar == 'AE'){
            $Codigo_E = $_POST['Codigo_E'];
            $Nombre_E = $_POST['Nombre_E'];
            $Apellido_E =$_POST['Apellido_E'];
            $Usuario =$_POST['Usuario'];
            $Pass = $_POST['Pass'];

            echo $consulta->Nuevo_E($Codigo_E,$Nombre_E,$Apellido_E,$Usuario,$Pass);
        }
    }

    //Acción de eliminar empleado
    if(isset($_GET['delete'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            echo $consulta->Eliminar_E($id);
        }
    }

    //Acción de insertar datos en el formulario empleado
    if(isset($_GET['update'])){
        if(isset($_POST['id'])){
            $id= $_POST['id'];
            echo $consulta->Insertar_E($id);
        }
    }

    //Acción de editar datos del empleado
    if(isset($_GET['editar'])){
        $Codigo_E = $_POST['Codigo_E'];
        $Nombre_E = $_POST['Nombre_E'];
        $Apellido_E =$_POST['Apellido_E'];
        $Usuario =$_POST['Usuario'];
        $Pass = $_POST['Pass'];
        echo $consulta->Editar_E($Codigo_E,$Nombre_E,$Apellido_E,$Usuario,$Pass);
    }
?>