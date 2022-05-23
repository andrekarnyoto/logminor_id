<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;
//use app\models\Tablekeywrdx876;
//use app\models\Tablekategori545;
use app\models\Tablenewsxdl12;

$query = new Query;
$query->select('kode')->from('tablenewsxdl12')->orderBy(['tanggalupload' => SORT_DESC])->limit(7);
$rows = $query->all();
?>

<div class="row">
    <div class="col-lg-9">
        <h2>Berita Terbaru</h2>
        <?php
        echo Html::a('Cari atau Lihat berita yang lain..', ['beritadunia/index']);
        echo '<br>';
        echo '<br>';
        foreach ($rows as $row) {
            $model = Tablenewsxdl12::findOne($row['kode']);
            echo DetailView::widget([
                'model' => $model,
                'template' => '<tr><td{contentOptions}>{value}</td></tr>',
                'attributes' => [
                    [
                        'format' => 'raw',
                        'label' => 'judul',
                        'value' => function($data) {
                            return Html::a($data->judul, ['beritadunia/view', 'id' => $data->kode]);
                        }
                            ],
                            [
                                'format' => 'raw',
                                'label' => 'isinya',
                                'value' => function($data) {
                                    if (strlen($data->isinya) >= 300) {
                                        $txttampil = substr($data->isinya, 0, 300) . '.....';
                                    } else {
                                        $txttampil = $data->isinya;
                                    }
                                    
                                    $txttampil = '<div align="right">'. 
                                            date('H:i - d M y', strtotime($data->tanggalupload)) . '</div>'
                                            .'<br/>'.$txttampil;
                                    return $txttampil;
                                }
                            ],
                        ],
                    ]);
                }
                echo Html::a('Cari atau Lihat berita yang lain..', ['beritadunia/index']);
                ?>

    </div>
    <div class="col-lg-3">

    </div>
</div>