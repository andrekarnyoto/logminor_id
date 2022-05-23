<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;
//use app\models\Tablekeywrdx876;
//use app\models\Tablekategori545;
use app\models\Tableknowledge;

$query = new Query;
$query->select('kode')->from('tableknowledge')->orderBy('RAND()')->limit(10);
$rows = $query->all();
?>

<br/>
<br/>
<div class="row">
    <div class="col-lg-9">
        <h2>Ilmu Pengetahuan</h2>
        <?php
        echo Html::a('Cari atau Lihat dokumen yang lain..', ['knowledge/index']);
        echo '<br>';
        echo '<br>';
        foreach ($rows as $row) {
            $model = Tableknowledge::findOne($row['kode']);
            echo DetailView::widget([
                'model' => $model,
                'template' => '<tr><td{contentOptions}>{value}</td></tr>',
                'attributes' => [
                    [
                        'format' => 'raw',
                        'label' => 'judul',
                        'value' => function($data) {
                            return Html::a($data->judul, ['knowledge/view', 'id' => $data->kode]);
                        }
                            ],
                            [
                                'format' => 'raw',
                                'label' => 'isiinya',
                                'value' => function($data) {
                                    if (strlen($data->isiinya) >= 300) {
                                        $txttampil = substr($data->isiinya, 0, 300) . '.....';
                                    } else {
                                        $txttampil = $data->isiinya;
                                    }
                                    return $txttampil;
                                }
                            ],
                        ],
                    ]);
                }
                echo Html::a('Cari atau Lihat dokumen yang lain..', ['knowledge/index']);
                ?>

            </div>
            <div class="col-lg-3">
                <?=
                $this->render('daftarkatakunci');
                ?>
    </div>
</div>