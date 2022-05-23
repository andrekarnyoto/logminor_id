<?php

namespace app\controllers;

use Yii;
use app\models\Tableknowledge;
use app\models\TableknowledgeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KnowledgeController implements the CRUD actions for Tableknowledge model.
 */
class KnowledgeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    
    public $jmlrow = 0;
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tableknowledge models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TableknowledgeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tableknowledge model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionKatakunci($id)
    {
        return $this->render('katakunci', [
            'id' => $id,
        ]);
    }

    
    /**
     * Finds the Tableknowledge model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tableknowledge the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tableknowledge::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
