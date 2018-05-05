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
use app\models\UploadProductImage;
use app\models\UploadForm;
use app\models\UploadAvatar;
use yii\web\UploadedFile;
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

        return $this->render('about', ['model' => $model]);
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

        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $reqbody=Yii::$app->request->bodyParams;
            foreach ($reqbody as $item=>$i){
                if(isset($i)&& $i=='on') {
                    $replaced= str_replace("_",".",$item);
                    $replaced=substr($replaced,1);
                    $connection = Yii::$app->db;
                    $connection->createCommand()->delete('Images', 'image ="' . $replaced . '"')->execute();
                    $model->afterDelete ($replaced);
                }
            }

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $uniq=uniqid();
            if ($model->upload($uniq)) {
                // file is uploaded successfully
                $send=new Images();
                $send->image='img/userimg/'.$uniq.$model->imageFile->name;
                $send->users_id=$get;
                $send->save();
                $model->imageFile =null;
                $send=null;

        if($get){
            $allimg = Images::find()->where(['users_id'=>$get])->all();
            $author = Users::findOne($get);
            return $this->render('authorgallery', [
                'author' => $author,
                'allimg' => $allimg,
                'model' => $model,
            ]);
        }
        else{
            return $this->render('error',['model'=>$get]);
        }
            }
            else{
                $allimg = Images::find()->where(['users_id'=>$get])->all();
                $author = Users::findOne($get);
                return $this->render('authorgallery', [
                    'author' => $author,
                    'allimg' => $allimg,
                    'model' => $model,
                ]);
            }
        }
        else{
            if($get){
                $allimg = Images::find()->where(['users_id'=>$get])->all();
                $author = Users::findOne($get);
                return $this->render('authorgallery', [
                    'author' => $author,
                    'allimg' => $allimg,
                    'model' => $model,
                ]);
            }
            else{
                return $this->render('error',['model'=>$get]);
            }
        }
    }

    public function actionProducts()
    {
        $get=Yii::$app->request->get('id');
        $cat = Category::findOne($get);
        $model = new UploadProductImage();
        if(Yii::$app->request->post()) {
            if (Product::findOne($_POST['product_id'])) {
                $post=Product::findOne($_POST['product_id']);
                $post->delete();
                if( $_POST['productImg']!='img/userimg/defult.jpg'){
                    $model->afterDelete ($_POST['productImg']);
                };
                }
                if($_POST['inputProductName']&&$_POST['aboutProductTextArea']&&$_POST['inputProductContacts']&&($_POST['inputProductPrice']&&is_numeric($_POST['inputProductPrice']))){
                    $send=new Product();
                    $send->aboutproduct=$_POST['aboutProductTextArea'];
                    $send->contacts=$_POST['inputProductContacts'];
                    $send->price=$_POST['inputProductPrice'];
                    $send->product_name=$_POST['inputProductName'];
                    $send->category_id=$cat->category_id;
                    $send->users_id=Yii::$app->user->identity->users_id;
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    $uniq=uniqid();
                    if ($model->upload($uniq)) {
                        // file is uploaded successfully
                        $send->image = 'img/prodimg/' . $uniq . $model->imageFile->name;
                        $model->imageFile = null;
                    }
                    $send->save();
                    $send=null;
                }

        }
        $productcard = Product::find()->where(['category_id'=>$get])->all();
        $username= Users::find()->all();
        $allcat = Category::find()->all();
       return $this->render('products',['cat'=>$cat,'allcat'=>$allcat,'productcard'=>$productcard,'username'=>$username,'model'=>$model]);
    }

    public function actionProfile()
    {
        $get=Yii::$app->request->get('id');
        $model = new UploadAvatar();
        if(Yii::$app->user->identity->users_id==$get || Yii::$app->user->can('admin' )){

            if(Yii::$app->request->post()){
                if($_POST['tel']){
                $post=Users::findOne($get);
                $post->tel=$_POST['tel'];
                $post->save();}

                if($_POST['username']){
                $post=Users::findOne($get);
                $post->username=$_POST['username'];
                $post->save();}

                if($_POST['about']){
                $post=Users::findOne($get);
                $post->about=$_POST['about'];
                $post->save();}

                if($_POST['surname']){
                $post=Users::findOne($get);
                $post->surname=$_POST['surname'];
                $post->save();}

                if($_POST['email']){
                    $post=Users::findOne($get);
                    $post->email=$_POST['email'];
                    $post->save();}
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $uniq=uniqid();
                if ($model->upload($uniq)) {
                    $post=Users::findOne($get);
                    $post->avatar = 'img/userimg/' . $uniq . $model->imageFile->name;
                    $model->imageFile = null;
                    $user = Users::findOne($get);
                    if($user->avatar!='img/userimg/defult.jpg'){
                        $model->afterDelete ($user->avatar);
                    }
                    $post->save();
                }

            };
            $user = Users::findOne($get);
        return $this->render('profile',['user'=>$user, 'model'=>$model ]);}
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
