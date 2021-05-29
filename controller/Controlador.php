<?php
    //Importación de Archivos Conexión y Modelo_C (Modelo Cliente)
    require_once "../config/Conexion.php";
    require_once "../model/Modelo_C.php";
    //Variable global Consulta
    $consulta = new Modelo($conexion);

    //Listar de manera automática la tabla Cliente
    if(isset($_GET['action'])){
        $action = $_GET['action'];

        if($action == 'L'){
            echo $consulta->Listar();
        }
    }
    // Acción de Agregar al usuario y recojo de información 
    if(isset($_GET['agregar'])){
        $agregar = $_GET['agregar'];
        if($agregar == 'AC'){
            $Nombre = $_POST['Nombre'];
            $Apellido = $_POST['Apellido'];
            $Dni = $_POST['Dni'];
            $Distrito = $_POST['Distrito'];
            $Direccion = $_POST['Direccion'];
            $Telefono = $_POST['Telefono'];
            $Correo = $_POST['Correo'];
            $Genero = $_POST['Genero'];
            echo $consulta->Nuevo_Cliente($Nombre,$Apellido,$Dni,$Distrito,$Direccion,$Telefono,$Correo,$Genero);
        }
    }
    // Dentro del formulario del cliente se listaran los distritos disponibles
    if(isset($_GET['Listar'])){
        echo $consulta->Listar_Distrito();
    }


    // Barra de busquedas, buscar por nombre o apellido
    if(isset($_GET['buscar'])){
        $datos = $_POST['buscar'];
        echo $consulta->Buscar($datos);
    }

    //Acción de boton Eliminar 
    if(isset($_GET['delete'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            echo $consulta->Eliminar($id);
        }   
    }
    //Acción del boton actualizar, Mostrara los datos en el formulario del cliente
    if(isset($_GET['update'])){
        if(isset($_POST['id'])){
        $id = $_POST['id'];
            echo $consulta->Actualizar($id);
        }
    }

    //Actualizar los dartos del cliente
    if(isset($_GET['editar'])){
        $id = $_POST['id'];
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Dni = $_POST['Dni'];
        $Distrito = $_POST['Distrito'];
        $Direccion = $_POST['Direccion'];
        $Telefono = $_POST['Telefono'];
        $Correo = $_POST['Correo'];
        $Genero = $_POST['Genero'];

        echo $consulta->Editar($id,$Nombre,$Apellido,$Dni,$Distrito,$Direccion,$Telefono,$Correo,$Genero);
    }

?>