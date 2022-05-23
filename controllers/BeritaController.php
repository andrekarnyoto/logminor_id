<?php

namespace app\controllers;

use Yii;
use app\models\Tablekeywordnews;
use app\models\Tablenewsxdl12;
use app\models\Tablenewsxdl12Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Html;

/**
 * BeritaController implements the CRUD actions for Tablenewsxdl12 model.
 */
class BeritaController extends Controller {

    /**
     * {@inheritdoc}
     */
    public $layout = 'main2';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update', 'index', 'delete'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all Tablenewsxdl12 models.
     * @return mixed
     */
    public function makekode($judul) {
        $judulbersih = str_replace(' ', '-', preg_replace('/[^a-z A-Z0-9]/', '', trim(strtolower($judul))));
        $querycari = new Query;
        $querycari->select('kode')->from('tablenewsxdl12');
        $hasil = $querycari->count();
        $hasil += 1;
        return $judulbersih . '-' . $hasil;
    }

    public function actionIndex() {
        $searchModel = new Tablenewsxdl12Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tablenewsxdl12 model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tablenewsxdl12 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function getadakeyw($paramkey) {
        $querycari = new Query;
        $querycari->select('id')->from('tablekeywordnews')->where(['keywordnya' => trim($paramkey)]);
        $hasil = $querycari->count();
        unset($querycari);
        return $hasil;
    }

    public function makekeyword($kewxd) {
        $arrkeywrd = explode(',', trim($kewxd));
        foreach ($arrkeywrd as $kywrd) {
            $nwkywrd = strtolower(trim($kywrd));
            if ($this->getadakeyw($nwkywrd) == 0) {
                $mkeyword = new Tablekeywordnews;
                $mkeyword->keywordnya = $nwkywrd;
                $mkeyword->save();
                unset($mkeyword);
            }
        }
    }

    public function actionCreate() {
        $model = new Tablenewsxdl12();

        if ($model->load(Yii::$app->request->post())) {
            $model->judul = strtoupper($model->judul);
            $model->kode = $this->makekode($model->judul);
            $model->tanggalupload = date("Y-m-d H:i:s");
            $model->save();
            $this->makekeyword($model->keywords);
            return $this->redirect(['view', 'id' => $model->kode]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tablenewsxdl12 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->kode]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tablenewsxdl12 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tablenewsxdl12 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tablenewsxdl12 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tablenewsxdl12::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
