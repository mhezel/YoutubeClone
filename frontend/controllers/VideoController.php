<?php

namespace frontend\controllers;
use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'main';
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->with('createdBy')->published()->latest(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    /**
     * @throws NotFoundHttpException
     */
    public function actionView($id): string
    {
        $this->layout = 'auth';
        $videoView = Video::findOne($id);
        if (!$videoView){
            throw new NotFoundHttpException("Video not found");
        }

        return $this->render('view', [
            'model' => $videoView,
        ]);
    }
}