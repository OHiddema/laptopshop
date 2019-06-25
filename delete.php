<?php
require_once('connect.php');

$id = $_GET['id'];

try {
   $stmt = $conn->prepare('DELETE FROM laptops WHERE id=:id');
   $stmt->execute(['id' => $id]);
   }
catch(PDOException $e)
   {
   echo 'DELETE FROM query' . "<br>" . $e->getMessage();
   }
$conn = null;

// redirect
$page = '?page=viewall.php';
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
echo "<script>window.location = 'http://$host$uri/$page' ;</script>";
exit;
?>