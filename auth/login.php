<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login - Granja Azul</title>
        <link rel="stylesheet" href="../css/style_login.css">
        <script src="https://kit.fontawesome.com/670f03380b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="auth-container">
            <a href="../carta.php" class="back-arrow" title="Regresar a la Carta">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="auth-box">
                <h2>Iniciar Sesión</h2>
                <form action="../controllers/authcontroller.php" method="POST">
                    <input type="hidden" name="action" value="login">
                    <div class="input-group">
                        <label>Usuario</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="input-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" class="btn-auth">Ingresar</button>
                </form>
                <p class="auth-switch">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
            </div>
        </div>
    </body>
</html>