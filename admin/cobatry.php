<?php

$data = array(
    'idpilar' => '1',//$_POST['idpilar'.$i],
    'kd' => 'sesuatu',//$_POST['kd'.$i],
    'nilai_kd' => '3' //$_POST['nilai_kd'.$i]
);

foreach ($data as $index => $value) {
    $index = $index;
    $v = "'".$value."'";
}

//$index = implode(",", $index);
echo $index;
?>