<?php

$arrgambar = array('./gambar/gambar-01.jpg', './gambar/gambar-02.jpg', './gambar/gambar-03.jpg',
    './gambar/gambar-04.jpg', './gambar/gambar-05.jpg', './gambar/gambar-06.jpg');

$posgambar = random_int(0, 4);

echo '<img width ="100%" src="' . $arrgambar[$posgambar].'">';