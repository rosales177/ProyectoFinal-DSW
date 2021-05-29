    $(function(){
        //Valores Predeterminados
        console.log('Hola Mundo');
        let editar = false;
        let editar_E = false;
        $('#condicional').hide();
        $('#form_cliente').hide();
        $('#form_empleado').hide();
        $('#tb_empleado').hide();
        $('#tb_cliente').show();
        fetchtasks();
        Empleado();
   
        //Mostrar o Ocultar la Tabla Empleado
        $(document).on('click','.tbempleado',function(){
            $('#tb_empleado').show();
            $('#tb_cliente').hide();
            
        });
        //Mostrar o Ocultar la Tabla Cliente
        $(document).on('click','.tbcliente',function(){
            $('#tb_empleado').hide();
            $('#tb_cliente').show();
        });
        //Mostrar las Opciones de agregado de datos
        $(document).on('click','.boton_pregunta',function(){
            $('#condicional').show();
            $('#form_cliente').hide();
            $('#form_empleado').hide();

            $(document).on('click','.boton_cliente',function(){
                $('#condicional').hide();
                $('#form_cliente').show();
                $('#form_empleado').hide();
                Listar_Distrito();
            });
            $(document).on('click','.boton_empleado',function(){
                $('#condicional').hide();
                $('#form_empleado').show();
                $('#form_cliente').hide();
            });
        });
        //Buscar Cliente por nombre o apellido
        $('#buscar').keyup(function(e){
            if($('#buscar').val()){
                let buscar = $('#buscar').val();
                $.ajax({
                    url: '/Proyecto_F/controller/Controlador.php?buscar=B',
                    type:'POST',
                    data: {buscar},
                    success: function(response){
                        let info = JSON.parse(response);
                        console.log(info);
                        let plantilla = "";
                        info.forEach(info =>{
                            plantilla += `
                            <tr taskID="${info.id}">
                                <td>${info.id}</td>
                                <td>${info.Nombre}</td>
                                <td>${info.Apellido}</td>
                                <td>${info.DNI}</td>
                                <td>${info.Distrito}</td>
                                <td>${info.Direccion}</td>
                                <td>${info.Telefono}</td>
                                <td>${info.Correo}</td>
                                <td>${info.Genero}</td>
                                <td>
                                    <button class="btn-delete">
                                        Eliminar
                                    </button>
                                </td>

                                <td>
                                    <button class="btn-update">
                                        Actualizar
                                    </button>
                                </td>
                            </tr>
                        `
                        });
                        console.log(info);
                        $('#task').html(plantilla);                     
                    }
                })
            }else{
                fetchtasks();
            }
        });
        //Agregar Usuario
        $('#form_clientes').submit(function (e){
            const Datospost ={
                id: $('#id').val(),
                Nombre: $('#Nombre_C').val(),
                Apellido: $('#Apellido_C').val(),
                Dni: $('#Dni_C').val(),
                Distrito: $('#Distrito_C').val(),
                Direccion: $('#Direccion').val(),
                Telefono: $('#Telefono_C').val(),
                Correo: $('#Correo_C').val(),
                Genero: $('#Genero_C').val()
            };
            console.log(Datospost);

            let url= editar === false? '/Proyecto_F/controller/Controlador.php?agregar=AC' : '/Proyecto_F/controller/Controlador.php?editar=EC';
            
            $.post(url, Datospost, function(response){
                fetchtasks();
                console.log(response);
                $('#form_clientes').trigger('reset');
            });
            e.preventDefault();
        });
        //Agregar Empleado
        $('#form_empleados').submit(function(e){
            let pass = $('#Pass').val();
            let pass_C = $('#Confirm').val();
            if (pass === pass_C) {
                const DatosE_post = {
                    Codigo_E: $('#Codigo_E').val(),
                    Nombre_E: $('#Nombre_E').val(),
                    Apellido_E: $('#Apellido_E').val(),
                    Usuario: $('#Usuario_E').val(),
                    Pass: $('#Pass').val()
                };

                let url= editar_E === false? '/Proyecto_F/controller/Controlador_E.php?agregar=AE' : '/Proyecto_F/controller/Controlador_E.php?editar=EE';
                $.post(url,DatosE_post, function(response){
                    Empleado();
                    console.log(DatosE_post);
                    console.log(response);
                    $('#form_empleados').trigger('reset');
                });
                e.preventDefault();
            }else{
                alert("Las contraseñas no coinciden");
                e.preventDefault();
            }
        });
        //Listar Distritos en el formulario del Cliente

        function Listar_Distrito(){
            $.ajax({
                url: '/Proyecto_F/controller/Controlador.php?Listar=D',
                type: 'GET',
                success: function(distritos){
                    let distrito = JSON.parse(distritos);
                    let plantilla = '';
                    distrito.forEach(distrito=>{
                        plantilla += `
                            <option value="${distrito.Cod_Dis}" selected>${distrito.Nom_Dis}</option>
                        `
                    });
                    console.log(distrito);
                    $('#Distrito_C').html(plantilla);
                }
            })
        }
        //Listar la tabla empleado
        function Empleado(){
            $.ajax({
                url: '/Proyecto_F/controller/Controlador_E.php?accion=L',
                type: 'GET',
                success: function(response){
                    let empleado = JSON.parse(response);
                    let plantilla = '';
                    empleado.forEach(empleado =>{
                        plantilla += `
                            <tr taskID="${empleado.Cod_Empleado}">
                                <td>${empleado.Cod_Empleado}</td>
                                <td>${empleado.Nombre_E}</td>
                                <td>${empleado.Apellido_E}</td>
                                <td>${empleado.Usuario}</td>
                                <td>${empleado.Pass}</td>
                                <td> 
                                    <button class="btn_delete">Eliminar</button>
                                </td>
                                <td>
                                    <button class="btn_update">Actualizar</button>
                                </td>
                            </tr>
                        `
                    });
                    console.log(empleado);
                    $('#Empleado').html(plantilla);
                }
            })
        }
        //Listar la tabla Cliente como predeterminada
        function fetchtasks() {
            $.ajax({
                url: '/Proyecto_F/controller/Controlador.php?action=L',
                type: 'GET',
                success: function (response) {
                    let tarea = JSON.parse(response);
                    let template = '';
                    tarea.forEach(tarea =>{
                        template += `
                            <tr taskID="${tarea.id}">
                                <td>${tarea.id}</td>
                                <td>${tarea.Nombre}</td>
                                <td>${tarea.Apellido}</td>
                                <td>${tarea.DNI}</td>
                                <td>${tarea.Distrito}</td>
                                <td>${tarea.Direccion}</td>
                                <td>${tarea.Telefono}</td>
                                <td>${tarea.Correo}</td>
                                <td>${tarea.Genero}</td>
                                <td>
                                    <button class="btn-delete">
                                        Eliminar
                                    </button>
                                </td>

                                <td>
                                    <button class="btn-update">
                                        Actualizar
                                    </button>
                                </td>
                            </tr>
                        `
                    });
                    console.log(tarea);
                    $('#task').html(template);
                }
            });
        }
        //Boton eliminar de la tabla cliente
        $(document).on('click','.btn-delete',function(){
            if(confirm("Estas seguro de querer eliminar?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('taskID');
                console.log(id);
                $.post('/Proyecto_F/controller/Controlador.php?delete=D',{id},function(response){
                    console.log(response);
                    fetchtasks();
                });
            }
        });
        //Boton Actualizar de la tabla cliente
        $(document).on('click','.btn-update',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskID');
            console.log(id);
            
            $.post('/Proyecto_F/controller/Controlador.php?update=U',{id},function(response){
                console.log(response);
                let tarea = JSON.parse(response);
                tarea.forEach(tarea =>{
                    $('#id').val(tarea.id);
                    $('#Nombre_C').val(tarea.Nombre);
                    $('#Apellido_C').val(tarea.Apellido);
                    $('#Dni_C').val(tarea.DNI);
                    $('#Distrito_C').val(tarea.Distrito);
                    $('#Direccion').val(tarea.Direccion);
                    $('#Telefono_C').val(tarea.Telefono);
                    $('#Correo_C').val(tarea.Correo);
                    $('#Genero_C').val(tarea.Genero);    
                });
                $('#form_cliente').show();
                $('#form_empleado').hide();
                Listar_Distrito();
                editar = true;
            })
        });  
        $(document).on('click','.btn_update',function(){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskID');
            console.log(id);
            $.post('/Proyecto_F/controller/Controlador_E.php?update=D',{id},function(response){
                console.log(response);
                let empleado = JSON.parse(response);
                empleado.forEach(empleado=>{
                    $('#Codigo_E').val(empleado.Codigo_E);
                    $('#Nombre_E').val(empleado.Nombre_E);
                    $('#Apellido_E').val(empleado.Apellido_E);
                    $('#Usuario_E').val(empleado.Usuario);
                    $('#Pass').val(empleado.Pass);
                });
                $('#form_empleado').show();
                $('#form_cliente').hide();
                editar_E = true;
            });
            
        });

        $(document).on('click','.btn_delete',function(){
            if(confirm("Estas seguro de querer eliminar?")){
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('taskID');
                console.log(id);
                $.post('/Proyecto_F/controller/Controlador_E.php?delete=D',{id},function(response){
                    console.log(response);
                    Empleado();
                });
            }
        });


    })