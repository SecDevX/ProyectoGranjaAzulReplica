<?php 
session_start();
require 'conexion/conexion.php'; // Conectamos a la BD

// Inyectamos el rol en el HTML para que authview.js lo lea
$rol_actual = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'cliente';
include('header.php'); 
?>

    <div id="user-role-data" data-role="<?php echo htmlspecialchars($rol_actual); ?>" style="display:none;"></div>

    <section id="section-cards">
        <div id="img-flor-card">
            <img src="img/flor.avif" alt="Flor Granja Azul">
        </div>
        <div id="content-button-cards">
            <a href="javascript:void(0);" id="btn-san-isidro" class="button-cards">Carta San Isidro - El Polo</a>
            <a href="javascript:void(0);" id="btn-santa" class="button-cards">Carta Santa Clara</a>
            <a href="javascript:void(0);" id="btn-asia" class="button-cards">Carta KM40 - Asia</a>
        </div>
    </section>

    <section id="tienda-productos" style="display: none;">
        
        <div id="admin-crud-section" style="display: none; position: relative; padding: 30px 20px 20px; background: white; text-align: center; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); max-width: 500px; margin-left: auto; margin-right: auto; border: 2px solid var(--blue);">
            
            <button type="button" id="btn-close-crud" style="position: absolute; top: 10px; right: 15px; background: transparent; border: none; font-size: 28px; color: var(--gray); cursor: pointer; transition: 0.3s; line-height: 1;">
                &times;
            </button>

            <h2 style="color: var(--blue); margin-bottom: 15px;">Panel de Administración</h2>
            <form action="crud/productoscrud.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="nombre" placeholder="Nombre del plato" required style="width: 100%; margin-bottom: 10px; padding: 8px; border: 1px solid var(--gray); border-radius: 4px;">
                <input type="number" step="0.01" name="precio" placeholder="Precio (S/)" required style="width: 100%; margin-bottom: 10px; padding: 8px; border: 1px solid var(--gray); border-radius: 4px;">
                <input type="file" name="imagen_producto" accept="image/*" required style="width: 100%; margin-bottom: 15px;">
                <button type="submit" name="crear_producto" class="btn-auth" style="padding: 10px; background: var(--blue); color: white; border: none; cursor: pointer; width: 100%; border-radius: 4px;">Guardar en la Carta</button>
            </form>
        </div>

        <div class="container-shop">
            
            <div class="productos-grid">
                <?php 
                try {
                    $stmt = $pdo->query("SELECT * FROM productos");
                    $productos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($productos_db) > 0) {
                        foreach ($productos_db as $p): 
                ?>
                        <div class="card-producto">
                            <img src="<?php echo htmlspecialchars($p['img']); ?>" alt="<?php echo htmlspecialchars($p['nombre']); ?>">
                            <h3><?php echo htmlspecialchars($p['nombre']); ?></h3>
                            <p class="precio">S/ <?php echo number_format($p['precio'], 2); ?></p>
                            <button class="btn-agregar" data-id="<?php echo $p['id']; ?>" data-nombre="<?php echo htmlspecialchars($p['nombre']); ?>" data-precio="<?php echo $p['precio']; ?>">
                                Agregar al carrito
                            </button>
                        </div>
                <?php 
                        endforeach;
                    } else {
                        echo "<p style='grid-column: 1 / -1; text-align: center;'>No hay productos disponibles. Usa el panel superior para agregar uno.</p>";
                    }
                } catch (PDOException $e) {
                    echo "<p>Error al cargar la carta: " . $e->getMessage() . "</p>";
                }
                ?>
            </div>

            <div class="carrito-wrapper" style="display: flex; flex-direction: column; gap: 10px;">
                
                <div id="admin-controls" style="display: none; width: 100%;">
                    <button id="btn-toggle-crud" class="btn-auth" style="width: 100%; padding: 12px; border-radius: 8px; font-weight: bold; font-size: 1rem;">
                        <i class="fa-solid fa-plus"></i> Agregar Nuevo Producto
                    </button>
                </div>

                <aside class="carrito-dashboard">
                    <h2>🛒 Tu Pedido</h2>
                    <div id="items-carrito">
                        <p id="carrito-vacio-msg">El carrito está vacío</p>
                    </div>
                    <hr>
                    <div class="total-container">
                        <strong>Total: S/ <span id="total-precio">0.00</span></strong>
                    </div>
                    <button id="btn-pagar" class="button-cards">Ir a Pagar</button>
                </aside>
            </div>
            
        </div>
    </section>

<?php include('footer.php'); ?>