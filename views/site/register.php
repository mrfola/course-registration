<?php
    use yii\bootstrap4\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 style="color:black;">Register</h1>
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

        ActiveForm::begin([
            "method" => "post",
            "action" => ["site/create"]
        ]);
        ?>

        <div class="form-group">
            <div class="mb-4">
                <label for="Name">Name</label>
                <input class="form-control" type="text" name="name" required>
            </div>
            
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="level_id">Level</label>
                <select name="level_id" class="form-control" required>
                    <option value="1">100</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="department_id">Department</label>
                <select name="department_id" class="form-control" required>
                    <option value="2">Mechanical Engineering</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="faculty_id">Faculty</label>
                <select name="faculty_id" class="form-control" required>
                    <option value="1">Technology</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="school_id">School</label>
                <select name="school_id" class="form-control" required>
                    <option value="1">University of Lagos</option>
                </select>
            </div>

            <button class="btn btn-primary my-2" type="submit">Register</button>

        </div>
        <?php
            ActiveForm::end();
        ?>
    </div>
            
</body>
</html>