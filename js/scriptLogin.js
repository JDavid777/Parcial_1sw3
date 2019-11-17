$(document).ready(function()
{
    $("a").click(function()
    {
        var cedula = document.getElementById("cedula").value;
        $.ajax({
          type: "GET",
          url: "GUItareas.php",
          data:{
            dato: cedula
          }
        });
        $.ajax({
            type: "GET",
            url: "tareas.php",
            data: {
                dato: cedula
                },
            success: function (response) {
            
            cargarUsuario(response);
            }
        });
 
    }
    )
}
);

function cargarUsuario(json)
{

  var usuario=JSON.parse(json);
  var plantilla='';
  var idx=1;
  usuario.forEach(tarea => {

    console.log(tarea.etiqueta);
      plantilla += `
      <tr>
      <td> ${idx}</td>
      <td>${tarea.etiqueta} </td>
      <td>${tarea.descripcion}</td>
      <td>${tarea.estado}</td>
      </tr>
   `
     idx++;
   });
   window.location="GUItareas.php?tareas="+plantilla;
}
/*
$("#nuevaTarea").summit(function(e){
  $.ajax({
    type: "GET",
    url: "agregarTareas.php",
    data: {
          nombre: $("#nombreTarea").value(),
          descripcion: $("#descripcionTarea").value(),
          estado: "Incompleta"
        },
    success: function (response) {
    alert("Guardada");
    }
  
});
e.preventDefault();
})
*/