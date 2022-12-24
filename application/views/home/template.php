<?php
$iden = $this->db->query("SELECT * FROM tb_web_identitas where id_identitas='1'")->row_array();
?>
    <!-- header -->
    <?php include '_include/header.php'; ?>
    <!-- end header -->

    <!-- mobile menu -->
    <?php include '_include/mobilemenu.php'; ?>
    <!-- end header -->

    <!-- site -->
    <div class="site">

        <!-- navbar -->
        <?php include '_include/navbar.php'; ?>
        <!-- end navbar -->

        <div class="site__body">

            <!-- breadcrumb -->
            <?php
            if ($this->uri->segment(1) == '' or $this->uri->segment(1) == 'main') {
                echo '';
            } else { ?>
                <div class="page-header">
                    <div class="page-header__container container">
                        <div class="page-header__breadcrumb">
                            <nav aria-label="breadcrumb">
                                <small>
                                    <a href="<?= base_url() ?>">Home</a>

                                    <i class="fas fa-angle-right mx-2 text-secondary"></i>
                                    <?= $breadcrumb; ?>

                                </small>
                            </nav>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- slideshow -->
            <?php
            if ($this->uri->segment(1) == '' or $this->uri->segment(1) == 'main') {
                include '_include/slideshow.php';
            } ?>
            <!-- end slideshow -->
            <hr>
            <!-- product -->
            <div class="container">
                <?= $konten; ?>
            </div> 
            <!-- end Product -->


        <?php
        if ($this->uri->segment(2) == 'dashboard') {
            include '_include/modal1.php';
        } ?>
        <!-- footer -->
        <?php include '_include/footer.php'; ?>
    </div>

    <?php include '_include/keranjang-offcanvas.php' ?>

    <?php if ($this->uri->segment(1) == 'produk' && $this->uri->segment(2) == 'detail') { ?>
        <!-- photoswipe -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php $this->model_main->kunjungan(); ?>

