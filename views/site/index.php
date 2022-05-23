<?php
/* @var $this yii\web\View */

$this->title = 'Logminor Indonesia';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Portal penyedia informasi online berbagai topik atau tema yang dibutuhkan masyarakat Indonesia.'
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Kesehatan dan Obat-obatan, Humaniora dan Sejarah, Hukum dan Keadilan, Bahasa dan Sastra, Berita dan Politik, Sains dan Teknologi, Masyarakat dan Budaya, Pengajaran dan Pendidikan']
);

$this->registerMetaTag([
    'name' => 'news_keywords',
    'content' => 'indonesia dalam berita, berita terkini, pengkajian data, melihat indonesia dari dekat']
);

$this->registerMetaTag([
    'name' => 'author',
    'content' => 'Andrea Stevens Karnyoto'
]);
?>

<div class="site-index">

    <div class="row">
        <?= $this->render('_gambarheader') ?>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-9">
                <h1>Logminor Indonesia</h1>
                <p>Portal penyedia informasi online berbagai topik atau tema yang dibutuhkan masyarakat Indonesia. 
                    Informasi yang terdapat dalam situs ini antara lain Kesehatan dan Obat-obatan, Humaniora dan Sejarah, 
                    Hukum dan Keadilan, Bahasa dan Sastra, Berita dan Politik, Sains dan Teknologi, Masyarakat dan Budaya, 
                    dan Pengajaran dan Pendidikan.</p>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
        <?= $this->render('_berita') ?>
        <div class="row">
            <div style="text-align: center;">
                <iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=13&l=ez&f=ifr&linkID=8d19c8dcb7e01e2a0927c09b14e37b11&t=logminordotco-20&tracking_id=logminordotco-20" width="468" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
            </div>
        </div>
        <?= $this->render('_knowledge') ?>

        <div class="row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3">
            </div>
        </div>



    </div>
</div>
