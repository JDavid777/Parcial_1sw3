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
   $("#tareas").html(plantilla);
}

function guardarTarea(){
  var nombre= document.getElementById("nombreTarea").innerHTML;
  var descripcion=document.getElementById("descripcionTarea").innerHTML;

  var json={"etiqueta":nombre,"descripcion": descripcion, "estado":"incompleta"};

  $.ajax({
    type: "GET",
    url: "agregarTareas",
    data: {
        dato: json
        },
    success: function (response) {    
      alert("Guardada");
    }
});
} 