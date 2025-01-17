<?php
require './inc/conn.php';
if (empty($_SESSION['nik']) && empty($_SESSION['level'])) {
  header("location: ./login.php");
}
$nik = $_SESSION['nik'];
$no = 0;
$sql = "SELECT * FROM pengaduan where nik=? order by id_pengaduan desc";
$pengaduan = $conn->execute_query($sql, [$nik])->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<?php
require './components/head.php';
echo headElem('Pengaduan');
?>

<body>
  <div class="antialiased">
    <!-- Navbar -->
    <?php
    require './components/index/nav.php';
    echo navElem('Pengaduan Masyarakat', null)
    ?>
    <!-- Sidebar -->
    <?php
    require './components/index/aside.php';
    echo asideElem([
      'Dashboard' => './index.php',
      'Aduan' => '#'
    ])
    ?>
    <main class="p-4 md:ml-64 h-[100vh] bg-gray-50 pt-20">
      <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
          <!-- Start coding here -->
          <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
              <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="./aduan/tambah-aduan.php" class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                  <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                  </svg>
                  Tambah Aduan
                </a>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-4 py-3">No</th>
                    <th scope="col" class="px-4 py-3">Tanggal Pengaduan</th>
                    <th scope="col" class="px-4 py-3">Isi Laporan</th>
                    <th scope="col" class="px-4 py-3">Status</th>
                    <th scope="col" class="px-4 py-3">Foto</th>
                    <th scope="col" class="px-4 py-3">
                      <span class="sr-only">Actions</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pengaduan as $item) { ?>
                    <tr class="border-b dark:border-gray-700">
                      <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= ++$no ?></th>
                      <td class="px-4 py-3"><?= $item['tgl_pengaduan'] ?></td>
                      <td class="px-4 py-3"><?= $item['isi_laporan'] ?></td>
                      <td class="px-4 py-3"><?= ($item['status'] == '0') ? 'Menunggu' : (($item['status'] == 'proses') ? 'Diproses' : 'Selesai'); ?></td>
                      <td class="px-4 py-3"><img src="./assets/aduan/<?= $item['foto'] ?>" alt="<?= $item['foto'] ?>" width="64px" height="64px"></td>
                      <td class="px-4 py-3 flex items-center justify-end">
                        <button id="<?= $no ?>-dropdown-button" data-dropdown-toggle="<?= $no ?>-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                          </svg>
                        </button>
                        <div id="<?= $no ?>-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="<?= $no ?>-dropdown-button">
                            <li>
                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                            </li>
                            <li>
                              <a href="./aduan/edit-aduan.php?id=<?= $item['id_pengaduan'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                          </ul>
                          <div class="py-1">
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>