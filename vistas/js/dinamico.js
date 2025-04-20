function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}

function escribir(){
    $.ajax({
        url:'crearImagen.php',
        type:"GET",
        data:$('#crear-imagen').serialize(),
        success:function(respuesta){
            var imagen = '<img src ="crearImagen.php?';
            imagen += 'carpeta=' +$('#carpeta').val()+ '&';
            imagen += 'imagen=' +$('#imagen').val()+ '&';
            imagen += 'nombre=' +$('#nombre').val()+ '&';
            imagen += 'color-1=' +$('#color-1').val()+ '&';
            imagen += 'tamano-1=' +$('#tamano-1').val()+ '&';
            imagen += 'p-x-1=' +$('#p-x-1').val()+ '&';
            imagen += 'p-y-1=' +$('#p-y-1').val()+ '&';
            imagen += 'fuente-1=' +$('#fuente-1').val()+ '&';

            imagen += 'fecha=' +$('#fecha').val()+ '&';
            imagen += 'color-2=' +$('#color-2').val()+ '&';
            imagen += 'tamano-2=' +$('#tamano-2').val()+ '&';
            imagen += 'p-x-2=' +$('#p-x-2').val()+ '&';
            imagen += 'p-y-2=' +$('#p-y-2').val()+ '&';
            imagen += 'fuente-2=' +$('#fuente-2').val()+ '&';

            imagen += 'texto=' +$('#texto').val()+ '&';
            imagen += 'color-3=' +$('#color-3').val()+ '&';
            imagen += 'tamano-3=' +$('#tamano-3').val()+ '&';
            imagen += 'p-x-3=' +$('#p-x-3').val()+ '&';
            imagen += 'p-y-3=' +$('#p-y-3').val()+ '&';
            imagen += 'fuente-3=' +$('#fuente-3').val()+ '&';

            imagen += 'texto-2=' +$('#texto-2').val()+ '&';
            imagen += 'color-4=' +$('#color-4').val()+ '&';
            imagen += 'tamano-4=' +$('#tamano-4').val()+ '&';
            imagen += 'p-x-4=' +$('#p-x-4').val()+ '&';
            imagen += 'p-y-4=' +$('#p-y-4').val()+ '&';
            imagen += 'fuente-4=' +$('#fuente-4').val()+ '" width ="100%" height="100%" />';

            $('#carpeta-r').val($('#carpeta').val());
            $('#imagen-r').val($('#imagen').val());
            $('#nombre-r').val($('#nombre').val());
            $('#color-1-r').val($('#color-1').val());
            $('#tamano-1-r').val($('#tamano-1').val());
            $('#p-x-1-r').val($('#p-x-1').val());
            $('#p-y-1-r').val($('#p-y-1').val());
            $('#fuente-1-r').val($('#fuente-1').val());

            $('#fecha-r').val($('#fecha').val());
            $('#color-2-r').val($('#color-2').val());
            $('#tamano-2-r').val($('#tamano-2').val());
            $('#p-x-2-r').val($('#p-x-2').val());
            $('#p-y-2-r').val($('#p-y-2').val());
            $('#fuente-2-r').val($('#fuente-2').val());

            $('#texto-r').val($('#texto').val());
            $('#color-3-r').val($('#color-3').val());
            $('#tamano-3-r').val($('#tamano-3').val());
            $('#p-x-3-r').val($('#p-x-3').val());
            $('#p-y-3-r').val($('#p-y-3').val());
            $('#fuente-3-r').val($('#fuente-3').val());

            $('#texto-2-r').val($('#texto-2').val());
            $('#color-4-r').val($('#color-4').val());
            $('#tamano-4-r').val($('#tamano-4').val());
            $('#p-x-4-r').val($('#p-x-4').val());
            $('#p-y-4-r').val($('#p-y-4').val());
            $('#fuente-4-r').val($('#fuente-4').val());

            $("#mostrar-imagen").html(imagen);


        }
    });
}

