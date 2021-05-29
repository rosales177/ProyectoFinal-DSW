<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/CRUD.css" type="text/css" rel="stylesheet">
    <title>CRUD</title>
</head>
<body>
    <div>
        <div>
            <header>
                <div class="Logo">
                    <img src="image/logop.jpg">
                    <h4>CRUD PHP|MYSQL</h4>
                    <nav>
                    <a href="index.php">Inicio</a>
                    <a href="CRUD.php">CRUD</a>
                    <a href="#">Contacto</a>
                    </nav>
                </div>
            </header>
            <main>
                
                <section clase="Contenedor_Crud">
                    <button class="tbempleado" ib="tbEmpleado">Empleado</button>
                    <button class="tbcliente" id="tbCliente">Cliente</button>
                    <input type="text" id="buscar" class="buscador" placeholder="Buscar por Nombre o Apellido">
                    <button class="btn_buscar">Buscar</button>
                    <button class="boton_pregunta">Nuevo</button>
                    <div class="contenedor">
                        
                    <div class="contenedor_nuevo" id="condicional">
                        <label>¿Desea agregar nuevo registro a? :</label><br>
                        <Button class="boton_cliente">Cliente</Button>
                        <Button class="boton_empleado">Empleado</Button>
                        
                    </div>

                   <!--Formulario desplegable del Cliente-->
                    <div class="nuevo_cliente" id="form_cliente">
                        <form id="form_clientes">
                        <input type="hidden" id='id'>
                        <label>Nombre:</label><br>
                        <input type="text" id="Nombre_C" placeholder="Nombre" maxlength="30"><br>
                        <label>Apellido:</label><br>
                        <input type="text" id="Apellido_C" placeholder="Apellido" maxlength="30"><br>
                        <label>DNI:</label><br>
                        <input type="text" id="Dni_C" placeholder="DNI" maxlength="8"><br>
                        <label>Distrito:</label><br>
                        <select id="Distrito_C">
                        </select><br>
                        <label>Direccion:</label><br>
                        <input type="text" id="Direccion" placeholder="Direccion" maxlength="50"><br>
                        <label>Telefono:</label><br>
                        <input type="text" id="Telefono_C" placeholder="Telefono" maxlength="9"><br>
                        <label>Correo:</label><br>
                        <input type="text" id="Correo_C" placeholder="Correo" maxlength="50"><br>
                        <label>Genero:</label><br>
                        <input type="text" id="Genero_C" placeholder="Genero" maxlength="1">
                        <button type="submit" id="crear_C" class="boton-crear">Crear</button>
                        </form>
                    </div>
                    <!--Formulario desplegable del Empleado-->
                    <div class="nuevo_empleado" id="form_empleado">
                        <form id="form_empleados">
                        <label >Código:</label><br>
                        <input type="text" id="Codigo_E" placeholder="Código"><br>
                        <label>Nombre:</label><br>
                        <input type="text" id="Nombre_E" placeholder="Nombre"><br>
                        <label>Apellido:</label><br>
                        <input type="text" id="Apellido_E" placeholder="Apellido"><br>
                        <label>Usuario:</label><br>
                        <input type="text" id="Usuario_E" placeholder="Usuario"><br>
                        <label>Password:</label><br>
                        <input type="text" id="Pass" placeholder="Password"><br>
                        <label>Confrim Password:</label><br>
                        <input type="text" id="Confirm" placeholder="Comfirn Password">
                        <button type="submit" id="crear_E" class="boton-crear">Crear</button>
                        </form>
                    </div>
                    <!-- Tabla predeteminada del Cliente-->
                    <div class="tabla_sql" >
                        <table id="tb_cliente">
                            <thead>    
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Distrito</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Genero</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="task"></tbody>
                        </table>
                        <!--Tabla del Empleado-->
                        <table class="tabla_empleado" id="tb_empleado">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>User</th>
                                    <th>Password</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="Empleado"></tbody>
                        </table>
                        
                    </div>
                    </div>
                </section>
            </main>
            <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
            <script src="js/ajax.js"></script>
        </div>
    </div>
    
</body>
</html>