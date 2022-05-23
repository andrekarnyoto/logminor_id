<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tablenewsxdl12 */

$this->title = 'Ubah Berita: ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tablenewsxdl12-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
