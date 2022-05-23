<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tablenewsxdl12 */

$this->title = 'Tambah Berita';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablenewsxdl12-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
