// Ambil elemen select dengan ID "tahun_ppp"
var tahunSelect = document.getElementById("tahun_ppp");
// Mendapatkan tahun saat ini
var tahunSekarang = new Date().getFullYear();
// Isi elemen select dengan opsi tahun sekarang
var optionSekarang = document.createElement("option");
optionSekarang.value = tahunSekarang;
optionSekarang.text = tahunSekarang;
tahunSelect.add(optionSekarang);
// Isi elemen select dengan opsi-opsi tahun sebelumnya
for (var tahun = tahunSekarang - 1; tahun >= tahunSekarang - 10; tahun--) {
        var option = document.createElement("option");
        option.value = tahun;
        option.text = tahun;
        tahunSelect.add(option);
}