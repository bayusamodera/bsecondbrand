<div class="container">
    <div class="shop-layout shop-layout--sidebar--start">
        <div class="shop-layout__sidebar">
            <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                <div class="block-sidebar__backdrop"></div>
                <div class="block-sidebar__body">
                    <div class="block-sidebar__header">
                        <button class="block-sidebar__close" type="button">
                            <svg width="20px" height="20px">
                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#cross-20"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="block-sidebar__item">
                        <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                            <h5 class="font-weight-bold">Kategori</h5>
                            <div class="widget-filters__list">

                                <ul class="filter-categories__list">
                                    <?php $query = $this->db->get('tb_toko_kategoriproduk');
                                    foreach ($query->result_array() as $kat) {
                                    ?>
                                        <li class="filter-categories__item filter-categories__item--child">
                                            <a href="<?= base_url('produk/kategori/') . $kat['kategori_seo'] ?>"><?= $kat['nama_kategori'] ?></a>
                                        </li>
                                    <?php } ?>
                                        <li class="filter-categories__item filter-categories__item--child">
                                            <a href="<?= base_url('produk') ?>">Semua Produk</a>
                                        </li>
                                </ul>
                                <br>
                            </div>
                            <h5 class="font-weight-bold">Harga</h5>
                            <div class="container align-items-center">
                                <form action="<?php site_url('produk/index');?>" class="form-inline" methode="get">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Minimum</label>
                                        <input type="text" class="form-control form-control-sm" name="hrg_awal" value="<?php echo $hrg_awal;?>">
                                    </div>
                                        <div class="col-md-12 form-group">
                                        <label>Maksimum</label>
                                        <input type="text" class="form-control form-control-sm" name="hrg_akhir" value="<?php echo $hrg_akhir;?>">
                                    </div>
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-sm btn-success mt-3" name="filter">Filter</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-layout__content">
            <div class="block">
                <div class="products-view">

                    <div class="products-view__options">
                        <div class="view-options view-options--offcanvas--mobile">
                            <div class="view-options__filters-button"><button type="button" class="filters-button"><svg class="filters-button__icon" width="16px" height="16px">
                                        <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#filters-16"></use>
                                    </svg> <span class="filters-button__title">Filter</span></button></div>
                            <div class="view-options__layout">
                                <div class="layout-switcher">
                                    <div class="layout-switcher__list"><button data-layout="grid-4-full" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-grid-16x16"></use>
                                            </svg></button> <button data-layout="grid-4-full" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-grid-with-details-16x16">
                                                </use>
                                            </svg></button> <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#layout-list-16x16"></use>
                                            </svg></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($this->uri->segment(2) == 'kategori') {
                        $cek = $this->model_app->edit('tb_toko_kategoriproduk', array('kategori_seo' => $this->uri->segment(3)))->row_array();
                        $jumlah = $this->model_app->view_where('tb_toko_produk', array('id_kategori_produk' => $cek['id_kategori_produk']))->num_rows();
                        if ($jumlah <= 0) { ?>
                            <div class="text-center mt-3 mb-3">
                                <h5>Maaf produk pada kategori ini belum tersedia.</h5>
                            </div>
                    <?php }
                    } ?>
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

                                            <div class="product-card__image">
                                                <a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>">
                                                    <img src="<?= base_url('assets/images/produk/') . $foto_produk; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>">
                                                        <?= $row['nama_produk']; ?>
                                                    </a>
                                                </div>
                                                <ul class="product-card__features-list">
                                                    <li>Stok : <?= $stok ?></li>
                                                </ul>

                                            </div>

                                            <div class="product-card__actions">
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

                            <?php }
                            } ?>

                        </div>
                    </div>
                    <div class="products-view__pagination">
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="mb-5">
                                    <?php echo $this->pagination->create_links(); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>