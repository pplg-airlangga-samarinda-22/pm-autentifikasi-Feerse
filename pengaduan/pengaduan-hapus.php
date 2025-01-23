<?php
require '../inc/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];

  $sql = "DELETE FROM pengaduan WHERE id_pengaduan=?";
  $row = $conn->execute_query($sql, [$id]);

  header('location: ../pengaduan.php');
}
