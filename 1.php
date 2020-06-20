<?php 
$v1 = 10;
$v1new = ($v1/1000)/(1/3600);
$berangkat1 = "14:00";

$v2 = 13;
$v2new = ($v2/1000)/(1/3600);
$berangkat2 = "15:00";

$s;
$t_selisih = (strtotime($berangkat2)-strtotime($berangkat1))/3600;

$s = $t_selisih*$v1new;

$t = $s/($v2new-$v1new);
$t_menit = $t*60;

$hasil_akhir = date('H:i', strtotime('+200 minutes', strtotime($berangkat1)));

echo "Rafaela\n";
echo "Kecepatan (v1) = ".$v1."m/s = ".$v1new,"km/jam\n";
echo "Berangkat pukul = ".$berangkat1."\n\n";

echo "Nana\n";
echo "Kecepatan (v2) = ".$v2."m/s = ".$v2new,"km/jam\n";
echo "Berangkat pukul = ".$berangkat1."\n\n";

echo "Selisih Berangkat (t) = ".$berangkat2." - ".$berangkat1." = ".$t_selisih."jam\n";
echo "Selisi jarak (s2) = waktu (t) x kecepatan (v1) = ".$t_selisih." x ".$v1new." = ".$s,"km\n\n";

echo "Waktu diperlukan Nana menyamai Rafaela = Selisih jarak 
/ (v2-v1) = ".$s." / (".$v2new." - ".$v1new.") = ".$t." Jam = ".$t_menit." Menit\n\n" ;

echo $berangkat1." + ".$t_menit." Menit = ".$hasil_akhir;


?>