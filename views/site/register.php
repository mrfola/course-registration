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
                <label for="faculty_id">Faculty</label>
                <select  name="faculty_id" class="form-control" required onchange="getAllDepartments(this.value)">
                <?php foreach($faculties as $faculty){ ?>
                    <option value='<?=$faculty->id;?>'>
                        <?= $faculty->name; ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="department_id">Department</label>
                <select name="department_id" class="form-control" required>

                </select>
            </div>
            <div class="mb-4">
                <label for="level_id">Level</label>
                <select name="level_id" class="form-control" required>
                <?php foreach($levels as $level){ ?>
                    <option value='<?=$level->id;?>'>
                        <?= $level->name; ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="school_id">School</label>
                <select name="school_id" class="form-control" required>
                <?php foreach($schools as $school){ ?>
                    <option value='<?=$school->id;?>'>
                        <?= $school->name; ?>
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

    <?php $test = [[1,2,3], [4,5,6], [7,8,9]]; ?>

    <?php 
        foreach($departments as $department)
        {
            var_dump($department['name']);
        }
    ?>
            
    <script type="text/javascript">
        

        const getAllDepartments = (faculty_id) => {

            const departments = <?php echo(json_encode($departments)); ?>;


            const test = <?php echo(json_encode($test)); ?>;
            const newDepartments = departments.filter( (department) => {
                return department == faculty_id;
            });

            // departments.forEach( (department) => {
            //     console.log(department['id']);
            // })

            console.log(departments);

        }

    </script>
</body>
</html>