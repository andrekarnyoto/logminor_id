<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-lg-12">

    </div>
</div>


<div class="row">
    <div class="col-lg-9">
        <div class="tablenewsxdl12-index">

            <h1><?= Html::encode($this->title) ?></h1>

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
                            return Html::a($data->judul, ['beritadunia/view', 'id' => $data->kode]);
                        },
                                'contentOptions' => ['style' => 'width:25%; white-space: normal;'],
                            ],
                            [
                                'attribute' => 'isinya',
                                'format' => 'raw',
                                'label' => 'Konten',
                                'value' => function ($data) {
                                    if (strlen($data->isinya) >= 400) {
                                        $txttampil = substr($data->isinya, 0, 400) . '.....';
                                    } else {
                                        $txttampil = $data->isiinya;
                                    }
                                    return $txttampil;
                                },
                                'contentOptions' => ['style' => 'width:45%; white-space: normal;'],
                            ],
                            [
                                'attribute' => 'tanggalupload',
                                'label' => 'Tanggal',
                            ],
                        ],
                    ]);
                    ?>


        </div>
    </div>
    <div class="col-lg-3">
        <script data-cfasync="false" type="text/javascript" src="https://www.onclickmega.com/a/display.php?r=2653651"></script>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    </div>
</div>