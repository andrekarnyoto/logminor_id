<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;
use app\models\Tableknowledge;

/* @var $this yii\web\View */
/* @var $model app\models\Tableknowledge */



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
    'content' => substr(strip_tags(urldecode($model->isiinya)), 0, strpos($model->isiinya, ". ") + 1)
]);


$this->registerMetaTag([
    'property' => 'og:description',
    'content' => substr(strip_tags(urldecode($model->isiinya)), 0, strpos($model->isiinya, ".") + 1)
]);

$this->registerMetaTag([
    'property' => 'og:title',
    'content' => strip_tags(urldecode($model->judul))
]);


$this->registerMetaTag([
    'property' => 'og:image',
    'content' => 'https://www.logminor.com/id/web/gambar/header14/pendidikan.jpg'
]);


$this->params['breadcrumbs'][] = ['label' => 'Pengetahuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-lg-12">

    </div>
</div>


<div class="row">
    <div class="col-lg-9">
        <div class="tableknowledge-view">



            <img src="<?= Yii::$app->params['gambaredu'] ?>" width="100%">
            <br/> <br/>
            <h1><?= Html::encode($this->title) ?></h1>


            <?=
            DetailView::widget([
                'model' => $model,
                'template' => '<tr><td{contentOptions}>{value}</td></tr>',
                'attributes' => [
                    'isiinya:html',
                    [
                        'format' => 'raw',
                        'label' => 'keyword',
                        'value' => function($data) {
                            $result = '';
                            $arrkeywrd = explode(',', $data->keywords);
                            foreach ($arrkeywrd as $kywrd) {
                                $nwkywrd = trim($kywrd);
                                $result .= Html::a($nwkywrd, ['knowledge/katakunci', 'id' => $nwkywrd]) . ', ';
                            }
                            $result = substr($result, 0, strlen($result) - 2);
                            return $result;
                        }
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
                            'kategori',
                        ],
                    ])
                    ?>
                    <br/><br/>

                    <h2>Dokumen yang berkaitan.</h2>

                    <?php
                    $hasilx = '';
                    $arrkeywrd = explode(',', $model->keywords);
                    foreach ($arrkeywrd as $kywrd) {
                        $nwkywrd = trim($kywrd);
                        $hasilx .= 'keywords LIKE "%' . $nwkywrd . '%" or ';
                    }
                    foreach ($arrkeywrd as $kywrd) {
                        $nwkywrd = trim($kywrd);
                        $hasilx .= 'keywords LIKE "' . $nwkywrd . '%" or ';
                    }

                    foreach ($arrkeywrd as $kywrd) {
                        $nwkywrd = trim($kywrd);
                        $hasilx .= 'keywords LIKE "%' . $nwkywrd . '" or ';
                    }

                    $hasilx = substr($hasilx, 0, strlen($hasilx) - 4);

                    $query = new Query;
                    $query->select('kode')->from('tableknowledge')->where($hasilx)->orderby('RAND()')->limit(20);
                    $rows = $query->all();

                    foreach ($rows as $row) {
                        $model = Tableknowledge::findOne($row['kode']);
                        echo DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><td{contentOptions}>{value}</td></tr>',
                            'attributes' => [
                                [
                                    'format' => 'raw',
                                    'label' => 'judul',
                                    'value' => function($data) {
                                        return Html::a($data->judul, ['knowledge/view', 'id' => $data->kode]);
                                    }
                                        ],
                                        [
                                            'format' => 'raw',
                                            'label' => 'isiinya',
                                            'value' => function($data) {
                                                if (strlen($data->isiinya) >= 300) {
                                                    $txttampil = substr($data->isiinya, 0, 300) . '.....';
                                                } else {
                                                    $txttampil = $data->isiinya;
                                                }
                                                return $txttampil;
                                            }
                                        ],
                                    ],
                                ]);
                            }
                            echo Html::a('Cari atau Lihat dokumen yang lain..', ['knowledge/index']);
                            ?>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <?= $this->render('../site/daftarkatakunci'); ?>
    </div>
</div>

