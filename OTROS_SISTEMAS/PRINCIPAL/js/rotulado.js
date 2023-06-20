<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Obtener referencia al contenedor de productos seleccionados
        const selectedProducts = document.getElementById('selected-products');

        // Agregar evento de clic a los botones de imprimir
        selectedProducts.addEventListener('click', (event) => {
            if (event.target.classList.contains('print-product')) {
                const productRow = event.target.closest('tr');
                const description = productRow.querySelector('td:first-child').textContent;
                const quantity = parseInt(productRow.querySelector('td:nth-child(3)').textContent);
                
                // Mostrar ventana emergente para imprimir
                showPrintDialog(description, quantity);
            }
        });

        // Función para mostrar la ventana emergente de impresión
        function showPrintDialog(description, quantity) {
            // Aquí puedes personalizar la apariencia de la ventana emergente y agregar el código necesario para imprimir los rotulados o códigos QR.
            // Puedes usar librerías o métodos específicos para generar los códigos QR, como qrcode.js, por ejemplo.

            // Ejemplo básico de ventana emergente
            const printWindow = window.open('', '_blank', 'width=400,height=300');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Imprimir</title>
                </head>
                <body>
                    <h1>Imprimir</h1>
                    <p>Producto: ${description}</p>
                    <p>Cantidad: ${quantity}</p>
                    <!-- Aquí puedes agregar el contenido necesario para imprimir los rotulados o códigos QR -->
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    });
</script>
