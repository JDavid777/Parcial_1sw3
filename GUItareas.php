<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador de tareas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/tareas.css">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
    </script>
    <?php $cedula=$_POST["cedula"]?>
    <script type="text/javascript" src="js/scripts.js"></script>
    

</head>
<body>


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><h3>¡Bienvenido! Comienza a organizar tu tiempo.</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <label> <h4> Identificación</h4><h5 id= "cedula"> <?php echo $cedula?></h5> <a href="index.html">Cerrar Sesion</a> </label> 
            </div>
          </nav>
      
          <div class="container divNuevaTarea">
            <div class="row p-3">
              <div class="col-md-5">
                <div class="card">
                  <div class="card-body">
                
                    <form id="nueva-tarea" onsubmit="return guardar()">
                      <div class="form-group">
                        <input type="text" id="nombreTarea" placeholder="Nombre" class="form-control">
                      </div>
                      <div class="form-group">
                        <textarea id="descripcionTarea" cols="30" rows="10" class="form-control" placeholder="Descripcion"></textarea>
                      </div>
                      <button id="enviar" class="btn btn-primary btn-block text-center">
                        Guardar
                      </button>
                    </form>

                  </div>
                </div>
              </div>
      
          
              <div class="col-md-7">
                <div class="card my-0" id="task-result">
                  <div class="card-body">
                        <h5> Aqui encontraras todas tus tareas completas e incompletas. Puedes agregar descripciones a tus tareas solo si quieres </h5>
                      
                    <ul id="container"></ul>
                  </div>
                </div>
      
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td>"¿?"</td>
                      <td class="titulo_tabla">N°</td>
                      <td class="titulo_tabla">Nombre</td>
                      <td class="titulo_tabla">Descripcion</td>
                      <td class="titulo_tabla">Estado</td>
                    </tr>
                   
                  </thead>
                  <tbody id=tareas> </tbody>
                </table>
              </div>
            </div>
          </div>
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    
</body>
<footer>
      <ul>
        <li><a>Univerisidad del Cauca</a></li>
        <li><a>Ingenieria de software para la web</a></li>
        <li><a>David García</a></li>
        <li><a>Andres Meneses</a></li>
      
        
      </ul>
    </footer>
</html>