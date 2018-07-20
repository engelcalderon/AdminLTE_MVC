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

$("#nuevoProductoForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../ajax/productsAjax.php',
        data: {
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

$("[id='buttonEditarProducto']").click(function() {
    var product = $(this).closest("tr").find(".Codigo");
    console.log(product)
})