<?php

require_once "config.php";

if (isset($_GET['add'])) {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama_pegawai = strip_tags($_POST['nama_pegawai']);
    $tempat_lahir = strip_tags($_POST['tempat_lahir']);
    $tgl_lahir = strip_tags($_POST['tgl_lahir']);
    $agama = strip_tags($_POST['agama']);
    $didik = strip_tags($_POST['didik']);
    $jurusan = strip_tags($_POST['jurusan']);
    $instansi = strip_tags($_POST['instansi']);
    $stat_pegawai = strip_tags($_POST['stat_pegawai']);
    $pangkatcpns = strip_tags($_POST['pangkatcpns']);
    $tmtcpns = strip_tags($_POST['tmtcpns']);
    $pangkatterakhir = strip_tags($_POST['pangkatterakhir']);
	$tmtpangkatterakhir = strip_tags($_POST['tmtpangkatterakhir']);
	$tmtpensiun = strip_tags($_POST['tmtpensiun']);

    $ekstensi  = ['png', 'jpeg', 'jpg'];
    $namaFile    = strtolower($_FILES['foto']['name']);
    $tipe   = pathinfo($namaFile, PATHINFO_EXTENSION);
    $ukuranFile    = $_FILES['foto']['size'];
    $sumber   = $_FILES['foto']['tmp_name'];
    $foto = uniqid();
    $foto .= '.';
    $foto .= $tipe;

    if (in_array($tipe, $ekstensi) === true) {
        if ($ukuranFile < 1048576) { //1 mb
            $lokasi = "../_assets/img/" . $foto;
            create("INSERT INTO pegawai VALUES ('$nip','$nama_pegawai','$foto','$tempat_lahir','$tgl_lahir','$agama','$didik','$jurusan','$instansi','$stat_pegawai','$pangkatcpns','$tmtcpns','$pangkatterakhir','$tmtpangkatterakhir','$tmtpensiun','aktif')");
            $upload = move_uploaded_file($sumber, $lokasi);
            if ($upload) {
                echo '<script>
                        alert("Data Berhasil Ditambah")
                        window.location = "' . base_url('pegawai') . '";
                        </script>';
            } else {
                echo '<script>
                        alert("Data Gagal Diupload")
                        window.location = "' . base_url('tambah_pegawai') . '";
                        </script>';
            }
        } else {
            echo '<script>alert("Maaf Ukuran File Terlalu Besar")
                        window.location = "' . base_url('tambah_pegawai') . '";
                        </script>';
        }
    } else {
        echo '<script>alert("Maaf Jenis File Tidak Diizinkan")
                window.location = "' . base_url('tambah_pegawai') . '";
                </script>';
    }
} elseif (isset($_GET['edit'])) {
    $nipAsli = mysqli_real_escape_string($koneksi, $_POST['nipAsli']);
    $foto_lama = strip_tags($_POST['foto_lama']);
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama_pegawai = strip_tags($_POST['nama_pegawai']);
    $tempat_lahir = strip_tags($_POST['tempat_lahir']);
    $tgl_lahir = strip_tags($_POST['tgl_lahir']);
    $agama = strip_tags($_POST['agama']);
    $didik = strip_tags($_POST['didik']);
    $jurusan = strip_tags($_POST['jurusan']);
    $instansi = strip_tags($_POST['instansi']);
	$stat_pegawai = strip_tags($_POST['stat_pegawai']);
    $pangkatcpns = strip_tags($_POST['pangkatcpns']);
    $tmtcpns = strip_tags($_POST['tmtcpns']);
    $pangkatterakhir = strip_tags($_POST['pangkatterakhir']);
    $tmtpangkatterakhir = strip_tags($_POST['tmtpangkatterakhir']);
	$tmtpensiun = strip_tags($_POST['tmtpensiun']);
 

    // cek form, apakah user hanya mengubah data tanpa mengganti foto
    // jika foto tidak diubah, simpan data formnya saja
    if ($_FILES['foto']['name'] == '') {
        $query = mysqli_query($koneksi, "UPDATE pegawai SET nip='$nip',nama_pegawai='$nama_pegawai', tempat_lahir='$tempat_lahir', tanggal_lahir='$tgl_lahir', agama='$agama', didik='$didik', jurusan='$jurusan', instansi='$instansi',stat_pegawai='$stat_pegawai',pangkatcpns='$pangkatcpns',tmtcpns='$tmtcpns', pangkatterakhir='$pangkatterakhir',tmtpangkatterakhir='$tmtpangkatterakhir',tmtpensiun='$tmtpensiun' WHERE nip='$nipAsli' ");
        if ($query) {
            echo '<script>
                alert("Data Berhasil Diperbarui")
                window.location = "' . base_url('pegawai') . '";
                </script>';
        } else {
            echo '<script>
                alert("Data Gagal Diperbarui")
                window.location = "' . base_url('edit_pegawai') . '?id=' . $nipAsli . '";
                </script>';
        }
    } elseif ($_FILES['foto']['name'] !== '') {
        $ekstensi  = ['png', 'jpeg', 'jpg'];
        $namaFile    = strtolower($_FILES['foto']['name']);
        $tipe   = pathinfo($namaFile, PATHINFO_EXTENSION);
        $ukuranFile    = $_FILES['foto']['size'];
        $sumber   = $_FILES['foto']['tmp_name'];
        $foto = uniqid();
        $foto .= '.';
        $foto .= $tipe;

        if (in_array($tipe, $ekstensi) === true) {
            if ($ukuranFile < 1048576) { //1 mb
                // hapus foto lama sebelum upload foto baru
                unlink("../_assets/img/" . $foto_lama);

                mysqli_query($koneksi, "UPDATE pegawai SET nip='$nip',nama_pegawai='$nama_pegawai', tempat_lahir='$tempat_lahir',foto_pegawai='$foto', tanggal_lahir='$tgl_lahir', agama='$agama', didik='$didik', jurusan='$jurusan', instansi='$instansi',stat_pegawai='$stat_pegawai',pangkatcpns='$pangkatcpns',tmtcpns='$tmtcpns', pangkatterakhir='$pangkatterakhir',tmtpangkatterakhir='$tmtpangkatterakhir',tmtpensiun='$tmtpensiun', status_user='$stat_user' WHERE nip='$nipAsli' ");
                $lokasi = "../_assets/img/" . $foto;
                $upload = move_uploaded_file($sumber, $lokasi);
                if ($upload) {
                    echo '<script>
                            alert("Data Berhasil Ditambah")
                            window.location = "' . base_url('pegawai') . '";
                            </script>';
                } else {
                    echo '<script>
                            alert("Data Gagal Diupload")
                            window.location = "' . base_url('edit_pegawai') . '?id=' . $nipAsli . '";
                            </script>';
                }
            } else {
                echo '<script>alert("Maaf Ukuran File Terlalu Besar")
                            window.location = "' . base_url('edit_pegawai') . '?id=' . $nipAsli . '";
                            </script>';
            }
        } else {
            echo '<script>alert("Maaf Jenis File Tidak Diizinkan")
                    window.location = "' . base_url('edit_pegawai') . '?id=' . $nipAsli . '";
                    </script>';
        }
    } else {
        echo '<script>
            alert("Data Gagal Diperbarui")
            window.location = "' . base_url('edit_pegawai') . '?id=' . $nipAsli . '";
            </script>';
    }
}
