//Cargar los datos de el usuario loggeado, si no existe se crea
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
//Tacha la tarea cuando esta terminada.
function tachar(x){
      $(x).find("input").is(":checked")?$(x).addClass("tachado"):$(x).removeClass("tachado");
      var elementosTD=$(x).children("td");
      var idx=0;
      var id;
      elementosTD.each(function(){
        if(idx==1)
        {
          id=$(this).text()
        }
        idx++;
      });
      var cedula = document.getElementById("cedula").innerHTML;
      $.ajax({
        type: "GET",
        url: "gestionarTareas.php",
        data: {
            cedula:cedula,
            idTarea: id
            },
        success: function (response) {
            cargarUsuario(response);
        }
    });
}
//Cargar y actualiza el dom con las nuevas tareas del usuario
function cargarUsuario(json)
{
  var usuario=JSON.parse(json);
  var plantilla='';
  var idx=1;
  usuario.forEach(tarea => {

    if(tarea.estado=="Completada"){
      plantilla += `
      <tr class="tachado squaredThree" onclick="tachar(this)">
      <label>
      <td> <input id= "squaredThree" type="checkbox" checked> <label for="squaredThree"></label></td>
      <td> ${idx}</td>
      <td>${tarea.etiqueta} </td>
      <td>${tarea.descripcion}</td>
      <td>${tarea.estado}</td>
      </label>
      </tr>
   `
    }
    else{
      plantilla += `
      <tr  onclick="tachar(this)">
      <label>
      <td class="celdas"> <input id="squaredThreeS" type="checkbox"></td>
      <td class="celdas"> ${idx}</td>
      <td class="celdas">${tarea.etiqueta} </td>
      <td class="celdas">${tarea.descripcion}</td>
      <td class="celdas">${tarea.estado}</td>
      </label>
      </tr>
   `
    }
      
     idx++;
   });
   $("#tareas").html(plantilla);
}
//Agrega una nueva tarea al usuario 
function guardar(){

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
     cargarUsuario(response);
    }
})
   document.getElementById("nombreTarea").value="";
  document.getElementById("descripcionTarea").value="";
return false;

}