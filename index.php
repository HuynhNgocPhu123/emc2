<?php
  // Header
  include_once("includes/header.php");

  // Điều hướng trang dựa vào $_REQUEST
  if (isset($_REQUEST["service"])) {
      if(isset($_REQUEST["detailservice"])){
        include_once("pages/detailservice.php");
      }else{
        include_once("pages/service.php");
      }

  } else if (isset($_REQUEST["project"])) {
      include_once("pages/project.php");

  } else if (isset($_REQUEST["promotion"])) {
      include_once("pages/promotion.php");

  } else if(isset($_REQUEST["news"])){
        if(isset($_REQUEST["detailid"])){
            include_once("pages/newsdetail.php");
        }
        else{
            include_once("pages/news.php");
        }
    } else if (isset($_REQUEST["contact"])) {
      include_once("pages/contact.php");

  } else {
      include_once("pages/home.php"); // Trang mặc định
  }

  // Footer
  include_once("includes/footer.php");
?>

</body>
</html>
