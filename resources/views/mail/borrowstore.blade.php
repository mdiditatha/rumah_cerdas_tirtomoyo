<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Peminjaman Berhasil</title>
</head>
<body>
  <h3>Peminjaman Berhasil Dilakukan</h3>
  {{--<p><img src="book_image.jpg" style="height:350px"></img></p>--}}
  <p>Nama peminjam: {{ $data->member->user->name }}</p>
  <p>Buku dipinjam: [{{ $data->codebook->code }}] {{ $data->codebook->book->title }}</p>
</body>
</html>