<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Test Fullstack</title>

  <!-- Bootstrap -->
  <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- NProgress -->
  <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- Datatables -->
  <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.css" rel="stylesheet">
  <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- PNotify -->
  <link href="../assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="../assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="../assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


  <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../assets/build/css/custom.min.css" rel="stylesheet">


  <!-- jQuery -->
  <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
  <script src="../assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
  <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- bootstrap-wysiwyg -->
  <script src="../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="../assets/vendors/google-code-prettify/src/prettify.js"></script>

  <script src="../assets/js/jquery.mask.min.js"></script>

  <!-- PNotify -->
  <script src="../assets/vendors/pnotify/dist/pnotify.js"></script>
  <script src="../assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="../assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
  <script src="../assets/vendors/select2/dist/js/select2.min.js"></script>


  <script type="text/javascript">
    function notiferror(pesane){
     new PNotify({
      title: 'Terjadi Kesalahan!',
      text: pesane,
      type: 'error',
      styling: 'bootstrap3'
    });
   }

   function notifsukses(pesans){
     new PNotify({
      title: 'Berhasil!',
      text: pesans,
      type: 'success',
      styling: 'bootstrap3'
    }); 
   }
 </script>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="nav-md">
  <!--validasi session-->

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="?hal=home" class="site_title"><span>Test Fullstack</span></a>
          </div>

          <div class="clearfix"></div>
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>&nbsp;</h3>
              <ul class="nav side-menu">
                <li><a href="/buku"><i class="fa fa-book"></i>Buku </a></li>
                <li><a href="/kategori"><i class="fa fa-bars"></i>Kategori </a></li>
                <li><a href="/pengarang"><i class="fa fa-users"></i>Pengarang </a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                  Hallo
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
      <!-- bagian konten blog -->
      @yield('content')

      <footer>
        <div class="pull-right">
          Test Full-Stack
        </div>
        <div class="clearfix"></div>
      </footer>
    </div>
    
    <script>
    $(document).ready(function() {
        $('#datatable-all').DataTable({
            paging: false,
            searching: false,
            info: false
        });
    });
    </script>
</body>
</html>