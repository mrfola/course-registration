<?php
use yii\helpers\Url;
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
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-lg-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="<?= Url::to(['site/profile']); ?>" class="btn btn-primary">View</a>
                    </div>
                </div>      
            </div>
            <div class="col-lg-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="<?= Url::to(['course/courses']); ?>" class="btn btn-primary">View</a>
                    </div>
                </div>      
            </div>

            <div class="col-lg-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Accouncements</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
                </div>      
            </div>

            <div class="col-lg-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Results</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
                </div>      
            </div>

            <div class="col-lg-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Department Calendar</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                    </div>
                </div>      
            </div>

        </div>
    </div>

</body>
</html>