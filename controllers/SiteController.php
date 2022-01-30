<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;

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
        return $this->render('index');
    }

    public function actionRegister()
    {
        return $this->render('register');
    }

    public function actionCreate()
    {
        $session = Yii::$app->session;
        $request = Yii::$app->request->post();

        $user = new User();
        $user->attributes = $request;
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($request['password']);
        if($user->validate() && $user->save())
        {
            $session->setFlash('successMessage', 'You have successfully registered. Kindly Login');
            return $this->redirect(['site/login']);
        }else
        {
            $session->setFlash('errorMessage', $user->getErrors());
            return $this->redirect(["site/register"]);
        }
    }

    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->redirect(['course/dashboard']);
        }

        $request = Yii::$app->request->post();

        if($request)
        {
            $user = new User();
            $user->email = $request['email'];
            $user->password = $request['password'];

            if ($user->login())
            {
                return $this->redirect(['course/dashboard']);
            }

            $user->password = '';

            $session = Yii::$app->session;
            $session->setFlash('errorMessage', $user->getErrors());
    
            return $this->render('login', [
                'user' => $user,
            ]);
        }  
        
        
        return $this->render('login');
        
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

}
