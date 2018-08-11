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

var idProductoEditar = -1;
function buttonEditarProducto(id) {
    idProductoEditar = id;

    $("#modal-editarProducto").modal('show');

    $.ajax({
        type: 'POST',
        url: '../ajax/productsAjax.php',
        data: {
            mostrarEditar: true,
            idProducto: idProductoEditar
        },
        beforeSend: function(response) {
            console.log(idProductoEditar);
        },
        success: function(response) {
            response = JSON.parse(response);
            $("#editarProducto_codigo").val(response.data.codigo)
            $("#editarProducto_nombre").val(response.data.nombre)
            $("#editarProducto_cantidad").val(response.data.cantidad_existente)
            $("#editarProducto_impuesto").val(response.data.impuesto_venta)
            $("#editarProducto_precioCompra").val(response.data.precio_compra)
            $("#editarProducto_precioVenta").val(response.data.precio_venta)
        },
        error: function(error) {
           console.log(error);
        }
    })
};

$("#editarProductoForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '../ajax/productsAjax.php',
        data: {
            editar: true,
            id: idProductoEditar,
            codigo: $("#editarProducto_codigo").val(),
            nombre: $("#editarProducto_nombre").val(),
            cantidad: $("#editarProducto_cantidad").val(),
            impuesto: $("#editarProducto_impuesto").val(),
            precio_compra: $("#editarProducto_precioCompra").val(),
            precio_venta: $("#editarProducto_precioVenta").val()
        },
        beforeSend: function(response) {
            $("#editarProductoGuardar").text("Guardando...");
        },
        success: function(response) {
            response = JSON.parse(response)
            
            if (response.status == 'success') {
                // console.log(response);
                $("#modal-editarProducto").modal('hide');
                setTimeout(function() {window.location.reload();}, 500);
            }
            else {
                console.log(response)
            }
            $("#editarProductoGuardar").text("Guardar cambios");
            $("#editarProducto_codigo").val('')
            $("#editarProducto_nombre").val('')
            $("#editarProducto_cantidad").val('')
            $("#editarProducto_impuesto").val('')
            $("#editarProducto_precioCompra").val('')
            $("#editarProducto_precioVenta").val('')
        },
        error: function(error) {
            $("#buttonAgregarProductoSaveChanges").text("Guardar cambios");
            alert(response);
        }
    });

});

idProductoEliminar = -1;
function buttonEliminarProducto(id) {
    idProductoEliminar = id;

    if (confirm("Desea eliminar este producto?")) {
        $.ajax({
            type: 'POST',
            url: '../ajax/productsAjax.php',
            data: {
                eliminar: true,
                id: idProductoEliminar,
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