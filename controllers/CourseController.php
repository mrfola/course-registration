<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Course;
use app\models\UserCourse;
use app\models\User;

class CourseController extends Controller
{

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    public function actionCourses()
    {
        $user = User::getAuthUser();
        
        $courses = [];

        if($userCourses = $user->userCourses)
        {
            foreach($userCourses as $userCourse)
            {
                $course = $userCourse->course;

                $courses[] = [
                    "name" => $course->name,
                    "course_code" => $course->course_code,
                    "created_at" => $userCourse->created_at
                ];    
            }
        }   
        
        
        return $this->render('courses', ["courses" => $courses]);
    }

    public function actionRegister()
    {
        $request = Yii::$app->request->post();

        $user = User::findAuthUser();

        $userCourse = new UserCourse();
        $userCourse->course_id = $request["course_id"];
        $userCourse->link('user', $user);

        if ($userCourse->save())
        {
            //flash error message
            $session = Yii::$app->session;
            $session->setFlash('successMessage', "Course Succcessfully Registered");
            return $this->redirect(["course/courses"]);

        }else
        {
            //flash error message
            $session = Yii::$app->session;
            $session->setFlash('errorMessage', $userCourse->getErrors());
            return $this->redirect(["course/courses"]);
        }
    }
}
