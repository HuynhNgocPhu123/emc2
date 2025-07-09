<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EMC Group</title>

  <!-- CSS -->
  <!-- <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/page-style.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php
  // Header
  include_once("includes/header.php");

  // Điều hướng trang dựa vào $_REQUEST
  if (isset($_REQUEST["service"])) {
      include_once("pages/service.php");

  } else if (isset($_REQUEST["project"])) {
      include_once("pages/project.php");

  } else if (isset($_REQUEST["promotion"])) {
      include_once("pages/promotion.php");

} else if (isset($_REQUEST["new"])) {
        include_once("pages/new.php");

  } else if (isset($_REQUEST["blog"])) {
      include_once("pages/blog.php");

  } else if (isset($_REQUEST["contact"])) {
      include_once("pages/contact.php");

  } else if (isset($_REQUEST["detailservice"])) {
      include_once("pages/detailservice.php");

  } else {
      include_once("pages/home.php"); // Trang mặc định
  }

  // Footer
  include_once("includes/footer.php");
?>

</body>
</html>
