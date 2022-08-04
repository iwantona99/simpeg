<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Data Pegawai'; 
    //variabel yang berfungsi mengatifkan sidebar
    $pegawai = 'pegawai';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file edit_pegawai
    require_once "_template/_header.php";
    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $nip = $_GET['id'];

    // paggil data pegawai berdasarkan nip untuk ditampilkan di form sebelum melakukan perubahan data
    $result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip='$nip'");
    // hasil dari proses result akan disimpan ke variabel data
    $data = mysqli_fetch_assoc($result);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_pegawai') ?>?edit" enctype="multipart/form-data">
            
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-9">
                    <input type="hidden" name="nipAsli" value="<?= $nip ?>">
                    <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?= $data['nip'] ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $data['nama_pegawai'] ?>" placeholder="Nama Pegawai" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="ttl" class="col-sm-3 col-form-label">Tempat/Tanggal Lahir</label>
                <div class="col">
                    <input type="text" class="form-control" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" placeholder="Tempat Lahir" required autocomplete="off">
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tanggal_lahir'] ?>" placeholder="Tanggal Lahir" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="agama" id="agama" value="<?= $data['agama'] ?>" placeholder="Agama" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="didik" class="col-sm-3 col-form-label">Pendidikan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="didik" id="didik" value="<?= $data['didik'] ?>" placeholder="Pendidikan" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $data['jurusan'] ?>" placeholder="Jurusan" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="instansi" class="col-sm-3 col-form-label">Instansi Induk</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="instansi" id="instansi" value="<?= $data['instansi'] ?>" placeholder="Instansi" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="stat_pegawai" class="col-sm-3 col-form-label">Status PNS</label>
                <div class="col-sm-9">
                    <select class="form-control" name="stat_pegawai" id="stat_pegawai" required autocomplete="off" autofocus>
                        <option value="aktif" <?= $data['stat_pegawai'] == 'aktif' ? 'selected' :null ?>>Aktif</option>
                        <option value="nonaktif" <?= $data['stat_pegawai'] == 'nonaktif' ? 'selected' :null ?>>Non Aktif</option>
                    </select>
                </div>
            </div>
            
			 <div class="form-group row">
                <label for="pangkatcpns" class="col-sm-3 col-form-label">Pangkat CPNS</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pangkatcpns" id="pangkatcpns" value="<?= $data['pangkatcpns'] ?>" placeholder="Pangkat CPNS" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmtcpns" class="col-sm-3 col-form-label">TMT CPNS</label>
                <div class="col">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tmtcpns" value="<?= $data['tmtcpns'] ?>" placeholder="TMT CPNS" required>
                </div>
            </div>
			<div class="form-group row">
                <label for="pangkatterakhir" class="col-sm-3 col-form-label">Pangkat Terakhir</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pangkatterakhir" id="pangkatterakhir" value="<?= $data['pangkatterakhir'] ?>" placeholder="Pangkat Terakhir" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmtpangkatterakhir" class="col-sm-3 col-form-label">TMT Pangkat Terakhir</label>
                <div class="col">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tmtpangkatterakhir" value="<?= $data['tmtpangkatterakhir'] ?>" placeholder="TMT Pangkat Terakhir" required>
                </div>
            </div>
			<div class="form-group row">
                <label for="tmtpensiun" class="col-sm-3 col-form-label">TMT Pensiun</label>
                <div class="col">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tmtpensiun" value="<?= $data['tmtpensiun'] ?>" placeholder="TMT Pensiun" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Pas Photo</label>
                <div class="col-sm-9">
                    <a href="<?= asset('_assets/img/').$data['foto_pegawai'] ?>" target="_blank" class="text-decoration-none">
                        <img src="<?= asset('_assets/img/').$data['foto_pegawai'] ?>" alt="Foto Pegawai" class="img-fluid mb-3" width="60px" height="70px">
                    </a>
                    <input type="hidden" name="foto_lama" value="<?= $data['foto_pegawai'] ?>">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="foto">
                        <label class="custom-file-label" for="customFile">Tentukan file</label>
                    </div>
                    <span class="text-info">* Maksimal Ukuran File 1 MB</span>
                </div>
            </div>

        <!-- disini tanda tempat form -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
        <a href="<?= base_url('pegawai') ?>" class="btn btn-warning"><i class="fas fa-fw fa-chevron-left"></i> Kembali</a>
    </div>
    </form>
</div>


<?php

    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()

            
        $(document).on("change", ".custom-file-input", function (event) {
            $(this).next(".custom-file-label").html(event.target.files[0].name);
            })    
        </script>
    ';

    // menghubungkan file footer dengan file edit_pegawai
    require_once "_template/_footer.php";
?>