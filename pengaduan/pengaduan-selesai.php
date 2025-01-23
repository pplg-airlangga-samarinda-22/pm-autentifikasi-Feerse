<?php
require '../inc/conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];
  $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
  $row = $conn->execute_query($sql, [$id])->fetch_assoc();
  $laporan = $row['isi_laporan'];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id_petugas = $_SESSION['id'];
  $id_pengaduan = $_GET['id'];
  $tanggal = date('Y-m-d');
  $tanggapan = $_POST['tanggapan'];
  $status = 'selesai';

  $sql = "UPDATE pengaduan SET status=? WHERE id_pengaduan=?";
  $row = $conn->execute_query($sql, [$status, $id_pengaduan]);

  $sql = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) values (?, ?, ?, ?)";
  $row = $conn->execute_query($sql, [$id_pengaduan, $tanggal, $tanggapan, $id_petugas]);

  if ($row) {
    header('location: ../pengaduan.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Tanggapi Pengaduan')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Tanggapi Pengaduan</h1>
      <?php
      require "../components/inputTextArea.php";
      require "../components/btnSubmit.php";

      echo inputTextArea('laporan', 'Isi Laporan', '', $laporan, true);
      echo inputTextArea('tanggapan', 'Isi Tanggapan', 'Tanggapan');
      echo btnSubmit('Submit')
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>