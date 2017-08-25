<?php

namespace app\modules\admin\controllers;

use app\models\Comment;
use Yii;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {
        $comments = Comment::find()->orderBy('id desc')->all();

        return $this->render('index',['comments'=>$comments]);
    }

    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);
        if($comment->delete())
        {
            return $this->redirect(['comment/index']);
        }
    }

    public function actionAllow($id)
    {
        $comment = Comment::findOne($id);
        if($comment->allow())
        {
            return $this->redirect(['index']);
        }
    }

    public function actionDisallow($id)
    {
        $comment = Comment::findOne($id);
        if($comment->disallow())
        {
            return $this->redirect(['index']);
        }
    }

    public function actionView($id)
    {
        $comments = Comment::find()->orderBy('id desc')->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'comments'=>$comments
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}