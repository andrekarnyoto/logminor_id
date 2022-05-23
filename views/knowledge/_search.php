<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TableknowledgeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tableknowledge-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'isiinya') ?>

    <?= $form->field($model, 'keywords') ?>

    <?= $form->field($model, 'tanggalupload') ?>

    <?php // echo $form->field($model, 'linkasli') ?>

    <?php // echo $form->field($model, 'kategori') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
