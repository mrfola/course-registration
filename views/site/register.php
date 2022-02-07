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
                <input 
                class="form-control"
                type="text"
                name="name"
                id="name"
                onblur="handleNameOnBlur(this.value)"
                required
                >

            </div>
            
            <div class="mb-4">
                <label for="email">Email</label>
                <input
                class="form-control"
                type="email"
                name="email"
                id="email"
                onblur="handleEmailOnBlur(this.value)"
                required>
            </div>

            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="faculty_id">Faculty</label>
                <select 
                 name="faculty_id"
                 class="form-control"
                 required 
                 onchange="getAllDepartments(this.value)"
                 >
                 <option value="" selected>Please Select</option>
                <?php foreach($faculties as $faculty){ ?>
                    <option 
                    value='<?=$faculty->id;?>'
                    <?= (isset($selectedFaculty) && $selectedFaculty == $faculty->id) ? "selected" : ''; ?>
                    >
                        <?= $faculty->name; ?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="department_id">Department</label>
                <select 
                name="department_id"
                class="form-control"
                required
                onchange="getAllLevels(this.value)"
                >

                <option value='' selected>Please Select</option>
                <?php

                if(isset($selectedFaculty))
                {
                    foreach($departments as $department)
                    { 
                ?>
                    <option 
                    value='<?=$department->id;?>'
                    <?= (isset($selectedDepartment) && $selectedDepartment == $department->id) ? "selected" : ''; ?>
                    >
                        <?= $department->name; ?>
                    </option>
                <?php 
                    } 
                }
                 ?>

                </select>
            </div>

            <div class="mb-4">
                <label for="level_id">Level</label>
                <select
                id="level"
                name="level_id"
                class="form-control"
                required
                >
                <option value="" selected>Please Select</option>

                <?php 
                if(isset($selectedDepartment))
                {
                    foreach($levels as $level)
                    { 
                ?>
                    <option value='<?=$level->id;?>'> <?= $level->name; ?></option>
                <?php 
                    } 
                }
                 ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="school_id">School</label>
                <select 
                name="school_id"
                class="form-control"
                id="school"
                onblur="handleSchoolOnBlur(this.value)"
                required>
                <option value="" selected>Please Select</option>
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
            
    <script type="text/javascript">
        
        //For name input field
        let nameInput = document.querySelector('#name');
        if(localStorage.getItem('registerName') != null)
        {
            nameInput.setAttribute('value', localStorage.getItem('registerName'));
            console.log(localStorage.getItem('registerName'));
        }
        const handleNameOnBlur = () => localStorage.setItem('registerName', nameInput.value);

        //For email input field
        let emailInput = document.querySelector('#email');
        if(localStorage.getItem('registerEmail') != null)
        {
            emailInput.setAttribute('value', localStorage.getItem('registerEmail'));
        }
        const handleEmailOnBlur = () => localStorage.setItem('registerEmail', emailInput.value);

        //For school select field
        let schoolInput = document.querySelector('#school');
        if(localStorage.getItem('registerSchool') != null)
        {
            schoolInput.value = localStorage.getItem('registerSchool');
            console.log(localStorage.getItem('registerSchool'));
        }

        const handleSchoolOnBlur = () => 
        {
            console.log(schoolInput.options[schoolInput.selectedIndex].text);
            localStorage.setItem('registerSchool', schoolInput.value);
        }

        const getAllDepartments = (faculty_id) => 
        {
        window.location.href = window.location.href+`&faculty=${faculty_id}`;
        }

        const getAllLevels = (department_id) => 
        {
            window.location.href = window.location.href+`&department=${department_id}`;
        }

    </script>
</body>
</html>