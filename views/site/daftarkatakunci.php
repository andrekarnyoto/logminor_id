<h2>Tags</h2>
<?php

use yii\helpers\Html;
use yii\db\Query;

$arrfont = array(15, 18, 20, 22, 25, 28, 30);

$querykeywrd = new Query;
$querykeywrd->select('keywordsx')->from('tablekeywrdx876')->orderBy('RAND()')->limit(30);
$rows = $querykeywrd->all();

$randomlama = -1;

foreach ($rows as $row) {
    do {
        $hslrndm = rand(0, count($arrfont) - 1);
    } while ($hslrndm == $randomlama);
    $bfont = $arrfont[$hslrndm];
    echo Html::a('<font style="font-size: ' . $bfont . 'px;">' . $row['keywordsx'] . '</font>', ['knowledge/katakunci', 'id' => $row['keywordsx']]) . ', ';
    $randomlama = $hslrndm;
}
echo Html::a('Gen Key', ['site/keywordextract']);
?>
<br/>
<br/>
<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=14&l=ez&f=ifr&linkID=2b4a3c5c50986ecd0db703112647414b&t=logminordotco-20&tracking_id=logminordotco-20" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
<script data-cfasync="false" type="text/javascript" src="https://www.onclickmega.com/a/display.php?r=2653651"></script>