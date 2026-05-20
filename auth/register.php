<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro - Granja Azul</title>
        <link rel="stylesheet" href="../css/style_register.css">
        <script src="https://kit.fontawesome.com/670f03380b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="auth-container">
            <a href="login.php" class="back-arrow" title="Regresar al Login">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="auth-box">
                <h2>Crear Cuenta Interna</h2>
                <form action="../controllers/authcontroller.php" method="POST">
                    <input type="hidden" name="action" value="register">
                    
                    <div class="input-group">
                        <label>Nuevo Usuario</label>
                        <input type="text" name="username" required>
                    </div>
                    
                    <div class="input-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" required>
                    </div>

                    <div class="input-group">
                        <label>Rol del Sistema</label>
                        <select name="rol" required>
                            <option value="" disabled selected>Seleccione un rol...</option>
                            <option value="empleado">Empleado</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn-auth">Registrar Usuario</button>
                </form>
                <p class="auth-switch">¿Ya tienes cuenta? <a href="login.php">Ingresa aquí</a></p>
            </div>
        </div>
    </body>
</html>