console.log("enlazado");

// $('#search').click(function (e) {
//     e.preventDefault();
//     console.log("ha hecho click");
//     data = $('#actividad').val();
//     console.log(data);

//     $.get("/sesions/search?search="+data, function(dataJSON, status){
//         // console.log("Data: " + data + "\nStatus: " + status);
//         console.log(dataJSON);
      
//     });      
// })



//<meta name="csrf-token" content="{{ csrf_token() }}" />
$("#serch").click(function(e) {
    e.preventDefault();
    data = $('#actividad').val();
    console.log(data);

    $.post("/studies/search",
    {
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} ,
        data:{"actividad": data}
    },
    function(dataJSON, status){
        console.log("he vueltoooo");
        console.log(dataJSON);
        //alert("Data: " + data + "\nStatus: " + status);
    });
}); 