<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tablenewsxdl12 */

$this->title = $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tablenewsxdl12-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kode], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->kode], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kategori',
            'kode',
            
            'judul',
            [
                'label' => 'Gambar',
                'format' => 'html',
                'value' => '<img src="'. $model->gambar.'">',
            ],
            [
                'label' => 'Isi',
                'format' => 'html',
                'value' => $model->isinya,
            ],
            'keywords:ntext',
            'tanggalupload',
            'linkasli:ntext',
        ],
    ])
    ?>

</div>
