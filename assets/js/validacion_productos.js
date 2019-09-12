// function para editar o eliminar un producto

function action(param1, param2) {
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
            title: '¿ Está seguro de  eliminar el producto?',
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
                    // alert(param1 + 'ñññ' + param2)
                    $.ajax({
                        url: 'welcome/action_eliminar',
                        type: 'post',
                        data: { 'id': param1 },
                        success: function(res) {
                            location.reload();
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
        $('#exampleModal').modal('show');
        $.ajax({
            type: "post",
            url: "welcome/action_editar",
            data: { "id": param1 },
            dataType: 'json',
            success: function(response) {
                // ("#cate_producto").empty();
                $.each(response, function(indexInArray, value) {
                    $("#cod_producto").val(value.codigo_producto);
                    $("#n_producto").val(value.nombre_producto);
                    $("#cate_producto [value=" + value.categoria_producto + "]").attr("selected", true);
                    $("#des_producto").val(value.descripcion_producto);
                    $("#marca_producto").val(value.marca_producto);
                    $("#precio_producto").val(value.precio_producto);
                });
            }
        });
    }
    $('#editar').html("<button class='btn btn-primary ml-2' id='update' onclick='validar(" + 0 + ",1)'>Editar</button>");
    $("#update").on('click', function() {

        if (validar() == false) {
            return false;
        } else {
            $.ajax({
                url: 'welcome/update',
                data: {
                    'id': param1,
                    'codigo': $("#cod_producto").val(),
                    'nombre': $("#n_producto").val(),
                    'cate': $("#cate_producto").val(),
                    'des': $("#des_producto").val(),
                    'marca': $("#marca_producto").val(),
                    'precio': $("#precio_producto").val(),
                },
                type: 'post',
                success: function(res) {
                    if (res == 'cn') {
                        // alert('codig no');
                        $("#cod").fadeIn();
                        $("#cod").html('Este codigo ya existe');
                        $("#cod").fadeOut(3000);
                        return false;
                    }
                    if (res == 'nn') {
                        $("#nom").fadeIn();
                        $("#nom").html('Este nombre ya existe');
                        $("#nom").fadeOut(3000);
                    }
                    if (res == 'ok') {
                        Swal.fire({
                            type: 'success',
                            title: 'Producto Actualizado',
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




// funcion cuando cierra el modal

$("#exampleModal").on("hidden.bs.modal", function() {
    $('#editar').html("<button class='btn btn-primary ml-2' id='enviar' onclick='validar(0,3)'>Guardar</button>");
    $("#cod_producto").val('');
    $("#n_producto").val('');
    $("#des_producto").val('');
    $("#marca_producto").val('');
    $("#precio_producto").val('');
    $("#cate_producto [value=0]").attr("selected", true);
});



// VALIDA LOS DATOS TANTO PARA EDIRA COMO PARA GUARDAR
function validar(param, valor) {
    var codigo = $("#cod_producto").val();
    var nombre = $("#n_producto").val();
    var cate = $("#cate_producto").val();
    var des = $("#des_producto").val();
    var marca = $("#marca_producto").val();
    var precio = $("#precio_producto").val();

    if (codigo.length < 4 || codigo == "") {
        $("#cod").fadeIn();
        $("#cod").html('El codigo debe tener entre 4  y 10 caracteres');
        $("#cod").fadeOut(3000);
        return false;
    }
    if (nombre.length < 4) {
        $("#nom").fadeIn();
        $("#nom").html('El nombre debe tener minimo 4 caracteres');
        $("#nom").fadeOut(3000);
        return false;
    }
    if (!cate) {
        $("#cate").fadeIn();
        $("#cate").html('Seleccionar una categoría');
        $("#cate").fadeOut(3000);
        return false;
    }
    if (des == "") {
        $("#des").fadeIn();
        $("#des").html('Describa el producto');
        $("#des").fadeOut(3000);
        return false;
    }
    if (marca == "") {
        $("#marca").fadeIn();
        $("#marca").html('Proporcione una marca');
        $("#marca").fadeOut(3000);
        return false;
    }
    if (precio < 1000) { //se valida que sea un numero valido 
        $("#precioo").fadeIn();
        $("#precioo").html('Valor no valido');
        $("#precioo").fadeOut(3000);
        return false;
    }
    // conficion para guardar

    if (valor == 3) {
        $.ajax({
            url: 'welcome/consultar_productos',
            type: 'post',
            data: { 'codigo': codigo, 'nombre': nombre, 'cate': cate, 'des': des, 'marca': marca, 'precio': precio },
            success: function(result) {
                if (result == "cod") {
                    $("#cod").fadeIn();
                    $("#cod").html('Este codigo ya existe');
                    $("#cod").fadeOut(3000);
                }
                if (result == "nom") {
                    $("#nom").fadeIn();
                    $("#nom").html('Este nombre ya existe');
                    $("#nom").fadeOut(3000);
                }
                if (result != "nom" && result != "cod") {
                    Swal.fire({
                        type: 'success',
                        title: 'Producto agregado',
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

function sololetras(a) {
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

function solonumeros(a) {
    key = a.keyCode || a.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
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