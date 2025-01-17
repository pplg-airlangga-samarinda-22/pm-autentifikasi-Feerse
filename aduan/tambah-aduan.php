<?php
require '../inc/conn.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $tanggal = date('Y-m-d');
  $nik = $_SESSION['nik'];
  $laporan = $_POST['isi_laporan'];
  $foto = (isset($_FILES['foto'])) ? $_FILES['foto']['name'] : "";
  $status = 0;

  $sql = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) values (?, ?, ?, ?, ?)";
  $row = $conn->execute_query($sql, [$tanggal, $nik, $laporan, $foto, $status]);

  if (!empty($foto)) {
    move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/aduan/' . $_FILES['foto']['name']);
  }

  if ($row) {
    echo "<script>alert('Pengaduan baru telah berhasil disimpan!')</script>";
    header("location:../aduan.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Tambah Aduan')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Tambah Pengaduan</h1>
      <?php
      require "../components/inputDate.php";
      require "../components/inputTextArea.php";
      require "../components/inputFile.php";
      require "../components/inputSelect.php";
      require "../components/submitBtn.php";

      echo inputTextArea('isi_laporan', 'Isi Laporan', 'Masukkan isi laporan Anda disini...');
      echo inputFile('Upload Foto Aduan', '', 'foto');
      echo submitBtn('Submit')
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>