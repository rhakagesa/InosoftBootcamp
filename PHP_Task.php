<?php

use Hamcrest\Type\IsDouble;
use PhpParser\Node\Expr\Cast\Double;

function angkaKelipatan($angka){
    if( $angka % 3 === 0 && $angka % 5 === 0 ){
        $panjang = $angka / 3.00;
        $lebar = $angka / 5.00;
        return $panjang*$lebar;
    } 
    else if( $angka % 5 === 0 ){
        $jari_jari = $angka / 5.00;
        return 2.00 * 3.14 * $jari_jari;
    } 
    else if( $angka % 3 === 0 ){
        $jari_jari = $angka / 3.00;
        $jari_jari = $jari_jari ** 2.00;
        return $jari_jari;
    }
}

for ($i=1.00; $i <= 100 ; $i++) {
    echo "Keliapatan ".$i." = ".angkaKelipatan(floatval($i))."\r";
}
