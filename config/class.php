<?php 

if (!isset($_SESSION)){
	session_start();
}

$mysqli = new mysqli ("localhost","root","","kpbayu");
if (class_exists('ongkir')!=true) {


class ongkir{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function tampil_ongkir()
	{
		$ambil = $this->koneksi->query("SELECT * FROM ongkos");
		while ($pecahdata=$ambil->fetch_assoc()) 
			{
				$semuadata[]=$pecahdata;
			}
			return $semuadata;
	}
	function tambah_ongkir($nama,$harga)
	{
		$this->koneksi->query("INSERT INTO ongkos(nama_kabupaten,harga) VALUES('$nama','$harga')");
	}
	function ambilongkir($id_ongkos){
		$ambil=$this->koneksi->query("SELECT * FROM ongkos WHERE id_ongkos='$id_ongkos'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function hapus_ongkir($id_ongkos){
		$this->koneksi->query("DELETE FROM ongkos WHERE id_ongkos='$id_ongkos'");
	}
	function edit_ongkir($nama,$harga,$id_ongkir){
		$this->koneksi->query("UPDATE ongkos set nama_kabupaten='$nama',harga='$harga' WHERE id_ongkos='$id_ongkir'");
	}
}
}
if (class_exists('pelanggan')!=true) {

class pelanggan {
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function ambil_pelanggan($id_pelanggan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function login_pelanggan($email,$password)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'
			AND password_pelanggan='$password'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok==0)
		{
			return "gagal";
		}
		else 
		{
			$akun=$ambil->fetch_assoc();
			$_SESSION["pelanggan"]=$akun;

			return "sukses";
		}
	}
	function daftar_pelanggan($nama,$email,$cpassword)
	{
		$ambil =$this->koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok>0)
		{
			return "gagal";
		}else 
		{
			$this->koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan) 
				VALUES ('$email','$cpassword','$nama')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
	}
	function tampil_pelanggan()
		{
			$semuadata = array();

			$ambil = $this->koneksi->query("SELECT * FROM pelanggan ORDER BY id_pelanggan ASC")or die(mysqli_error($this->koneksi));
			while ($pecahdata=$ambil->fetch_assoc()) 
			{
				$semuadata[]=$pecahdata;
			}
			return $semuadata;
		}	
	function ubah_pelanggan($nama,$email,$password,$telepon,$alamat,$gambar,$id_pelanggan){
			$enk=sha1($password);
			$namagambar=$gambar['name'];
			$lokasi=$gambar['tmp_name'];
			if (!empty($namagambar)) {
				$pelangganlama=$this->ambil_pelanggan($id_pelanggan);
				$gambarlama=$pelangganlama['gambar_pelanggan'];
				if (file_exists("img_pelanggan/$gambarlama")) {
					unlink("img_pelanggan/$gambarlama");
				}
				move_uploaded_file($lokasi, "img_pelanggan/$namagambar");
				$this->koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama', email_pelanggan='$email', telepon_pelanggan='$telepon', alamat_pelanggan='$alamat', gambar_pelanggan='$namagambar' WHERE id_pelanggan='$id_pelanggan'");
			}
			elseif(empty($password)) {
				$this->koneksi->query("UPDATE pelanggan SET  nama_pelanggan='$nama', email_pelanggan='$email', telepon_pelanggan='$telepon', alamat_pelanggan='$alamat' WHERE id_pelanggan='$id_pelanggan'" ) ;
			}
			else{
				$this->koneksi->query("UPDATE pelanggan SET  nama_pelanggan='$nama', email_pelanggan='$email', telepon_pelanggan='$telepon',password_pelanggan='$enk', alamat_pelanggan='$alamat' WHERE id_pelanggan='$id_pelanggan'" ) ;
			}

			$detil=$this->ambil_pelanggan($id_pelanggan);
			$_SESSION["pelanggan"]=$detil;
	}
	function hapus_pelanggan($id_pelanggan){
			$datapelanggan=$this->ambil_pelanggan($id_pelanggan);
			$gambar=$datapelanggan["gambar_pelanggan"];
			if (file_exists("../img_pelanggan/$gambar")) {
			unlink("../img_pelanggan/$gambar");
			}
			$this->koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
	}
}
}
if (class_exists('admin')!=true) {

class admin {
	public $koneksi;

	function __construct($mysqli) 
	{
		$this->koneksi=$mysqli;
	}
	function ambiladmin($id_admin)
	{
		$pecahdata=array();
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function login_admin($email,$password)
	{
		$ambil = $this->koneksi->query("SELECT * FROM admin 
			WHERE email_admin='$email'
			AND password='$password'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==0)
		{
			return "gagal";
		}
		else 
		{
			$akun=$ambil->fetch_assoc();

			$_SESSION["admin"]=$akun;

			return "sukses";
		}
	}
}
}
if (class_exists('kategori')!=true) {
	# code...

class kategori 
{

	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function tampilkategori()
	{
		
		$ambildata=$this->koneksi->query("SELECT * FROM kategori");
		while ($pecahdata=$ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}
	function simpan_kategori($nama)
	{
		$this->koneksi->query("INSERT INTO kategori(nama_kategori) VALUES('$nama')");
	}
	function ambilkategori($id_kategori){
		$ambil=$this->koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function hapuskategori($id_kategori){
		$this->koneksi->query("DELETE FROM kategori WHERE id_kategori='$id_kategori'");
		$this->koneksi->query("DELETE FROM produk WHERE id_kategori='$id_kategori'");
	}
	function ubahkategori($nama,$id){
		$this->koneksi->query("UPDATE kategori set nama_kategori='$nama' WHERE id_kategori='$id'");
	}
}
}
if (class_exists('produk')!=true) {

class produk 
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function tampilproduk()
	{
		$semuadata = array();
		$ambildata=$this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY produk.id_produk DESC LIMIT 50");
		while ($pecahdata=$ambildata->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}
	function produk_terbaru(){
		$ambildata=$this->koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 6");
		while($pecah=$ambildata->fetch_assoc()){
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function produk_terlaris(){
		$semuadata=array();
		$ambildata=$this->koneksi->query("SELECT * FROM produk  ORDER BY terjual DESC LIMIT 4  ");
		while ($pecahdata=$ambildata->fetch_assoc()) {
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
		// JOIN produk ON terlaris.id_produk=produk.id_produk
		// $ambil=$this->koneksi->query("SELECT count(stok) as jum FROM produk ");
		// $ambil=$ambil->fetch_assoc();
		// return $ambil['jum'];
	}
	function tambah_produk($id_kategori,$produk,$harga_mod,$harga,$deskripsi,$gambar){
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		move_uploaded_file($lokasi, "../img_produk/$namagambar");
		$this->koneksi->query("INSERT INTO produk(id_kategori,nama_produk,harga_modal,harga_produk,deskripsi_produk,gambar_produk) 
			VALUES('$id_kategori','$produk','$harga_mod','$harga','$deskripsi','$namagambar')") or die(mysqli_error($this->koneksi));
	}
	function ambil_produk($id_produk){
		$ambildata=$this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
		$pecah=$ambildata->fetch_assoc();
		return $pecah;
	}
	function hapus_produk($id_produk){
		$dataproduk=$this->ambil_produk($id_produk);
		$gambar=$dataproduk['gambar_produk'];
		if (file_exists("../img_produk/$gambar")) {
			unlink("../img_produk/$gambar");
		}
		$this->koneksi->query("DELETE FROM produk WHERE id_produk='$id_produk'");
	}
	function ubah_produk($id_kategori,$nama,$harga_mod,$harga,$deskripsi,$gambar,$id_produk){
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		if (!empty($lokasi)) {
			$produklama=$this->ambil_produk($id_produk);
			$gambarlama=$produklama['gambar_produk'];
			if (file_exists("../img_produk/$gambarlama")) {
				unlink("../img_produk/$gambarlama");
			}
			move_uploaded_file($lokasi, "../img_produk/$namagambar");
			$this->koneksi->query("UPDATE produk SET  id_kategori='$id_kategori', nama_produk='$nama', harga_modal='$harga_mod' ,harga_produk='$harga', deskripsi_produk='$deskripsi',gambar_produk='$namagambar' WHERE id_produk='$id_produk'");
		}
		else{
			$this->koneksi->query("UPDATE produk SET  id_kategori='$id_kategori', nama_produk='$nama',harga_modal='$harga_mod',harga_produk='$harga',deskripsi_produk='$deskripsi' WHERE id_produk='$id_produk'");
			$this->koneksi->query("UPDATE produk SET  nama_produk='$nama',harga_modal='$harga_mod',harga_produk='$harga', deskripsi_produk='$deskripsi' WHERE id_produk='$id_produk'");
		}
	}
	
	function tampil_produkterbaru($posisi,$batas)
	{
		$semuadata = array();
			// menampilkan data dari database
		$ambildata=$this->koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY produk.id_produk DESC LIMIT $posisi,$batas")or die(mysqli_error($this->koneksi));
			// memecah array dan diperulangkan
		while($pecahdata=$ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;	
	}
	function total_produk()
	{
		$ambil=$this->koneksi->query("SELECT*FROM produk");
		$hitung=$ambil->num_rows;
		return $hitung;
	}
	function cari_produk($keyword){
		$keyword=mysqli_real_escape_string($this->koneksi,$keyword);
		$semuadata=array();
		$ambildata=$this->koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
		while ($pecah=$ambildata->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function produk_kategori($id_kategori){
		$semuadata=array();
		$ambildata=$this->koneksi->query("SELECT * FROM produk WHERE id_kategori='$id_kategori'");
		while ($pecah=$ambildata->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
}
}

if (class_exists('katalogproduk')!=true) {


class katalogproduk{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function ambil_katalogproduk($id_katalogproduk){
		$ambildata=$this->koneksi->query("SELECT * FROM katalog_produk WHERE id_katalogproduk='$id_katalogproduk'");
		$pecah=$ambildata->fetch_assoc();
		return $pecah;
	}
	function tampil_katalogproduk()
	{
		$semuadata = array(); 		
		$ambil = $this->koneksi->query("SELECT * FROM katalog_produk ORDER BY id_katalogproduk");
		while ($pecahdata=$ambil->fetch_assoc()) 
			{
				$semuadata[]=$pecahdata;
			}
			return $semuadata;
	}
	function tampil_katalogprodukbaru($posisi,$batas)
	{
		$semuadata = array();
			// menampilkan data dari database
		$ambildata=$this->koneksi->query("SELECT * FROM katalog_produk ORDER BY katalog_produk.id_katalogproduk DESC LIMIT $posisi,$batas")or die(mysqli_error($this->koneksi));
			// memecah array dan diperulangkan
		while($pecahdata=$ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;	
	}
	function tambah_katalogproduk($gambar,$namaproduk,$deskripsiproduk,$harga_modalkat,$harga){
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		move_uploaded_file($lokasi, "../img_katalogproduk/$namagambar");
		$this->koneksi->query("INSERT INTO katalog_produk (gambar_katalogproduk,nama_katalogproduk,deskripsi_katalog,harga_modalkatalog,harga_katalogproduk) 
			VALUES('$namagambar','$namaproduk','$deskripsiproduk','$harga_modalkat','$harga')") or die(mysqli_error($this->koneksi));
	}
	function ubah_katalogproduk($gambar,$namaproduk,$deskripsiproduk,$harga_modalkat,$harga,$id_katalogproduk){
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		if (!empty($namagambar)) {
			$produklama=$this->ambil_katalogproduk($id_katalogproduk);
			$gambarlama=$produklama['gambar_katalogproduk'];
			if (file_exists("../img_katalogproduk/$gambarlama")) {
				unlink("../img_katalogproduk/$gambarlama");
			}
			move_uploaded_file($lokasi, "../img_katalogproduk/$namagambar");
			$this->koneksi->query("UPDATE katalog_produk SET  gambar_katalogproduk='$namagambar', nama_katalogproduk='$namaproduk',deskripsi_katalog='$deskripsiproduk', harga_modalkatalog='$harga_modalkat', harga_katalogproduk='$harga' WHERE id_katalogproduk='$id_katalogproduk'");
		}
		else{
			$this->koneksi->query("UPDATE katalog_produk SET  nama_katalogproduk='$namaproduk', deskripsi_katalog='$deskripsiproduk', harga_modalkatalog='$harga_modalkat', harga_katalogproduk='$harga' WHERE id_katalogproduk='$id_katalogproduk'");
		}
	}
		
	function hapus_katalogproduk($id_katalogproduk){
		$datakatalog=$this->ambil_katalogproduk($id_katalogproduk);
		$gambar=$datakatalog['gambar_katalogproduk'];
		if (file_exists("../img_katalogproduk/$gambar")) {
			unlink("../img_katalogproduk/$gambar");
		}
		$this->koneksi->query("DELETE FROM katalog_produk WHERE id_katalogproduk='$id_katalogproduk'");
	}
	function total_katalogproduk()
	{
		$ambil=$this->koneksi->query("SELECT*FROM katalog_produk");
		$hitung=$ambil->num_rows;
		return $hitung;
	}
}
}
if (class_exists('pemesanan')!=true) {
	

class pemesanan{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
		function totalpemesananadmin(){
		
		$ambil=$this->koneksi->query("SELECT*FROM pemesanan WHERE status_pemesanan='pending' or status_pemesanan='Menunggu Konfirmasi' or status_pemesanan='Diproses'");
		$hitung=$ambil->num_rows;
		return $hitung;
	}
	function masukanpesanan($id_katalogproduk,$jumlah)
	{
		if (isset($_SESSION["pemesanan"][$id_katalogproduk])) {
			$_SESSION["pemesanan"][$id_katalogproduk]+=$jumlah;
		}
		else{
			$_SESSION["pemesanan"][$id_katalogproduk]=$jumlah;
		}
	}
	function tampil_pemesanan()
	{
		$semuadata=array();
		if (isset($_SESSION["pemesanan"])) {
			$pemesanan=$_SESSION["pemesanan"];
			foreach ($pemesanan as $id_katalogproduk => $jumlah) {
				$ambil= $this->koneksi->query("SELECT * FROM katalog_produk WHERE id_katalogproduk='$id_katalogproduk'");
				$array=$ambil->fetch_assoc();
				$array["jumlah"]=$jumlah;
				$array["subharga"]=$array["harga_katalogproduk"]*$jumlah;
				$semuadata[]=$array;
			}
		}
		return $semuadata;
	}
	function checkout_pemesanan($nama,$alamat,$telepon,$tglperlu,$jam_perlu,$total_belanja,$pengiriman,$biaya)
	{
			// mendapatkan id_pelanggan yang login dari SESSION
		$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
		date_default_timezone_set('Asia/Jakarta');
		// mendapatkan tanggalpembelian(hari iini)
		$tglpemesanan=date("Y-m-d H:i:s");
		$expires = strtotime('+1 days', strtotime($tglpemesanan));
		$deadline=date('Y-m-d H:i:s', $expires);
		// mendapatkan status pembelian
		$status="pending";
		if ($biaya==0) {
			$total_pemesanan=$total_belanja;
		}
			else
			{
				$total_pemesanan=$total_belanja+$biaya;
			}
		// mendapatkan totalpembelian
		

		$this->koneksi->query("INSERT INTO pemesanan 
			(id_pelanggan,
			tanggal_pemesanan,
			deadline_pembayaran,
			status_pemesanan,
			total_belanja,
			total_pemesanan,
			nama_pemesan,
			telp_pemesan,
			alamat_pemesan,
			tanggal_perlu,
			jam_perlu,
			pengiriman,
			harga_pengiriman) 
			VALUES (
			'$id_pelanggan',
			'$tglpemesanan',
			'$deadline',
			'$status',
			'$total_belanja',
			'$total_pemesanan',
			'$nama',
			'$telepon',
			'$alamat',
			'$tglperlu',
			'$jam_perlu',
			'$pengiriman',
			'$biaya')
			")or die(mysqli_error($this->koneksi));

		$id_pemesanan_barusan = $this->koneksi->insert_id;

		$datapemesanan=$this->tampil_pemesanan();
		foreach ($datapemesanan as $key => $perproduk) 
		{
			$id_katalogproduk= $perproduk["id_katalogproduk"];
			$harga = $perproduk["harga_katalogproduk"];
			$jumlah = $perproduk["jumlah"];
			$subharga = $perproduk["subharga"];
			$this->koneksi->query("INSERT INTO pemesanan_detail(id_pemesanan,id_katalogproduk,id_pelanggan,jumlah_order,harga_produk,subharga,tanggal_pesanan) 
				VALUES ('$id_pemesanan_barusan','$id_katalogproduk','$id_pelanggan','$jumlah','$harga','$subharga','$tglpemesanan')")or die(mysqli_error($this->koneksi));

		}
		unset($_SESSION["pemesanan"]);
		// mendapatkan id_pembelian_barusan
		return $id_pemesanan_barusan;
	}
	function masukkan_pemesanan($id_katalogproduk,$jumlah){
		if (isset($_SESSION["pemesanan"][$id_produk])){
			$_SESSION["keranjang"][$id_katalogproduk]+=$jumlah;
		}else{
			$_SESSION["pemesanan"][$id_katalogproduk]=$jumlah;
		}
	}
	function totpemesanan()
	{
		if (isset($_SESSION["pemesanan"])) 
		{
			$keranjangpesan = $_SESSION["pemesanan"];
			$total = count($keranjangpesan);
			return $total;
		}
	}
		function ambil_pemesanan($id_pemesanan)
	{
		// menampilkan data dari tabel pembelian yang yg id_pembelian adallah $id_pembelian
		$ambil=$this->koneksi->query("SELECT * FROM pemesanan 
			JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan 
			JOIN pemesanan_detail ON pemesanan.id_pemesanan=pemesanan_detail.id_pemesanan 
			WHERE pemesanan.id_pemesanan='$id_pemesanan'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
		function tampil_pemesananpelanggan($id_pelanggan){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pemesanan 
			JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan  
			WHERE pelanggan.id_pelanggan='$id_pelanggan'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function tampil_produk_pemesanan($id_pemesanan)
	{
		$ambil=$this->koneksi->query("SELECT*FROM  pemesanan_detail JOIN katalog_produk ON pemesanan_detail.id_katalogproduk=katalog_produk.id_katalogproduk WHERE id_pemesanan='$id_pemesanan'");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		return $semuadata; 
	}
	function cek_pembayaranpemesanan($id_pemesanan){
		$pecah=array();
		$ambil=$this->koneksi->query("SELECT*FROM pembayaran_pemesanan WHERE id_pemesanan='$id_pemesanan'");
		// coba cek menggunakan numrows
		$yangcocok=$ambil->num_rows;
		if ($yangcocok>0) 
		{
			$pecah=$ambil->fetch_assoc();
			return $pecah;
		}
		else
		{
			return "belumkirim";
		}
	}
	function tampilpemesananadmin(){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan  ORDER BY id_pemesanan");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function tampilprodukpemesanan($id_pemesanan){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pemesanan_detail JOIN katalog_produk ON pemesanan_detail.id_katalogproduk=katalog_produk.id_katalogproduk WHERE id_pemesanan='$id_pemesanan'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function terima_pemesanan($status,$id_pemesanan){
		$this->koneksi->query("UPDATE pemesanan SET status_pemesanan='$status' WHERE id_pemesanan='$id_pemesanan'");
	}

	function hapus_pemesanan($id_pemesanan){
		$this->koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
		$this->koneksi->query("DELETE FROM pemesanan_detail WHERE id_pemesanan='$id_pemesanan'");
	}
}
}
if (class_exists('pembelian')!=true) {


class pembelian{
	public $koneksi;
	function __construct($mysqli){
		$this->koneksi=$mysqli;
	}
	function totalpembelianadmin(){
		
		$ambil=$this->koneksi->query("SELECT*FROM pembelian WHERE status_pembelian='pending' or status_pembelian='Menunggu Konfirmasi' or status_pembelian='Diproses'");
		$hitung=$ambil->num_rows;
		return $hitung;
	}
	function checkout($nama,$telepon,$alamat,$total_belanja,$pengiriman,$biaya)
	{
			// mendapatkan id_pelanggan yang login dari SESSION
		$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
		date_default_timezone_set('Asia/Jakarta');
		// mendapatkan tanggalpembelian(hari iini)
		$tglbeli=date("Y-m-d H:i:s");
		$start_date = date($tglbeli);
		$expires = strtotime('+1 days', strtotime($tglbeli));
		$deadline=date('Y-m-d H:i:s', $expires);
		// mendapatkan status pembelian
		$status="pending";
		if ($biaya==0) {
			$total_pembelian=$total_belanja;
		}
			else
			{
				$total_pembelian=$total_belanja+$biaya;
			}
		

		$this->koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,deadline_pembayaran,status_pembelian,total_belanja,total_pembelian,nama_penerima,telepon_penerima,alamat_penerima,pengiriman,harga_pengiriman) VALUES ('$id_pelanggan','$tglbeli','$deadline','$status','$total_belanja','$total_pembelian','$nama','$telepon','$alamat','$pengiriman','$biaya') ");

		$id_pembelian_barusan = $this->koneksi->insert_id;

		$datakeranjang=$this->tampil_keranjang();
		foreach ($datakeranjang as $key => $perproduk) 
		{
			$nama = $perproduk["nama_produk"];
			$harga = $perproduk["harga_produk"];
			$harga_mod = $perproduk["harga_modal"];
			$jumlah = $perproduk["jumlah"];
			$subharga = $perproduk["subharga"];
			$this->koneksi->query("INSERT INTO pembeliandetail(id_pembelian,nama_produk,harga_produk,harga_modal,jumlah_produk,subharga_produk) 
				VALUES ('$id_pembelian_barusan','$nama','$harga','$harga_mod','$jumlah','$subharga')")or die(mysqli_error($this->koneksi));

		}
		unset($_SESSION["keranjang"]);
		// mendapatkan id_pembelian_barusan
		return $id_pembelian_barusan;
	}
	function masukkan_keranjang($id_produk,$jumlah){
		if (isset($_SESSION["keranjang"][$id_produk])){
			$_SESSION["keranjang"][$id_produk]+=$jumlah;
		}else{
			$_SESSION["keranjang"][$id_produk]=$jumlah;
		}
	}
	function ambil_pembelian($id_pembelian)
	{
		// menampilkan data dari tabel pembelian yang yg id_pembelian adallah $id_pembelian
		$ambil=$this->koneksi->query("SELECT*FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
			WHERE id_pembelian='$id_pembelian'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function tampilpembelianpelanggan($id_pelanggan){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pembelian 
			JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan  WHERE pelanggan.id_pelanggan='$id_pelanggan' ORDER BY id_pembelian");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function tampilpembelian(){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan  ORDER BY id_pembelian");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function tampil_keranjang(){

		$semuadata=array();
		if (isset($_SESSION["keranjang"])) {
			$keranjang=$_SESSION["keranjang"];
			foreach ($keranjang as $id_produk => $jumlah) {
				$ambil=$this->koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$array=$ambil->fetch_assoc();

				$array["jumlah"]=$jumlah;
				$array["subharga"]=$array["harga_produk"]*$jumlah;
				$semuadata[]=$array;
			}
		}
		return $semuadata;
	}
	function totkeranjang()
	{
		if (isset($_SESSION["keranjang"])) 
		{
			$keranjang = $_SESSION["keranjang"];
			$total = count($keranjang);
			return $total;
		}
	}
	function tampil_produk_pembelian($id_pembelian)
	{
		// menampilkan data dari tabel pembeliandetail yang id_pembelian adalah $id_pembelian
		$ambil=$this->koneksi->query("SELECT*FROM  pembeliandetail WHERE id_pembelian='$id_pembelian'");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		return $semuadata; 
	}

	function cek_pembayaran($id_pembelian){
		$pecah=array();
		$ambil=$this->koneksi->query("SELECT*FROM pembayaran WHERE id_pembelian='$id_pembelian'");
		// coba cek menggunakan numrows
		$yangcocok=$ambil->num_rows;
		if ($yangcocok>0) 
		{
			$pecah=$ambil->fetch_assoc();
			return $pecah;
		}
		else
		{
			return "belumkirim";
		}
	}
	function tampilprodukpembelian($idpembelian){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pembeliandetail WHERE id_pembelian='$idpembelian'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function terima_pembelian($status,$id_pembelian){
		$this->koneksi->query("UPDATE pembelian SET status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
	}	
	function hapus_pembelian($id_pembelian){
		$this->koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$id_pembelian'");
		$this->koneksi->query("DELETE FROM pembeliandetail WHERE id_pembelian='$id_pembelian'");
		
	}
}
}

if (class_exists('pembayaran')!=true) {
	

class pembayaran 
{

	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function ambil_pembayaran($id_pembelian){
		$ambil=$this->koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
		$databayar=$ambil->fetch_assoc();
		return $databayar;
	}
	function kirim_pembayaran($nama,$bank,$tanggal,$jumlah,$bukti,$id_pembelian)
	{
		
		$tglkonfir=date("Y-m-d h-i-s");
		$namagambar=$bukti['name'];
			$lokasi=$bukti['tmp_name'];
			$status='Menunggu Konfirmasi';
	move_uploaded_file($lokasi, "img_bukti/$namagambar");
			$this->koneksi->query("INSERT INTO pembayaran (id_pembelian,nama,bank,tanggalbayar,tanggalkonfirmasi,jumlah,bukti)
				VALUES ('$id_pembelian','$nama','$bank','$tanggal','$tglkonfir','$jumlah','$namagambar')");
			$status = "Menunggu Konfirmasi";
			$this->koneksi->query("UPDATE pembelian SET status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

	}
	function ambilkategori($id_kategori){
		$ambil=$this->koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function hapuskategori($id_kategori){
		$this->koneksi->query("DELETE FROM kategori WHERE id_kategori='$id_kategori'");
		$this->koneksi->query("DELETE FROM produk WHERE id_kategori='$id_kategori'");
	}
	function ubahkategori($nama,$id){
		$this->koneksi->query("UPDATE kategori set nama_kategori='$nama' WHERE id_kategori='$id'");
	}
	function terima_pemesanan($status,$id_pemesanan){
		$this->koneksi->query("UPDATE pemesanan SET status_pemesanan='$status' WHERE id_pemesanan='$id_pemesanan'");
	}
	function tampilpemesanan(){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan  ORDER BY id_pemesanan");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	
}
}
if (class_exists('pembayaran_pemesanan')!=true) {
	# code...

class pembayaran_pemesanan
{

	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function ambil_pembayaranpemesanan($id_pemesanan){
		$ambil=$this->koneksi->query("SELECT * FROM pembayaran_pemesanan WHERE id_pemesanan='$id_pemesanan'");
		$databayar=$ambil->fetch_assoc();
		return $databayar;
	}
	function kirim_pembayaranpemesanan($nama,$bank,$tanggal,$jumlah,$bukti,$id_pemesanan)
	{
		
		$tglkonfir=date("Y-m-d h-i-s");
		$namagambar=$bukti['name'];
		$lokasi=$bukti['tmp_name'];
		$status='Menunggu Konfirmasi';
		move_uploaded_file($lokasi, "img_buktipemesanan/$namagambar");
			$this->koneksi->query("INSERT INTO pembayaran_pemesanan (id_pemesanan,nama,bank,tanggalbayar,tanggalkonfirmasi,jumlah,bukti)
				VALUES ('$id_pemesanan','$nama','$bank','$tanggal','$tglkonfir','$jumlah','$namagambar')");
		$status = "Menunggu Konfirmasi";
			$this->koneksi->query("UPDATE pemesanan SET status_pemesanan='$status' WHERE id_pemesanan='$id_pemesanan'");

	}
}
}
if (class_exists('laporan')!=true) {
	# code...

class laporan
{

	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}
	function laporanpembelian($bulan,$tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pembelian JOIN pembeliandetail ON pembelian.id_pembelian=pembeliandetail.id_pembelian  WHERE  month(tanggal_pembelian)='$bulan' AND year(tanggal_pembelian)='$tahun' AND status_pembelian='Selesai' ");
		while ($pecah=$ambil->fetch_assoc()) {
		$semuadata[]=$pecah;
		}
		return $semuadata;
		}
	function laporanpemesanan($bulan,$tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pemesanan_detail 
			JOIN pemesanan ON pemesanan_detail.id_pemesanan=pemesanan.id_pemesanan 
			JOIN katalog_produk ON pemesanan_detail.id_katalogproduk=katalog_produk.id_katalogproduk 
			WHERE  month(tanggal_pesanan)='$bulan' AND year(tanggal_pesanan)='$tahun' AND status_pemesanan='Selesai' ");
		while ($pecah=$ambil->fetch_assoc()) {
		$semuadata[]=$pecah;
		}
		return $semuadata;
		}
}
}

$pembayaran_pemesanan = new pembayaran_pemesanan($mysqli);
$pembelian = new pembelian($mysqli);
$pemesanan = new pemesanan($mysqli);
$pembayaran = new pembayaran($mysqli);
$produk = new produk($mysqli);
$katalogproduk = new katalogproduk($mysqli);
$kategori = new kategori($mysqli);
$admin = new admin ($mysqli);
$ongkir = new ongkir ($mysqli);
$pelanggan = new pelanggan ($mysqli);
$laporan = new laporan ($mysqli);

?>