@extends('layouts.admin.default')

@section('title','Form Edit Banner')

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endpush

@section('content-header')
      <h1>
        Banner
        <small>Form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/dashboard') }}">Home</a></li>
        <li><a href="{{ url('/banner') }}">Banner</a></li>
        <li class="active">Edit</li>
      </ol>
@endsection

@section('content')

      <div class="row">
        <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-body">
                <form role="form" method="post" action="{{url('/banner/edit/'.$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        @if($errors->has('caption'))
                        <div class="form-group has-error">
                        <label>Deskripsi Banner</label>
                            <input type="text" name="caption" class="form-control" placeholder="Deskripsi Banner.." value="{{ old('caption') }}">
                            <span class="help-block">{{ $errors->first('caption')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                        <label>Deskripsi Banner</label>
                            <input type="text" name="caption" class="form-control" placeholder="Deskripsi Banner.." value="{{ $data->caption }}">
                        </div>
                        @endif

                        @if($errors->has('image')) 
                        <div class="form-group has-error">
                            <label for="exampleInputFile">Upload Banner</label>
                            <input type="file" name="image" id="exampleInputFile">
                            <span class="help-block">{{ $errors->first('image')}}</span>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Banner</label>
                            <input type="file" name="image" id="exampleInputFile">
                        </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
 
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

<!-- Page script -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/datatables.buttons.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/buttons.flash.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/jszip.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/pdfmake.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/vfs_fonts.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/buttons.html5.min.js') }}"></script>
 
<script type="text/javascript" src="{{ asset('js/buttons.print.min.js') }}"></script>

<script>
  $(function () {

    $(document).ready( function () {
        // $('.sidebar').click(function(e){
        //   $('.preloader').fadeIn();
        // })

        $('body').on('click','.menu-sidebar',function(e){
          $('.preloader').fadeIn();
        })

        $('.myTable').DataTable();
        $('.summernote').summernote({
          height:300
        });
    });
  })
</script>
@endpush