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
use app\models\User;
use app\models\Users;
use app\models\Images;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use app\models\DataForm;
use app\models\SignupForm;
use app\models\UplodedFile;
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
    public $enableCsrfValidation = false;

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

        $this->layout = 'start';
        return $this->render('index', [
            'example' => $index, 'example2' => $index2
        ]);
    }


        /**
         * @inheritdoc
         */

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
    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

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
        $user= Users::find()->all();
        $images= Images::find()->all();
        return $this->render('gallery',['user'=>$user, 'images'=>$images]);
    }
    public function actionShop()
    {
        $query = Category::find()->all();
        return $this->render('shop',['query'=>$query]);
    }
    public function actionAuthorgallery()
    {
        $get=Yii::$app->request->get('id');
        if($get){
            $allimg = Images::find()->where(['users_id'=>$get])->all();
            $author = Users::findOne($get);
            return $this->render('authorgallery', [
                'author' => $author,
                'allimg' => $allimg,
            ]);
        }
        else{return $this->render('error',['model'=>$get]);}
    }

    public function actionProducts()
    {
        $get=Yii::$app->request->get('id');
        $productcard = Product::find()->where(['category_id'=>$get])->all();
        $username= Users::find()->all();
        $cat = Category::findOne($get);
        $allcat = Category::find()->all();
        return $this->render('products',['cat'=>$cat,'allcat'=>$allcat,'productcard'=>$productcard,'username'=>$username]);
    }

    public function actionProfile()
    {
        $get=Yii::$app->request->get('id');
        if(Yii::$app->user->identity->users_id==$get){
        $user = Users::findOne($get);
        return $this->render('profile',['user'=>$user ]);}
        else{
            return $this->render('error2',[]);
        }

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
