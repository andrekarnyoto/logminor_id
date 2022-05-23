<?php
use app\controllers\GambarController;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tablegambarnews */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gambar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tablegambarnews-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            [
                'format' => 'raw',
                'label' => 'Gambar',
                'value' => '<img width="400px" src="'. GambarController::tempatgambar() . $model->filegambar . '">',
            ],
            [
                'label' => 'Link Gambar',
                'value' => GambarController::tempatgambar() . $model->filegambar,
            ],
            'filegambar',
            'keterangan',
        ],
    ])
    ?>

</div>
