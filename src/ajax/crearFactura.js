var productos = [];
$("#addProductForm").submit( function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: "../ajax/crearFacturaAjax.php",
        data: {
            agregandoProducto: true,
            productID: $("#codProducto").val(),
        },
        beforeSend: function(response) {
        },
        success: function(response) {
            response = JSON.parse(response);

            var html = "";

            if (response.status == "success") {

                productos.push(
                    {
                        producto: response.data["id"],
                        cantidad: 1
                    }
                );

                html += `
                <tr>
                    <td>`+response.data["cantidad_existente"]+`</td>
                    <td>`+response.data["nombre"]+`</td>
                    <td>`+response.data["codigo"]+`</td>
                    <td>`+response.data["precio_venta"]+`</td>
                    <td>
                            <button class='btn btn-default btn-sm' onClick='buttonEliminarCliente(`+response.data["id"]+`)'><i class='fa fa-trash-o'></i></button>
                    </td>
                </tr>
                `;

                $("#nuevaFacturaCuerpoTablaProductos").append(html);
            }
            else {
                console.log(response);
            }

            $("#codProducto").val("");
        },
        error: function(response) {

        }
    });
});

function guardarFactura() {
    $.ajax({
        type: 'POST',
        url: "../ajax/crearFacturaAjax.php",
        data: {
            guardar: true,
            cliente: $("#nuevaFacturaCliente").val(),
            productos: productos
        },
        beforeSend: function(response) {
        },
        success: function(response) {
            response = JSON.parse(response);
            // console.log(response);
            if (response.status == "success") {
                imprimirFactura(response.factura);
                window.location.replace("facturas");
            } else {
                console.log(response);
            }
        },
        error: function(response) {
            console.log(response)
        }
    });
}

function imprimirFactura(idFactura) {
    window.open("factura");
}

// var delete_row = $(this).data('row');
// $('#' + delete_row).remove()