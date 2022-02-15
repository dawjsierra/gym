
console.log("enlazado");

$(document).ready( function(){

    $('#boton').click(function (e) {
        e.preventDefault();
        console.log("ha hecho click");
        nombre = $('#nombre').val();
        date = $('#date').val();
        // console.log(data);
    
        $.get("/sesions/filtrado?actividad="+nombre+"&date="+date, function(dataJSON, status){
            console.log("Data: " + dataJSON + "\nStatus: " + status);
            console.log(dataJSON); 

            if(typeof(dataJSON) == "string"){
                $("#errores").html(dataJSON);
            }else{
                //hacer un foreach que recorra array y mostrar
                //resultados con $("#tabla").append(<tr><td>..</tr></td>);
            }
        });

    })
    
    
    
    //<meta name="csrf-token" content="{{ csrf_token() }}" />
    // $("#search").click(function(e) {
    //     e.preventDefault();
    //     data = $('#actividad').val();
    //     console.log(data);
    
    //     $.post("/sesion/search",
    //     {
    //         headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} ,
    //         data:{"actividad": data}
    //     },
    //     function(dataJSON, status){
    //         console.log("he vueltoooo");
    //         console.log(dataJSON);
    //         //alert("Data: " + data + "\nStatus: " + status);
    //     });
    // }); 
    
});
