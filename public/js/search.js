
console.log("enlazado");

$(document).ready( function(){

    $('#boton').click(function (e) {
        e.preventDefault();
        console.log("ha hecho click");
        nombre = $('#nombre').val();
        date = $('#date').val();
        // console.log(data);
    
        $.get("/sesions/filtrado?nombre="+nombre+"&date="+date, function(dataJSON, status){
            console.log("Data: " + dataJSON + "\nStatus: " + status);
            console.log(dataJSON); 

            if(typeof(dataJSON) == "string"){
                $("#errores").html(dataJSON);
            }else{

                $("#tabla").empty();
                
                
                    dataJSON.forEach((item)=>{
                        $("#tabla").append("<tr><td><strong>SESION:</strong>"+item.id+"</td></tr><tr><td><dd><strong>FECHA INICIO:</strong>"+item.horaInicio+"</dd></td></tr><tr><td><dd><strong>FECHA FIN:</strong>"+item.horaFin+"</dd></td></tr><tr><td><dd><strong>ID ACTIVIDAD:</strong>"+item.activity_id+"</dd></td></tr>");
                    }); 
                    $("#contenido").css("border","2px solid black");
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
