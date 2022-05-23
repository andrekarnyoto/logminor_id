<?php
use app\controllers\GambarController;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TablegambarnewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gambar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablegambarnews-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Gambar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'label' => 'Gambar',
                'value' => function ($data) {
                    $gambar = '<img width="150px" src="'. GambarController::tempatgambar() . $data->filegambar . '">';
                    return $gambar;
                },
                'contentOptions' => ['style' => 'width:160; white-space: normal;'],
            ],
            [
                'label' => 'Link Lengkap',
                'value' => function ($data) {
                    $gambar =  GambarController::tempatgambar() . $data->filegambar;
                    return $gambar;
                },
                'contentOptions' => ['style' => 'width:250; white-space: normal;'],
            ],
            'filegambar',
            'keterangan',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
