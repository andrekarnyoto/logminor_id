<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Tablenewsxdl12 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tablenewsxdl12-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'kategori')->dropDownList(
            ['Kesehatan dan Obat-obatan' => 'Kesehatan dan Obat-obatan',
        'Humaniora dan Sejarah' => 'Humaniora dan Sejarah',
        'Hukum dan Keadilan' => 'Hukum dan Keadilan',
        'Bahasa dan Sastra' => 'Bahasa dan Sastra',
        'Berita dan Politik' => 'Berita dan Politik',
        'Sains dan Teknologi' => 'Sains dan Teknologi',
        'Masyarakat dan Budaya' => 'Masyarakat dan Budaya',
        'Pengajaran dan Pendidikan' => 'Pengajaran dan Pendidikan',
        'Lingkungan dan Semesta' => 'Lingkungan dan Semesta']
            , ['prompt' => 'Pilih...']);
    ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'gambar')->textInput() ?>

    <?=
    $form->field($model, 'isinya')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
        ],
    ]);
    ?>

    <?= $form->field($model, 'keywords')->textInput() ?>

    <?= $form->field($model, 'linkasli')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
