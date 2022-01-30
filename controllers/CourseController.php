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

        //courses user can still register for based on their department (i.e, they have not registered for it before) 
        $availableCourses = Course::find()->all();

        //all courses a user has registered for
        $courses = $user->courses;

        if($courses)
        { 
            foreach($courses as $course)
            {
                foreach($availableCourses as $singleCourseId => $singleCourse)
                {
                   if($singleCourse['id'] == $course['id'])
                   {
                    unset($availableCourses[$singleCourseId]);
                   }
                }   
            }
        }   
    
        return $this->render('courses', ["courses" => $courses, "availableCourses" => $availableCourses]);
    }

    public function actionRegister()
    {
        $request = Yii::$app->request->post();

        $user = User::getAuthUser();

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


    public function actionDestroy()
    {
        $request = Yii::$app->request->post();

        $userCourse = UserCourse::findOne(["course_id" => $request["course_id"]]);

        if($userCourse->delete())
        {
            //flash error message
            $session = Yii::$app->session;
            $session->setFlash('successMessage', "Course Succcessfully Deleted");
            return $this->redirect(["course/courses"]);
        }else
        {
            $errorMessage = [["An error occured. Couldn't delete."]];
            //flash error message
            $session = Yii::$app->session;
            $session->setFlash('errorMessage', $errorMessage);
            return $this->redirect(["course/courses"]);
        }
    }
}
