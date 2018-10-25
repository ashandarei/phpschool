<?php
$PageTitle = isset($_GET['route']) ? htmlspecialchars($_GET['route']) : "Index";
?>

<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?php echo $PageTitle ?></title>
    <link rel="stylesheet" href="style/styles.css">
  </head>
  <body>
