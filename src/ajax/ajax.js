$("#loginForm").submit( function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: "ajax/usersAjax.php",
        data: {
            login: 1,
            email: $("#loginEmail").val(),
            password:$("#loginPassword").val()
        },
        beforeSend: function(response) {
            console.log("loading");
        },
        success: function(response) {
            response = JSON.parse(response);
            
            if (response.status == "success") {
                window.location.href = "./dashboard";
            }
            else if (response.status == "error") {
                $("#loginErrorBox").show();
                $("#loginErrorMessage").text(response.message);
            }
        },
        error: function(response) {

        }
    });
});

$("#registerForm").submit( function(e) {
    e.preventDefault();

    $("#registerErrorBox").hide();
    if ($("#registerPassword").val() != $("#registerRetypedPassword").val()) {
        $("#registerErrorBox").show();
        $("#registerErrorMessage").text("Password does not match");
        return;
    }

    $.ajax({
        type: 'POST',
        url: "ajax/usersAjax.php",
        data: {
            register: 1,
            name: $("#registerName").val(),
            email: $("#registerEmail").val(),
            password:$("#registerPassword").val()
        },
        beforeSend: function(response) {
            console.log("loading");
        },
        success: function(response) {
            response = JSON.parse(response);
            
            if (response.status == "success") {
                window.location.href = "./login";
            }
            else if (response.status == "error") {
                $("#registerErrorBox").show();
                $("#registerErrorMessage").text("Something went wrong");
            }
            console.log(response);
        },
        error: function(response) {

        }
    });
});

// Añadir nuevos clientes formulario
provinciasLoaded = false;
$("#buttonNuevoCliente").click(function(e) {
    if (!provinciasLoaded) {
        $.ajax({
            type: 'GET',
            url: 'https://ubicaciones.paginasweb.cr/provincias.json',
            dataType: 'json',
            success: function(response) {
                var html = "";
                for(key in response) {
                    html += "<option value="+key+">" + response[key] + "</option>";
                }
                $("#registroCliente_provincia").append(html);
                provinciasLoaded = true;
            }
        });
    }
});

function getCantones(provinciaID) {
     $("#registroCliente_distrito").html('<option value="0" selected="selected">Seleccione una opción</option>');

    if (provinciaID == 0)  {
        $("#registroCliente_canton").html('<option value="0" selected="selected">Seleccione una opción</option>');
        return;
    }  
    $.ajax({
        type: 'GET',
        url: 'https://ubicaciones.paginasweb.cr/provincia/'+provinciaID+'/cantones.json',
        dataType: 'json',
        success: function(response) {
            var html = '<option value="0" selected="selected">Seleccione una opción</option>';
            for(key in response) {
                html += "<option value="+key+">" + response[key] + "</option>";
            }
            $("#registroCliente_canton").html(html);
        }
    });
    
}

function getDistritos(cantonID) {
    if (cantonID == 0)
    {
        $("#registroCliente_distrito").html('<option value="0" selected="selected">Seleccione una opción</option>');
        return;
    }
    $.ajax({
        type: 'GET',
        url: 'https://ubicaciones.paginasweb.cr/provincia/1/canton/'+cantonID+'/distritos.json',
        dataType: 'json',
        success: function(response) {
            var html = '<option value="0" selected="selected">Seleccione una opción</option>';
            for(key in response) {
                html += "<option value="+key+">" + response[key] + "</option>";
            }
            $("#registroCliente_distrito").html(html);
        }
    });
}

