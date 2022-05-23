<?php

use yii\helpers\Html;
use yii\db\Query;
use app\models\Tableknowledge;
use yii\widgets\DetailView;
use app\controllers\KnowledgeController;

$this->title = 'Hasil Pencarian katakunci : ' . $id;

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $id
        ]
);

$this->registerMetaTag([
    'name' => 'author',
    'content' => 'Andrea Stevens Karnyoto'
]);

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Pada halaman ini, anda dapat melihat dokumen-dokumen yang berkaitan dengan katakunci yang telah
        anda pilih.'
]);


$query = new Query;
$query->select('kode')->from('tableknowledge')->where('keywords LIKE "%' . $id . '%" or keywords LIKE "' . $id . '%" or keywords LIKE "%' . $id . '"')->limit(50);
$rows = $query->all();
?>


<div class="row">
    <div class="col-lg-9">
        <h1>Hasil Pencarian katakunci : <?= $id ?></h1>
        <p>Pada halaman ini, anda dapat melihat dokumen-dokumen yang berkaitan dengan katakunci yang telah
            anda pilih. Untuk memilih katakunci lainnya, anda dapat memilih pada bagian kanan laman website ini.</p>
        <?php
        foreach ($rows as $row) {
            $model = Tableknowledge::findOne($row['kode']);
            $model->writetotalsbl($query->count());
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
                                    if (strlen($data->isiinya) >= 300 && $data->readtotalsbl() > 3) {
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
                ?>
            </div>
            <div class="col-lg-3">
                <?=
                $this->render('../site/daftarkatakunci');
                ?>    
    </div>
</div>



