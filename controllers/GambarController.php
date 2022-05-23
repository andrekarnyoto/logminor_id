<?php

namespace app\controllers;

use Yii;
use app\models\Tablegambarnews;
use app\models\TablegambarnewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GambarController implements the CRUD actions for Tablegambarnews model.
 */
class GambarController extends Controller {

    /**
     * {@inheritdoc}
     */
    public $layout = 'main2';
    public static function tempatgambar(){
        return 'https://www.logminor.com/id/web/imgberita/';
    }
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
     * Lists all Tablegambarnews models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TablegambarnewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tablegambarnews model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tablegambarnews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Tablegambarnews();
        $namafilenya = date('YmdHis');


        if (Yii::$app->request->isPost) {
            $model->filegambaruplaod = UploadedFile::getInstance($model, 'filegambaruplaod');
            $model->filegambar = $namafilenya.'.'.$model->filegambaruplaod->extension;

            if ($model->filegambaruplaod && $model->validate()) {
                $namafilenya .= '.' . $model->filegambaruplaod->extension;
                $model->filegambaruplaod->saveAs('imgberita/' . $namafilenya);
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tablegambarnews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tablegambarnews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $data = Tablegambarnews::findOne($id);
        unlink(Yii::$app->basePath . '/web/imgberita/' . $data->filegambar);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tablegambarnews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tablegambarnews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Tablegambarnews::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
