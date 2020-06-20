<?php
// memanggil file koneksi.php untuk melakukan koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "game_center")or die(mysqli_error());
if (mysqli_connect_errno()){
  echo "Koneksi database gagal : " . mysqli_connect_error();
}

	// membuat variabel untuk menampung data dari form
$genre   = $_POST['genre'];
$query = "INSERT INTO genre (name) VALUES ('$genre')";
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