<?php

$error = "";
if (isset($_POST['btn-ingresar'])) {

  if ($_POST['usuario'] == "admin" && $_POST['contrasenia'] == "1234") {
    $_SESSION['usuario'] = "Administrador";
    header("Location: compras.php");
    
  } else {
    $error = "Credenciales incorrectas (Prueba: admin / 1234)";
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login - Supertienda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary-subtle d-flex align-items-center justify-content-center vh-100">

  <div class="card shadow-lg" style="width: 350px;">
    <div class="card-body text-center">
      <!-- Imagen centrada -->
      <img src="img/iconos/logoTienda.png" alt="Logo" class="img-fluid mb-3" style="max-width: 150px;">

      <h4 class="card-title text-center mb-4">Acceso al Sistema</h4>

      <?php if ($error) echo "<div class='alert alert-danger p-2 small'>$error</div>"; ?>

      <form method="POST">
        <div class="mb-3">
          <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="mb-3">
          <input type="password" name="contrasenia" class="form-control" placeholder="Contraseña" required>
        </div>

        <button type="submit" name="btn-ingresar" class="btn btn-dark w-100">Ingresar</button>
      </form>
    </div>
  </div>

</body>

</html>