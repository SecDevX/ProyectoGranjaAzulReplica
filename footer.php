        </main>
        <script src="https://kit.fontawesome.com/670f03380b.js" crossorigin="anonymous"></script>
        <footer>
            <div id="container-footer">
                <div id="footer-section-social-links">
                    <p class="funnel-sans-regular">SÍGUENOS EN:</p>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/granjaazul/" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.facebook.com/granjaazul?_rdc=1&_rdr#" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <p class="funnel-sans-bold">@granjaazul</p>
                    </div>
                </div>
                <div id="footer-section-suscribete">
                    <p class="corinthia-regular">Suscribete</p>
                    <p class="roboto-min">Recibe nuestras novedades y promociones</p>
                    <button class="roboto-regular" id="button-suscribete">Suscribete aquí</button>
                </div>
                <nav aria-label="Navegación del pie de página">
                    <ul>
                        <li class="footer-item"><a href="https://www.invertur.com.pe/granjaazul/pol%C3%ADtica-de-privacidad.pdf">Política de privacidad</a></li>
                        <li class="footer-item"><a href="https://www.invertur.com.pe/granjaazul/politicadecookies.pdf">Política de cookies</a></li>
                        <li class="footer-item"><a href="https://ose.efact.pe/busca-tu-comprobante/">Comprobante electrónico</a></li>
                        <li class="footer-item"><a href="http://35.171.118.73/granja_azul/libro_reclamaciones/reclamacion.php"><i class="fa-solid fa-book"></i>Libro de reclamaciones</a></li>
                        <?php if(isset($_SESSION['rol'])): ?>
                            <li class="footer-item"><a href="auth/logout.php" style="color: #e74c3c;"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión (<?php echo htmlspecialchars($_SESSION['rol']); ?>)</a></li>
                        <?php else: ?>
                            <li class="footer-item"><a href="auth/login.php"><i class="fa-solid fa-user"></i> Login Interno</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </footer>
        <script src="js/calcular.js"></script>
        <script src="js/authview.js"></script>
    </body>
</html>