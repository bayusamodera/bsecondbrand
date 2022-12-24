<footer class=" text-white p-3 small" style="background-color: rgb(203, 46, 46)">
    <div class="text-center">&copy;Copyright <?php echo date("Y"); ?> BSecondBrand
    </div>
</footer>

</body>

</html>

<script src="<?= base_url('assets/template/tema/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/nouislider/nouislider.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/select2/js/select2.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/number.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/main.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/header.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/svg4everybody/svg4everybody.min.js"></script>
    <script src="<?= base_url('assets/template/js/'); ?>sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url('assets/template/gijgo/js/gijgo.min.js') ?>"></script>
    <script src="<?= base_url('assets/template/js/footer.js') ?>"></script>

    <script>
        var owl = $('#MainSlider');
        owl.owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    </script>
</body>

</html>