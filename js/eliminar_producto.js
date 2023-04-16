document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.btn-danger');
deleteButtons.forEach((button) => {
    button.addEventListener('click', async (event) => {
        console.log("clickboton");
        event.preventDefault();
        const id = event.target.getAttribute('data-id');
        const confirmation = confirm('¿Está seguro de que desea eliminar este producto?');
        if (confirmation) {
            await fetch(`../eliminar/eliminar_producto.php?id=${id}`);
            location.reload();
        }
    });
});
});