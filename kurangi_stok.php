<?php
// memanggil file koneksi.php untuk melakukan koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "game_center")or die(mysqli_error());
if (mysqli_connect_errno()){
  echo "Koneksi database gagal : " . mysqli_connect_error();
}

	// membuat variabel untuk menampung data dari form
$id = $_GET['id'];
$transaksi = "SELECT * FROM transaction WHERE id_transaction='".$id."'";
$query = mysqli_query($koneksi, $transaksi) or die( mysqli_error($koneksi));
      while($data = mysqli_fetch_array($query)){
        $stock = $data['stock']-1;
      }
$query = "UPDATE transaction SET stock='".$stock."' WHERE id_transaction='".$id."'";
    $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data berhasil berhasil berkurang.');window.location='4.php';</script>";
    }