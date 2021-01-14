@extends('layouts.admin.default')

@section('title', 'Koleksi Link')

@push('style')
<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
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
    Koleksi Link
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Koleksi</li>
  </ol>
@endsection

@if(Auth::user()->level == 'staff')
  @section('content')
    <div class="row">
          <div class="col-xs-12">
            <div class="box box-warning">
              <div class="box-header">
                <a href="{{ route('collectionlink.create') }}" class="btn btn-flat btn-sm btn-primary">Buat Koleksi</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Koleksi</th>
                    <th>Link</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $e=>$dt)
                  <tr>
  	        		<td>{{$e+1}}</td>
  	            	<td>
                    {{$dt->name}}
                  </td>
  	            	<td>
                    <a target="_blank" rel="noopener noreferrer" href="{{$dt->link}}">klik link ini</a>
                  </td>
  	            	<td>
  	            		<a class="btn btn-flat btn-xs btn-warning" href="{{ route('collectionlink.edit',[$dt->id])}}">
                      <i class="fa fa-pencil"></i>
                    </a>
  	            	</td>
                  <td>
                   	<a class="btn btn-flat btn-xs btn-danger btn-hapus" href="#" onclick="hapusLink()">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
  	        	</tr>
  	        	@endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
    </div>
    <!-- /.row -->
  @endsection
@else
  @section('content')
    <div class="row">
          <div class="col-xs-12">
            <div class="box box-warning">
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Koleksi</th>
                    <th>Link</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $e=>$dt)
                  <tr>
                    <td>{{$e+1}}</td>
                    <td>{{$dt->name}}</td>
                    <td><a target="_blank" rel="noopener noreferrer" href="{{$dt->link}}">klik link ini</a></td>
                  </tr>
              @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
    </div>
    <!-- /.row -->
  @endsection
@endif

@push('script')
<!-- Script Intro.js -->
<script>
  function hapusLink()
  {
    Swal.fire({
      title: 'Apa Anda Yakin?',
      text: "Mengahapus Link Akan Berakibat Kehilangan Data!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya, Hapus Data!',
    }).then((result) => {
      if (result.value) {
        window.location = "{{ route('collectionlink.destroy',[$dt->id]) }}";
      }
    }) 
  }
</script>
<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
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