<?php 
require 'function.php';
if(isset ($_POST ["tekan"]))
if(tambah ($_POST)> 0){
     echo"
     <script>
      alert('data berhasil ditambah')
      document.location.href = 'index.php';
      </script>
     ";
 } else {
     echo "
     <script>
     alert('data gagal ditambah')
     </script>
     ";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>form tambah</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label>nama:</label>
                <input type="text" name="nama">
            </li><br><br>
            <li>
                <label>nisn:</label>
                <input type="text" name="nisn">
            </li><br><br>
            <li>
                <label>jurusan:</label>
                <input type="text" name="jurusan">
            </li><br><br>
            <li>
                <label>gambar:</label>
                <input type="file" name ="gambar">
            </li><br><br>
            <button type="submit" name="tekan">kirim</button>
        </ul>
    </form>
</body>
</html>
