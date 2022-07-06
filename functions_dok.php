<?php
//koneksi database
$koneksidok = mysqli_connect("localhost", "root", "", "dokumen");

function query($query){
    global $koneksidok;
    $result = mysqli_query($koneksidok, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $koneksidok;

    $urai = htmlspecialchars($data["urai"]);
    
    //upload gambar
    $file = upload();
    if(!$file) {
        return false;
    }

    $query = "INSERT INTO data
    VALUES
    ('', '$urai', '$file')";
    mysqli_query($koneksidok, $query);

    return mysqli_affected_rows($koneksidok);
}


function upload() {
    $namaFile = $_FILES['file']['name'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if($error === 4){
        echo "
        <script>
        alert('pilih gambar dulu!');
        </script>";
        return false;
    }

    //cek file yang diupload apakah hanya file yang terkait dan bukan file berbahaya
    $ekstensiFileValid = ['jpg', 'png', 'jpeg', 'pdf', 'rar', 'zip', 'doc', 'xlsx', 'xls', 'tif'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)){
        echo "
        <script>
        alert('yang anda upload bukan file terkait!');
        </script>";
        return false;
    }

    //generate nama file baru
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiFile;

    //lolos pengecekan
    move_uploaded_file($tmpName, 'database-dok/' . $namaFilebaru);

    return $namaFilebaru;
}


function hapus($id) {
    global $koneksidok;
    mysqli_query($koneksidok, "DELETE FROM data WHERE id = $id");
    return mysqli_affected_rows($koneksidok);
}

function ubah($data) {
    global $koneksidok;

    $id = $data["id"];
    $urai = htmlspecialchars($data["urai"]);
    $fileLama = htmlspecialchars($data["fileLama"]);

    //cek apakah user memilih file baru atau tidak
    if($_FILES['file']['error'] === 4){
        $file = $fileLama;
    } else {
        $file = upload();
    }


    $query = "UPDATE data SET uraian = '$urai', data = '$file'
                WHERE id = $id
                ";
    mysqli_query($koneksidok, $query);

    return mysqli_affected_rows($koneksidok);
}

function cari($keyword){
    $query = "SELECT * FROM data 
                WHERE
            uraian LIKE '$keyword%'
            ";
    return query($query);
}
?>