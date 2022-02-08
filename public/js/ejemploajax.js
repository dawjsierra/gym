console.log("enlazado");

$('#formulario').click(function (e) {
    e.preventDefault();
    console.log("ha hecho click");
    data = $('#filtro').val();
    console.log(data);

    $.get("/studies/filter?filter="+data, function(dataJSON, status){
        // console.log("Data: " + data + "\nStatus: " + status);
        console.log(dataJSON);
      
    });      
})