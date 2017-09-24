<?php

namespace app\controllers;

use app\models\Blog;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use app\models\User;
use app\models\Category;
use yii\data\Pagination;
use app\models\DataForm;
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
    public $arr= [['name'=>'About','adres'=>'#'],
        ['name'=>'gallery','adres'=>'#'],
        ['name'=>'shop','adres'=>'#']
    ];

    public function actionIndex()
    {
        /*
                $index = News::findOne(4);
                return $this->render('index', [
                    'example' => $index
                ]);
        */
        /*
                $index = News::find()->all();

                return $this->render('index', [
                    'example' => $index
                ]);
        */

//            $index = Category::findOne($id);
//            $index2 = $index->news;
        $this->layout = 'start';
        return $this->render('index', [
            'example' => $index, 'example2' => $index2
        ]);
    }

    public function actionNews($page=1)
    {
        $query = Blog::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('blog', [
            'models' => $models,
            'pages' => $pages,
        ]);

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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about',['model'=>$model]);
    }
    public function actionLaboratory()
    {
        return $this->render('laboratory',['model'=>$model]);
    }
    public function actionGallery()
    {
        return $this->render('gallery',['model'=>$model]);
    }
    public function actionShop()
    {
        return $this->render('shop',['model'=>$model]);
    }
    public function actionAuthorgallery()
    {
        $get=Yii::$app->request->get('id');
        if($get){
            $author = User::findOne($get);
            return $this->render('authorgallery', [
                'author' => $author,
                'models' => [],
            ]);
        }
        else{return $this->render('error',['model'=>$model]);}
    }
    public function actionBlog()
    {
        $get=Yii::$app->request->get('id');
        if($get){
            $article = Blog::findOne($get);
            return $this->render('blog', [
                'article' => $article,
                'models' => [],
            ]);
        }
        else {
            $query = Blog::find();
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
            $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
            return $this->render('blog', [
                'models' => $models,
                'pages' => $pages,
            ]);
        }
    }
}
