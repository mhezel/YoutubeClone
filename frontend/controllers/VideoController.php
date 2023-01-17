<?php

namespace frontend\controllers;
use common\models\Video;
use common\models\VideoLike;
use common\models\VideoView;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only'  => ['like', 'dislike'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verb' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'like' => ['post'],
                    'dislike' => ['post'],
                ]
            ]
        ];
    }
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
        $video = Video::findOne($id);
        if (!$video){
            throw new NotFoundHttpException("Video not found");
        }

        $videoView = new VideoView();
        $videoView->video_id = $id;
        $videoView->user_id = \Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();

        return $this->render('view', [
            'model' => $video,
        ]);
    }

    public function actionLike($id)
    {
        $video = $this->findVideo($id);
        $userId = \Yii::$app->user->id;

        $videoLike = new VideoLike();
        $videoLike->video_id = $id;
        $videoLike->user_id = $userId;
        $videoLike->type = VideoLike::TYPE_LIKE;
        $videoLike->created_at = time();
        $videoLike->save();

        return $this->renderAjax('_buttons',['model'=>$video]);
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findVideo($id)
    {
        $video = Video::findOne($id);
        if (!$video){
            throw new NotFoundHttpException("Video not found");
        }
    }
}