$(function() {
    $.ajax({
        type: 'get',
        url: 'http://localhost/crud_productos/welcome/buscar_producto',
        dataType: 'json',
        success: function(response) {
            var cont = 0;
            $("#lista_filtro").empty();
            $.each(response, function(indexInArray, elemet) {
                cont += 1;


                $('#lista_filtro').append(
                    "<tr style='text-aling:center' >" +
                    "<td>  " + cont + "</td> " +
                    " <td> " + elemet.codigo_producto + " </td>" +
                    " <td> " + elemet.nombre_producto + " </td>" +
                    " <td> " + elemet.nombre_categoria_productos + " </td>" +
                    " <td> " + elemet.descripcion_producto + " </td>" +
                    " <td> " + elemet.marca_producto + " </td>" +
                    " <td> " + elemet.precio_producto + " </td>" +
                    "<td> <a style='cursor: pointer' title='Editar' onclick='action(" + elemet.id + "," + 1 + ")' >" +
                    "<i class='fas fa-edit text-primary' title='Editar'> </i> </a>" +
                    "- <a style='cursor: pointer' title='Eliminar' onclick='action(" + elemet.id + "," + 0 + ")'>" +
                    "<i class='fas fa-trash-alt text-danger' title ='Eliminar'> </i> </a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        }
    })
});
// 
// 
// 
$("#buscar_filtro").on('input', function() {
    var buscar = $("#buscar_filtro").val();
    $.ajax({
        type: "post",
        url: "http://localhost/crud_productos/welcome/buscar",
        data: { 'buscar': buscar },
        dataType: "json",
        success: function(response) {
            var cont = 0;
            $("#lista_filtro").empty();
            $.each(response, function(indexInArray, elemet) {
                cont += 1;
                $('#lista_filtro').append(
                    "<tr style='text-aling:center' >" +
                    "<td>  " + cont + "</td> " +
                    " <td> " + elemet.codigo_producto + " </td>" +
                    " <td> " + elemet.nombre_producto + " </td>" +
                    " <td> " + elemet.nombre_categoria_productos + " </td>" +
                    " <td> " + elemet.descripcion_producto + " </td>" +
                    " <td> " + elemet.marca_producto + " </td>" +
                    " <td> " + elemet.precio_producto + " </td>" +
                    "<td> <a style='cursor: pointer' title='Editar' onclick='action(" + elemet.id + "," + 1 + ")' >" +
                    "<i class='fas fa-edit text-primary' title='Editar'> </i> </a>" +

                    "- <a style='cursor: pointer' title='Eliminar' onclick='action(" + elemet.id + "," + 0 + ")'>" +
                    "<i class='fas fa-trash-alt text-danger' title ='Eliminar'> </i> </a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        }
    });
});

// 
// 
// 
// // ñññññ
// // CATEGORIA
$(function() {
    $.ajax({
        type: "get",
        url: "http://localhost/crud_productos/welcome/buscar_categoria",
        dataType: "json",
        success: function(response) {
            var cont = 0;
            $("#lista_filtro2").empty();
            $.each(response, function(indexInArray, elemet) {
                cont += 1;
                if (elemet.activo_categoria_productos == 1) {
                    boton = "<button class='btn btn-success w-100' onclick='ac(" + elemet.id_categoria_productos + "," + 0 + ")' > Desactivar </button>";
                } else {
                    boton = "<button class='btn btn-danger w-100' onclick='ac(" + elemet.id_categoria_productos + "," + 1 + ")' > Activar </button>";

                }

                $('#lista_filtro2').append(
                    "<tr style='text-aling:center' >" +
                    "<td>  " + cont + "</td> " +
                    " <td> " + elemet.codigo_categoria_productos + " </td>" +
                    " <td> " + elemet.nombre_categoria_productos + " </td>" +
                    " <td> " + elemet.descripcion_categoria_productos + " </td>" +
                    "<td> " + boton + "</td> " +
                    "<td> <a style='cursor: pointer' title='Editar' onclick='action2(" + elemet.id_categoria_productos + "," + 1 + ")' >" +
                    "<i class='fas fa-edit text-primary' title='Editar'> </i> </a>" +
                    "- <a style='cursor: pointer' title='Eliminar' onclick='action2(" + elemet.id_categoria_productos + "," + 0 + ")'>" +
                    "<i class='fas fa-trash-alt text-danger' title ='Eliminar'> </i> </a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        }
    });
});

$("#buscar_filtro2").on('input', function() {
    var buscar = $("#buscar_filtro2").val();
    $.ajax({
        type: "post",
        url: "http://localhost/crud_productos/welcome/bus",
        data: { 'buscar2': buscar },
        dataType: "json",
        success: function(response) {
            var cont = 0;
            $("#lista_filtro2").empty();
            $.each(response, function(indexInArray, elemet) {
                cont += 1;
                if (elemet.activo_categoria_productos == 1) {
                    boton = "<button class='btn btn-success w-100' onclick='ac(" + elemet.id_categoria_productos + "," + 0 + ")' > Desactivar </button>";

                } else {
                    boton = "<button class='btn btn-danger w-100' onclick='ac(" + elemet.id_categoria_productos + "," + 1 + ")' > Activar </button>";
                }
                $('#lista_filtro2').append(
                    "<tr style='text-aling:center' >" +
                    "<td>  " + cont + "</td> " +
                    " <td> " + elemet.codigo_categoria_productos + " </td>" +
                    " <td> " + elemet.nombre_categoria_productos + " </td>" +
                    " <td> " + elemet.descripcion_categoria_productos + " </td>" +
                    "<td> " + boton + "</td> " +
                    "<td> <a style='cursor: pointer' title='Editar' onclick='action2(" + elemet.id_categoria_productos + "," + 1 + ")' >" +
                    "<i class='fas fa-edit text-primary' title='Editar'> </i> </a>" +
                    "- <a style='cursor: pointer' title='Eliminar' onclick='action2(" + elemet.id_categoria_productos + "," + 0 + ")'>" +
                    "<i class='fas fa-trash-alt text-danger' title ='Eliminar'> </i> </a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        }
    });
});

// function check(v) {
//     var h = document.getElementsByName('gol').values;
// }
// $(function() {
//     $('.ch').prop('checked', true);
// });

function ac(d1, d2) {
    $.ajax({
        type: "post",
        url: "http://localhost/crud_productos/welcome/activa_des",
        data: { 'id': d1, 'valor': d2 },
        // dataType: "dataType",
        success: function(response) {
            location.reload();
        }
    });
}