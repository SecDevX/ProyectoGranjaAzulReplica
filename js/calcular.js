document.addEventListener("DOMContentLoaded", function() {
    // 1. LÓGICA PARA MOSTRAR LAS CARTAS
    const btnSanIsidro = document.getElementById('btn-san-isidro');
    const btnSantaClara = document.getElementById('btn-santa');
    const btnAsia = document.getElementById('btn-asia');
    const sectionCards = document.getElementById('section-cards');
    const tiendaProductos = document.getElementById('tienda-productos');

    function mostrarTienda(e) {
        e.preventDefault();
        sectionCards.style.display = 'none';
        tiendaProductos.style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    if (btnSanIsidro) btnSanIsidro.addEventListener('click', mostrarTienda);
    if (btnSantaClara) btnSantaClara.addEventListener('click', mostrarTienda);
    if (btnAsia) btnAsia.addEventListener('click', mostrarTienda);

    // 2. LÓGICA DEL CARRITO DE COMPRAS
    const carritoItems = document.getElementById('items-carrito');
    const totalPrecioEl = document.getElementById('total-precio');
    const msgVacio = document.getElementById('carrito-vacio-msg');
    const btnPagar = document.getElementById('btn-pagar');
    let totalPedido = 0;
    let cantidadItems = 0;

    const botonesAgregar = document.querySelectorAll('.btn-agregar');

    botonesAgregar.forEach(btn => {
        btn.addEventListener('click', function() {
            const nombre = this.getAttribute('data-nombre');
            const precio = parseFloat(this.getAttribute('data-precio'));

            if (msgVacio) msgVacio.style.display = 'none';

            const itemDiv = document.createElement('div');
            itemDiv.style.display = 'flex';
            itemDiv.style.justifyContent = 'space-between';
            itemDiv.style.alignItems = 'center';
            itemDiv.style.marginBottom = '10px';
            itemDiv.style.paddingBottom = '8px';
            itemDiv.style.borderBottom = '1px solid #e0e0e0';

            itemDiv.innerHTML = `
                <div style="flex: 1; text-align: left; padding-right: 10px;">
                    <span style="font-size: 0.85rem; color: var(--blue); font-weight: bold;">${nombre}</span>
                </div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <strong style="font-size: 0.9rem;">S/ ${precio.toFixed(2)}</strong>
                    <button type="button" class="btn-eliminar-item" data-precio="${precio}" style="background: #e74c3c; color: white; border: none; border-radius: 4px; width: 22px; height: 22px; cursor: pointer; font-weight: bold; display: flex; align-items: center; justify-content: center; font-size: 14px; line-height: 1;" title="Quitar">
                        &times;
                    </button>
                </div>
            `;

            carritoItems.appendChild(itemDiv);
            totalPedido += precio;
            cantidadItems++;
            totalPrecioEl.textContent = totalPedido.toFixed(2);

            const btnEliminar = itemDiv.querySelector('.btn-eliminar-item');
            btnEliminar.addEventListener('click', function() {
                const precioRestar = parseFloat(this.getAttribute('data-precio'));
                totalPedido -= precioRestar;
                cantidadItems--;
                
                if (totalPedido < 0) totalPedido = 0; 
                totalPrecioEl.textContent = totalPedido.toFixed(2);
                itemDiv.remove();

                if (cantidadItems === 0) {
                    if (msgVacio) msgVacio.style.display = 'block';
                }
            });
        });
    });

    // 3. LÓGICA DEL BOTÓN IR A PAGAR
    if (btnPagar) {
        btnPagar.addEventListener('click', () => {
            if (cantidadItems === 0) {
                alert("Tu carrito está vacío");
                return;
            }
            const confirmar = confirm(`Tu pedido total es de S/ ${totalPedido.toFixed(2)}. ¿Deseas confirmar tu compra?`);
            if (confirmar) {
                alert("Pedido enviado con éxito a La Granja Azul, Gracias por tu compra.");
                location.reload(); 
            }
        });
    }
});