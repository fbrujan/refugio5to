let tblUsuarios, tblClientes, tblCategorias, tblMedidas, tblTandas, tblCargos, tblCircuitos;
let tblPersonas, tblAsistencias, tblCajas, tblProductos, tblIglesias, tblFinanzas;
let tblServicios;

document.addEventListener("DOMContentLoaded",function(){
    tblUsuarios =  $('#tblUsuarios').DataTable( {
            ajax: {
                url: base_url + 'usuarios/listar',
                dataSrc: ''
            },
            columns: [
                 {'data' : 'id'}
                ,{'data' : 'usuario' }
                ,{'data' : 'nombre'}
                ,{'data' : 'caja' } 
                ,{'data' : 'estado' } 
                ,{'data' : 'acciones' } 
            
            ]
    } );
    // Fin tblUsuarios

    tblClientes =  $('#tblClientes').DataTable( {
        ajax: {
            url: base_url + 'clientes/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'id_cliente'}
            ,{'data' : 'dni' }
            ,{'data' : 'fullname'}
            ,{'data' : 'telefono' } 
            ,{'data' : 'email' } 
            ,{'data' : 'direccion' } 
            ,{'data' : 'estado' } 
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblClientes

    tblCategorias =  $('#tblCategorias').DataTable( {
        ajax: {
            url: base_url + 'categorias/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'categoria'}
            ,{'data' : 'descripcion' }
            ,{'data' : 'estado' } 
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblCategorias

    tblCajas =  $('#tblCajas').DataTable( {
        ajax: {
            url: base_url + 'cajas/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'caja'}
            ,{'data' : 'descripcion' }
            ,{'data' : 'estado' } 
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblCajas

    tblMedidas =  $('#tblMedidas').DataTable( {
        ajax: {
            url: base_url + 'medidas/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'medida'}
            ,{'data' : 'nombre_corto' }
            ,{'data' : 'estado' } 
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblMedidas

    tblTandas =  $('#tblTandas').DataTable( {
        ajax: {
            url: base_url + 'tandas/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'tanda'}
            ,{'data' : 'estado' } 
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblTandas

    tblCargos =  $('#tblCargos').DataTable( {
        ajax: {
            url: base_url + 'cargos/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'cargo'}
            ,{'data' : 'estado' } 
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblCargos

    tblCircuitos =  $('#tblCircuitos').DataTable( {
        ajax: {
            url: base_url + 'circuitos/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'id_circuito'}
            ,{'data' : 'distrito' } 
            ,{'data' : 'provincia' }
            ,{'data' : 'circuito' }
            ,{'data' : 'estado' }
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblCircuitos

    tblPersonas =  $('#tblPersonas').DataTable( {
        ajax: {
            url: base_url + 'personas/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'id_persona'}
            ,{'data' : 'persona' } 
            ,{'data' : 'telefono' }
            ,{'data' : 'apodo' }
            ,{'data' : 'estado' }
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblPersonas

    tblAsistencias =  $('#tblAsistencias').DataTable( {
        ajax: {
            url: base_url + 'asistencias/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'id_persona'}
            ,{'data' : 'persona' } 
            ,{'data' : 'apodo' }
            ,{'data' : 'telefono' }
            ,{'data' : 'estado' }
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblAsistencias

    tblIglesias =  $('#tblIglesias').DataTable( {
        ajax: {
            url: base_url + 'iglesias/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'id_circuito'}
            ,{'data' : 'iglesia' } 
            ,{'data' : 'distrito' }
            ,{'data' : 'circuito' }
            ,{'data' : 'direccion' }
            ,{'data' : 'estado' }
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblIglesias

    tblFinanzas =  $('#tblFinanzas').DataTable( {
        ajax: {
            url: base_url + 'finanzas/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'id_persona'}
            ,{'data' : 'persona' } 
            ,{'data' : 'apodo' }
            ,{'data' : 'telefono' }
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblFinanzas

    tblProductos =  $('#tblProductos').DataTable( {
        ajax: {
            url: base_url + 'productos/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'id'}
            ,{'data' : 'imagen' }
            ,{'data' : 'codigo' }
            ,{'data' : 'producto' } 
            ,{'data' : 'descripcion' }
            ,{'data' : 'precio_venta' }
            ,{'data' : 'stock' }
            ,{'data' : 'estado' }
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblProductos

    tblServicios =  $('#tblServicios').DataTable( {
        ajax: {
            url: base_url + 'servicios/listar',
            dataSrc: ''
        },
        columns: [
             {'data' : 'servicio'}
            ,{'data' : 'fecha_inicio' } 
            ,{'data' : 'costo' } 
            ,{'data' : 'asistencia' } 
            ,{'data' : 'descripcion' } 
            ,{'data' : 'acciones' } 
        
        ]
    } );
    // Fin tblServicios

});
function frmUsuario() {
    document.getElementById("usuarioModal").innerHTML = "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    // document.getElementById('nombre').value = "";
    // document.getElementById('usuario').value = "";
    // document.getElementById('caja').value = "";
    document.getElementById('claves').classList.remove("d-none");
    document.getElementById('frmUsuario').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_usuario').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nuevo_usuario").modal("show");
}
function registrarUsuario(e) {
    e.preventDefault();
    const usuario       = document.getElementById('usuario');
    const nombre        = document.getElementById('nombre');
    const clave         = document.getElementById('clave');
    const validar       = document.getElementById('validar');
    const caja          = document.getElementById('caja');
    
    if (usuario.value == "" || nombre.value == "" || caja.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe llenar todos los campos',
            showConfirmButton: false,
            timer: 3000
        })
    }else{
        const url = base_url + 'usuarios/registrar';
        const frm = document.getElementById('frmUsuario');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            //console.log(this.status);
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario Registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario Modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }

                
            }
        }
    }
}
function btnEditarUsuario(id) {
    document.getElementById("usuarioModal").innerHTML = "Actualizar Usuario";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'usuarios/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            const id_usuario = res.id;

            document.getElementById('nombre').value = res.nombre;
            document.getElementById('usuario').value = res.usuario;
            document.getElementById('caja').value = res.id_caja;
            document.getElementById('id_usuario').value =res.id;
            document.getElementById('claves').classList.add("d-none");
            $("#nuevo_usuario").modal("show");
                  
        }
    }
}
function btnEliminarUsuario(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "El usuario no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'usuarios/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'El usuario ha sido eliminado.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarUsuario(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'usuarios/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    //console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'El usuario ha sido habilitado.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin Usuarios

function frmCliente() {
    document.getElementById("clienteModal").innerHTML = "Nuevo Cliente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmCliente').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_cliente').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nuevo_cliente").modal("show");
}
function registrarCliente(e) {
    e.preventDefault();
    const tipo_documento       = document.getElementById('tipo_documento');
    const nro_documento        = document.getElementById('nro_documento');
    const nombre               = document.getElementById('nombre');
    const apellido             = document.getElementById('apellidos');
    const telefono             = document.getElementById('telefono');
    const correo               = document.getElementById('correo');
    const direccion            = document.getElementById('direccion');
    
    if (nro_documento.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un documento de identidad válido',
            showConfirmButton: false,
            timer: 3000
        })
        nro_documento.classList.add("is-invalid");
        nombre.classList.remove("is-invalid");
        apellido.classList.remove("is-invalid");
        nro_documento.focus();
    } else if (nombre.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre',
            showConfirmButton: false,
            timer: 3000
        })
        nro_documento.classList.remove("is-invalid");
        nombre.classList.add("is-invalid");
        apellido.classList.remove("is-invalid");
        nombre.focus();
    }else if (apellido.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un apellido',
            showConfirmButton: false,
            timer: 1500
        })
        nro_documento.classList.remove("is-invalid");
        nombre.classList.remove("is-invalid");
        apellido.classList.add("is-invalid");
        apellido.focus();
    }else{
        const url = base_url + 'clientes/registrar';
        const frm = document.getElementById('frmCliente');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
              //  console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente Registrado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente Modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarCliente(id) {
    document.getElementById("clienteModal").innerHTML = "Actualizar Cliente";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'clientes/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('tipo_documento').value = res.tipo_dni;
            document.getElementById('nro_documento').value  = res.dni;
            document.getElementById('nombre').value         = res.nombre;
            document.getElementById('apellidos').value      = res.apellidos;
            document.getElementById('telefono').value       = res.telefono;
            document.getElementById('correo').value         = res.email;
            document.getElementById('direccion').value      = res.direccion;
            document.getElementById('id_cliente').value     = res.id_cliente;
            $("#nuevo_cliente").modal("show");
                  
        }
    }
}
function btnEliminarCliente(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "El cliente no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'clientes/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                   // console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'El cliente ha sido eliminado.',
                            'success'
                        )
                        tblClientes.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarCliente(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'clientes/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                   // console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'El cliente ha sido habilitado.',
                            'success'
                        )
                        tblClientes.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin Clientes

function frmCategoria() {
    document.getElementById("categoriaModal").innerHTML = "Nueva Categoría";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmCategoria').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_categoria').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_categoria").modal("show");
}
function registrarCategoria(e) {
    e.preventDefault();
    const categoria               = document.getElementById('categoria');
    const descripcion             = document.getElementById('descripcion');
    
    if (categoria.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre para la categoría',
            showConfirmButton: false,
            timer: 3000
        })
        categoria.classList.add("is-invalid");
        categoria.focus();
    } else{
        const url = base_url + 'categorias/registrar';
        const frm = document.getElementById('frmCategoria');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
              //  console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Categoria Creada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_categoria").modal("hide");
                    tblCategorias.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Categoría Modificada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nueva_categoria").modal("hide");
                    tblCategorias.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarCategoria(id) {
    document.getElementById("categoriaModal").innerHTML = "Actualizar Categoría";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'categoria/seditar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('categoria').value    = res.categoria;
            document.getElementById('descripcion').value  = res.descripcion;
            document.getElementById('id_categoria').value = res.id_categoria;
            $("#nueva_categoria").modal("show");
                  
        }
    }
}
function btnEliminarCategoria(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "La categoría no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'categorias/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                   // console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La Categoría ha sido eliminada.',
                            'success'
                        )
                        tblCategorias.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarCategoria(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'categorias/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                   // console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La categoría ha sido habilitada.',
                            'success'
                        )
                        tblCategorias.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Categorias

function frmMedida() {
    document.getElementById("medidaModal").innerHTML = "Nueva Medida";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmMedida').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_medida').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_medida").modal("show");
}
function registrarMedida(e) {
    e.preventDefault();
    const medida               = document.getElementById('medida');
    const nombre_corto             = document.getElementById('nombre_corto');
    
    if (medida.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre para la medida',
            showConfirmButton: false,
            timer: 3000
        })
        medida.classList.add("is-invalid");
        medida.focus();
    } else{
        const url = base_url + 'medidas/registrar';
        const frm = document.getElementById('frmMedida');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
               // console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Medida Creada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_medida").modal("hide");
                    tblMedidas.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Medida Modificada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nueva_medida").modal("hide");
                    tblMedidas.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarMedida(id) {
    document.getElementById("medidaModal").innerHTML = "Actualizar Medida";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'medidas/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('medida').value    = res.medida;
            document.getElementById('nombre_corto').value  = res.nombre_corto;
            document.getElementById('id_medida').value = res.id_medida;
            $("#nueva_medida").modal("show");
                  
        }
    }
}
function btnEliminarMedida(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "La medida no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'medidas/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La medida ha sido eliminada.',
                            'success'
                        )
                        tblMedidas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarMedida(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'medidas/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La medida ha sido habilitada.',
                            'success'
                        )
                        tblMedidas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Medidas

function frmTanda() {
    document.getElementById("tandaModal").innerHTML = "Nueva Tanda";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmTanda').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_tanda').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_tanda").modal("show");
}
function registrarTanda(e) {
    e.preventDefault();
    const tanda               = document.getElementById('tanda');
    
    if (tanda.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre para la tanda',
            showConfirmButton: false,
            timer: 3000
        })
        tanda.classList.add("is-invalid");
        tanda.focus();
    } else{
        const url = base_url + 'tandas/registrar';
        const frm = document.getElementById('frmTanda');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tanda Creada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_tanda").modal("hide");
                    tblTandas.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tanda Modificada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nueva_tanda").modal("hide");
                    tblTandas.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarTanda(id) {
    document.getElementById("tandaModal").innerHTML = "Actualizar Tanda";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'tandas/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('tanda').value    = res.tanda;
            document.getElementById('id_tanda').value = res.id_tanda;
            $("#nueva_tanda").modal("show");
                  
        }
    }
}
function btnEliminarTanda(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "La tanda no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'tandas/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                //    console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La tanda ha sido eliminada.',
                            'success'
                        )
                        tblTandas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarTanda(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'tandas/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La tanda ha sido habilitada.',
                            'success'
                        )
                        tblTandas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Tandas

function frmCargo() {
    document.getElementById("cargoModal").innerHTML = "Nuevo Cargo";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmCargo').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_cargo').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nuevo_cargo").modal("show");
}
function registrarCargo(e) {
    e.preventDefault();
    const cargo               = document.getElementById('cargo');
    
    if (cargo.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre  de cargo',
            showConfirmButton: false,
            timer: 3000
        })
        cargo.classList.add("is-invalid");
        cargo.focus();
    } else{
        const url = base_url + 'cargos/registrar';
        const frm = document.getElementById('frmCargo');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cargo Creado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevo_cargo").modal("hide");
                    tblCargos.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cargo Modificada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevo_cargo").modal("hide");
                    tblCargos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarCargo(id) {
    document.getElementById("cargoModal").innerHTML = "Actualizar Cargo";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'cargos/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('cargo').value    = res.cargo;
            document.getElementById('id_cargo').value = res.id_cargo;
            $("#nuevo_cargo").modal("show");
                  
        }
    }
}
function btnEliminarCargo(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "No se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'cargos/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                //    console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Cargo ha sido eliminado.',
                            'success'
                        )
                        tblCargos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarCargo(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'cargos/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La cargo ha sido habilitada.',
                            'success'
                        )
                        tblCargos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Cargos

function frmCircuito() {
    document.getElementById("circuitoModal").innerHTML = "Nuevo Circuito";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmCircuito').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_circuito').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nuevo_circuito").modal("show");
}
function registrarCircuito(e) {
    e.preventDefault();
    const circuito               = document.getElementById('circuito');
    const id_distrito            = document.getElementById('id_distrito');
    const id_provincia           = document.getElementById('id_provincia');
    
    if (circuito.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre  de circuito',
            showConfirmButton: false,
            timer: 3000
        })
        circuito.classList.add("is-invalid");
        circuito.focus();
    } else{
        const url = base_url + 'circuitos/registrar';
        const frm = document.getElementById('frmCircuito');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Circuito Creado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevo_circuito").modal("hide");
                    tblCircuitos.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Circuito Modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevo_circuito").modal("hide");
                    tblCircuitos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarCircuito(id) {
    document.getElementById("circuitoModal").innerHTML = "Actualizar Circuito";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'circuitos/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('circuito').value       = res.circuito;
            document.getElementById('id_circuito').value    = res.id_circuito;
            document.getElementById('id_provincia').value   = res.id_provincia;
            document.getElementById('id_distrito').value    = res.id_distrito;
            $("#nuevo_circuito").modal("show");
                  
        }
    }
}
function btnEliminarCircuito(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "No se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'circuitos/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                //    console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Circuito ha sido eliminado.',
                            'success'
                        )
                        tblCircuitos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarCircuito(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'circuitos/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Circuito ha sido habilitada.',
                            'success'
                        )
                        tblCircuitos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Circuitos

function frmPersona() {
    document.getElementById("personaModal").innerHTML = "Nueva Persona";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmPersona').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_persona').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_persona").modal("show");
}
function registrarPersona(e) {
    e.preventDefault();
    const nombre            = document.getElementById('nombre');
    const apellidos         = document.getElementById('apellidos');
    const provincia         = document.getElementById('provincia');
    const pais              = document.getElementById('pais');
    const tipo_documento    = document.getElementById('tipo_documento');
    const nro_documento     = document.getElementById('nro_documento');
    const telefono          = document.getElementById('telefono');
    const fechaNaciemiento  = document.getElementById('fechaNaciemiento');
    const apodo             = document.getElementById('apodo');
    const correo            = document.getElementById('correo');
    const direccion         = document.getElementById('direccion');
    const sexo              = document.getElementById('sexo');
    const estadoCivil       = document.getElementById('estadoCivil');
    const sociedad          = document.getElementById('sociedad');
    
    if (nombre.value == "" || apellidos.value =="") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Algún Campo requerido esta en blanco',
            showConfirmButton: false,
            timer: 3000
        })
        nombre.classList.add("is-invalid");
        nombre.focus();
    } else{
        const url = base_url + 'personas/registrar';
        const frm = document.getElementById('frmPersona');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Persona Creado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_persona").modal("hide");
                    tblPersonas.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Persona Modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nueva_persona").modal("hide");
                    tblPersonas.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarPersona(id) {
    document.getElementById("personaModal").innerHTML = "Actualizar Persona";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'personas/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('tipo_documento').value     = res.id_tipo_documento;
            document.getElementById('nro_documento').value      = res.nro_documento_identidad;
            document.getElementById('provincia').value          = res.id_provincia;
            document.getElementById('pais').value               = res.id_pais;
            document.getElementById('nombre').value             = res.nombre;
            document.getElementById('apellidos').value          = res.apellidos;
            document.getElementById('id_persona').value         = res.id_persona;
            document.getElementById('telefono').value           = res.telefono;
            document.getElementById('fechaNacimiento').value    = res.fecha_nacimiento;
            document.getElementById('apodo').value              = res.apodo;
            document.getElementById('correo').value             = res.correo;
            document.getElementById('estadoCivil').value        = res.id_estado_civil;
            document.getElementById('sociedad').value           = res.id_clasificacion;
            document.getElementById('sexo').value               = res.id_sexo;
            document.getElementById('direccion').value          = res.direccion;

            $("#nueva_persona").modal("show");
                  
        }
    }
}
function btnEliminarPersona(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "No se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'personas/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                //    console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Eliminado con éxito.',
                            'success'
                        )
                        tblPersonas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarPersona(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'personas/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Habilitado con éxito.',
                            'success'
                        )
                        tblPersonas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Personas

function frmAsistencia() {
    document.getElementById("asistenciaModalP").innerHTML = "Nueva Persona";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmPersonaAsist').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_asistencia').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_asistencia_persona").modal("show");
}
function registrarAsistencia(e) {
    e.preventDefault();
    const nombre            = document.getElementById('nombre');
    const apellidos         = document.getElementById('apellidos');
    const provincia         = document.getElementById('provincia');
    const pais              = document.getElementById('pais');
    const tipo_documento    = document.getElementById('tipo_documento');
    const nro_documento     = document.getElementById('nro_documento');
    const telefono          = document.getElementById('telefono');
    const fechaNaciemiento  = document.getElementById('fechaNaciemiento');
    const apodo             = document.getElementById('apodo');
    const correo            = document.getElementById('correo');
    const direccion         = document.getElementById('direccion');
    const sexo              = document.getElementById('sexo');
    const estadoCivil       = document.getElementById('estadoCivil');
    const sociedad          = document.getElementById('sociedad');
    
    if (nombre.value == "" || apellidos.value =="") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Algún Campo requerido esta en blanco',
            showConfirmButton: false,
            timer: 3000
        })
        nombre.classList.add("is-invalid");
        nombre.focus();
    } else{
        const url = base_url + 'personas/registrar';
        const frm = document.getElementById('frmPersona');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Persona Creado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_persona").modal("hide");
                    tblPersonas.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Persona Modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nueva_persona").modal("hide");
                    tblPersonas.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarAsistencia(id) {
    document.getElementById("personaModal").innerHTML = "Actualizar Persona";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'personas/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('tipo_documento').value     = res.id_tipo_documento;
            document.getElementById('nro_documento').value      = res.nro_documento_identidad;
            document.getElementById('provincia').value          = res.id_provincia;
            document.getElementById('pais').value               = res.id_pais;
            document.getElementById('nombre').value             = res.nombre;
            document.getElementById('apellidos').value          = res.apellidos;
            document.getElementById('id_persona').value         = res.id_persona;
            document.getElementById('telefono').value           = res.telefono;
            document.getElementById('fechaNacimiento').value    = res.fecha_nacimiento;
            document.getElementById('apodo').value              = res.apodo;
            document.getElementById('correo').value             = res.correo;
            document.getElementById('estadoCivil').value        = res.id_estado_civil;
            document.getElementById('sociedad').value           = res.id_clasificacion;
            document.getElementById('sexo').value               = res.id_sexo;
            document.getElementById('direccion').value          = res.direccion;

            $("#nueva_persona").modal("show");
                  
        }
    }
}
function btnEliminarAsistencia(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "No se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'personas/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                //    console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Eliminado con éxito.',
                            'success'
                        )
                        tblPersonas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarAsistencia(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'personas/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Habilitado con éxito.',
                            'success'
                        )
                        tblPersonas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
