<?php
$data_pegawai = query("SELECT * FROM pegawai WHERE nip='$nip'");
?>
<table class="text-dark mt-3">
    <tr>
        <td>NIP</td>
        <td>:</td>
        <td><?= $data_pegawai[0]['nip'] ?></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><?= ucwords($data_pegawai[0]['nama_pegawai']) ?></td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>:</td>
        <td><?= ucwords($data_pegawai[0]['tempat_lahir']) . ', ' . date('d-m-Y',strtotime($data_pegawai[0]['tanggal_lahir'])) ?> </td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?= ucwords($data_pegawai[0]['agama']) ?> </td>
    </tr>
    <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td><?= ucwords($data_pegawai[0]['didik']) ?> </td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td>:</td>
        <td><?= strtoupper($data_pegawai[0]['jurusan']) ?> </td>
    </tr>
    <tr>
        <td>Instansi Induk</td>
        <td>:</td>
        <td><?= ucwords($data_pegawai[0]['instansi']) ?> </td>
    </tr>
    <tr>
        <td>Status PNS</td>
        <td>:</td>
        <td><?= strtoupper($data_pegawai[0]['stat_pegawai']) ?> </td>
    </tr>
    <tr>
        <td>Pengkat CPNS</td>
        <td>:</td>
        <td><?= ucwords($data_pegawai[0]['pangkatcpns']) ?> </td>
    </tr>
    <tr>
        <td>TMT CPNS</td>
        <td>:</td>
        <td><?= $data_pegawai[0]['tmtcpns'] ?> </td>
    </tr>
    <tr>
        <td>Pangkat Terakhir</td>
        <td>:</td>
        <td><?= $data_pegawai[0]['pangkatterakhir'] ?> </td>
    </tr>
	<tr>
        <td>TMT Pangkat Terakhir</td>
        <td>:</td>
        <td><?= $data_pegawai[0]['tmtpangkatterakhir'] ?> </td>
    </tr>
    <tr>
        <td>TMT Pensiun</td>
        <td>:</td>
        <td><?= $data_pegawai[0]['tmtpensiun'] ?> </td>
    </tr>
</table>