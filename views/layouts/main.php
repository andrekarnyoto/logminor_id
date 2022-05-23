<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="msvalidate.01" content="89F46EB6FE692F57163F6534F83950E8" />
        <?php $this->registerCsrfMetaTags() ?>
        <?php $this->head() ?>

    </head>
    <body>
        <?php $this->beginBody() ?>
        
        <script async src="https://js.wpadmngr.com/static/adManager.js" data-admpid="7263"></script>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Halaman Utama', 'url' => ['/']],
                    ['label' => 'Berita', 'url' => ['/beritadunia/index']],
                    ['label' => 'Pengetahuan', 'url' => ['/knowledge/index']],
                    ['label' => 'Makanan', 'url' => ['/makanan/index']],
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <div class="row" align="center">
                <a href="https://popcash.net/home/251993" target="_blank" title="PopCash - The Popunder network">
    <img src="https://static.popcash.net/img/affiliate/728x90.jpg" alt="PopCash.net">
</a>
</div>
</br>

                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3" align="right"> 

                        <a href='https://free-hit-counters.net/'>https://free-hit-counters.net</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=73a3b90527a45b580e9608f69e74b2e319252756'></script>
                        <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/585708/t/1"></script>

                    </div>
                </div>
                <div class="row">
                    <p class="pull-left">&copy; Logminor Indonesia` <?= date('Y') ?></p>

                    <p class="pull-right">Tim Pengembang Logminor Indonesia <a target="blank" href="https://logminor.com/id/map/site/sitemap.xml">Sitemap</a></p>
                </div>
            </div>
        </footer>

        <?php $this->endBody() ?>
        
        
<!-- popcash -->
<script type="text/javascript">
  var uid = '251993';
  var wid = '520512';
</script>
<script type="text/javascript" src="//cdn.popcash.net/pop.js"></script>

        
</body>
</html>
<?php $this->endPage() ?>
