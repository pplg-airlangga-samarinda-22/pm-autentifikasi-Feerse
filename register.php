<?php
require "./inc/conn.php";

if (isset($_SESSION['username'])) {
  header('location: ./index.php');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $nik = $_POST['nik'];

  $sql = "SELECT * FROM masyarakat WHERE nik=?";
  $cek = $conn->execute_query($sql, [$nik]);

  if (mysqli_num_rows($cek) == 1) {
    echo "<script>alert('NIK sudah digunakan!')</script>";
  } else {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO masyarakat SET nik=?, nama=?, telp=?, username=?, password=?";
    $conn->execute_query($sql, [$nik, $username, $telepon, $username, $password]);

    echo "<script>alert('Pendaftaran Berhasil!')</script>";
    header("location: ./login.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require './components/head.php';
echo headElem('Registrasi Pengguna')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-50 w-3/4 p-20 rounded-md">
      <h1 class="text-center text-3xl mb-8">Registrasi Akun Masyarakat</h1>
      <?php
      require './components/inputFloat.php';
      require './components/btnSubmit.php';

      echo inputFloat('nik', 'text', 'NIK');
      echo inputFloat('username', 'text', 'Username');
      echo inputFloat('telepon', 'tel', 'Telepon');
      echo inputFloat('password', 'password', 'Password');

      echo btnSubmit('Submit')
      ?>
      <div>
        <a href="./login.php" class="text-sm font-medium text-blue-700 hover:underline">Sudah punya akun?</a>
      </div>
    </form>
  </div>
</body>

</html>