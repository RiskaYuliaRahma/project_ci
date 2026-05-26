<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Peminjaman</h2>

<a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">
    Tambah
</a>

<form action="<?= site_url('peminjaman/cetak_pinjam'); ?>" method="post" class="mb-3">

    <div class="row">

        <div class="col-md-3">
            <input type="month" name="bulan" class="form-control">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-danger">
                Cetak PDF
            </button>
        </div>

    </div>

</form>

<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">

<table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">

<thead>
<tr>
    <th>No</th>
    <th>Kode</th>
    <th>Nama Anggota</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Jatuh Tempo</th>
    <th>Terlambat</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($data as $d): ?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $d->kode_peminjaman; ?></td>

    <td><?= $d->nama_anggota; ?></td>

    <td><?= $d->tanggal_pinjam; ?></td>

    <td><?= $d->tanggal_jatuh_tempo; ?></td>

    <td>

        <?php
        $today = date('Y-m-d');

        $selisih = strtotime($today) - strtotime($d->tanggal_jatuh_tempo);

        $terlambat = $selisih > 0
        ? floor($selisih / 86400)
        : 0;
        ?>

        <?php if($terlambat > 0 && $d->status == 'dipinjam'): ?>

            <span class="badge badge-danger">
                <?= $terlambat; ?> Hari
            </span>

        <?php else: ?>

            <span class="badge badge-success">
                0 Hari
            </span>

        <?php endif; ?>

    </td>

    <td>

        <?php if($d->status == 'dipinjam'): ?>

            <span class="badge badge-warning">
                Dipinjam
            </span>

        <?php else: ?>

            <span class="badge badge-success">
                Dikembalikan
            </span>

        <?php endif; ?>

    </td>

    <td>

        <?php if($d->status == 'dipinjam'): ?>

            <a href="<?= site_url('peminjaman/kembali/'.$d->id); ?>" 
               class="btn btn-success btn-sm">
               Kembalikan
            </a>

            <a href="<?= site_url('whatsapp/kirim_notifikasi/'.$d->id); ?>" 
               class="btn btn-warning btn-sm">

                <i class="fab fa-whatsapp"></i>
                Kirim WA

            </a>

        <?php else: ?>

            <span class="text-success">
                Selesai
            </span>

        <?php endif; ?>

    </td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>
</div>
</div>
</div>