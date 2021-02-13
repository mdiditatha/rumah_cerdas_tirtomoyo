<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Halaman tampilan depan
Route::get('/', 'MemberController@guest')->name('home.guest');
Route::get('/search', 'MemberController@search')->name('home.search');
//Halaman tampilan list buku untuk guest 
Route::get('/list/koleksi-video','CollectionLinkController@guest')->name('video.guest');

//Halaman Syarat Dan Ketentuan
Route::get('/syarat-dan-ketentuan', function(){
	return view('layouts.syarat');	
})->name('syarat');

//middleware grup
Route::group(['middleware'=>'auth'],function() {
        //daftar redirection
        /*Route::redirect('/', '/dashboard');
        Route::redirect('/search', '/dashboard');
        Route::redirect('/list/koleksi-video', '/koleksi-link');*/
	//tampilan home setelah login
	Route::get('/home', function() {
		return redirect('/dashboard');
	})->name('home');
	//tampilan dashboard
	Route::get('/dashboard','HomeController@admin')->name('home.admin');
	//koleksi
	Route::get('/koleksi-link','CollectionLinkController@index')->name('collectionlink.index');
	Route::get('/koleksi-link/form-tambah','CollectionLinkController@create')->name('collectionlink.create');
	Route::post('/koleksi-link/tambah','CollectionLinkController@store')->name('collectionlink.store');
	Route::get('/koleksi-link/form-edit/{slug}','CollectionLinkController@edit')->name('collectionlink.edit');
	Route::put('/koleksi-link/update/{id}','CollectionLinkController@update')->name('collectionlink.update');
	Route::get('/koleksi-link/hapus/{id}','CollectionLinkController@destroy')->name('collectionlink.destroy');

	//halaman anggota
	Route::get('/anggota','MemberController@index')->name('member.index');
	Route::get('/anggota/form-tambah','MemberController@create')->name('member.create');
	Route::post('/anggota/tambah','MemberController@store')->name('member.store');
	Route::get('/anggota/detail/{slug}','MemberController@show')->name('member.show');
	Route::get('/anggota/form-edit/{id}','MemberController@edit')->name('member.edit');
	Route::put('/anggota/update/{id}','MemberController@update')->name('member.update');

	//Route::get('/anggota/hapus/{id}','MemberController@destroy')->name('member.destroy');
	Route::get('/anggota/aktif/{id}','MemberController@active')->name('member.active');
	Route::get('/anggota/non-aktif/{id}','MemberController@nonactive')->name('member.nonactive');
	//halaman kategori
	Route::get('/kategori','CategoryController@index')->name('category.index');
	Route::get('/kategori/form-tambah','CategoryController@create')->name('category.create');
	Route::post('/kategori/tambah','CategoryController@store');
	Route::get('/kategori/form-edit/{slug}','CategoryController@edit')->name('category.edit');
	Route::put('/kategori/update/{id}','CategoryController@update');
	Route::get('/kategori/hapus/{id}','CategoryController@destroy');
	//halaman buku
	Route::get('/buku','BookController@index')->name('book.index');
	//halaman untuk menampilkan detail
	Route::get('/buku/list/{id}','BookController@detail')->name('book.detail');
	Route::put('/buku/list/{id}/tambah','BookController@stockadd')->name('book.detail.add');
	Route::put('/buku/list/{id}/kurang','BookController@stockremove')->name('book.detail.remove');
	Route::put('/buku/list/{id}/pulih','BookController@stockrestore')->name('book.detail.restore');
	//halaman form
	Route::get('/buku/form-tambah','BookController@create')->name('book.create');
	Route::post('/buku/tambah','BookController@store')->name('book.store');
	//halaman menampilkan hasil buku
	Route::get('/buku/detail/{slug}','BookController@show')->name('book.show');
	Route::get('/buku/form-edit/{slug}','BookController@edit')->name('book.edit');
	Route::put('/buku/update/{id}','BookController@update')->name('book.update');
	Route::delete('/buku/hapus/{id}','BookController@destroy')->name('book.destroy');
	Route::get('/buku/pasif/{id}','BookController@passive')->name('book.passive');
	Route::get('/buku/aktif/{id}','BookController@activation')->name('book.activation');
	//halaman pinjam buku
	Route::get('/pinjam','BorrowController@index')->name('borrow.index');
	//halaman untuk menambah pesan buku
	Route::get('/pinjam/form-tambah','BorrowController@create')->name('borrow.create');
	Route::post('{id}/pinjam/tambah','BorrowController@store');
	//proses pesan buku di user - member
	Route::post('{id}/pinjam/pending','BorrowController@pending');
	Route::get('/pinjam/detail/{slug}','BorrowController@show');
	Route::get('/kembali/buku/{id}','BorrowController@update');
	//halaman pesan buku anggota
	Route::get('/pesan/buku','BorrowController@order')->name('order.index');
	//halaman kembali
	Route::get('/kembali','BorrowController@return')->name('borrow.return');
	Route::get('/pinjam/setuju/{id}','BorrowController@agree')->name('borrow.agree');
	Route::get('/pinjam/tolak/{id}','BorrowController@reject')->name('borrow.reject');

	//halaman edit banner
	Route::get('/banner','BannerController@index')->name('banner.index');
	Route::get('/banner/create','BannerController@create')->name('banner.create');
	Route::post('/banner/create','BannerController@store')->name('banner.store');
	Route::get('/banner/edit/{id}','BannerController@edit')->name('banner.edit');
	Route::put('/banner/edit/{id}','BannerController@update')->name('banner.update');
	Route::delete('/banner/destroy/{id}','BannerController@destroy')->name('banner.destroy');
});

//link download
Route::get('/download/pdf','HomeController@download')->name('download');

Auth::routes();
Route::get('keluar',function(){
    \Auth::logout();
    return redirect('login');
});
