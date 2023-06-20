document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.btn-danger');
    deleteButtons.forEach((button) => {
        button.addEventListener('click', async (event) => {
            event.preventDefault();
            const id = event.target.getAttribute('data-id');
            const confirmation = confirm('¿Está seguro de que desea eliminar esta salida?');
            if (confirmation) {
                const response = await fetch(`../eliminar/eliminar_salida.php?id=${id}`);
                location.reload();
            }
        });
    });
});
