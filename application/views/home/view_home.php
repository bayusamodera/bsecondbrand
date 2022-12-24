<?php
if ($this->uri->segment(2) == 'kategori') {
    $cek = $this->model_app->edit('tb_toko_kategoriproduk', array('kategori_seo' => $this->uri->segment(3)))->row_array();
    $jumlah = $this->model_app->view_where('tb_toko_produk', array('id_kategori_produk' => $cek['id_kategori_produk']))->num_rows();
    if ($jumlah <= 0) { ?>
        <div class="text-center mt-3 mb-3">
            <h5>Maaf produk pada kategori ini belum tersedia.</h5>
            <a class="btn btn-primary btn-sm mt-2" href="#">Home</a>
        </div>
<?php }
} ?>

<div class="row">
    <div class="col-12">
        <div class="block">

            <div class="products-view">
                <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false">
                    <div class="products-list__body">
                        <?php
                        $no = 1;
                        foreach ($record->result_array() as $row) {
                            if (trim($row['gambar']) == '') {
                                $foto_produk = 'no-image.png';
                            } else {
                                $foto_produk = $row['gambar'];
                            }

                            $stok = $row['stok'];
                            if ($stok !== 0) { ?>
                                <div class="products-list__item">
                                    <div class="product-card">
                                        <input clas='post' id="id_produk" name="id_produk" type="hidden" value="<?= $row['id_produk'] ?>">

                                        <?php
                                        $persen = ($row['diskon'] / $row['harga_konsumen']) * 100;
                                        if ($row['diskon'] == "0") {
                                        } else { ?>
                                            <div class="product-card__badges-list">
                                                <div class="product-card__badge product-card__badge--sale"><?= '-' . round($persen, 2) . '%' ?></div>
                                            </div>
                                        <?php } ?>

                                        <div class="product-card__image"><a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>">
                                                <img src="<?= base_url('assets/images/produk/') . $foto_produk; ?>" alt=""></a></div>
                                        <div class="product-card__info mb-3">
                                            <div class="product-card__name"><a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>"><?= $row['nama_produk']; ?></a></div>

                                            <div class="product-card__prices">
                                                <?php if ($row['diskon'] == '0') { ?>
                                                    Rp <?= rupiah($row['harga_konsumen']) ?>
                                                <?php } else { ?>
                                                    <small><del>Rp <?= rupiah($row['harga_konsumen']) ?></del></small>
                                                    Rp <?= rupiah($row['harga_konsumen'] - $row['diskon']) ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <nav class="mb-5">
            <?php echo $this->pagination->create_links(); ?>
        </nav>
    </div>
</div>