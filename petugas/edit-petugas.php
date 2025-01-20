<?php
require '../inc/conn.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $id_petugas = $_GET['id'];

  $sql = "SELECT * FROM petugas where id_petugas=?";
  $row = $conn->execute_query($sql, [$id_petugas])->fetch_assoc();

  $nama = $row['nama_petugas'];
  $username = $row['username'];
  $password = $row['password'];
  $telepon = $row['telp'];
  $level = $row['level'];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id_petugas = $_GET['id'];
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $level = $_POST['level'];

  $sql = "UPDATE petugas SET nama_petugas=?, telp=?, level=? WHERE id_petugas=?";
  $row = $conn->execute_query($sql, [$nama, $telepon, $level, $id_petugas]);

  if ($row) {
    header("location:../petugas.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Edit Aduan')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Edit Pengaduan</h1>
      <?php
      require "../components/input.php";
      require "../components/inputDisabled.php";
      require "../components/inputSelect.php";
      require "../components/btnSubmit.php";

      echo inputSelect(
        'level',
        'Level Akses',
        [
          'admin' => 'Admin',
          'petugas' => 'Petugas'
        ],
        $level
      );
      echo input('nama', 'text', 'Nama Petugas', $nama);
      echo input('telepon', 'tel', 'Telepon', $telepon);
      echo inputDisabled('username', 'Username', 'text', $username);
      echo btnSubmit('Submit')
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>