<?php
include 'functions.php';
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <style>
        .berhasil {
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 99;
            transition: .5s;
        }
    
        .wrap {
            top: 75%;
        }
        </style>
        <div class=\"mx-auto my-auto berhasil m-2 position-fixed\">
            <div class=\"row\">
                <div class=\"col-md-4\"></div>
                <div class=\"col-md-4\">
                    <div class=\"wrap rounded p-2 shadow-xl bg-white border border-secondary d-block d-flex flex-column position-relative\">
                        <h3 class=\"text-center text-muted d-block p-3\">Project Added Successfully!</h3>
                        <i class=\"align-self-center text-success far fa-check-circle fa-6x p-2\">
                        </i>
                        <div class=\" align-self-center kotak-tombol p-3\">
                            <a href=\"add_project.php\" class=\"btn btn-primary mr-2\">Add More</a>
                            <a href=\"index.php\" class=\"btn btn-secondary\">Back</a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\"></div>
            </div>
        </div>
        ";
    } else {
        echo "
        <style>
        .berhasil {
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 99;
            transition: .5s;
        }
    
        .wrap {
            top: 75%;
        }
        </style>
        <div class=\"mx-auto my-auto berhasil m-2 position-fixed\">
            <div class=\"row\">
                <div class=\"col-md-4\"></div>
                <div class=\"col-md-4\">
                    <div class=\"wrap rounded p-2 shadow-xl bg-white border border-secondary d-block d-flex flex-column position-relative\">
                        <h3 class=\"text-center text-muted d-block p-3\">Project Failed Added!</h3>
                        <i class=\"align-self-center text-danger far fa-times-circle fa-6x p-2\">
                        </i>
                        <div class=\" align-self-center kotak-tombol p-3\">
                            <a href=\"index.php\" class=\"btn btn-secondary\">Back</a>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\"></div>
            </div>
        </div>
    ";
    }
}
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Add Project</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h1 class="alert alert-success text-center p-4 fs-2 my-2">Add Project</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="project_name">Project Name</label>
                        <input class="form-control" type="text" name="project_name" id="project_name" placeholder="Insert Project Name" required>
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="client">Client</label>
                        <input class="form-control" type="text" name="client" id="client" placeholder="Insert Client Name" required>
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="leader">Leader Name</label>
                        <input class="form-control" type="text" name="leader" id="leader" placeholder="Insert Leader Name" required>
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="leader_email">Leader Email</label>
                        <input class="form-control" type="email" name="leader_email" id="leader_email" placeholder="Insert Leader Email" required>
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="leader_photo">Leader Photo</label>
                        <input type="file" class="form-control" id="leader_photo" name="leader_photo">
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="start_date">Start Date</label>
                        <input class="form-control" type="datetime-local" name="start_date" id="start_date" required>
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="end_date">End Date</label>
                        <input class="form-control" type="datetime-local" name="end_date" id="end_date" required>
                    </div>
                    <div class="form-group my-4">
                        <label class="control-label fw-bold mb-2" for="progress">Progress</label>
                        <input class="form-control" type="number" name="progress" id="progress" placeholder="Scale 1-100" required>
                    </div>
                    <div class="form-group my-4 text-center">
                        <button class="btn btn-success" type="submit" name="submit">
                            <i class="fas fa-save"></i> Save
                        </button>
                        <a href="index.php" class="btn btn-secondary" onclick="return(confirm('Are you sure wanna go back?'))">
                            <i class="fas fa-arrow-alt-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>