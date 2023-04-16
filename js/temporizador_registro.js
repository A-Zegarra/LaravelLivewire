setTimeout(() => {
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        successAlert.remove();
    }
}, 2000); // 5000 ms = 5 segundos