function cargarCircuitos(circuitos) {
    let distrito            = document.getElementById("id_distrito");
    let selCircuito         = document.getElementById("id_circuito");
    selCircuito.innerHTML   ='<option value="">Seleccione el Circuito</option>';

    let lstCircuitos = circuitos.filter(circuito => circuito.id_distrito == distrito.value);
    
    lstCircuitos.forEach(row => {
        var option = document.createElement("option");
        option.text = row['circuito'];
        option.value = row['id_circuito'];
        selCircuito.add(option);
    });

    let selIglesia = document.getElementById("id_iglesia");
    selIglesia.innerHTML='<option value="">Seleccione la Iglesia</option>';
}
function cargarIglesias(iglesias) {
    let circuito = document.getElementById("id_circuito");
    let selIglesia = document.getElementById("id_iglesia");
    let lstIglesias = iglesias.filter(iglesia => iglesia.id_circuito == circuito.value);
    selIglesia.innerHTML='<option value="">Seleccione la Iglesia</option>';

    lstIglesias.forEach(row => {
        var option = document.createElement("option");
        option.text = row['iglesia'];
        option.value = row['id_iglesia'];
        selIglesia.add(option);
    });
}
function regAsistencia(id,nombrePersona=""){
    const distrito   = document.getElementById("id_distrito");
    const circuito   = document.getElementById("id_circuito");
    const iglesia    = document.getElementById("id_iglesia");
    const servicio   = document.getElementById("id_servicio");
    const id_persona    = id;
    const nomPersona    = nombrePersona;

    document.getElementById("personaAsist").value = nomPersona;
    document.getElementById("idPersonaAsist").value = id_persona;
    document.getElementById("idServicioAsist").value = servicio.value;
    document.getElementById("idCircuitoAsist").value = circuito.value;
    document.getElementById("idDistritoAsist").value = distrito.value;
    document.getElementById("idIglesiaAsist").value = iglesia.value;

    document.getElementById("servicioAsist").value = servicio.options[servicio.selectedIndex].text;
    document.getElementById("circuitoAsist").value = circuito.options[circuito.selectedIndex].text;
    document.getElementById("distritoAsist").value = distrito.options[distrito.selectedIndex].text;
    document.getElementById("iglesiaAsist").value = iglesia.options[iglesia.selectedIndex].text;


    $("#nueva_asistencia").modal("show");
                    
}
function regPersona(e) {
    e.preventDefault();
    const nombre            = document.getElementById('nombre');
    const apellidos         = document.getElementById('apellidos');
    const provincia         = document.getElementById('provincia');
    const pais              = document.getElementById('pais');
    const tipo_documento    = document.getElementById('tipo_documento');
    const nro_documento     = document.getElementById('nro_documento');
    const telefono          = document.getElementById('telefono');
    const fechaNaciemiento  = document.getElementById('fechaNaciemiento');
    const apodo             = document.getElementById('apodo');
    const correo            = document.getElementById('correo');
    const direccion         = document.getElementById('direccion');
    const sexo              = document.getElementById('sexo');
    const estadoCivil       = document.getElementById('estadoCivil');
    const sociedad          = document.getElementById('sociedad');
    
    if (nombre.value == "" || apellidos.value =="") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Algún Campo requerido esta en blanco',
            showConfirmButton: false,
            timer: 3000
        })
        nombre.classList.add("is-invalid");
        nombre.focus();
    } else{
        const url = base_url + 'personas/registrar';
        const frm = document.getElementById('frmPersonaAsist');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Persona Creado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_asistencia_persona").modal("hide");
                    tblAsistencias.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function ponerPresente(e){
    e.preventDefault();
    const url = base_url + 'asistencias/ponerPresente';
    const frm = document.getElementById('frmRegAsistencia');
    const http = new XMLHttpRequest();
    http.open("POST",url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            const res = JSON.parse(this.responseText); 
            if (res == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Asistencia tomada con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                frm.reset();
                $("#nueva_asistencia").modal("hide");
                //tblAsistencias.ajax.reload();
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 2000
                })
            }        
            
        }
    }
}
// Fin CRUD Asistencias

