<!DOCTYPE html>
<html>
<title>ZA GAME</title>
<head>
	<link rel="stylesheet" type="text/css" href="4.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php 
	$koneksi = mysqli_connect("localhost", "root", "", "game_center")or die(mysqli_error());
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	?>
	<header>
		<nav>
			<ul>
				<div class="judul">
					<a href="index.html"><b>ZAINAL</b>ABIDIN</a></li>
				</div>
			</ul>
		</nav>
	</header>
	<main>
		<div style="float: right;">
			<a href="#modalgame"><button class="loadmore" id="addgame">ADD GAME</button></a>
			<a href="#modalgenre"><button class="loadmore">ADD GENRE</button></a>
		</div>
		<!--Modal Tambah Game -->
		<div class="cssmodal" id="modalgame">
			<figure>
				<a href="#" style="float: right;">Tutup Modal</a><br>
				<form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
					<section class="base">
						<div>
							<label class="label-game">Judul</label>
							<input type="text" name="judul" autofocus="" required="" class="input-game" />
						</div>
						<div>
							<label class="label-game">Gambar</label>
							<input type="file" name="gambar" required="" class="input-game" />
						</div>
						<div>
							<label class="label-game">Genre</label>
							<select class="input-game" name="genre">
								<?php  
								$sql = "SELECT * FROM genre ORDER BY name ASC";
								$query = mysqli_query($koneksi, $sql) or die( mysqli_error($koneksi));
								while($data = mysqli_fetch_array($query))
								{
									?>
									<option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div>
							<button type="submit" class="button-game">Simpan</button>
						</div>
					</section>
				</form>
			</figure>
		</div>
		<!--Modal Tambah Game -->

		<!--Modal Tambah Genre -->
		<div class="cssmodal" id="modalgenre">
			<a href="#" class="veil"></a>
			<figure>
				<a href="#" style="float: right;">Tutup Modal</a><br>
				<form method="POST" action="tambah_genre.php" enctype="multipart/form-data" >
					<section class="base">
						<div>
							<label class="label-game">Genre</label>
							<input type="text" name="genre" autofocus="" required="" class="input-game" />
						</div>
						<div>
							<button type="submit" class="button-game">Simpan</button>
						</div>
					</section>
				</form>
			</figure>
		</div>
		<!--Modal Tambah Game -->
		<div id="content">
			<?php  
			$sql = "SELECT * FROM game LEFT JOIN genre ON game.genre_id=genre.id LEFT JOIN transaction ON game.id_game=transaction.game_id ORDER BY name ASC";
			$query = mysqli_query($koneksi, $sql) or die( mysqli_error($koneksi));
			while($data = mysqli_fetch_array($query))
			{
				?>
				
				<div class="card">
					<div class="card-header">
						<h3><?php echo $data['title']; ?></h3>
					</div>
					<form method="POST" action="kurangi_stok.php?id=<?php echo $data['id_transaction']; ?>" enctype="multipart/form-data" >
						<div class="row">
							<article style="text-align: justify; margin: 10px auto;">
								<img src="<?php echo $data['image']; ?>" class="featured-image">
								<div style="width: 100%;">
									<div style="width: 40%; float: right;">
										<h5 style="color: black;">Stock <?php echo $data['stock']; ?></h5>
									</div>
									<div style="width: 60%; float: left;">	
										<h5><?php echo $data['name']; ?></h5>		
									</div>	
								</div>
								<small style="font-size: 18px;"><?php echo $data['price']; ?></small>
							</article>
						</div>
						<center>
							<button class="loadmore">BUY</button>
						</center>

					</form>
				</div>
			<?php } ?>
		</div>
	</main>
	<footer>
		<p>Created with <span style="color: #e25555;"> &#10084; </span>by Zainal Abidin</p>
	</footer>
</body>
</html>

