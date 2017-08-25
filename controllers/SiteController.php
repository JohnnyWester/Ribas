<?php

namespace app\controllers;

use app\models\Article;
use app\models\CommentForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionBlog()
    {
        $data = Article::getAll();

        return $this->render('blog', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }

    public function actionSingle($id)
    {
        $article = Article::findOne($id);
        $posts = Article::getPosts();
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();

        $article->viewedCounter();
        
        return $this->render('single', [
            'article' => $article,
            'posts' => $posts,
            'comments'=>$comments,
            'commentForm'=>$commentForm
        ]);
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                return $this->redirect(['site/single','id'=>$id]);
            }
        }
    }

    public function actionSearch() {
        $q = trim(Yii::$app->request->get('q'));

        $query = Article::find()->where(['like', 'title', $q]);
        $data = Article::getAll();
        $articles = $query->offset($data['pagination']->offset)->limit($data['pagination']->limit)->all();

        if(!$q) {
            return $this->render('search', [
                'pagination' => $data['pagination'],
                'articles' => $articles,
                'q' => $q,
            ]);
        }

        return $this->render('search', [
            'pagination' => $data['pagination'],
            'articles' => $articles,
            'q' => $q,
        ]);
    }
}
