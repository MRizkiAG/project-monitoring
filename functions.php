<?php

// Koneksi DB

$host = 'localhost';
$username = 'root';
$password = '';
$nama_db = 'db_project';
$koneksi_db = mysqli_connect($host, $username, $password, $nama_db);

echo $koneksi_db ? "<script>console.log('Koneksi ke Database Berhasil')</script>" : mysqli_connect_error();


// QUERY
function query($query)
{
    global $koneksi_db;
    $hasil = mysqli_query($koneksi_db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }

    return $rows;
}

// TAMBAH
function tambah($data)
{
    global $koneksi_db;


    $project_name = htmlspecialchars($data['project_name']);
    $client = htmlspecialchars($data['client']);
    $leader = htmlspecialchars($data['leader']);
    $leader_email = htmlspecialchars($data['leader_email']);
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $progress = htmlspecialchars($data['progress']);

    $leader_photo = upload();

    $query = "INSERT INTO project_monitoring
    (
        project_name, 
        client, 
        leader, 
        leader_email, 
        leader_photo, 
        start_date, 
        end_date, 
        progress
    ) 
    VALUES 
    (
        '$project_name', 
        '$client', 
        '$leader',
        '$leader_email', 
        '$leader_photo', 
        '$start_date', 
        '$end_date', 
        '$progress'
    )";

    mysqli_query($koneksi_db, $query);

    return mysqli_affected_rows($koneksi_db);
}
// UPLOAD
function upload()
{
    // CATATAN
    //Pada Form tambahkan atribut enctype="multipart/form-data"

    $nama_file = $_FILES['leader_photo']['name'];
    $ukuran_file = $_FILES['leader_photo']['size'];
    $error = $_FILES['leader_photo']['error'];
    $tmp_name = $_FILES['leader_photo']['tmp_name'];

    // Mengecek bahwa file yang diupload tidak kosong
    if ($error === 4) {
        echo "  <script>
                    alert('leader_photo yang diupload kosong !');
                    document.location.href = 'index.php';
                </script>";
        die;
    }

    $ekstensi_leader_photo_valid = ['jpg', 'jpeg', 'png'];
    $ekstensi_leader_photo = explode('.', $nama_file);
    $ekstensi_leader_photo = strtolower(end($ekstensi_leader_photo));

    // Mengecek bahwa ekstensi file sesuai dengan yang ditentukan
    if (!in_array($ekstensi_leader_photo, $ekstensi_leader_photo_valid)) {
        echo "  <script>
                    alert('leader_photo yang diupload bukan leader_photo !');
                    document.location.href = 'index.php';
                </script>";
        die;
    }

    // Mengecek bahwa ukuran file tidak lebih dari ukuran yang diinginkan
    if ($ukuran_file > 5000000) {
        echo "  <script>
                    alert('leader_photo yang diupload terlalu besar ukurannya !');
                    document.location.href = 'index.php';
                </script>";
        die;
    }


    // Membuat Nama File Baru menjadi random
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_leader_photo;

    // Mengirim file yang diupload ke tempat yang diinginkan
    move_uploaded_file($tmp_name, 'assets/img/' . $nama_file_baru);

    // Hasil dari fungsi upload() mengembalikan nilai nama dari file yang di upload
    return $nama_file_baru;
}

// Hapus
function hapus($id)
{
    global $koneksi_db;
    mysqli_query($koneksi_db, "DELETE FROM project_monitoring WHERE id = $id");
    return mysqli_affected_rows($koneksi_db);
}

// Ubah
function ubah($data)
{
    global $koneksi_db;

    $id = htmlspecialchars($data['id']);
    $project_name = htmlspecialchars($data['project_name']);
    $client = htmlspecialchars($data['client']);
    $leader = htmlspecialchars($data['leader']);
    $leader_email = htmlspecialchars($data['leader_email']);
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $progress = htmlspecialchars($data['progress']);
    $leader_photo_lama = $data['leader_photo_lama'];

    // Cek apakah User mengupload leader_photo baru atau tidak
    if ($_FILES['leader_photo']['error'] === 4) {
        $leader_photo = $leader_photo_lama;
    } else {
        $leader_photo = upload();
    }

    $query = "UPDATE project_monitoring 
                SET project_monitoring.project_name = '$project_name' ,
                    project_monitoring.client = '$client',
                    project_monitoring.leader = '$leader',
                    project_monitoring.leader_email = '$leader_email',
                    project_monitoring.start_date = '$start_date',
                    project_monitoring.end_date = '$end_date',
                    project_monitoring.progress = '$progress',
                    project_monitoring.leader_photo = '$leader_photo'
                WHERE project_monitoring.id = $id";

    mysqli_query($koneksi_db, $query);

    return mysqli_affected_rows($koneksi_db);
}

//Cari
function cari($keyword)
{
    $query = "  SELECT 
                    project_monitoring.*, DATE_FORMAT(start_date, '%k:%i,%d %M %Y') as start_date_formatted, DATE_FORMAT(end_date, '%k:%i,%d %M %Y') as end_date_formatted 
                FROM project_monitoring 
                WHERE 
                    project_name LIKE '%$keyword%' OR
                    client LIKE '%$keyword%' OR
                    leader LIKE '%$keyword%' OR
                    leader_email LIKE '%$keyword%' OR
                    start_date LIKE '%$keyword%' OR
                    end_date LIKE '%$keyword%' OR
                    progress LIKE '%$keyword%'
                ORDER BY 
                    end_date ASC
                    ";
    return query($query);
}