function frmCaja() {
    document.getElementById("cajaModal").innerHTML = "Nueva Caja";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmCaja').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_caja').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_caja").modal("show");
}
function registrarCaja(e) {
    e.preventDefault();
    const caja             = document.getElementById('caja');
    const descripcion      = document.getElementById('descripcion');
    
    if (caja.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre para la caja',
            showConfirmButton: false,
            timer: 3000
        })
        caja.classList.add("is-invalid");
        descripcion.classList.remove("is-invalid");
        caja.focus();
    } else if (descripcion.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre para la caja',
            showConfirmButton: false,
            timer: 3000
        })
        caja.classList.remove("is-invalid");
        descripcion.classList.add("is-invalid");
        descripcion.focus();
    }else{
        const url = base_url + 'cajas/registrar';
        const frm = document.getElementById('frmCaja');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
              //  console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Caja creada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_caja").modal("hide");
                    tblCajas.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Caja modificada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nueva_caja").modal("hide");
                    tblCajas.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarCaja(id) {
    document.getElementById("cajaModal").innerHTML = "Actualizar Caja";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'cajas/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('caja').value    = res.caja;
            document.getElementById('descripcion').value  = res.descripcion;
            document.getElementById('id_caja').value = res.id;
            $("#nueva_caja").modal("show");
                  
        }
    }
}
function btnEliminarCaja(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "La caja no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'cajas/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                   // console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La caja ha sido eliminada.',
                            'success'
                        )
                        tblCajas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarCaja(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'cajas/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                   // console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'La caja ha sido habilitada.',
                            'success'
                        )
                        tblCajas.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Cajas

