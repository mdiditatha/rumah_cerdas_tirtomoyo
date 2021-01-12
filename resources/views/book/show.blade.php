@extends('layouts.admin.default')

@section('title', 'Detail Buku')

@push('style')
<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@endpush

@section('content-header')
  <h1>
    Buku
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home.admin') }}">Home</a></li>
    <li><a href="{{ route('book.index') }}">Buku</a></li>
    <li class="active">Detail</li>
  </ol>
@endsection

@section('content')

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body">
            	<img class="img-responsive pad" src="{{ asset('uploads/'.$book->image_cover)}}" alt="Photo">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Data</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <strong><i class="fa fa-book margin-r-5"></i> Judul Buku</strong>
                <p>
                  {{$book->title}}
                </p>

                <hr>

                <strong><i class="fa fa-book margin-r-5"></i> Keterangan</strong>
                <p>
                  {{$book->description}}
                </p>

                <hr>

                <strong><i class="fa fa-book margin-r-5"></i> Jumlah Stok : {{$book->stock}}</strong><hr>

                <strong><i class="fa fa-book margin-r-5"></i> Kategori : 
                  {{ (($book->category_id != Null) ? $book->category->name : 'Tidak Ada Kategori') }}
                </strong><hr>


              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@push('script')
<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endpush

@section('asdsa')
<h1>Detail</h1>
<p><a href="{{url('/buku')}}">back</a></p>

<p>{{$book->title}}</p>
<p>{{$book->description}}</p>
<p>{{$book->stock}}</p>
<p>{{$book->image_cover}}</p>
<p>{{$book->status}}</p>
<p>{{$book->category_id}}</p>
@endsection