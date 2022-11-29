<?php 
$koneksi = mysqli_connect('localhost','root','','db_sekolahcn');
function query($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi,$query);
    $kotakbesar=[];
    while ($kotakkecil = mysqli_fetch_assoc($hasil)){
        $kotakbesar [] = $kotakkecil;
    }
    return $kotakbesar;
}

function tambah($post){
    global $koneksi;

    $nama =$post['nama'];
    $nisn =$post['nisn'];
    $jurusan =$post['jurusan'];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $sql = "INSERT INTO tbl_siswa VALUES (
        '','$nama','$nisn','$jurusan','$gambar')";

    mysqli_query($koneksi,$sql);

    return mysqli_affected_rows($koneksi);

   }
    
function hapus($id){
    global $koneksi;
    mysqli_query ($koneksi,"DELETE FROM tbl_siswa WHERE id =$id");

    return mysqli_affected_rows($koneksi);
}

   function upload(){
       $namafile=$_FILES["gambar"]["name"];
       $ukuranfile=$_FILES["gambar"]["size"];
       $error=$_FILES["gambar"]["error"];
       $tmpname=$_FILES["gambar"]["tmp_name"];
    
       if ($error === 4){
           echo "
           <script>
           alert('pilih gambar dulu tsayy');
           </script>";
       }

       $ekstensivalid=['jpg','png','jpeg','gif'];
       $ekstensigambar= explode('.',$namafile);
       $ekstensigambar= strtolower (end($ekstensigambar));
      
       if(!in_array($ekstensigambar,$ekstensivalid)){
           echo "
            <script>
            alert('ekstensi gambar salah');
           </script>";
           return false;
       }
       if ($ukuranfile > 2000000){
        echo "
        <script>
        alert('ukuran gambar terlalu besar');
       </script>";
           return false;
       }
       $namafilebaru= uniqid();
       $namafilebaru .='.';
       $namafilebaru .=$ekstensigambar;

       move_uploaded_file($tmpname,'img/' . $namafilebaru);
       return $namafilebaru;
}
    function ubah($post){
        global $koneksi;

        $id=htmlspecialchars($post["id"]);
        $nama=htmlspecialchars($post["nama"]);
        $nisn=htmlspecialchars($post["nisn"]);
        $jurusan=htmlspecialchars($post["jurusan"]);
        $gambarlama=htmlspecialchars($post["gambarlama"]);

        if ($_FILES ["gambar"]["error"] === 4){
            $gambar = $gambarlama;
        }else{
            $gambar = upload();
        }
        $sql = "UPDATE tbl_siswa SET 
        nama ='nama',
        nisn ='nisn',
        jurusan ='jurusan',
        gambar ='gambar'

        WHERE id =$id";
        
        mysqli_query($koneksi,$sql);
        return mysqli_affected_rows($koneksi);
    }
?>