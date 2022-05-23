<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Tablenewsxdl12Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablenewsxdl12-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Berita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'judul',
            [
                'attribute' => 'isinya',
                'format' => 'raw',
                'label' => 'Isinya',
            ],
            'keywords:ntext',
            'tanggalupload',
            'linkasli:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
