<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tablegambarnews */

$this->title = 'Tambah Gambar';
$this->params['breadcrumbs'][] = ['label' => 'Gambar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablegambarnews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
