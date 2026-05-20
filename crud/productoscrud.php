<?php
    session_start();
    require '../conexion/conexion.php';

    // Verificamos que solo personal autorizado pueda hacer esto
    if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin' && $_SESSION['rol'] != 'empleado')) {
        die("Acceso no autorizado.");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crear_producto'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        
        // Configuración de la carpeta destino.
        // Sube un nivel desde 'crud/' y entra a 'img/carrito/'
        $directorio_destino = "../img/carrito/";
        
        // Generar un nombre único para evitar sobreescribir imágenes con el mismo nombre
        $nombre_archivo = time() . "_" . basename($_FILES["imagen_producto"]["name"]);
        $ruta_archivo = $directorio_destino . $nombre_archivo;
        
        // Validamos que sea una imagen real
        $check = getimagesize($_FILES["imagen_producto"]["tmp_name"]);
        if($check !== false) {
            // Movemos el archivo temporal a nuestra carpeta img/carrito/
            if (move_uploaded_file($_FILES["imagen_producto"]["tmp_name"], $ruta_archivo)) {
                
                // Guardamos la ruta relativa para usarla en el HTML (img/carrito/nombre_archivo.jpg)
                $ruta_db = "img/carrito/" . $nombre_archivo;

                $stmt = $pdo->prepare("INSERT INTO productos (nombre, precio, img) VALUES (:nombre, :precio, :img)");
                if ($stmt->execute(['nombre' => $nombre, 'precio' => $precio, 'img' => $ruta_db])) {
                    echo "<script>alert('Producto agregado correctamente.'); window.location.href='../carta.php';</script>";
                } else {
                    echo "Error al guardar en la base de datos.";
                }
            } else {
                echo "Hubo un error al subir tu archivo.";
            }
        } else {
            echo "El archivo no es una imagen.";
        }
    }
?>