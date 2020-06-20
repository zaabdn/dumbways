<?php
// memanggil file koneksi.php untuk melakukan koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "game_center")or die(mysqli_error());
if (mysqli_connect_errno()){
  echo "Koneksi database gagal : " . mysqli_connect_error();
}

	// membuat variabel untuk menampung data dari form
$judul   = $_POST['judul'];
$genre   = $_POST['genre'];

//cek dulu jika ada gambar produk jalankan coding ini
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);   
if(!in_array($ext, $ekstensi))  {    
  header("location:index.php?alert=gagal_ekstensi");
}else{ 
    move_uploaded_file($_FILES['gambar']['tmp_name'], $rand.'_'.$filename); //memindah file gambar ke folder gambar
      // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
    $xx = $rand.'_'.$filename;
    $query = "INSERT INTO game (title, image, genre_id) VALUES ('$judul', '$xx', '$genre')";
    $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data berhasil ditambah.');window.location='4.php';</script>";
    }
  } 