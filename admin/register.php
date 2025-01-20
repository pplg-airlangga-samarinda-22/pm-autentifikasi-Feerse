<?php
require "../inc/conn.php";

if (isset($_SESSION['username'])) {
  header('location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $username = $_POST['username'];

  $sql = "SELECT * FROM petugas WHERE username=?";
  $cek = $conn->execute_query($sql, [$username]);

  if (mysqli_num_rows($cek) == 1) {
    echo "<script>alert('Username sudah digunakan!')</script>";
  } else {
    $nama_petugas = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telepon'];
    $level = $_POST['level'];
    $sql = "INSERT INTO petugas SET nama_petugas=?, username=?, password=?, telp=?, level=?";
    $conn->execute_query($sql, [$nama_petugas, $username, $password, $telp, $level]);

    echo "<script>alert('Pendaftaran Berhasil!')</script>";
    header("location: ./login.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require '../components/head.php';
echo headElem('Registrasi Admin')
?>

<body>
  <!-- <h1>Registrasi Admin</h1>
  <form action="#" method="post">
    <div class="form-item">
      <label for="nama">Nama Admin</label>
      <input type="text" name="nama" id="nama" required />
    </div>
    <div class="form-item">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required />
    </div>
    <div class="form-item">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required />
    </div>
    <div class="form-item">
      <label for="telepon">Telepon</label>
      <input type="tel" name="telepon" id="telepon" required />
    </div>
    <button type="submit">Register</button>
  </form>
  <a href="./login.php">Login</a> -->
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-50 w-3/4 p-20 rounded-md">
      <h1 class="text-center text-3xl mb-8">Registrasi Akun Admin/Petugas</h1>
      <?php
      require '../components/inputFloat.php';
      require '../components/btnSubmit.php';
      require '../components/inputSelect.php';

      echo inputFloat('nama', 'text', 'Nama Admin');
      echo inputFloat('username', 'text', 'Username');
      echo inputFloat('password', 'password', 'Password');
      echo inputFloat('telepon', 'tel', 'Telepon');
      echo inputSelect('level', 'Role', [
        'admin' => 'Admin',
        'petugas' => 'Petugas',
      ]);

      echo btnSubmit('Submit')
      ?>
    </form>
  </div>
</body>

</html>