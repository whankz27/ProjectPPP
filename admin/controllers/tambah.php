<?php
session_start();
include '../../config/Connections.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle form submission and insert data into the database
    // Add your form validation and data sanitization here
    $nama_marketing = isset($_POST['namaMarketing']) ? $_POST['namaMarketing'] : '-';
    $tahun_ppp = isset($_POST['tahun_ppp']) ? $_POST['tahun_ppp'] : '-';
    $no_ppp = isset($_POST['no_ppp']) ? $_POST['no_ppp'] : '-';
    $kategoriListing =  isset($_POST['kategoriListing']) ? $_POST['kategoriListing'] : '-';
    $jenisTransaksi = isset($_POST['jenisTransaksi']) ? $_POST['jenisTransaksi'] : '-';
    $jenisListing = isset($_POST['jenisListing']) ? $_POST['jenisListing'] : '-';
    $besaranKomisi = isset($_POST['besaranKomisi']) ? $_POST['besaranKomisi'] : '-';
    $jangkaWaktu = isset($_POST['jangkaWaktu']) ? $_POST['jangkaWaktu'] : '-';
    $jangkaWaktu2 = isset($_POST['jangkaWaktu2']) ? $_POST['jangkaWaktu2'] : '-';
    $jenisProperti = isset($_POST['jenisProperti']) ? $_POST['jenisProperti'] : '-';
    $luasTanah = isset($_POST['luasTanah']) ? $_POST['luasTanah'] : '-';
    $luasBangunan = isset($_POST['luasBangunan']) ? $_POST['luasBangunan'] : '-';
    $area = isset($_POST['area']) ? $_POST['area'] : '-';
    $blok = isset($_POST['blok']) ? $_POST['blok'] : '-';
    $hadapView = isset($_POST['hadapView']) ? $_POST['hadapView'] : '-';
    $jumlahLantai = isset($_POST['jumlahLantai']) ? $_POST['jumlahLantai'] : '-';
    $alamatListingProperti = isset($_POST['alamatListingProperti']) ? $_POST['alamatListingProperti'] : '-';
    $hargaJual = isset($_POST['hargaJual']) ? $_POST['hargaJual'] : '-';
    $lokasiTanah = isset($_POST['lokasiTanah']) ? $_POST['lokasiTanah'] : "-";
    $minLamaSewa = isset($_POST['minimalLamaSewa']) ? $_POST['minimalLamaSewa'] : '-';
    $deposit = isset($_POST['deposit']) ? $_POST['deposit'] : '-';
    $hargaSewa = isset($_POST['hargaSewa']) ? $_POST['hargaSewa'] : '-';
    $cbSHM = isset($_POST['cbSHM']) ? "Tersedia" : '-';
    $noSHM = isset($_POST['noSHM']) ? $_POST['noSHM'] : '-';
    $cbHGB = isset($_POST['cbHGB'])  ? 'Tersedia' : '-';
    $noHGB = isset($_POST['noHGB']) ? $_POST['noHGB'] : '-';
    $tahunHGB = isset($_POST['tahunHGB']) ? $_POST['tahunHGB'] : '-';
    $noIMB = isset($_POST['noIMB']) ? $_POST['noIMB'] : '-';
    $cbIMB = isset($_POST['cbIMB']) ? 'Tersedia' : '-';
    $noPBB = isset($_POST['noPBB']) ? $_POST['noPBB'] : '-';
    $cbPBB = isset($_POST['cbPBB']) ? 'Tersedia' : '-';
    $tahunPBB = isset($_POST['tahunPBB']) ? $_POST['tahunPBB'] : '-';
    $cbNoHp = isset($_POST['cbNoHP']) ? 'Tersedia' : '-';
    $noHp = isset($_POST['noHP']) ? $_POST['noHP'] : '-';
    $cbDokLainnya = isset($_POST['cbDokLainnya']) ? 'Tersedia' : '-';
    $dokLainnya = isset($_POST['dokLainnya']) ? $_POST['dokLainnya'] : '-';
    $kamarTidur = isset($_POST['kamarTidur']) ? $_POST['kamarTidur'] : '-';
    $kamarMandi = isset($_POST['kamarMandi']) ? $_POST['kamarMandi'] : '-';
    $garasi = isset($_POST['carport']) ? $_POST['carport'] : '-';
    $cbCarport = isset($_POST['cbCarport']) ? 'Tersedia' : '-';
    $cbKamarMandi = isset($_POST['cbKamarMandi']) ? 'Tersedia' : '-';
    $cbKamarTidur = isset($_POST['cbKamarTidur']) ? 'Tersedia' : '-';
    $cbRuangTamu = isset($_POST['cbRuangTamu']) ? 'Tersedia' : '-';
    $cbRuangKeluarga = isset($_POST['cbRuangKeluarga']) ? 'Tersedia' : '-';
    $cbRuangKerja = isset($_POST['cbRuangKerja']) ? 'Tersedia' : '-';
    $cbKolamRenang = isset($_POST['cbKolamRenang']) ? 'Tersedia' : '-';
    $cbTaman = isset($_POST['cbTaman']) ? 'Tersedia' : '-';
    $cbTeras = isset($_POST['cbTeras']) ? 'Tersedia' : '-';
    $cbGudang = isset($_POST['cbGudang']) ? 'Tersedia' : '-';
    $cbDapur = isset($_POST['cbDapur']) ? 'Tersedia' : '-';
    $cbKTpembantu = isset($_POST['cbKamarTidurART']) ? 'Tersedia' : '-';
    $cbKMpembantu = isset($_POST['cbKamarMandiART']) ? 'Tersedia' : '-';
    $cbFasListrik = isset($_POST['cbFasListrik']) ? 'Tersedia' : '-';
    $fasListrik = isset($_POST['fasListrik']) ? $_POST['fasListrik'] : '-'; 
    $cbFasTelpon = isset($_POST['cbFasTelpon']) ? 'Tersedia' : '-';
    $fasTelpon = isset($_POST['fasTelpon']) ? $_POST['fasTelpon'] : '-';
    $cbFasAC = isset($_POST['cbFasAC']) ? 'Tersedia' : '-';
    $fasAC = isset($_POST['fasAC']) ? $_POST['fasAC'] : '-';
    $cbFurnished = isset($_POST['cbFasFurnished']) ? 'Furnished' : '-';
    $cbUnfurnished = isset($_POST['cbFasUnfurnished']) ? 'Unfurnished' : '-';
    $cbSemiFurnished = isset($_POST['cbFasSemiFurnished']) ? 'Semi-Furnished' : '-';
    $cbFasAirPAM = isset($_POST['cbFasAirPAM']) ? 'Tersedia' : '-';
    $cbFasAirTanah = isset($_POST['cbFasAirTanah']) ? 'Tersedia' : '-';
    $cbFasWaterHeater = isset($_POST['cbFasWaterHeater']) ? 'Tersedia' : '-';
    $fasKeterangan = isset($_POST['keteranganFasLainnya']) ? $_POST['keteranganFasLainnya'] : '-';
    $namaPemilik = isset($_POST['namaPemilik']) ? $_POST['namaPemilik'] : '-';
    $noKTPpemilik = isset($_POST['noKTPpemilik']) ? $_POST['noKTPpemilik'] : '-';
    $noHpPemilik = isset($_POST['noHpPemilik']) ? $_POST['noHpPemilik'] : '-';
    $noTelRmhPemilik = isset($_POST['telpRmhPemilik']) ? $_POST['telpRmhPemilik'] : '-';
    $emailPemilik = isset($_POST['emailPemilik']) ? $_POST['emailPemilik'] : '-';
    $alamatPemilik = isset($_POST['alamatPemilik']) ? $_POST['alamatPemilik'] : '-';
    $namaAgent = isset($_POST['namaAgentLJH']) ? $_POST['namaAgentLJH'] : '-';
    $kantorAgent = isset($_POST['kantorLJH']) ? $_POST['kantorLJH'] : '-';
    $noHpAgent = isset($_POST['noHpAgent']) ? $_POST['noHpAgent'] : '-';
    $telpKantor = isset($_POST['telpKantor']) ? $_POST['telpKantor'] : '-';
    $emailAgent = isset($_POST['emailAgent']) ? $_POST['emailAgent'] : '-';
    $alamatAgent = isset($_POST['alamatAgent']) ? $_POST['alamatAgent'] : '-';

    // Add more fields as needed
    $sql = "INSERT INTO onlinelisting (nama_marketing, tahun_ppp, no_ppp, kategoriListing, jenisTransaksi, jenisListing, besaranKomisi, jangkaWaktu, sampaiDengan, jenisProperti, luasTanah, luasBangunan, area, blok, hadapView, jumlahLantai, alamatListingProperti, hargaJual, minLamaSewa, deposit, hargaSewa, cbSHM, noSHM, cbHGB, noHGB, tahunHGB, noIMB, cbIMB, noPBB, cbPBB, tahunPBB, cbNoHp, noHP, cbDokLainnya, dokLainnya, kamarTidur, kamarMandi, cbCarport, carport, cbKamarMandi, cbKamarTidur, cbRuangTamu, cbRuangKeluarga, cbKolamRenang, lokasiTanah, cbTaman, cbTeras, cbGudang, cbRuangKerja, cbDapur, kt_pembantu, km_pembantu, cbListrik, wattListrik, cbTelepon, lineTelepon, cbAC, unitAC, cbFurnished, cbUnfurnished, cbSemiFurnished, cbAirPAM, cbAirTanah, cbWaterHeater, fasKeterangan, namaPemilik, noKTPPemilik, noHPPemilik, noTelpRumahPemilik, emailPemilik, alamatPemilik, namaAgent, kantorAgent, noHPAgent, telpKantor, emailAgent, alamatAgent)
            VALUES ('$nama_marketing', '$tahun_ppp', '$no_ppp', '$kategoriListing', '$jenisTransaksi', '$jenisListing', '$besaranKomisi', '$jangkaWaktu', '$jangkaWaktu2', '$jenisProperti', '$luasTanah', '$luasBangunan', '$area', '$blok', '$hadapView', '$jumlahLantai', '$alamatListingProperti', '$hargaJual', '$minLamaSewa', '$deposit', '$hargaSewa', '$cbSHM', '$noSHM', '$cbHGB', '$noHGB', '$tahunHGB', '$noIMB', '$cbIMB', '$noPBB', '$cbPBB', '$tahunPBB', '$cbNoHp', '$noHp', '$cbDokLainnya', '$dokLainnya', '$kamarTidur', '$kamarMandi', '$lokasiTanah', '$cbCarport', '$garasi', '$cbKamarMandi', '$cbKamarTidur', '$cbRuangTamu', '$cbRuangKeluarga', '$cbKolamRenang', '$cbTaman', '$cbTeras', '$cbGudang', '$cbRuangKerja', '$cbDapur', '$cbKTpembantu', '$cbKMpembantu', '$cbFasListrik', '$fasListrik', '$cbFasTelpon', '$fasTelpon', '$cbFasAC', '$fasAC', '$cbFurnished', '$cbUnfurnished', '$cbSemiFurnished', '$cbFasAirPAM', '$cbFasAirTanah', '$cbFasWaterHeater', '$fasKeterangan', '$namaPemilik', '$noKTPpemilik', '$noHpPemilik', '$noTelRmhPemilik', '$emailPemilik', '$alamatPemilik', '$namaAgent', '$kantorAgent', '$noHpAgent', '$telpKantor', '$emailAgent', '$alamatAgent')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Set success message in session
        $_SESSION['success_message'] = 'Data berhasil ditambahkan.';
        header('Location: ../view.php');
        exit();
    } else {
        // Set error message in session
        $_SESSION['error_message'] = 'Data tidak berhasil ditambahkan: ' . mysqli_error($conn);
        header('Location: ../index.php');
        exit();
    }
}
