<?php
require "koneksi.php";
session_start();

if (isset($_SESSION['nik'])) {
  header('location:index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nik = $_POST['nik'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM masyarakat WHERE nik=? AND username=? AND password=?";
  $row = $koneksi->execute_query($sql, [$nik, $username, $password]);

  if (mysqli_num_rows($row) == 1) {
    $_SESSION['nik'] = $nik;
    header("location:index.php");
  } else {
    echo "<script>alert('Gagal Login!')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <form action="#" method="post" class="form-login">
    <h1>Silakan Login</h1>
    <div class="form-item">
      <label for="nik">NIK</label>
      <input type="text" name="nik" id="nik" required />
    </div>
    <div class="form-item">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required />
    </div>
    <div class="form-item">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required />
    </div>
    <button type="submit">Login</button>
  </form>
  <a href="register.php">Register</a>
</body>

</html>