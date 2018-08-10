function upload_image() {
    var respuesta = "";
    var inputFile = $("#file")[0];
    var file = inputFile.files[0];

    if ((typeof file === "object") && (file !== null)) {
        var data = new FormData();
        data.append('file', file);
        $.ajax({
            url: "../ajax/uploadAjax.php",
            type: 'POST',
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(objeto) {
                if (objeto==0) {

                }
                else if (objeto==1){

                }
                else if (objeto==2) {

                }
                else if(objeto==3) {

                }
                else if(objeto==4) {

                }
                else {
                    $("#file2").val(objeto);
                    console.log(objeto);
                }
            },
            error: function(data) {
                console.log("Error interno");
                console.log(data);
            }
        });
    }
    else {
        errorNot("Ocurrio error interno");
    }
}