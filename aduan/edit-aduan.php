<?php
require '../inc/conn.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $id_pengaduan = $_GET['id'];

  $sql = "SELECT * FROM pengaduan where id_pengaduan=?";
  $row = $conn->execute_query($sql, [$id_pengaduan])->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $tanggal = date('Y-m-d');
  $id_pengaduan = $_GET['id'];
  $laporan = $_POST['isi_laporan'];

  $sql_get = "SELECT foto FROM pengaduan WHERE id_pengaduan=?";
  $data = $conn->execute_query($sql_get, [$id_pengaduan])->fetch_assoc();
  $foto_lama = $data['foto'];

  if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/aduan/' . $foto);
  } else {
    $foto = $foto_lama;
  }

  $sql = "UPDATE pengaduan SET tgl_pengaduan=?, isi_laporan=?, foto=? WHERE id_pengaduan=?";
  $row = $conn->execute_query($sql, [$tanggal, $laporan, $foto, $id_pengaduan]);

  if ($row) {
    echo "<script>alert('Pengaduan telah berhasil disimpan!')</script>";
    header("location:../aduan.php");
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
      require "../components/inputDate.php";
      require "../components/inputTextArea.php";
      require "../components/inputFile.php";
      require "../components/inputSelect.php";
      require "../components/submitBtn.php";

      echo inputTextArea('isi_laporan', 'Isi Laporan', 'Masukkan isi laporan Anda disini...', $row['isi_laporan']);
      ?>
      <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pratinjau Gambar Sekarang</p>
      <img src="../assets/aduan/<?= $row["foto"] ?>" alt="<?= $row["foto"] ?>" class="rounded-md mb-5">
      <?php
      echo inputFile('Upload Foto Aduan', '', 'foto');
      echo submitBtn('Submit')
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>