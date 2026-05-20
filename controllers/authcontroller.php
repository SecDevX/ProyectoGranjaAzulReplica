<?php
    session_start();
    require '../conexion/conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {

        if ($_POST['action'] == 'login') {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE username = :user");
            $stmt->execute(['user' => $user]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && $usuario['password'] === $pass) { 
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['rol'] = $usuario['rol'];
                header("Location: ../carta.php");
                exit();
            } else {
                echo "<script>alert('Credenciales incorrectas'); window.location.href='../auth/login.php';</script>";
            }
        }

        if ($_POST['action'] == 'register') {
            $user = trim($_POST['username']);
            $pass = trim($_POST['password']);
            $rol = $_POST['rol'];

            try {
                $check = $pdo->prepare("SELECT id FROM usuario WHERE username = :user");
                $check->execute(['user' => $user]);
                
                if ($check->rowCount() > 0) {
                    echo "<script>alert('El nombre de usuario ya está en uso.'); window.location.href='../auth/register.php';</script>";
                } else {
                    $stmt = $pdo->prepare("INSERT INTO usuario (username, password, rol) VALUES (:user, :pass, :rol)");
                    if ($stmt->execute(['user' => $user, 'pass' => $pass, 'rol' => $rol])) {
                        echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.'); window.location.href='../auth/login.php';</script>";
                    } else {
                        echo "<script>alert('Hubo un error al registrar.'); window.location.href='../auth/register.php';</script>";
                    }
                }
            } catch (PDOException $e) {
                die("Error en el registro: " . $e->getMessage());
            }
        }
    }
?>