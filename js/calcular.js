document.addEventListener('DOMContentLoaded', () => {
    const btnSanIsidro = document.getElementById('btn-san-isidro');
    const btnSantaClara = document.getElementById('btn-santa');
    const btnAsia = document.getElementById('btn-asia');
    const sectionCards = document.getElementById('section-cards');
    const tiendaProductos = document.getElementById('tienda-productos');

    if (btnSanIsidro) {
        btnSanIsidro.addEventListener('click', (e) => {
            e.preventDefault(); 

            sectionCards.style.display = 'none';

            tiendaProductos.style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    if (btnSantaClara) {
        btnSantaClara.addEventListener('click', (e) => {
            e.preventDefault(); 

            sectionCards.style.display = 'none';

            tiendaProductos.style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    if (btnAsia) {
        btnAsia.addEventListener('click', (e) => {
            e.preventDefault(); 

            sectionCards.style.display = 'none';

            tiendaProductos.style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});


let carrito = [];
const itemsCarrito = document.getElementById('items-carrito');
const totalPrecio = document.getElementById('total-precio');

document.querySelectorAll('.btn-agregar').forEach(boton => {
    boton.addEventListener('click', (e) => {
        const producto = {
            id: e.target.getAttribute('data-id'),
            nombre: e.target.getAttribute('data-nombre'),
            precio: parseFloat(e.target.getAttribute('data-precio'))
        };
        
        carrito.push(producto);
        actualizarCarrito();
    });
});

function actualizarCarrito() {
    itemsCarrito.innerHTML = '';
    let total = 0;

    carrito.forEach((item, index) => {
        total += item.precio;
        itemsCarrito.innerHTML += `
            <div class="item-sel">
                <span>${item.nombre}</span> - <span>S/ ${item.precio.toFixed(2)}</span>
            </div>
        `;
    });

    totalPrecio.innerText = total.toFixed(2);
}

const btnPagar = document.getElementById('btn-pagar');

if (btnPagar) {
    btnPagar.addEventListener('click', () => {
        if (carrito.length === 0) {
            alert("Tu carrito está vacío");
            return;
        }

        const total = totalPrecio.innerText;
        
        const confirmar = confirm(`Tu pedido total es de S/ ${total}. ¿Deseas confirmar tu compra?`);

        if (confirmar) {
            alert("Pedido enviado con éxito a La Granja Azul, Gracias por tu compra.");

            carrito = [];
            actualizarCarrito();

            location.reload(); 
        }
    });
}