<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TableknowledgeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengetahuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tableknowledge-index">


    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>

    <div class="row">

        <div class="col-lg-9">
            <img src="<?= Yii::$app->params['gambaredu'] ?>" width="100%">
            <br/><br/>
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Pada halaman ini, anda dapat mencari karya tulis berdasarkan judul, abstrak,
                kata kunci, dan kategori. Silahkan memasukkan kata-kata pada kolom input yang telah tersedia.</p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'judul',
                        'format' => 'raw',
                        'label' => 'Judul',
                        'value' => function ($data) {
                            return Html::a($data->judul, ['knowledge/view', 'id' => $data->kode]);
                        },
                                'contentOptions' => ['style' => 'width:25%; white-space: normal;'],
                            ],
                            [
                                'attribute' => 'isiinya',
                                'format' => 'html',
                                'label' => 'Abstrak',
                                'value' => function ($data) {
                                    if (strlen($data->isiinya) >= 400) {
                                        $txttampil = substr($data->isiinya, 0, 400) . '.....';
                                    } else {
                                        $txttampil = $data->isiinya;
                                    }
                                    return $txttampil;
                                },
                                'contentOptions' => ['style' => 'width:45%; white-space: normal;'],
                            ],
                            'keywords:ntext',
                            'kategori',
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-lg-3">
                    <?= $this->render('../site/daftarkatakunci'); ?>
        </div>
    </div>

</div>

