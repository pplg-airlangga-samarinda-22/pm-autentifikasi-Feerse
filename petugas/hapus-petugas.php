<?php
require '../inc/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];
  $sql = "DELETE FROM petugas WHERE id_petugas=?";
  $row = $conn->execute_query($sql, [$id]);

  if ($row) {
    header("Location: ../petugas.php");
  }
}
