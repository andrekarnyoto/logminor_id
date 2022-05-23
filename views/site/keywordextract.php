<?php

use yii\db\Query;
use app\models\Tablekeywrdx876;
use app\models\Tablekategori545;
use app\models\Tableknowledge;

function getadakeyw($paramkey) {
    $querycari = new Query;
    $querycari->select('id')->from('tablekeywrdx876')->where(['keywordsx' => trim($paramkey)]);
    $hasil = $querycari->count();
    return $hasil;
}

function getadakategori($paramkey) {
    $querycari = new Query;
    $querycari->select('id')->from('tablekategori545')->where(['kategorinya' => trim($paramkey)]);
    $hasil = $querycari->count();
    return $hasil;
}

$totalkategori = 0;
$totalkeybaru = 0;

$query = new Query;
$query->select('kode,keywords, kategori')->from('tableknowledge')->where('keyextract=0')->limit(70);
$rows = $query->all();

foreach ($rows as $row) {
    $kode = $row['kode'];
    $keywords = trim($row['keywords']);
    $kategori = trim($row['kategori']);


    if (getadakategori($kategori) == 0) {
        $mkategori = new Tablekategori545;
        $mkategori->kategorinya = $kategori;
        $mkategori->save();
        unset($mkategori);
        $totalkategori +=1;
    }

    $arrkeywrd = explode(',', $keywords);
    foreach ($arrkeywrd as $kywrd) {
        $nwkywrd = trim($kywrd);
        if (getadakeyw($nwkywrd) == 0) {
            $mkeyword = new Tablekeywrdx876;
            $mkeyword->keywordsx = $nwkywrd;
            $mkeyword->save();
            unset($mkeyword);
            $totalkeybaru += 1;
        }
    }
    
    $modelknowled = Tableknowledge::findOne($kode);
    $modelknowled->keyextract = 1;
    $modelknowled->save();
    unset($modelknowled);
}

echo 'Total keyword baru : ' . $totalkeybaru;
echo '<br>';
echo 'Total kategori baru : ' . $totalkategori;
