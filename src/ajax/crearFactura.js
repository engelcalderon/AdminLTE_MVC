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
                    <td>1</td>
                    <td>`+response.data["nombre"]+`</td>
                    <td>`+response.data["codigo"]+`</td>
                    <td>`+response.data["precio_venta"]+`</td>
                    <td>
                            <button class='btn btn-default btn-sm' onClick='eliminarProductoDeFactura(this, `+response.data["id"]+`)'><i class='fa fa-trash-o'></i></button>
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

function eliminarProductoDeFactura(row, idProducto) {
    row.closest("tr").remove()
    productos = productos.filter(function(e) {
        return e.producto != idProducto;
    });
}

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
                abrirVentanaFactura();
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

function abrirVentanaFactura() {
    window.open("factura");
}

function imprimirFactura(idFactura) {
    // Cookies.set('factura', idFactura, { expires: 10, path: '' });
    createCookie("factura", idFactura);
    abrirVentanaFactura();
}

function createCookie(name, value) {
    var date = new Date();
    date.setTime(date.getTime() + (5*1000));
    var expires = "; expires= " + date.toGMTString();
  
    document.cookie = name + "=" + value + expires + "; path=/";
  }

// var delete_row = $(this).data('row');
// $('#' + delete_row).remove()