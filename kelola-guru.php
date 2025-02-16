<?php
include("config.php");
$id_guru = '';
$nama = '';
$alamat = '';
$jenis_kelamin = '';
$no_telepon = '';
$email = '';

if(isset($_GET['edit'])){
    $id_guru = $_GET['edit'];
    $sql = "SELECT * FROM guru WHERE id_guru='$id_guru';";
    $query = mysqli_query($db, $sql);
  
    $result = mysqli_fetch_assoc($query);
    $nama = $result ['nama'];
    $alamat = $result ['alamat'];
    $jenis_kelamin = $result ['jenis_kelamin'];
    $no_telepon = $result ['no_telepon'];
    $email = $result ['email'];
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Cisarua</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMK Negeri 1 Cisarua</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="kelola.php">Pendaftaran</a>
        <a class="nav-link" href="index-guru.php">Data Guru</a>
        <a class="nav-link" href="data-upload.php">Data Upload</a>
        <a class="nav-link" href="logout.php">Logout</a>
      
      </div>
    </div>
  </div>
</nav>
<div class="container mt-4">
<h2>Formulir Pendaftaran Siswa SMK Negeri 1 Cisarua</h2><br>
<form action="proses-guru.php" method="POST">
<input type= "hidden" value="<?php echo $id_guru;?>" name="id_guru">

<div class="mb-3">
    <label for="nama" class="form-label">Nama: </label>
    <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>" placeholder=
    "Nama lengkap"/>
    </div>

    <div class="mb-3">
    <label for="alamat" class="form-label">Alamat: </label>
    <textarea class="form-control" name="alamat" rows="3"><?php echo $alamat ?></textarea>
</div>

    <div class="mb-3">
    <div class="form-check">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label><br>
    <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($jenis_kelamin == 'laki-laki'){echo "checked";}?> value="laki-laki">
    <label class="form-check-label" for="laki-laki">Laki-Laki</label><br>
    <input class="form-check-input" type="radio" name="jenis_kelamin" <?php if($jenis_kelamin == 'perempuan'){echo "checked";}?> value="perempuan">
    <label class="form-check-label" for="perempuan">Perempuan</label><br>
</div>
</div>

<div class="mb-3">
<label for="no_telepon" class="form-label">No Telepon: </label>
<input type="text" class="form-control" name="no_telepon" value="<?php echo $no_telepon; ?>" placeholder="No Telepon"/>
</div>

<div class="mb-3">
<label for="email" class="form-label">Email: </label>
<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email"/>
</div>

<div class="mb-3 row mt-4"> 
  <div class="col">
    <?php
    if(isset($_GET['edit'])){
        ?>
        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
        Simpan perubahan
    </button>
    <?php
    }else{
      ?>
      <button type="submit" name="aksi" value="add" class="btn btn-primary">
        Daftar
    </button>
    <?php
    }
    ?>
    <a href="index-guru.php" type="button" class="btn btn-danger">Batal</a>
    </div>
    </div>
</form>
</div>
</body>
</html>