<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tablenewsxdl12 */

$this->title = $model->judul;

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->keywords]
);

$this->registerMetaTag([
    'name' => 'author',
    'content' => 'Andrea Stevens Karnyoto'
]);

$this->registerMetaTag([
    'name' => 'description',
    'content' => strip_tags(substr($model->isinya, 0, strpos($model->isinya, ".") + 1))
]);

$this->registerMetaTag([
    'property' => 'og:description',
    'content' => strip_tags( substr($model->isinya, 0, strpos($model->isinya, ".") + 1))
]);

$this->registerMetaTag([
    'property' => 'og:title',
    'content' => $model->judul
]);


if (trim($model->gambar) != '') {
    $this->registerMetaTag([
        'property' => 'og:image',
        'content' => $model->gambar
    ]);
} else {
    $this->registerMetaTag([
        'property' => 'og:image',
        'content' => 'https://www.logminor.com/id/web/gambar/header14/berita.jpg'
    ]);
}


$this->params['breadcrumbs'][] = ['label' => 'Berita Dunia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-lg-12">

    </div>
</div>


<div class="row">
    <div class="col-lg-9">


        <div class="tablenewsxdl12-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <?=
            DetailView::widget([
                'model' => $model,
                'template' => '<tr><td{contentOptions}>{value}</td></tr>',
                'attributes' => [
                    [
                        'format' => 'raw',
                        'label' => 'Tanggal',
                        'value' => $model->tanggalupload,
                    ],
                    [
                        'label' => 'Gambar',
                        'format' => 'html',
                        'value' => function($data) {
                            if (trim($data->gambar) != '') {
                                $gmbr = '<img src="' . $data->gambar . '">';
                            } else {
                                $gmbr = '<img src="' . Yii::$app->params['gambarberita'] . '">';
                            }
                            return $gmbr;
                        }
                    ],
                    [
                        'format' => 'raw',
                        'label' => 'Isinya',
                        'value' => $model->isinya,
                    ],
                    [
                        'format' => 'raw',
                        'label' => 'linkasli',
                        'value' => function($data) {
                            $linksx = '<a target="blank" href="' . Yii::$app->params['urlLuar'];
                            $linksx .= $data->linkasli . '">' . $data->linkasli . '</a>';
                            return $linksx;
                        }
                    ],
                    [
                        'format' => 'raw',
                        'label' => 'Kata Kunci',
                        'value' => 'Kata Kunci : ' . $model->keywords,
                    ],
                ],
            ])
            ?>

        </div>

    </div>
    <div class="col-lg-3">

    </div>

</div>

<div class="row">
    <div class="col-lg-12">

    </div>
</div>