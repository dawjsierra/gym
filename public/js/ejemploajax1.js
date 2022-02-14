console.log("enlazado");
/*
$('#formulario').click(function (e) {
    e.preventDefault();
    console.log("ha hecho click");
    data = $('#filtro').val();
    console.log(data);

    $.get("/studies/filter?filter="+data, function(dataJSON, status){
        // console.log("Data: " + data + "\nStatus: " + status);
        console.log(dataJSON);
      //$('#destinofiltro').html(data);
    });      
})
*/


//Si queremos enviar post en ajax hay que añadir los datos.
// modificar index.blade.php y ñadir un campo oculto con el token
/*$("#formulario").click(function(e) {
    e.preventDefault();
    data = $('#filtro').val();
    console.log(data);

    $.post("/studies/filter",
    {
        "_token": $('#token').val(), 
        "filter": data
    },
    function(dataJSON, status){
        console.log("he vueltoooo");
        console.log(dataJSON);
        //alert("Data: " + data + "\nStatus: " + status);
    });
}); */


<meta name="csrf-token" content="{{ csrf_token() }}" />
$("#formulario").click(function(e) {
    e.preventDefault();
    data = $('#filtro').val();
    console.log(data);

    $.post("/studies/filter",
    {
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} ,
        data:{"filter": data}
    },
    function(dataJSON, status){
        console.log("he vueltoooo");
        console.log(dataJSON);
        //alert("Data: " + data + "\nStatus: " + status);
    });
}); 
    
    // Si eso viene de un formulario podemos leer el 
    // formulario de una tacada con serialize de jquery
    // const data = $('#miFormulario').serialize()
    // importante el data debe incluir el csrf si no devolverá
    // error 419 
    //})