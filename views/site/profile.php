<?php
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="row py-4">
            <h1>Profile</h1>
        </div>
        <div class="row">

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
                    "method" => "post",
                    "action" => ["site/update"],
                    "options" => ["class" => "profile-form"]
                ]);
            ?>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?= $user->name; ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $user->email; ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="level_id">Level</label>
                    </div>
                    <select name="level_id" class="custom-select" required>
                        <?php foreach($levels as $level){ ?>
                            <option value='<?=$level->id;?>' <?= $level->id == $user->level_id ? 'selected' : '';?>>
                                <?= $level->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="department_id">Department</label>
                    </div>
                    <select name="department_id" class="custom-select" required>
                        <?php foreach($departments as $department){ ?>
                            <option value='<?=$department->id;?>' <?= $department->id == $user->department_id ? 'selected' : '';?>>
                                <?= $department->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="faculty_id">Faculty</label>
                    </div>
                    <select name="faculty_id" class="custom-select" required>
                        <?php foreach($faculties as $faculty){ ?>
                            <option value='<?=$faculty->id;?>' <?= $faculty->id == $user->faculty_id ? 'selected' : '';?>>
                                <?= $faculty->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="school_id">School</label>
                    </div>
                    <select name="school_id" class="custom-select" required>
                        <?php foreach($schools as $school){ ?>
                            <option value='<?=$school->id;?>' <?= $school->id == $user->school_id ? 'selected' : '';?>>
                                <?= $school->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-primary my-2" type="submit">Update</button>

            </div>
            <?php
                ActiveForm::end();
            ?>
        </div>
</body>
</html>