<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tablenewsxdl12Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tablenewsxdl12-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'isinya') ?>

    <?= $form->field($model, 'keywords') ?>

    <?= $form->field($model, 'tanggalupload') ?>

    <?php // echo $form->field($model, 'linkasli') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
