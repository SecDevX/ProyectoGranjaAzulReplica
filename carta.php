<?php include('header.php'); ?>

    <section id="section-cards">
        <div id="img-flor-card">
            <img src="img/flor.avif" alt="Flor Granja Azul">
        </div>
        <div id="content-button-cards">
            <a href="javascript:void(0);" id="btn-san-isidro" class="button-cards">Carta San Isidro - El Polo</a>
            <a href="https://www.invertur.com.pe/granjaazul/cartagranjaazulsantaclara.pdf" class="button-cards">Carta Santa Clara</a>
            <a href="https://www.invertur.com.pe/granjaazul/cartagranjaazulplaya.pdf" class="button-cards">Carta KM40 - Asia</a>
        </div>
    </section>

    <section id="tienda-productos" style="display: none;">
    <div class="container-shop">
        <div class="productos-grid">
            <?php 
            $productos = [
                ["nombre" => "Pollo a la Brasa", "precio" => 65.00, "img" => "img/carrito/pollo.avif"],
                ["nombre" => "Anticuchos", "precio" => 35.00, "img" => "img/carrito/anticuchos.jpg"],
                ["nombre" => "Picarones", "precio" => 15.00, "img" => "img/carrito/picarones.jpg"],
                ["nombre" => "Ensalada Granja", "precio" => 20.00, "img" => "img/carrito/ensalada.jpg"],
                ["nombre" => "Chicha Morada", "precio" => 12.00, "img" => "img/carrito/chicha.jpg"],
            ];
            
            for ($i = 0; $i < 10; $i++): 
                $p = $productos[$i % count($productos)];
            ?>
            <div class="card-producto">
                <img src="<?php echo $p['img']; ?>" alt="<?php echo $p['nombre']; ?>">
                <h3><?php echo $p['nombre']; ?></h3>
                <p class="precio">S/ <?php echo number_format($p['precio'], 2); ?></p>
                <button class="btn-agregar" data-id="<?php echo $i; ?>" data-nombre="<?php echo $p['nombre']; ?>" data-precio="<?php echo $p['precio']; ?>">
                    Agregar al carrito
                </button>
            </div>
            <?php endfor; ?>
        </div>

        <aside class="carrito-dashboard">
            <h2>🛒 Tu Pedido</h2>
            <div id="items-carrito">
                <p>El carrito está vacío</p>
            </div>
            <hr>
            <div class="total-container">
                <strong>Total: S/ <span id="total-precio">0.00</span></strong>
            </div>
            <button id="btn-pagar" class="button-cards">Ir a Pagar</button>
        </aside>
    </div>
</section>

<?php include('footer.php'); ?>