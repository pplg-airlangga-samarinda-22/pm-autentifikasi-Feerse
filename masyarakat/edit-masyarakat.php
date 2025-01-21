<?php
require '../inc/conn.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $nik = $_GET['nik'];

  $sql = "SELECT * FROM masyarakat where nik=?";
  $row = $conn->execute_query($sql, [$nik])->fetch_assoc();

  $nama = $row['nama'];
  $username = $row['username'];
  $telepon = $row['telp'];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $nik = $_GET['nik'];
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];

  $sql = "UPDATE masyarakat SET nama=?, telp=? WHERE nik=?";
  $row = $conn->execute_query($sql, [$nama, $telepon, $nik]);

  if ($row) {
    header("location:../masyarakat.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Edit Masyarakat')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Edit Data Masyarakat</h1>
      <?php
      require "../components/input.php";
      require "../components/inputDisabled.php";
      require "../components/btnSubmit.php";

      echo inputDisabled('nik', 'NIK', 'text', $nik);
      echo input('nama', 'text', 'Nama Masyarakat', $nama);
      echo input('telepon', 'tel', 'Telepon', $telepon);
      echo inputDisabled('username', 'Username', 'text', $username);
      echo btnSubmit('Submit')
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>