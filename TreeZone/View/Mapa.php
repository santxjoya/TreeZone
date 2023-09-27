<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>TreeZone | Pantalla Principal</title>
</head>
<body>
    <header class="p-3 border-bottom border-bottom  border-success border-bottom  border-5 shadow-lg p-1  bg-body rounded">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
          <h1 class="me-5 ms-3" href="#">TreeZone</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Lugares destacados</a>
              <!-- Modal para lugares destacados usuario -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mis Lugares Destacados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="ms-2 mb-3">
                      <?php
                        // require_once '../Backend/RegistroUsuario.php';
                        // $verUsuario = Usuario::mostrar();
                      ?>
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="text-success" scope="col">Nombre</th>
                              <th class="text-success" scope="col">Dirección</th>
                              <th class="text-success" scope="col">Localidad</th>
                              <th class="text-success" scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php include_once '../Backend/RegistroUbicacion.php';
                              $verLugaresFav = Ubicacion::mostrar();
                            ?>
                            <?php foreach($verLugaresFav as $lugar): ?>
                            <tr>
                              <th scope="row"><?php echo $lugar['ubic_name'];?></th>
                              <td><?php echo $lugar['ubic_frecuente'];?></td>
                              <td><?php echo $lugar['sect_nombre'];?></td>
                              <td>
                                <form action="../Backend/deleteUbicacion.php" method="POST">
                                  <input type="hidden" name="ubic_id" value="<?php echo $lugar['ubic_id']?>">
                                  <button type="submit" class="ms-2 btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                  </svg></button>
                                </form>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                    </div><label class="ms-1 mb-3 mt-4" for=""><strong class="text-success">Agrega un lugar</strong></label>
                    <form class="ms-1 mb-3" action="../Backend/ubicacion.php" method="POST">
                      <label class="me-3" for="">Nombre del lugar</label>
                      <label class="me-2" for="">Dirección del lugar</label>
                      <label class="" for="">Localidad</label>
                      <div class="mt-2 input-group mb-1">
                        <input type="text" class="form-control" name="nombre" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Trabajo">
                        <input type="text" class="form-control" name="direccion" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Dirección">
                        <select class="form-select" aria-label="Default select example" name="localidad">
                          <?php include_once '../Backend/RegistroSectores.php';
                            $verSectores= Sectores::mostrar();
                          ?>
                          <option selected>Seleccione una localidad</option>
                          <?php foreach($verSectores as $item):?>
                            <option value="<?php echo $item['sect_id'];?>"><?php echo $item['sect_nombre'];?></option>
                          <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-success">+</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------- -->
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                  Mapa
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">Visualizar Cantidad de Árboles</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">Visualizar Calidad de Aire</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                  Usuario
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3">Vizualizar Usuario</a></li>
                  <li><a type="button" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal4">Editar Usuario</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../Backend/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
            </ul>
            <!-- Modal para Visualizar Cantidad de Árboles  -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cantidad de Árboles</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="">
                          <canvas id="myChart" width="400" height="100"></canvas>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
            <!-- -------------------------------------------------------------------------------------------- -->
            <!-- Modal para Visualizar Calidad de Aire  -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Calidad de Aire</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="p-5">
                          <canvas id="myChart2" width="400" height="100"></canvas>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
            <!-- -------------------------------------------------------------------------------------------- -->
            <!-- Modal para Visualizar usuario -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Visualizar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="ms-5">
                    <?php
                      require_once '../Backend/RegistroUsuario.php';
                      $email = $_SESSION['email'];
                      $verUsuario = Usuario::mostrar($email);
                    ?>
                      <?php foreach($verUsuario as $item):?>
                      <p><strong class="text-success" >Usuario: </strong><?php echo $item['user_name'] ?></p>
                      <p><strong class="text-success" >Correo: </strong> <?php echo $item['user_email'] ?></p>
                      <p><strong class="text-success" >Residencia: </strong> <?php echo $item['user_residencia'] ?></p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------------------------------------------------------- -->
            <!-- Modal para editar usuario -->
              <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                  <form class="col-md-12" action="../Backend/editUsuario.php" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-10">
                            <label class="ms-5 mt-4" for="">Usuario</label><br>
                            <input class="ms-5 mb-5 form-control" type="text" name="user">
                        </div>
                        <div class="col-md-10">
                          <label class="ms-5" for="">Correo</label><br>
                          <input class="ms-5 mb-5 form-control" type="text" name="email2">
                        </div>
                        <div class="col-md-10">
                          <label class="ms-5" for="">Contraseña</label><br>
                          <input class="ms-5 mb-5 form-control" type="password" name="password">
                        </div>
                        <div class="col-md-10">
                            <label class="ms-5" for="">Confirmar Contraseña</label><br>
                            <input class="ms-5 mb-5 form-control" type="password" name="Cpassword">
                        </div>
                        <div class="col-md-10">
                          <label class="ms-5" for="">Lugar de Residencia</label><br>
                          <input class="ms-5 mb-5 form-control" type="text" name="residencia">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <!-- -------------------------------------------------------------------------------------------- -->
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Buscar Zona" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <main class="bg-success">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63627.804334538116!2d-74.12877810380233!3d4.640799300433638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9beaa5647337%3A0x6fa358372e109359!2sTeusaquillo%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1693452379541!5m2!1ses!2sco" width="100%" height="700vh" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </main>
    <footer class="bg-success text-white text-center pt-4"style="Height: 100px;"> Todos los derechos reservados - Copyrigth ©</footer>
</body>
<script>

  const ctx = document.getElementById('myChart');
  

new Chart(ctx, {

  type: 'doughnut',

  data: {

    labels: [<?php include '../Backend/RegistroArboles.php'; $verArbolesLocalidad = Arbol::graficas(); foreach ($verArbolesLocalidad as $localidad): echo "'".$localidad['sect_nombre']."'"."," ; endforeach; ?>],

    datasets: [{

      label: 'Árboles',

      data: [<?php
$verArboles = Arbol::graficas();
foreach ($verArboles as $item):
echo $item['sect_arboles'].",";
endforeach;?>],

      borderWidth: 1

    }]

  },


});

  </script>
  <script>

const ctx2 = document.getElementById('myChart2');


new Chart(ctx2, {

type: 'bar',

data: {

  labels: [<?php include '../Backend/RegistroAire.php'; $verAireLocalidad = Aire::graficas(); foreach ($verAireLocalidad as $airLocal): echo "'".$airLocal['sect_nombre']."'"."," ; endforeach; ?>],

  datasets: [{

    label: 'Nivel de Aire',

    data: [<?php
$verAire = Aire::graficas();
foreach ($verAire as $item):
echo $item['aire_nivel'].",";
endforeach;?>],

    borderWidth: 1

  }]

},


});

</script>
  
</html>