function frmProducto() {
    document.getElementById("productoModal").innerHTML = "Nuevo Producto";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmProducto').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_producto').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nuevo_producto").modal("show");
    deleteImg();
}
function registrarProducto(e) {
    e.preventDefault();
    const codigo        = document.getElementById('codigo');
    const producto      = document.getElementById('producto');
    const descripcion   = document.getElementById('descripcion');    
    const precio_compra = document.getElementById('precio_compra');
    const precio_venta  = document.getElementById('precio_venta');
    const medida        = document.getElementById('medida');
    const categoria     = document.getElementById('categoria');
        
    if (codigo.value == "" || producto.value == "" || precio_compra.value == "" || precio_venta.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe llenar todos los campos Obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    }else{
        const url = base_url + 'productos/registrar';
        const frm = document.getElementById('frmProducto');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            //console.log(this.status);
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto Registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_producto").modal("hide");
                    tblProductos.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto Modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_producto").modal("hide");
                    tblProductos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }

                
            }
        }
    }
}
function btnEditarProducto(id) {
    document.getElementById("productoModal").innerHTML = "Actualizar Producto";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'productos/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            //console.log(this.responseText);
            const res         = JSON.parse(this.responseText);  
           
            document.getElementById('codigo').value         = res.codigo;
            document.getElementById('producto').value       = res.producto;
            document.getElementById('imagenOriginal').value = res.foto;
            document.getElementById('imagenDelete').value   = res.foto;
            document.getElementById('descripcion').value    = res.descripcion;
            document.getElementById('medida').value         = res.id_medida;
            document.getElementById('categoria').value      = res.id_categoria;
            document.getElementById('precio_compra').value  = res.precio_compra;
            document.getElementById('precio_venta').value   = res.precio_venta;
            document.getElementById('id_producto').value    = res.id;
            document.getElementById('img-preview').src      = base_url + 'Assets/img/productos/' + res.foto;
            document.getElementById("icon-image").classList.add("d-none");
            document.getElementById("icon-cerrar").innerHTML = `
            <button class="btn btn-danger" onclick="deleteImg();"><i class="fas fa-times"></i></button>
            ${res['foto']}`;
            $("#nuevo_producto").modal("show");
                  
        }
    }
}
function btnEliminarProducto(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "El producto no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'productos/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'El producto ha sido eliminado.',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarProducto(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'productos/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    //console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'El usuario ha sido habilitado.',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}

// Mostrar Imagen
function preview(e){
    const urlImg = e.target.files[0];
    const urlTmp = URL.createObjectURL(urlImg);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("img-preview").height=200;
    document.getElementById("img-preview").width=200;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `
        <button class="btn btn-danger" onclick="deleteImg();"><i class="fas fa-times"></i></button>
        ${urlImg['name']}`;
}
// Fin Mostrar imagen

function deleteImg() {
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src       = '';
    document.getElementById("img-preview").height    = 0;
    document.getElementById("img-preview").width     = 0;
    document.getElementById("imagen").value          = '';
    document.getElementById('imagenDelete').value    = '';
    

}

// Fin Productos

function frmIglesia() {
    document.getElementById("iglesiaModal").innerHTML = "Nueva Iglesia";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmIglesia').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_iglesia').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_iglesia").modal("show");
}
function registrarIglesia(e) {
    e.preventDefault();
    const iglesia               = document.getElementById('iglesia');
    const id_distrito            = document.getElementById('id_distrito');
    const id_circuito           = document.getElementById('id_circuito');
    const direccion           = document.getElementById('direccion');
    
    if (iglesia.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre  de la Iglesia',
            showConfirmButton: false,
            timer: 3000
        })
        iglesia.classList.add("is-invalid");
        iglesia.focus();
    } else{
        const url = base_url + 'iglesias/registrar';
        const frm = document.getElementById('frmIglesia');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Iglesia Creado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nueva_iglesia").modal("hide");
                    tblIglesias.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Iglesia Modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nueva_iglesia").modal("hide");
                    tblIglesias.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarIglesia(id) {
    document.getElementById("iglesiaModal").innerHTML = "Actualizar Iglesia";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'iglesias/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('iglesia').value       = res.iglesia;
            document.getElementById('id_circuito').value    = res.id_circuito;
            document.getElementById('id_iglesia').value   = res.id_iglesia;
            document.getElementById('id_distrito').value    = res.id_distrito;
            document.getElementById('direccion').value    = res.direccion;
            $("#nueva_iglesia").modal("show");
                  
        }
    }
}
function btnEliminarIglesia(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "No se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'iglesias/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                //    console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Iglesia ha sido eliminado.',
                            'success'
                        )
                        tblIglesias.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarIglesia(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'iglesias/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Iglesia ha sido habilitada.',
                            'success'
                        )
                        tblIglesias.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Iglesias


