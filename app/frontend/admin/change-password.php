<?php
// Inicia la sesión para tener acceso al nombre de usuario del usuario conectado
session_start();

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'components/dbchangepass.php'; // Asume que tienes un archivo dbchangepass.php con la conexión a la base de datos

    $username = $_SESSION['username']; // Asume que el nombre de usuario está almacenado en la sesión
    $newPassword = $_POST['newPassword'];
    $repeatNewPassword = $_POST['repeatNewPassword'];

    if ($newPassword === $repeatNewPassword) {
        // Asegúrate de usar password_hash para encriptar la contraseña antes de guardarla en la base de datos
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        // Prepara la sentencia SQL para evitar inyecciones SQL
        $stmt = $conn->prepare("UPDATE users SET PasswordHash = $newPassword WHERE UserName = $username");
        echo $stmt;
        $stmt->bind_param("ss", $passwordHash, $username);

        if ($stmt->execute()) {
            echo "Contraseña actualizada con éxito.";
        } else {
            echo "Error al actualizar la contraseña.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Las contraseñas no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/components.css">
  <title>Document</title>
</head>

<body>

  <div class="board">
    <!-- SIDE BAR -->
    <aside>
      <!-- SIDE BAR HEADER -->
      <div class="sidebar-header">
        <span>EST<span>Empregos</span></span>
      </div>

      <!-- SIDE BAR MENU -->
      <div class="sidebar-menu">
        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="index.php">
              <i class="fas fa-chart-line"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="jobs.php">
              <i class="fas fa-briefcase"></i>
              <span>Ofertas</span>
            </a>
          </li>
        </ul>

        <br>
        <hr>
        <br>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="admin.php">
              <i class="fas fa-user-shield"></i>
              <span>Admin</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="companies.php">
              <i class="fas fa-building"></i>
              <span>Empresas</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="team.php">
              <i class="fas fa-users"></i>
              <span>Team</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="managers.php">
              <i class="fas fa-user-friends"></i>
              <span>Gestores</span>
            </a>
          </li>
        </ul>

        <br>
        <hr>
        <br>

        <ul class="active-sidebar-menu">
          <div class="active-sidebar-menu-line"></div>
          <li><a href="settings.php">
              <i class="fas fa-cogs"></i>
              <span>Settings</span>
            </a>
          </li>
        </ul>

        <ul>
          <div class="active-sidebar-menu-line"></div>
          <li>
            <a href="../website/index.html">
              <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!-- MAIN ELEMENT  -->
    <main>
      <!-- MAIN HEADER -->
      <div class="main-header">
        <div class="main-header-left">
          <div>
            <i class="fas fa-bars menu-icon"></i>
          </div>
          <div class="search-container">
            <input type="text" placeholder="Search...">
            <button type="submit" class="btn-icon"><i class="fas fa-search"></i></button>
          </div>
        </div>

        <div class="main-header-right">
          <div class="avatar">
            <img
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              alt="">
          </div>
          <div>
            <p class="bold">Ana Bela</p>
            <p class="blackOpacity">Admin</p>
          </div>
        </div>
      </div>

      <!-- MAIN BODY -->
      <div class="main-body">
        <div class="settings-container">
          <form method="post" action="change-password.php">
            <label for="newPassword">New password:</label>
            <br>
            <input type="password" placeholder="New password..." required>
            <br>
            <label for="repeatNewPassword">Repeat new password:</label>
            <br>
            <input type="password" placeholder="Repeat new password..." required>
            <br><br>
            <button type="submit">Change Password</button>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>

</html>