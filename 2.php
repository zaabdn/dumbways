<?php
function validasi_pass($pass){
$huruf_besar = preg_match('@[A-Z]@', $pass);
$huruf_kecil = preg_match('@[a-z]@', $pass);
$nomer = preg_match('@[0-9]@', $pass);
$spesial = preg_match('/[`\"~!@#$*()<>,:;{}\|]/', $pass);

if(!$huruf_besar || !$huruf_kecil || !$nomer || strlen($pass)<=8 || !$spesial){
    echo "n";
}else{
    echo "y";
}
}
validasi_pass("4bcdefG#a");
?>