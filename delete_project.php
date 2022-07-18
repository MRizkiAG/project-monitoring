<?php
include 'functions.php';
$id = $_GET['id'];

if (hapus($id) > 0) {
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
                    <h3 class=\"text-center text-success d-block p-3\">Project Deleted Successfully!</h3>
                    <i class=\"align-self-center text-success far fa-check-circle fa-6x p-2\">
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
                    <h3 class=\"text-center text-muted d-block p-3\">Data Gagal dihapus !</h3>
                    <i class=\"align-self-center text-danger far fa-times-circle fa-6x p-2\">
                    </i>
                    <div class=\" align-self-center kotak-tombol p-3\">
                        <a href=\"index.php\" class=\"btn btn-secondary\">Kembali</a>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4\"></div>
        </div>
    </div>
    ";
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Delete Project</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>