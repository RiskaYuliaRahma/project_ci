<div class="container-fluid">

    <h3>Laporan Data Buku</h3>

    <form method="get" class="mb-3">

        <select name="kategori" class="form-control d-inline-block" style="width:200px;">

            <option value="">-- Semua Kategori --</option>

            <?php foreach($kategori as $k): ?>

                <option value="<?= $k->id; ?>"
                    <?= ($this->input->get('kategori') == $k->id) ? 'selected' : ''; ?>>

                    <?= $k->nama_kategori; ?>

                </option>

            <?php endforeach; ?>

        </select>

        <button type="submit" class="btn btn-primary btn-sm">
            Filter
        </button>

        <a href="<?= site_url('laporan/buku'); ?>" 
        class="btn btn-secondary btn-sm">
            Reset
        </a>

        <a href="<?= site_url('buku/cetak_buku'); ?>" 
        target="_blank" 
        class="btn btn-success btn-sm">
            Cetak PDF
        </a>

    </form>

    <table class="table table-bordered">

        <thead>
            <tr align="center">
                <th>No</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>

        <?php $no=1; foreach($data as $d): ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->kode_buku; ?></td>
                <td><?= $d->judul_buku; ?></td>
                <td><?= $d->nama_kategori; ?></td>
                <td><?= $d->stok; ?></td>
            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>