function frmServicio() {
    document.getElementById("servicioModal").innerHTML = "Nuevo Servicio";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmServicio').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_servicio').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nuevo_servicio").modal("show");
}
function registrarServicio(e) {
    e.preventDefault();
    const servicio         = document.getElementById('servicio');
    const id_tipo_servicio = document.getElementById('id_tipo_servicio');
    const fecha_inicio     = document.getElementById('fecha_inicio');
    const hora_inicio      = document.getElementById('hora_inicio');
    const costo            = document.getElementById('costo');
    const descripcion      = document.getElementById('descripcion');
    
    if (servicio.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe introducir un nombre para el servicio',
            showConfirmButton: false,
            timer: 3000
        })
        servicio.classList.add("is-invalid");
        id_tipo_servicio.classList.remove("is-invalid");
        fecha_inicio.classList.remove("is-invalid");
        servicio.focus();
    } else if (id_tipo_servicio.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe seleccionar el tipo servicio',
            showConfirmButton: false,
            timer: 3000
        })
        servicio.classList.remove("is-invalid");
        id_tipo_servicio.classList.add("is-invalid");
        fecha_inicio.classList.remove("is-invalid");
        id_tipo_servicio.focus();
    }else if (fecha_inicio.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Seleccione una fecha válida',
            showConfirmButton: false,
            timer: 3000
        })
        servicio.classList.remove("is-invalid");
        id_tipo_servicio.classList.remove("is-invalid");
        fecha_inicio.classList.add("is-invalid");
        fecha_inicio.focus();
    }else{
        servicio.classList.remove("is-invalid");
        id_tipo_servicio.classList.remove("is-invalid");
        fecha_inicio.classList.remove("is-invalid");

        const url = base_url + 'servicios/registrar';
        const frm = document.getElementById('frmServicio');
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "OK") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Servicio Creado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevo_servicio").modal("hide");
                    tblServicios.ajax.reload();
                }else if (res == "Actualizado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Servicio Modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevo_servicio").modal("hide");
                    tblServicios.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

                
            }
        }
    }
}
function btnEditarServicio(id) {
    document.getElementById("servicioModal").innerHTML = "Actualizar Servicio";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + 'servicios/editar/' + id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            const res = JSON.parse(this.responseText);  
            
            document.getElementById('servicio').value    = res.servicio;
            document.getElementById('descripcion').value  = res.descripcion;
            document.getElementById('id_servicio').value = res.id_servicio;
            document.getElementById('id_tipo_servicio').value = res.id_tipo_servicio;
            document.getElementById('fecha_inicio').value = res.fecha_inicio;
            document.getElementById('hora_inicio').value = res.hora_inicio;
            document.getElementById('costo').value = res.costo;
            if (res.requiere_registro == 1) {
                document.getElementById('requiere_registro').checked = true;
            }
            
            $("#nuevo_servicio").modal("show");
                  
        }
    }
}
function btnEliminarServicio(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de eliminar?',
        text: "La medida no se eliminará de forma permanente, sólo cambiará su estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'servicios/eliminar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Servicio ha sido eliminado.',
                            'success'
                        )
                        tblServicios.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarServicio(id) {
    Swal.fire({ // alerta de sweetalert2
        title: 'Está seguro de Habilitar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Proceder!',
        cancelButtonText: 'No, Abortar!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'servicio/reingresar/' + id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                  //  console.log(this.responseText);                 
                    res = JSON.parse(this.responseText);

                    if (res == "OK") {
                        Swal.fire(
                            'Mensaje!',
                            'Servicio habilitado.',
                            'success'
                        )
                        tblServicios.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
    })
}
// Fin CRUD Servicios

function frmFinanza() {
    document.getElementById("finanzaModal").innerHTML = "Nueva Transaccion";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById('frmFinanza').reset(); // con el reset evito tener que limpiar cada campo del formulario uno por uno
    document.getElementById('id_transaccion').value = ""; // pero los elementos hidden no son afectados por el reset y hay que hacerlo individualmente
    $("#nueva_finanza").modal("show");
}

function regTrasaccion(id, persona="") {
    const id_distrito       = document.getElementById('id_distrito');
    const id_circuito       = document.getElementById('id_circuito');
    const id_iglesia        = document.getElementById('id_iglesia');
    const inFecha           = document.getElementById('inFecha');
    const ahora             = new Date();
    const id_persona        = id;
    var  distrito, circuito, iglesia, nomDistrito, nomCircuito, nomIglesia;
    var fecha;

        
    if (inFecha.value.trim() == "") {
        fecha = ahora.toISOString().substring(0,10);
    }else{
        fecha = inFecha.value;
    }

    if (id_distrito.value.trim() == "") {
        distrito        = c_DISTRITOLOCAL;
        circuito        = c_CIRCUITOLOCAL; 
        iglesia         = c_IGLESIALOCAL;
        nomDistrito     = c_n_DISTRITOLOCAL;
        nomCircuito     = c_n_CIRCUITOLOCAL;
        nomIglesia      = c_n_IGLESIALOCAL;
    }else if (id_distrito.value.trim() == "1" && id_circuito.value.trim() == "") {
        distrito        = c_DISTRITOLOCAL;
        circuito        = c_CIRCUITOLOCAL; 
        iglesia         = c_IGLESIALOCAL;
        nomDistrito     = c_n_DISTRITOLOCAL;
        nomCircuito     = c_n_CIRCUITOLOCAL;
        nomIglesia      = c_n_IGLESIALOCAL;
    }else if (id_iglesia.value.trim() == "") {
        alert( "Debe seleccionar un Circuito y/o una Iglesia");
    }else{
        distrito        = id_distrito.value;
        circuito        = id_circuito.value;
        iglesia         = id_iglesia.value;
        nomDistrito     = id_distrito.options[id_distrito.selectedIndex].text; 
        nomCircuito     = id_circuito.options[id_circuito.selectedIndex].text;
        nomIglesia      = id_iglesia.options[id_iglesia.selectedIndex].text;
        
    }

    document.getElementById("idDistritoFinan").value    = distrito;
    document.getElementById("distritoFinan").value      = nomDistrito;
    
    document.getElementById("idCircuitoFinan").value    = circuito;
    document.getElementById("circuitoFinan").value      = nomCircuito;
    
    document.getElementById("idIglesiaFinan").value     = iglesia;
    document.getElementById("iglesiaFinan").value       = nomIglesia;
    
    document.getElementById("idPersonaFinan").value     = id_persona;
    document.getElementById("personaFinan").value       = persona;
    document.getElementById("fecha").value              = fecha;
    document.getElementById("montoFinan").value         = 0;
    $("#montoFinan").focus();
    $("#nueva_finanza").modal("show");
   
}

function nuevaTransaccion(e) {
    e.preventDefault();
    const monto         = document.getElementById("montoFinan");
    const comentario    = document.getElementById("comentarioFinan");
    const id_tipo_trans = document.getElementById("idTipoTrans");
    const id_concepto   = document.getElementById("idConcepto");
    
    if (monto.value.trim() == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Debe ingresar un monto válido',
            showConfirmButton: false,
            timer: 2000
        })
        monto.classList.add("is-invalid");
        monto.focus();
        
    }else{
        monto.classList.remove("is-invalid");
    }

    if (comentario.value.trim() == "") {
        document.getElementById("comentarioFinan").value = "Diezmo del Mes" ;
    }

    if (id_tipo_trans.value.trim() == "") {
        document.getElementById("idTipoTrans").value = 1 ;
    }

    if (id_concepto.value.trim() == "") {
        document.getElementById("idConcepto").value = 1;
    }

    // Envio del formulario del modal
    const url = base_url + 'finanzas/registrar';
    const frm = document.getElementById('frmRegFinanza');
    const http = new XMLHttpRequest();
    http.open("POST",url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            if (res == "OK") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Ingreso exitoso',
                    showConfirmButton: false,
                    timer: 1500
                })
                frm.reset();
                $("#nueva_finanza").modal("hide");
                tblFinanzas.ajax.reload();
            }else if (res == "Actualizado") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Transacción Modificado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("#nueva_finanza").modal("hide");
                tblFinanzas.ajax.reload();
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 1500
                })
            }            
        }
    }
  
}

// Fin CRUD Finanzas

