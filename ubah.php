<?php 
require 'function.php';

$id= $_GET['id'];

$sws=query("SELECT * FROM  tbl_siswa WHERE id=$id")[0];

if(isset ($_POST['tekan'])){
    if(ubah($_POST)> 0){
     echo "<script>
     alert('data berhasil diubah');
     document.location.href = 'index.php';
     </script>";
    }else{
        echo "<script>
        alert('data gagal diubah');
        document.location.href = 'index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah</title>
</head>
<body>
    <h1>ubah data siswa</h1>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$sws['id'];?>">
        <input type="hidden" name="gambarlama" value="<?=$sws['gambar'];?>">
        <ul>
        <li>
            <label>nama:</label>
            <input type="text" name="nama"  value="<?=$sws['nama'];?>">
            </li><br><br>
            <li>
            <label>nisn:</label>
            <input type="text" name="nisn"  value="<?=$sws['nisn'];?>">
            </li><br><br>
            <li>
            <label>jurusan:</label>
            <input type="text" name="jurusan" value="<?=$sws['jurusan'];?>">
            </li><br><br>
            <li>
            <label>gambar:</label>
            <img src="img/<?=$sws['gambar'];?>" width="100">
            <input type="file" name ="gambar">
            </li><br><br>
            <button type="submit" name="tekan">kirim</button>
        </ul>
    </form>
</body>
</html>