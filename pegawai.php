<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Data Pegawai'; 

    //variabel yang berfungsi mengatifkan sidebar
    $pegawai = 'pegawai';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/datatables/dataTables.bootstrap4.min.css';

    // menghubungkan file header dengan file Pegawai
    require_once "_template/_header.php";
	
	
	if(isset($_POST['hapus'])){
		$nip = $_POST['idbrg'];
		
		$con = mysqli_connect("localhost","root","","simpeg");

        $delete = mysqli_query($con,"DELETE FROM pegawai WHERE nip ='$nip'");
       
        
        //cek apakah berhasil
        if ($delete ){

            echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= pegawai.php'/>  ";
            } else { echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= pegawai.php'/> ";
            }
    };
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('tambah_pegawai') ?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Tambah Pegawai</a>
        <a href="<?= base_url('_report/all_pegawai') ?>" target="_blank" class="btn btn-info btn-sm float-right mr-3"><i class="fas fa-print"></i> Print Pegawai</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pegawai</th>
                <th>NIP</th>
                <th>Pendidikan</th>
                <th>Instansi Induk</th>
                <th>Status PNS</th>
             
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $data_p = query("SELECT * FROM pegawai GROUP BY nama_pegawai asc");
                    foreach ($data_p as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords($p['nama_pegawai']) ?></td>
                            <td><?= $p['nip'] ?></td>
                            <td><?= $p['didik'] ?></td>
                            <td><?= $p['instansi'] ?></td>
                            <td><?= strtoupper($p['stat_pegawai']) ?></td>
                        
                            <td>
                                <a href="<?= base_url('detail_pegawai') ?>?id=<?= $p['nip'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                <a href="<?= base_url('edit_pegawai') ?>?id=<?= $p['nip'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('_report/report_pegawai') ?>?id=<?= $p['nip'] ?>" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print</a>
								<button data-toggle="modal" data-target="#del<?=$p['nip']?>" class="btn btn-danger">Hapus</button></td>
                            </td>
                        </tr>
														<!-- The Modal -->
                                                    <div class="modal fade" id="del<?=$p['nip']?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus  <?php echo $p['nama_pegawai']?> </h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus pegawai ini?
                                                            <input type="hidden" name="idbrg" value="<?=$p['nip']?>"">
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php

    // menambahkan script khusus untuk halaman ini saja
    $addscript = '
        <script src="'.asset('_assets/vendor/datatables/jquery.dataTables.min.js').'"></script>
        <script src="'.asset('_assets/vendor/datatables/dataTables.bootstrap4.min.js').'"></script>
    
        <script src="'.asset('_assets/js/demo/datatables-demo.js').'"></script>
    ';

    // menghubungkan file footer dengan file detail Pegawai
    require_once "_template/_footer.php";
?>