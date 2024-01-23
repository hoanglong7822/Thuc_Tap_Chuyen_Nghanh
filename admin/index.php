<?php 
    // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
session_start();
ob_start();
if(!isset($_SESSION['dangnhap_home'])) {
    echo "
    <script type='text/javascript'>

    window.location.href='dangnhap.php';
    window.alert('Bạn không được phép truy cập');
    </script>
    ";
}
;?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<?php include("adminHeader.php"); ?>
<body class="sb-nav-fixed">
    <!-- nav-->
    <?php include("layout/nav.php"); ?>
    <div id="layoutSidenav">
        <!-- layoutSidenav_nav-->
        <?php   include("layout/aside.php"); ?>
        <?php   include("config/connection.php"); ?>

        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <h1 class="mt-4" style="text-align: center;">Quản lí cửa hàng</h1>

                    <br>
                        <a href="xuathang.php" style="color: black">
                        <div style="background-color: #9799BA;text-align: center;border-radius: 12px; margin: 10px;width: 23%; float: left;padding: 10px">
                            <i class="fab fa-telegram-plane"></i>
                            <?php 
                            $sql1="SELECT count(maPXH) as a from tbl_phieuxuathang where tinhtrang='' or tinhtrang='Chưa xử lý'";
                            $r1=$con->query($sql1);
                            $row1=$r1->fetch_assoc()
                            ?>
                            <div class="stats">
                              <h5><strong><?php echo $row1['a']; ?></strong></h5>
                              <span>Số phiếu xuất hàng <br>chưa được xử lý</span>
                            </div>
                        </div>
                        </a>

                        <a href="doihang.php" style="color: black">
                        <div style="background-color: #6099BA;text-align: center;border-radius: 12px; margin: 10px;width: 23%; float: left;padding: 10px">
                            <i class="fas fa-pencil-alt"></i>
                            <?php 
                            $sql2="SELECT count(maBBDH) as b from tbl_doihang where tinhtrangdh='' or tinhtrangdh='Chưa xử lý'";
                            $r2=$con->query($sql2);
                            $row2=$r2->fetch_assoc()
                            ?>
                            <div class="stats">
                              <h5><strong><?php echo $row2['b']; ?></strong></h5>
                              <span>Số biên bản đổi hàng <br>chưa được xử lý</span>
                            </div>
                        </div>
                        </a>

                        <a href="sanpham.php" style="color: black">
                            <div style="background-color: #FEADB9;text-align: center;border-radius: 12px; margin: 10px;width: 23%; float: left; padding: 10px">
                                <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                                <?php


                                $sql_products_nums="SELECT COUNT(maSP) as 'so san pham' FROM tbl_sanpham ;";
                                $result_products_nums=$con -> query($sql_products_nums);
                                $row_products_nums=$result_products_nums->fetch_assoc()

                                ?>
                                <div class="stats">
                                  <h5><strong><?php echo $row_products_nums['so san pham']; ?></strong></h5>
                                  <span>Số lượng sản phẩm  <br> đang kinh doanh</span>
                              </div>
                            </div>
                        </a>
                        <a href="khachhang.php" style="color: black">
                            <div style="background-color: #84B4C8;text-align: center;border-radius: 12px; margin: 10px;width: 23%; float: left;padding: 10px">
                            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                                <?php 

                                $sql_customer_nums="SELECT COUNT(*) as 'so khach hang' FROM tbl_khachhang;";
                                $result_customer_nums=$con -> query($sql_customer_nums);
                                $row_customer_nums=$result_customer_nums->fetch_assoc()

                                ?>
                                <div class="stats">
                                  <h5><strong><?php echo $row_customer_nums['so khach hang']; ?></strong></h5>
                                  <span>Số tài khoản khách hàng<br> đã đăng kí</span>

                                </div>

                            </div>
                        </a>

                                                        <?php 
                                $query = "SELECT c.tenSP,b.maSP, sum(b.soluong) as sl_nhap
                                FROM tbl_phieunhapkho 
                                as a INNER join tbl_chitietpnk as b
                                 on a.maPNK=b.maPNK 
                                 INNER join tbl_sanpham as c 
                                 on b.maSP=c.maSP 
                                 WHERE ngaylap BETWEEN '2023-05-02' and '2023-06-12'
                                  GROUP by b.maSP
                                  order by sl_nhap ASC" ;
                                $result = mysqli_query($con, $query);
                                $chart_data = '';
                                while($row = mysqli_fetch_array($result))
                                {
                                $chart_data .= "{ name:'".$row["tenSP"]."', soluong:".$row["sl_nhap"]."}, ";
                                }
                                $chart_data = substr($chart_data, 0, -2);
                                ?>
                                <div class="container" style="width:900px;">
                                <h3 align="center">Top 5 sản phẩm nhập</h3>
                                <br /><br />
                                <div id="chart"></div>
                                </div>
            </div>
        </main>
        <?php //include("layout/footer.php"); ?>
    </div>
</div>
<?php include("adminFooter.php"); ?>

</body>
</html>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'name',
 ykeys:['soluong'],
 labels:['soluong'],
 hideHover:'auto',
 stacked:true
});
</script>
