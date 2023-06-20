var input = document.getElementById("busqueda");
input.addEventListener("keyup", function () {
    filtrarProductos();
});

function filtrarProductos() {
    var input = document.getElementById("busqueda");
    var query = input.value.toUpperCase();
    var table = document.getElementById("tabla-listas");
    var rows = table.getElementsByTagName("tr");
    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var match = false;
        for (var j = 0; j < cells.length; j++) {
            var cellText = cells[j].innerText.toUpperCase();
            if (cellText.indexOf(query) > -1) {
                match = true;
                break;
            }
        }
        if (match) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}

setTimeout(() => {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        successAlert.remove();
    }
}, 5000); // 5000 ms = 5 segundos