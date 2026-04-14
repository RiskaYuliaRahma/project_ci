<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Produk</h2>

<a href="<?= site_url('produk/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<table class="table table-bordered">
<thead>
<tr>
    <th>No</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Kategori</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($produk as $p): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $p->nama_produk; ?></td>
    <td>Rp <?= number_format($p->harga, 0, ',', '.'); ?></td>
    <td><?= $p->nama_kategori; ?></td>
    <td>
        <a href="<?= site_url('produk/edit/'.$p->id_produk); ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="<?= site_url('produk/hapus/'.$p->id_produk); ?>"
        class="btn btn-danger btn-sm"
        onclick="return confirm('Yakin ingin menghapus produk ini?')">
        Hapus
        </a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>

</table>
</div>