function actualizar(){
    $.ajax({
        url:'crearImagen.php',
        type:"GET",
        data:$('#crear-imagen').serialize(),
        success:function(respuesta){
            var imagen = '<img src ="crearImagen.php?';
            imagen += 'carpeta=' +$('#carpeta').val()+ '&';
            imagen += 'imagen=' +$('#imagen').val()+ '&';
            imagen += 'nombre=' +$('#nombre').val()+ '&';
            imagen += 'color-1=' +$('#color-1').val()+ '&';
            imagen += 'tamano-1=' +$('#tamano-1').val()+ '&';
            imagen += 'p-x-1=' +$('#p-x-1').val()+ '&';
            imagen += 'p-y-1=' +$('#p-y-1').val()+ '&';
            imagen += 'fuente-1=' +$('#fuente-1').val()+ '&';

            imagen += 'fecha=' +$('#fecha').val()+ '&';
            imagen += 'color-2=' +$('#color-2').val()+ '&';
            imagen += 'tamano-2=' +$('#tamano-2').val()+ '&';
            imagen += 'p-x-2=' +$('#p-x-2').val()+ '&';
            imagen += 'p-y-2=' +$('#p-y-2').val()+ '&';
            imagen += 'fuente-2=' +$('#fuente-2').val()+ '&';

            imagen += 'texto=' +$('#texto').val()+ '&';
            imagen += 'color-3=' +$('#color-3').val()+ '&';
            imagen += 'tamano-3=' +$('#tamano-3').val()+ '&';
            imagen += 'p-x-3=' +$('#p-x-3').val()+ '&';
            imagen += 'p-y-3=' +$('#p-y-3').val()+ '&';
            imagen += 'fuente-3=' +$('#fuente-3').val()+ '&';

            imagen += 'texto-2=' +$('#texto-2').val()+ '&';
            imagen += 'color-4=' +$('#color-4').val()+ '&';
            imagen += 'tamano-4=' +$('#tamano-4').val()+ '&';
            imagen += 'p-x-4=' +$('#p-x-4').val()+ '&';
            imagen += 'p-y-4=' +$('#p-y-4').val()+ '&';
            imagen += 'fuente-4=' +$('#fuente-4').val()+ '" width ="100%" height="100%" />';

            $('#carpeta-r').val($('#carpeta').val());
            $('#imagen-r').val($('#imagen').val());
            $('#nombre-r').val($('#nombre').val());
            $('#color-1-r').val($('#color-1').val());
            $('#tamano-1-r').val($('#tamano-1').val());
            $('#p-x-1-r').val($('#p-x-1').val());
            $('#p-y-1-r').val($('#p-y-1').val());
            $('#fuente-1-r').val($('#fuente-1').val());

            $('#fecha-r').val($('#fecha').val());
            $('#color-2-r').val($('#color-2').val());
            $('#tamano-2-r').val($('#tamano-2').val());
            $('#p-x-2-r').val($('#p-x-2').val());
            $('#p-y-2-r').val($('#p-y-2').val());
            $('#fuente-2-r').val($('#fuente-2').val());

            $('#texto-r').val($('#texto').val());
            $('#color-3-r').val($('#color-3').val());
            $('#tamano-3-r').val($('#tamano-3').val());
            $('#p-x-3-r').val($('#p-x-3').val());
            $('#p-y-3-r').val($('#p-y-3').val());
            $('#fuente-3-r').val($('#fuente-3').val());

            $('#texto-2-r').val($('#texto-2').val());
            $('#color-4-r').val($('#color-4').val());
            $('#tamano-4-r').val($('#tamano-4').val());
            $('#p-x-4-r').val($('#p-x-4').val());
            $('#p-y-4-r').val($('#p-y-4').val());
            $('#fuente-4-r').val($('#fuente-4').val());

            $("#mostrar-imagen").html(imagen);


        }
    });
}