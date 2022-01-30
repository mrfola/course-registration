<?php
    use yii\bootstrap4\ActiveForm;
    use rmrevin\yii\fontawesome\FA;
    use yii\helpers\Html;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <div class="container dashboard-container">
        <div class="row py-4">
            <h1 class="col-lg-9">Courses</h1>
            <div class="col-lg-3">
                <!-- Trigger Register Course Modal -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#registerCourse">Register Course</button>
            </div>
        </div>

        <?php
        $session = Yii::$app->session;

        if($session->hasFlash('errorMessage'))
        {
            $errors = $session->getFlash('errorMessage');

            foreach($errors as $error)
            {
                echo "<div class='alert alert-danger' role='alert'>$error[0]</div>";
            }
        }

        if($session->hasFlash('successMessage'))
        {
            $success = $session->getFlash('successMessage');
            echo "<div class='alert alert-success' role='alert'>$success</div>";
        }
        if(!$courses)
        {
            echo "You have not registered for any courses yet.";
            
        }else
        {
        ?>
        <div class="row">
            <table class="table table-striped course-table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Title</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Date Added</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($courses as $course) {?>
                        <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $course["name"]; ?></td>
                        <td><?= $course["course_code"]; ?></td>
                        <td><?= $course["created_at"]; ?></td>
                        <td>
                        <?= FA::icon('trash', ['class' => 'red action', 'data-toggle' => 'modal', 'data-target' => "#deleteCourse".$course['id']])->size(FA::SIZE_2X);?>
                        </td>
                        </tr>    
                        
                        <!-- Delete Course Confirmation Modal -->
                        <div class="modal fade" id="deleteCourse<?= $course["id"]; ?>" tabindex="-1" aria-labelledby="deleteCourse<?= $course["id"]; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteCourse<?= $course["id"]; ?>">Delete Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                                ActiveForm::begin([
                                    "action" => ["course/destroy"],
                                    "method" => "post"
                                ]);
                            ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="p4">
                                        <p>Are you sure you want to remove this course: <b> <?= $course['name'];?></b></p>
                                    </div>
                                    <input type="hidden" name="course_id" value="<?=$course['id'];?>">
                                                
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            <?php
                            ActiveForm::end();
                            ?>
                            </div>
                        </div>
                        </div>

                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php } ?>

    </div>


    <!-- Register Course Modal -->
    <div class="modal fade" id="registerCourse" tabindex="-1" aria-labelledby="registerCourse" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="registerCourse">Register Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        if(!($availableCourses && count($availableCourses) > 0))
        {
            echo "<p class='p-4'> There are currently no more courses for you to add </p>";
        }else
        {

        ActiveForm::begin([
            "action" => ["course/register"],
            "method" => "post"
        ]);
        ?>
        <div class="modal-body">
            <div class="form-group">
                <div class="p4">
                    
                        <label for="course_id">Course</label>

                        <select name="course_id" id="" class="form-control">
                            <?php
                            foreach($availableCourses as $availableCourse)
                            { 
                            ?>
                                <option value="<?= $availableCourse['id']; ?>"><?= $availableCourse['name']; ?></option>
                            <?php
                            }
                            ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Register</button>
        </div>
        <?php
        ActiveForm::end();
    }

        ?>
        </div>
    </div>
    </div>



</body>
</html>