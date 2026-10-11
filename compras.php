<?php

include("servicios.php");

//conectar
$conexion1 = Servicios::conectar();
//insertar
if (isset($_POST["boton-finalizar-compra"])) {

  $total = $_POST['total-iva'];
  $nombre = $_POST['nombreCliente'];
  $cedula = $_POST['cedulaCliente'];
  $direccion = $_POST['direccionCliente'];


  if (!empty($nombre) && floatval($total) > 0) {

    $insertar1 = Servicios::insertar($nombre, $cedula, $direccion, $total);


    if ($insertar1) {
      header("Location: compras.php?status=success");
      exit();
    }
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="js/jquery.js"></script>
  <script src="js/thumbelina.js"></script>
  <script src="js/slider.js"></script>
  <link rel="stylesheet" href="css/thumbelina.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3 shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">

          <img src="img/iconos/logoTienda2.png" class="img-fluid me-2" style="width: 120px;" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item px-2">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link" href="#">Contacto</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link" href="logout.php">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <br><br>


  <main class="container my-5">
    <div class="row g-4">


      <div class="col-lg-6">

        <div class="card shadow-sm mb-4">
          <div class="card-header bg-primary text-white fw-bold">Datos del Cliente</div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6"><input type="text" id="nombre" class="form-control" placeholder="Nombre completo"></div>
              <div class="col-md-6"><input type="number" id="cedula" class="form-control" placeholder="Cédula"></div>
              <div class="col-12"><input type="text" id="direccion" class="form-control" placeholder="Dirección"></div>
              <div class="col-12"><button id="boton-guardar-datos" class="btn btn-success w-50">Guardar Datos</button></div>
            </div>
          </div>
        </div>


        <div class="card shadow-sm">
          <div class="card-header bg-dark text-white fw-bold">Selección de Producto</div>
          <div class="card-body">
            <div class="slider-centrado mb-3">
              <div id="slider">
                <div class="thumbelina-but horiz left">&#706;</div>
                <ul>
                  <li><img src="img/cocaCola.png" id="img1" class="producto" /></li>
                  <li><img src="img/fanta.png" id="img2" class="producto" /></li>
                  <li><img src="img/incaKola.png" id="img3" class="producto" /></li>
                  <li><img src="img/nestea.png" id="img4" class="producto" /></li>
                  <li><img src="img/pepsi.png" id="img5" class="producto" /></li>
                  <li><img src="img/sprite.png" id="img6" class="producto" /></li>
                </ul>
                <div class="thumbelina-but horiz right">&#707;</div>
              </div>
            </div>

            <div class="row text-center mt-4" id="niveles" style="display: none;">

              <h4 class="small mt-2 mb-0">Nivel de Azúcar</h4>
              <div class="col-4">

                <img src="" id="img-bajo" class="nivel-azucar rounded-circle border border-3" style="width: 60px; height: 60px; object-fit: cover;">
                <p class="small mt-2 mb-0">Bajo</p>
              </div>
              <div class="col-4">
                <img src="" id="img-medio" class="nivel-azucar rounded-circle border border-3" style="width: 60px; height: 60px;">
                <p class="small mt-2 mb-0">Medio</p>
              </div>
              <div class="col-4">
                <img src="" id="img-alto" class="nivel-azucar rounded-circle border border-3" style="width: 60px; height: 60px; object-fit: cover;">
                <p class="small mt-2 mb-0">Alto</p>
              </div>
            </div>

            <table class="table table-bordered align-middle text-center mt-3">
              <thead class="table-light">
                <tr>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><label id="descripcion">---</label></td>
                  <td><label id="precio">0.00</label></td>
                  <td><input type="number" id="cantidad" class="form-control form-control-sm" min="1" max="100" disabled></td>
                  <td><label id="total" class="fw-bold">0.00</label></td>
                </tr>
              </tbody>
            </table>
            <div class="d-grid gap-2">
              <button id="boton-enviar" class="btn btn-primary w-50" disabled>Agregar a Factura</button>

            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-6">
        <div class="card shadow-sm h-100">
          <div class="card-header bg-secondary text-white fw-bold">Detalle de Factura</div>
          <div class="card-body">

            <div class="card-body">
              <div class="alert alert-light border mb-4">
                <div class="mb-1">
                  <strong>Cliente:</strong> <label id="nombreCliente" name="nombreCliente"></label>
                </div>
                <div class="mb-1">
                  <strong>Cédula:</strong> <label id="cedulaCliente"
                    name="cedulaCliente"></label>
                </div>
                <div class="mb-0">
                  <strong>Dirección:</strong> <label id="direccionCliente"></label>
                </div>
              </div>
            </div>



            <table class="table table-hover">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Producto</th>
                  <th>Cant</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody id="cuerpo-tabla"></tbody>
            </table>

            <form method="POST" action="">
              <input type="hidden" id="input-nombre-envio" name="nombreCliente" value="">
              <input type="hidden" id="input-direccion-envio" name="direccionCliente" value="">
              <input type="hidden" id="input-cedula-envio" name="cedulaCliente" value="">
              <div class="text-end">
                <p class="mb-1">Total de Productos: <span id="cantidad-productos" class="fw-bold">0</span></p>
                <p class="mb-1">IVA (15%): <span id="iva" class="fw-bold">0.00</span></p>
                <h4 class="text-primary">TOTAL: <span id="total-iva">0.00</span></h4>


                <input type="hidden" id="input-total-envio" name="total-iva" value="0">
              </div>

              <button type="submit" name="boton-finalizar-compra"
                id="boton-finalizar-compra" class="btn btn-success btn-lg w-50 shadow-sm">
                Finalizar Compra
              </button>
              <br><br><br>
              <button id="boton-reporte" class="btn btn-secondary">
                <a href="reporte.php" class="text-white text-decoration-none" target="_blank">
                  Descargar Reporte PDF
                </a>
              </button>

            </form>
          </div>
        </div>
      </div>
  </main>



</body>

</html>