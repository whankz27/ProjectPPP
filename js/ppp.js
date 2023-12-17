function toggleInput() {
    var jenisProperti = document.getElementById('jenisProperti');
    var jpLainnya = document.getElementById('jpLainnya');

    // Mengecek jika opsi terakhir dipilih (Lainnya)
    if (jenisProperti.value === 'catJP17') {
        jpLainnya.style.display = 'block'; // Tampilkan input 'Lainnya'
        jpLainnya.removeAttribute('disabled'); // Aktifkan input 'Lainnya'
    } else {
        jpLainnya.style.display = 'none'; // Sembunyikan input 'Lainnya'
        jpLainnya.setAttribute('disabled', 'disabled'); // Nonaktifkan input 'Lainnya'
    }
}


