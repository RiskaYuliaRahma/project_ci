<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Buku</h2>

<a href="<?= site_url('buku/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<table id="dataTable" class="table table-bordered">
<thead class="thead-dark">
<tr>
    <th width="5%">No</th>
    <th>Kode Buku</th>
    <th>Judul Buku</th>
    <th>Penulis</th>
    <th>Kategori</th>
    <th>Stok</th>
    <th width="15%">Aksi</th>
</tr>
</thead>

<tbody>
<?php if(!empty($buku)): ?>
    <?php $no=1; foreach($buku as $p): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $p->kode_buku; ?></td>
        <td><?= $p->judul_buku; ?></td>
        <td><?= $p->penulis; ?></td>
        <td><?= $p->nama_kategori; ?></td>
        <td><?= $p->stok; ?></td>
        <td>
            <a href="<?= site_url('buku/edit/'.$p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= site_url('buku/hapus/'.$p->id); ?>"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus buku ini?')">
            Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="7" class="text-center">Data buku belum tersedia</td>
    </tr>
<?php endif; ?>
</tbody>

</table>
</div>