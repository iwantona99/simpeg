<?php
    include "../_config/config.php";
    require_once "../_assets/vendor/vendor/autoload.php";

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    $pegawai = query("SELECT * FROM pegawai");

    $content = '<center><h3>Daftar Nama Pegawai</h3></center><hr/><br/>';
    $content .= '<table border="1" cellspacing="0" cellpadding="3" width="100%" >
    <tr>
    <th>No</th>
    <th>NIP</th>
    <th>Nama Pegawai</th>
    <th>Tempat, Tanggal Lahir</th>
    <th>Agama</th>
    <th>Pendidikan</th>
    <th>Jurusan</th>
    <th>Instansi Induk</th>
    <th>Status PNS</th>
	<th>Pangkat CPNS</th>
    <th>TMT CPNS</th>
	<th>Pangkat Terakhir</th>
	<th>TMT Pangkat Terakhir</th>
    <th>TMT Pensiun</th>
    </tr>';
    $no = 1;
    foreach ($pegawai as $all_pegawai ) {
    $content .= "<tr>
        <td>".$no."</td>
        <td>".$all_pegawai['nip']."</td>
        <td>".ucwords($all_pegawai['nama_pegawai'])."</td>
        <td>".ucwords($all_pegawai['tempat_lahir']).", ". date('d-m-Y',strtotime($all_pegawai['tanggal_lahir']))."</td>
        <td>".ucwords($all_pegawai['agama'])."</td>
        <td>".$all_pegawai['didik']."</td>
        <td>".strtoupper($all_pegawai['jurusan'])."</td>
        <td>".$all_pegawai['instansi']."</td>
        <td>".ucwords($all_pegawai['stat_pegawai'])."</td>
		<td>".ucwords($all_pegawai['pangkatcpns'])."</td>
		<td>".ucwords($all_pegawai['tmtcpns'])."</td>
		<td>".ucwords($all_pegawai['pangkatterakhir'])."</td>
		<td>".ucwords($all_pegawai['tmtpangkatterakhir'])."</td>
		<td>".ucwords($all_pegawai['tmtpensiun'])."</td>
        </tr>";
    $no++;
    }
    $content .= "</html>";

    $dompdf->loadHtml($content);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('Legal', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Ball_pegawai[0]ser
    $dompdf->stream("Daftar Pegawai.pdf",["Attachment" => false]);