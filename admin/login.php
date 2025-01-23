<?php
require "../inc/conn.php";

if (isset($_SESSION['username'])) {
  header('location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM petugas WHERE username=? AND password=?";
  $row = $conn->execute_query($sql, [$username, $password]);
  $data = $row->fetch_assoc();

  if (mysqli_num_rows($row) == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $data['level'];
    $_SESSION['id'] = $data['id_petugas'];

    header("location: ../index.php");
  } else {
    echo "<script>alert('Gagal Login!')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
require '../components/head.php';
echo headElem('Login Admin')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md">
      <h1 class="text-3xl mb-8 text-center">Login Admin/Petugas</h1>
      <?php
      require '../components/input.php';
      require '../components/btnSubmit.php';

      echo input('username', 'text', 'Username');
      echo input('password', 'password', 'Password');

      echo btnSubmit('Login')
      ?>
    </form>
  </div>
</body>

</html>