document.addEventListener("DOMContentLoaded", function() {
    const roleDataElement = document.getElementById('user-role-data');
    
    if (roleDataElement) {
        const userRole = roleDataElement.getAttribute('data-role');
        const adminControls = document.getElementById('admin-controls');
        const crudSection = document.getElementById('admin-crud-section');
        const btnToggleCrud = document.getElementById('btn-toggle-crud');
        const btnCloseCrud = document.getElementById('btn-close-crud');

        // Si es admin o empleado, mostramos el contenedor del BOTÓN
        if (userRole === 'admin' || userRole === 'empleado') {
            if (adminControls) {
                adminControls.style.display = 'block';
            }

            if (btnToggleCrud && crudSection && btnCloseCrud) {
                // Al presionar Agregar Producto
                btnToggleCrud.addEventListener('click', function() {
                    crudSection.style.display = 'block'; // Muestra el formulario
                    btnToggleCrud.style.display = 'none'; // Desaparece el botón
                });

                // Al presionar la X de cerrar en el formulario
                btnCloseCrud.addEventListener('click', function() {
                    crudSection.style.display = 'none'; // Oculta el formulario
                    btnToggleCrud.style.display = 'inline-block'; // Reaparece el botón
                });

                // Efecto hover para la X (opcional, para que se vea más interactivo)
                btnCloseCrud.addEventListener('mouseover', function() {
                    this.style.color = 'var(--blue)'; // Cambia a azul al pasar el mouse
                });
                btnCloseCrud.addEventListener('mouseout', function() {
                    this.style.color = 'var(--gray)'; // Vuelve a gris
                });
            }
        }
    }
});