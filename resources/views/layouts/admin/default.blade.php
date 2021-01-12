<!DOCTYPE html>
<html>
<head>
  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

  <!-- Intro.js -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/intro.js/minified/introjs.min.css">
  <script type="text/javascript" src="https://unpkg.com/intro.js/minified/intro.min.js"></script>

  @include('layouts.admin._head')
</head>
@if (!Auth::user())
  <body class="hold-transition skin-red layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="./.../index2.html" class="logo-lg">
                <img src="{{ asset('adminlte/dist/img/logo.png') }}">
              </a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="{{ set_active('home.guest') }}"><a href="{{ route('home.guest') }}">Halaman Utama</a></li>
                <li class="{{ set_active('video.guest') }}"><a href="{{ route('video.guest') }}">Video</a></li>
                <li><a href="https://www.tirtomoyo.desa.id/" target="_blank">Desa TirtoMoyo</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
              </ul>
            </div>
            <!-- /.navbar-custom-menu -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          @yield('content')
        </div>
        <!-- /.container -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <p>Mari bersama mewujudkan Desa Tirtomoyo yang maju dan sejahtera didukung dengan pengelolaan pemerintahan desa yang good governance.

                #TirtomoyoPunya #TirtomoyoBisa</p>
            </div>
            <div class="col-md-3">
              <p>Berita Terbaru
                DIRGAHAYU BHAYANGKARA KE-74 01/07/2020
                JELANG NEW NORMAL, CAMAT PAKIS PANTAU KESIAPAN KAMPUNG TANGGUH DESA TIRTOMOYO!? 23/06/2020
                APA YANG BOLEH DAN TIDAK BOLEH DILAKUKAN SAAT PANDEMI COVID-19?! – Oleh KKN UM 2020 13/06/2020</p>
            </div>
            <div class="col-md-3">
              <p>Telepon Penting
                Puskesmas Kec. Pakis
                Jl. Raya Pakis No. 69
                Telp.(0341) 791549

                POLSEK Pakis
                Jl. Raya Pakis No.3
                Telp.(0341) 791550.</p>
            </div>
            <div class="col-md-3">
              <p>Subscribe</p>
            </div>
          </div>
          <strong>Copyright © 2020 Pemerintah Desa Tirtomoyo | Supported by <a href="#">@Community Service Binus@Malang</a>.</strong> All rights
      reserved.
        </div>
        <!-- /.container -->
      </footer>
    </div>
    <!-- ./wrapper -->
    @stack('script')
  </body>
@else
  <body class="hold-transition {{ (Auth::user()->level == 'member') ? 'skin-red' : 'skin-blue' }} sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      @include('layouts.admin.header')
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      @include('layouts.admin.sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        @yield('content-header')
      </section>

      <section class="content">
        @include('layouts.admin.flash_massage')

        @yield('content')
      </section>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="https://hehe.co.id">Community Service Binus@Malang</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  @stack('script')
  <script type="text/javascript">
    //intro.js
    function panduanAdmin()
    {
      introJs().setOptions({
        steps: [{
          intro: "Panduan untuk penggunaan sidebar menu"
        }, {
          element: document.querySelector('#kategori'),
          intro: "Untuk mengatur data kategori perpustakaan"
        }, {
          element: document.querySelector('#buku'),
          intro: "Untuk mengatur data buku perpustakaan"
        }, {
          element: document.querySelector('#anggota'),
          intro: "Untuk mengatur data anggota perpustakaan"
        }, {
          element: document.querySelector('#peminjaman'),
          intro: "Untuk mengatur data peminjaman perpustakaan"
        }, {
          element: document.querySelector('#pengembalian'),
          intro: "Untuk mengatur data pengembalian perpustakaan"
        }, {
          element: document.querySelector('#koleksi'),
          intro: "Untuk mengatur data koleksi video perpustakaan"
        }, {
          element: document.querySelector('#banner'),
          intro: "Untuk mengatur data banner website"
        }]
      }).start();
    }
    function panduanAnggota()
    {
      introJs().setOptions({
        steps: [{
          intro: "Panduan untuk penggunaan sidebar menu"
        }, {
          element: document.querySelector('#buku'),
          intro: "Untuk mengetahui koleksi data buku perpustakaan"
        }, {
          element: document.querySelector('#pesan'),
          intro: "Untuk mengetahui pesan buku perpustakaan"
        }, {
          element: document.querySelector('#pinjam'),
          intro: "Untuk mengetahui pinjam buku perpustakaan"
        }, {
          element: document.querySelector('#kembali'),
          intro: "Untuk mengetahui kembali buku perpustakaan"
        }, {
          element: document.querySelector('#koleksi'),
          intro: "Untuk mengetahui koleksi video"
        }]
      }).start();
    }
    // Sweetalert02
    function sweetAlert() 
    {  
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Masih Belum Aktif',
      }) 
    }
  </script>
  </body>
@endif
</html>

