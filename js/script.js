document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari refresh

            const title = document.querySelector('input[name="title"]').value;
            alert(`Lagu "${title}" berhasil ditambahkan!`);
            form.submit(); // Mengirim form setelah menampilkan pesan
        });
    }
});
