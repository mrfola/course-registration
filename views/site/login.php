<?php
    use yii\bootstrap4\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Login</h1>
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

        ActiveForm::begin([
            "action" => ["site/login"],
            "method" => "post"
        ]);
        ?>
        <div class="form-group">
            <div class="mb-4">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="mb-4">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>

            <button class="btn btn-primary">Login</button>
        </div>
        <?php
            ActiveForm::end();
        ?>
    </div>
</body>
</html>