$("#nuevoClientForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: "../ajax/clientsAjax.php",
        data: {
            nuevo: true,
            tipoID: $("#registroCliente_tipoID option:selected").text(),
            ID: $("#registroCliente_identificacion").val(),
            nombre: $("#registroCliente_nombre").val(),
            nfantasia: $("#registroCliente_nombrefantasia").val(),
            telefono: $("#registroCliente_telefono").val(),
            email: $("#registroCliente_email").val(),
            provincia:$("#registroCliente_provincia option:selected").text(),
            canton: $("#registroCliente_canton option:selected").text(),
            distrito: $("#registroCliente_distrito option:selected").text(),
            barrio: $("#registroCliente_barrio").val(),
            direccion: $("#registroCliente_direccion").val(),
        },
        beforeSend: function(response) {
            $("#buttonNewClientSaveChanges").text("Guardando...");
        },
        success: function(response) {
            response = JSON.parse(response);
            
            var html = "";

            if (response.status == "success") {
                html += `
                <tr>
                    <td>`+response.client["identificacion"]+`</td>
                    <td>`+response.client["tipoID"]+`</td>
                    <td>`+response.client["nombre"]+`</td>
                    <td>`+response.client["nombre_fantasia"]+`</td>
                    <td>`+response.client["telefono"]+`</td>
                    <td>`+response.client["email"]+`</td>
                    <td>`+response.client["provincia"]+`</td>
                    <td>`+response.client["canton"]+`</td>
                    <td>`+response.client["distrito"]+`</td>
                    <td>`+response.client["barrio"]+`</td>
                    <td>`+response.client["direccion"]+`</td>
                    <td>
                            <button class='btn btn-default btn-sm' onClick='buttonEditarCliente(`+response.client["id"]+`);'>
                                <i class='fa fa-edit'></i></button>
                            <button class='btn btn-default btn-sm' onClick='buttonEliminarCliente(`+response.client["id"]+`)'><i class='fa fa-trash-o'></i></button>
                        </td>
                </tr>
                `;
                $("#modal-default").modal('hide');
                $("#clientsTableBody").append(html);
            }
            else if (response.status == "error") {
                console.log(response);
                // $("#loginErrorBox").show();
                // $("#loginErrorMessage").text(response.message);
            }
            $("#buttonNewClientSaveChanges").text("Guardar cambios");
            $("#registroCliente_tipoID").val(0);
            $("#registroCliente_identificacion").val("")
            $("#registroCliente_nombre").val("")
            $("#registroCliente_nombrefantasia").val("")
            $("#registroCliente_telefono").val("")
            $("#registroCliente_email").val("")
            $("#registroCliente_provincia").val(0)
            $("#registroCliente_canton").val(0)
            $("#registroCliente_distrito").val(0)
            $("#registroCliente_barrio").val("")
            $("#registroCliente_direccion").val("")
        },
        error: function(response) {
            $("#buttonNewClientSaveChanges").text("Guardar cambios");
            alert(response);
        }
    });
});

var idClienteEditar = -1;
function buttonEditarCliente(id) {
    idClienteEditar = id;

    $("#modal-editarCliente").modal('show');

    $.ajax({
        type: 'POST',
        url: '../ajax/clientsAjax.php',
        data: {
            mostrarEditar: true,
            idCliente: idClienteEditar
        },
        beforeSend: function(response) {
        },
        success: function(response) {
           response = JSON.parse(response)
            // console.log(response);
        //    console.log($('#editarCliente_tipoID').find('option[text=Física]').val());
            $('#editarCliente_identificacion').val(response.data.identificacion);
            $('#editarCliente_nombre').val(response.data.nombre);
            $('#editarCliente_nombrefantasia').val(response.data.nombre_fantasia);
            $('#editarCliente_telefono').val(response.data.telefono);
            $('#editarCliente_email').val(response.data.email);
            // $('#editarCliente_provincia').val(response.data.identificacion);
            // $('#editarCliente_canton').val(response.data.identificacion);
            // $('#editarCliente_distrito').val(response.data.identificacion);
            $('#editarCliente_barrio').val(response.data.barrio);
            $('#editarCliente_direccion').val(response.data.direccion);
        },
        error: function(error) {
           
        }
    })
}

