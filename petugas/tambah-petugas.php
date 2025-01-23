<?php
require '../inc/conn.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $telepon = $_POST['telepon'];
  $level = $_POST['level'];

  $sql = "INSERT INTO petugas (nama_petugas, username, password, telp, level) values (?, ?, ?, ?, ?)";
  $row = $conn->execute_query($sql, [$nama, $username, $password, $telepon, $level]);

  if ($row) {
    header("location: ../petugas.php");
  } else {
    echo "<script>alert('Gagal')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Tambah Petugas')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Tambah Petugas</h1>
      <?php
      require "../components/inputSelect.php";
      require "../components/input.php";
      require "../components/btnSubmit.php";

      echo inputSelect('level', 'Level Akses', [
        'admin' => 'Admin',
        'petugas' => 'Petugas'
      ]);
      echo input('nama', 'text', 'Nama Petugas');
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