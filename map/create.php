<?php

$servername = "localhost";
$username = "u7919616_1q2w3e4r5t6y7u";
$password = "!QAZ2wsx#EDC4rfv%TGB6yhn";
$dbname = "u7919616_web1q2w3e4r";

$batas = 1000;

$daffile = array();

$sawal = '<?xml version="1.0" encoding="UTF-8"?>' . chr(10) .
        '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . chr(10);

$sakhir = '</urlset>';

$t1 = 'https://www.logminor.com/id/web/';
$t2 = 'https://www.logminor.com/id/web/knowledge/index';
$t3 = 'https://www.logminor.com/id/web/knowledge/view?id=';
$t4 = 'https://www.logminor.com/id/web/knowledge/katakunci?id=';

function addxml($urlx) {
    return '<url><loc>' . $urlx . '</loc>' .
            '<lastmod>' . date('Y-m-d') . '</lastmod></url>' . chr(10);
}

function savefile($namafile, $txt) {
    $filenamex = "/sitemap" . $namafile . ".xml";
    $myfile = fopen("./site" . $filenamex, "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);
    return $filenamex;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT kode FROM tableknowledge";
$result = $conn->query($sql);

$selesai = 0;

$num = 0;

$nomorfile = 0;

$txtsitemap = $sawal . addxml($t1) . addxml($t2);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $selesai = 0;
        $txtsitemap .= addxml($t3 . $row['kode']);

        if (($num % $batas) == 0 && $num != 0) {
            echo $row['kode'] . '<br/>';
            $txtsitemap .= $sakhir;
            $daffile[] = savefile($nomorfile, $txtsitemap);
            $selesai = 1;
            $nomorfile += 1;
            $txtsitemap = $sawal;
        }
        $num +=1;
    }

    if ($selesai == 0) {
        $txtsitemap .= $sakhir;
        $daffile[] = savefile($nomorfile, $txtsitemap);
        $nomorfile += 1;
    }
} else {
    echo "0 results";
}

// ini bagian kata kunci
// ************************
// ************************

$sql2 = "SELECT keywordsx FROM tablekeywrdx876";
$result2 = $conn->query($sql2);

$selesai2 = 0;

$num2 = 0;

$txtsitemap = $sawal;

if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {

        $selesai = 0;
        $txtsitemap .= addxml($t4 . urlencode($row['keywordsx']));

        if (($num2 % $batas) == 0 && $num2 != 0) {
            echo $row['keywordsx'] . '<br/>';
            $txtsitemap .= $sakhir;
            $daffile[] = savefile($nomorfile, $txtsitemap);
            $selesai = 1;
            $nomorfile += 1;
            $txtsitemap = $sawal;
        }
        $num2 +=1;
    }

    if ($selesai == 0) {
        $txtsitemap .= $sakhir;
        $daffile[] = savefile($nomorfile, $txtsitemap);
        $nomorfile += 1;
    }
} else {
    echo "0 results";
}

// *******************************************
// berita berita berita
// *******************************************

$t2b = 'https://www.logminor.com/id/web/beritadunia/index';
$t3b = 'https://www.logminor.com/id/web/beritadunia/view?id=';


$sql3 = "SELECT kode FROM tablenewsxdl12";
$result3 = $conn->query($sql3);

$selesai = 1 - 1;

$num = 1 - 1;

$txtsitemap = $sawal . addxml($t2b);

if ($result3->num_rows > 0) {

    while ($row = $result3->fetch_assoc()) {

        $selesai = 0;
        $txtsitemap .= addxml($t3b . $row['kode']);

        if (($num % $batas) == 0 && $num != 0) {
            echo $row['kode'] . '<br/>';
            $txtsitemap .= $sakhir;
            $daffile[] = savefile($nomorfile, $txtsitemap);
            $selesai = 1;
            $nomorfile += 1;
            $txtsitemap = $sawal;
        }
        $num +=1;
    }

    if ($selesai == 0) {
        $txtsitemap .= $sakhir;
        $daffile[] = savefile($nomorfile, $txtsitemap);
        $nomorfile += 1;
    }
} else {
    echo "0 results";
}


$conn->close();



$tindawal = '<?xml version="1.0" encoding="UTF-8"?>' . chr(10) .
        '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$tindakhir = '</sitemapindex>';


foreach ($daffile as $namafilex) {
    $tindawal .= '<sitemap><loc>' .'https://logminor.com/id/map/site' . $namafilex . '</loc>' .
            '<lastmod>' . date('Y-m-d') . '</lastmod></sitemap>';
    echo $namafilex . '<br/>';
}

$tindawal .= $tindakhir;

$filenamex = "/sitemap.xml";
$myfile = fopen("./site" . $filenamex, "w") or die("Unable to open file!");
fwrite($myfile, $tindawal);
fclose($myfile);
?>