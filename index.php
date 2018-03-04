<?php
session_start();
if(empty($_SESSION)){
    //echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "inc/head.php";?>
        <?php include "inc/connection.php" ?>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <?php include "inc/sidebar.php"; ?>

            <!-- Page Content Holder -->
            <div id="content">
                <a href="#" id="sidebarCollapse" ><i class="fa fa-navicon fa-2x"></i></a> 

              

                <?php include "buka_file.php"; ?>
            </div>
            
        </div>
        
        <?php include "inc/footer.php"; ?>
    </body>
</html>
