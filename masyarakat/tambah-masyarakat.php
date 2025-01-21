<?php
require '../inc/conn.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $nik = $_POST['nik'];
  $sql = "SELECT * FROM masyarakat WHERE nik=?";
  $cek = $conn->execute_query($sql, [$nik]);

  if ($cek->num_rows == 1) {
    echo "<script>alert('NIK sudah digunakan!')</script>";
  } else {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO masyarakat (nik, nama, telp, username, password) values (?, ?, ?, ?, ?)";
    $row = $conn->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);

    if ($row) {
      header('location: ../masyarakat.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Tambah Masyarakat')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Tambah Data Masyarakat</h1>
      <?php
      require "../components/input.php";
      require "../components/btnSubmit.php";

      echo input('nik', 'text', 'NIK');
      echo input('nama', 'text', 'Nama Masyarakat');
      echo input('telepon', 'tel', 'Telepon');
      echo input('username', 'text', 'Username');
      echo input('password', 'password', 'Password');
      echo btnSubmit('Submit')
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>