$("#editarClienteForm").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../ajax/clientsAjax.php",
        data: {
            editar: true,
            id_cliente: idClienteEditar,
            tipoID: $("#editaroCliente_tipoID option:selected").text(),
            ID: $("#editarCliente_identificacion").val(),
            nombre: $("#editarCliente_nombre").val(),
            nfantasia: $("#editarCliente_nombrefantasia").val(),
            telefono: $("#editarCliente_telefono").val(),
            email: $("#editarCliente_email").val(),
            provincia:$("#editarCliente_provincia option:selected").text(),
            canton: $("#editarCliente_canton option:selected").text(),
            distrito: $("#editarCliente_distrito option:selected").text(),
            barrio: $("#editarCliente_barrio").val(),
            direccion: $("#editarCliente_direccion").val(),
        },
        beforeSend: function(response) {
            $("#botonGuardarCambiosEditarCliente").text("Guardando...");
        },
        success: function(response) {
            // response = JSON.parse(response);
            console.log(response);
            var html = "";

            if (response.status == "success") {
                // html += `
                // <tr>
                //     <td>`+response.client["identificacion"]+`</td>
                //     <td>`+response.client["tipoID"]+`</td>
                //     <td>`+response.client["nombre"]+`</td>
                //     <td>`+response.client["nombre_fantasia"]+`</td>
                //     <td>`+response.client["telefono"]+`</td>
                //     <td>`+response.client["email"]+`</td>
                //     <td>`+response.client["provincia"]+`</td>
                //     <td>`+response.client["canton"]+`</td>
                //     <td>`+response.client["distrito"]+`</td>
                //     <td>`+response.client["barrio"]+`</td>
                //     <td>`+response.client["direccion"]+`</td>
                // </tr>
                // `;
                console.log(response);
                $("#modal-editarCliente").modal('hide');
                $("#clientsTableBody").append(html);
            }
            else if (response.status == "error") {
                console.log(response);
            }
            $("#botonGuardarCambiosEditarCliente").text("Guardar cambios");
            $("#editaroCliente_tipoID").val(0);
            $("#editarCliente_identificacion").val("")
            $("#editarCliente_nombre").val("")
            $("#editarCliente_nombrefantasia").val("")
            $("#editarCliente_telefono").val("")
            $("#editarCliente_email").val("")
            $("#editarCliente_provincia").val(0)
            $("#editarCliente_canton").val(0)
            $("#editarCliente_distrito").val(0)
            $("#editarCliente_barrio").val("")
            $("#editarCliente_direccion").val("")
        },
        error: function(response) {
            $("#botonGuardarCambiosEditarCliente").text("Guardar cambios");
            alert(response);
        }
    });
});

idClienteEliminar = -1;
function buttonEliminarCliente(id) {
    idClienteEliminar = id;

    if (confirm("Desea eliminar este cliente?")) {
        $.ajax({
            type: 'POST',
            url: '../ajax/clientsAjax.php',
            data: {
                eliminar: true,
                id: idClienteEliminar,
            },
            beforeSend: function(response) {
            },
            success: function(response) {
                response = JSON.parse(response)
            
                if (response.status == 'success') {
                    setTimeout(function() {window.location.reload();}, 500);
                }
                else {
                    console.log(response)
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    else {

    }
}

$("#nuevoProductoForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../ajax/productsAjax.php',
        data: {
            nuevo: true,
            codigo: $("#nuevoProducto_codigo").val(),
            nombre: $("#nuevoProducto_nombre").val(),
            cantidad: $("#nuevoProducto_cantidad").val(),
            impuesto: $("#nuevoProducto_impuesto").val(),
            precio_compra: $("#nuevoProducto_precioCompra").val(),
            precio_venta: $("#nuevoProducto_precioVenta").val()
        },
        beforeSend: function(response) {
            $("#buttonAgregarProductoSaveChanges").text("Guardando...");
        },
        success: function(response) {
            response = JSON.parse(response)
            
            var html = ''

            if (response.status == 'success') {
                html += `
                    <tr>
                        <td>`+response.product["codigo"]+`</td>
                        <td>`+response.product["nombre"]+`</td>
                        <td>`+response.product["cantidad_existente"]+`</td>
                        <td>`+response.product["impuesto_venta"]+`</td>
                        <td>`+response.product["precio_compra"]+`</td>
                        <td>`+response.product["precio_venta"]+`</td>
                        <td>
                            <button class='btn btn-default btn-sm' id='buttonEditarProducto' onClick='buttonEditarProducto(`+response.product["id"]+`)'>
                                <i class='fa fa-edit'></i></button>
                            <button class='btn btn-default btn-sm' onClick='buttonEliminarProducto(`+response.product["id"]+`)'><i class='fa fa-trash-o'></i></button>
                        </td>
                    </tr>              
                `;
                $("#modal-default").modal('hide');
                $("#productosTableBody").append(html);
            }
            else {
                console.log(response)
            }
            $("#buttonAgregarProductoSaveChanges").text("Guardar cambios");
            $("#nuevoProducto_codigo").val('')
            $("#nuevoProducto_nombre").val('')
            $("#nuevoProducto_cantidad").val('')
            $("#nuevoProducto_impuesto").val('')
            $("#nuevoProducto_precioCompra").val('')
            $("#nuevoProducto_precioVenta").val('')
        },
        error: function(error) {
            $("#buttonAgregarProductoSaveChanges").text("Guardar cambios");
            alert(response);
        }
    });

});

