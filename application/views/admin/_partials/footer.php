<footer class=" text-white p-3 small" style="background-color: rgb(203, 46, 46)">
    <div class="text-center">&copy;Copyright <?php echo date("Y"); ?> BSecondBrand
    </div>
</footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="<?= base_url('assets/template/gijgo/js/gijgo.min.js') ?>"></script>
  <script src="<?= base_url('assets/template/js/'); ?>sweetalert2.min.js"></script>
  <script>
    function logout() {
      let timerInterval;
      Swal.fire({
        title: 'Konfirmasi Keluar',
        text: "Apakah Anda ingin keluar dari Akun ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.value) {
          Swal.fire({
              title: 'Berhasil!',
              text: 'Logout berhasil',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500,
            })
            .then(() => {
              window.location.href = site_url + '/auth/logout'
            })
        }
      })
    }
  </script>

  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>



  <script>
    $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4'
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#table1').dataTable({
        "bInfo": false,
        "lengthChange": false,
        "paging": true,
        "searching": true,
        "scrollX": true,
        "ordering": false,
      });
      $('#table2').dataTable({
        "bInfo": false,
        "lengthChange": false,
        "paging": true,
        "searching": false,
        "scrollX": true,
        "autoWidth": false,
        "ordering": false,
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    $(document).ready(function() {

      //Initialize Select2 Elements
      $('.select2').select2({
        theme: 'bootstrap4'
      })
    });
  </script>


  <script>
    /** add active class and stay opened when selected */
    var url = window.location;
    // for sidebar menu entirely but not cover treeview 
    $('ul.nav-sidebar a').filter(function() {
      return this.href == url;
    }).addClass('active');
    // for treeview 
    $('ul.nav-treeview a').filter(function() {
      return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
  </script>

  <script>
    $('#summernote').summernote({
      tabsize: 2,
      height: 500
    });
  </script>

  <?php $this->model_main->kunjungan(); ?>
</body>

</html>