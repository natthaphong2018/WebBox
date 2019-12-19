<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\Security;
use app\models\MasterUsers;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $getUser = MasterUsers::find()->all();
        
        foreach($getUser as $item)
        {
            $item->password = Yii::$app->getSecurity()->decryptByKey(utf8_decode($item->password), $item->data_key);
        }
        
        return $this->render('index', ['data' => $getUser]);
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

        $model->password = '';
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
        return $this->render('about');
    }

    public function actionUserRegistered()
    {
        $model = new MasterUsers();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $secreteKey = utf8_encode(Yii::$app->getSecurity()->generateRandomKey(32));

            $masterUser = new MasterUsers();
            $masterUser->username = $model->username;
            $masterUser->password = utf8_encode(Yii::$app->getSecurity()->encryptByKey($model->password , $secreteKey));
            $masterUser->email = $model->email;
            $masterUser->data_key = $secreteKey;
            $masterUser->save();


            //return $this->render('Index', ['model' => $model]);
            return $this->redirect(['/site/index']);
            //refer : https://stackoverflow.com/a/23914678
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('user_register', ['model' => $model]);
        }
    }
}
