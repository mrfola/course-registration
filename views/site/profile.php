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
    <div class="container-fluid">
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

                ActiveForm::begin([
                    "method" => "post",
                    "action" => ["site/update"]
                ]);
            ?>

            <div class="form-group">
                <div class="mb-4">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?= $user->name; ?>" required>
                </div>
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $user->email; ?>" required>
                </div>
                <div class="mb-4">
                    <label for="level_id">Level</label>
                    <select name="level_id" class="form-control" required>
                        <?php foreach($levels as $level){ ?>
                            <option value='<?=$level->id;?>' <?= $level->id == $user->level_id ? 'selected=selected' : '';?>>
                                <?= $level->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control" required>
                        <?php foreach($departments as $department){ ?>
                            <option value='<?=$department->id;?>' <?= $department->id == $user->department_id ? 'selected=selected' : '';?>>
                                <?= $department->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="faculty_id">Faculty</label>
                    <select name="faculty_id" class="form-control" required>
                    <?php foreach($faculties as $faculty){ ?>
                            <option value='<?=$faculty->id;?>' <?= $faculty->id == $user->faculty_id ? 'selected=selected' : '';?>>
                            <?=$faculty->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="school_id">School</label>
                    <select name="school_id" class="form-control" required>
                    <?php foreach($schools as $school){ ?>
                            <option value='<?=$school->id;?>' <?= $school->id == $user->school_id ? 'selected=selected' : '';?>>
                                <?=$school->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-primary my-2" type="submit">Register</button>

            </div>
            <?php
                ActiveForm::end();
            ?>
        </div>
    </div>

</body>
</html>