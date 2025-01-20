<?php
require "./inc/conn.php";

if (isset($_SESSION['username'])) {
  header('location: ./index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nik = $_POST['nik'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM masyarakat WHERE nik=? AND username=? AND password=?";
  $row = $conn->execute_query($sql, [$nik, $username, $password]);

  if (mysqli_num_rows($row) == 1) {
    $_SESSION['nik'] = $nik;
    $_SESSION['username'] = $username;
    header("location: ./index.php");
  } else {
    echo "<script>alert('Gagal Login!')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
require './components/head.php';
echo headElem('Login Pengguna')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md">
      <h1 class="text-3xl mb-8 text-center">Login Masyarakat</h1>
      <?php
      require "./components/input.php";
      echo input('nik', 'text', 'NIK');
      echo input('username', 'text', 'Username');
      echo input('password', 'password', 'Password');

      require "./components/btnSubmit.php";
      echo btnSubmit('Login')
      ?>
      <div>
        <a href="./register.php" class="text-sm font-medium text-blue-700 hover:underline">Ingin buat akun?</a>
      </div>
    </form>
  </div>
</body>

</html>