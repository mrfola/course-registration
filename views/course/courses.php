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
                            <?php
                            ActiveForm::begin([
                                "action" => ["course/destroy"],
                                "method" => "post"
                            ]);
                            ?>
                            <input type="hidden" name="user_course_id" value="<?=$course['user_course_id'];?>">
                            <?= Html::submitButton(FA::icon('trash', ['class' => 'red action', 'type' => 'submit'])->size(FA::SIZE_2X));?>
                            
                            <?php ActiveForm::end(); ?>
                        </td>
                        </tr>                    
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
                        <option value="1">Course</option>
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
        ?>
        </div>
    </div>
    </div>

</body>
</html>