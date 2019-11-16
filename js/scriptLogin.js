function cargarUsuario(json)
{
  window.location="tareas.html?cedula="+cedula;
  var usuario=JSON.parse(json);

  for(e of usuario){
    var strucTarea=$("#tarea").clone();
    var nombre= $(strucTarea).children("#nombre");
    var descripcion= $(strucTarea).children("#descripcion");
    $(nombre).html("<p>"+e.etiqueta+"</p>");
    $(descripcion).html(e.estado);

    $(strucTarea).appendTo("#tabla");

  }
 

//  document.getElementById("cedula").innerHTML = cedula;

}

function guardarTarea(){
  var nombre= document.getElementById("name").value;
  var descripcion=document.getElementById("descripcion").value;

  var json={"etiqueta":nombre,"descripcion": descripcion, "estado":"incompleta"};

  $.ajax({
    type: "GET",
    url: "tareas.php?guardar= ",
    data: {
        dato: json
        },
    success: function (response) {    
      alert("Guardada");
    }
});
}