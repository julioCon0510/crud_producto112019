function sololetras2(a) {
    key = a.keyCode || a.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz0123456789";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }

}

// // function para editar o eliminar un producto
function action2(param, param2) {
    // condicion para eliminar agreagndo un alert personalizado
    if (param2 == 0) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: '¿ Está seguro de  eliminar esta categoría?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!  ',
            cancelButtonText: '  Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire(
                    'El producto ha sido eliminado!',
                    '',
                    'success'
                ).then(function() {
                    // alert(param + 'ñññ' + param2)
                    $.ajax({
                        type: "post",
                        url: 'http://localhost/crud_productos/welcome/action_eliminar2',
                        data: { 'id': param },
                        success: function(res) {
                            location.reload();
                            // alert(res);
                        }
                    });
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {}
        })
    }

    // AQUI CAMBIAMOS EL TIPO DE BOTOM DEL BOOSTRAP Y SABER QUE DESEA  HACER, EDITAR O GUARDAR
    if (param2 == 1) {
        $('#exampleModalLong').modal('show');
        $.ajax({
            type: "post",
            url: "http://localhost/crud_productos/welcome/action_editar2",
            data: { "id": param },
            dataType: 'json',
            success: function(response) {

                $.each(response, function(indexInArray, value) {
                    $("#cod_producto2").val(value.codigo_categoria_productos);
                    $("#n_producto2").val(value.nombre_categoria_productos);
                    $("#des_producto2").val(value.descripcion_categoria_productos);
                });
                console.log(response);
            }
        });
    }
    $('#editar2').html("<button class='btn btn-primary ml-2' id='update2' onclick='validar2(" + 0 + ",1)'>Editar</button>");

    $("#update2").on('click', function() {
        if (validar2() == false) {
            return false;
        } else {
            $.ajax({
                url: 'http://localhost/crud_productos/welcome/update2',
                data: {
                    'id': param,
                    'codigo': $("#cod_producto2").val(),
                    'nombre': $("#n_producto2").val(),
                    'des': $("#des_producto2").val(),
                },
                type: 'post',
                success: function(res) {
                    if (res == 'cn') {
                        // alert('codig no');
                        $("#cod2").fadeIn();
                        $("#cod2").html('Este codigo ya existe');
                        $("#cod2").fadeOut(3000);
                        return false;
                    }
                    if (res == 'nn') {
                        $("#nom2").fadeIn();
                        $("#nom2").html('Este nombre ya existe');
                        $("#nom2").fadeOut(3000);
                    }
                    if (res == 'ok') {
                        Swal.fire({
                            type: 'success',
                            title: 'Categoria Actualizado',
                            showConfirmButton: false,
                            timer: 1800,
                        }).then(function() {
                            location.reload();
                        })
                    }
                }
            })
        }
    });
}

$("#exampleModalLong").on("hidden.bs.modal", function() {
    $('#editar2').html("<button class='btn btn-primary ml-2' id='enviar2' onclick='validar2(0,3)'>Guardar</button>");
    $("#cod_producto2").val('');
    $("#n_producto2").val('');
    $("#des_producto2").val('');
});


// validar

function validar2(param, valor) {


    var codigo2 = $("#cod_producto2").val();
    var nombre2 = $("#n_producto2").val();
    var des2 = $("#des_producto2").val();


    if (codigo2.length < 4 || codigo2 == "") {
        $("#cod2").fadeIn();
        $("#cod2").html('El codigo debe tener entre 4  y 10 caracteres');
        $("#cod2").fadeOut(3000);
        return false;
    }
    if (nombre2.length < 2) {
        $("#nom2").fadeIn();
        $("#nom2").html('El nombre debe tener minimo 2 caracteres');
        $("#nom2").fadeOut(3000);
        return false;
    }
    if (des2 == "") {
        $("#des2").fadeIn();
        $("#des2").html('Describa el producto');
        $("#des2").fadeOut(3000);
        return false;
    }

    // // conficion para guardar

    if (valor == 3) {
        $.ajax({
            url: 'http://localhost/crud_productos/welcome/consultar_productos2',
            type: 'post',
            data: { 'codigo': codigo2, 'nombre': nombre2, 'des': des2, },
            success: function(result) {
                // alert(result);
                if (result == "cod") {
                    $("#cod2").fadeIn();
                    $("#cod2").html('Este codigo ya existe');
                    $("#cod2").fadeOut(3000);
                }
                if (result == "nom") {
                    $("#nom2").fadeIn();
                    $("#nom2").html('Este nombre ya existe');
                    $("#nom2").fadeOut(3000);
                }
                if (result != "nom" && result != "cod") {
                    Swal.fire({
                        type: 'success',
                        title: 'Categoria agregada',
                        showConfirmButton: false,
                        timer: 1800,
                    }).then(function() {
                        location.reload();
                    })
                }
            }

        });
    }

}