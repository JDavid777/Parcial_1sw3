  $(document).ready(function()
  {
          var cedula = document.getElementById("cedula").innerHTML;
          $.ajax({
              type: "POST",
              url: "tareas.php",
              data: {
                  dato: cedula
                  },
              success: function (response) {
                      cargarUsuario(response);
              }
          });
   
      }
      );


function cargarUsuario(json)
{
  var usuario=JSON.parse(json);
  var plantilla='';
  var idx=1;
  usuario.forEach(tarea => {

      plantilla += `
      <tr>
      <td> <input type="checkbox"></td>
      <td> ${idx}</td>
      <td>${tarea.etiqueta} </td>
      <td>${tarea.descripcion}</td>
      <td>${tarea.estado}</td>
      </tr>
   `
     idx++;
   });
   $("#tareas").html(plantilla);
}

function guardar(){

  var nombre= document.getElementById("nombreTarea").innerHTML;
  var descripcion=document.getElementById("descripcionTarea").innerHTML;
  var cedula=document.getElementById("cedula").innerHTML;


  $.ajax({
    type: "GET",
    url: "agregarTareas.php",
    data: {
      cedula:cedula,
      etiqueta:$("#nombreTarea").val(),
      descripcion: $("#descripcionTarea").val(), 
      estado:"incompleta"
        },
    success: function (response) {    
     
    }
})
return false;

}