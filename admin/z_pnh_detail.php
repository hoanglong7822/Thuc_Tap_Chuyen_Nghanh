<style>
table, th, td {
  border: 1px solid black;
}
</style>
<?php 
    // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
    session_start();
    ob_start();
    if(!isset($_SESSION['dangnhap_home'])) {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không được phép truy cập');
                window.location.href='dangnhap.php';
            </script>
        ";
    }
;?>
<!DOCTYPE html>
<html lang="en">
<html lang="en">
<?php include("adminHeader.php"); ?>
<body class="sb-nav-fixed">
    <!-- nav-->
    <?php include("layout/nav.php"); ?>
    <div id="layoutSidenav">
        <!-- layoutSidenav_nav-->
        <?php   include("layout/aside.php"); ?>

        <div id="layoutSidenav_content">

            <footer class="container-fluid px-4">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Phiếu nhập hàng</h2>
                        
                        <div class="card mb-4">
                            <div class="card-header">  
                                <i class="fas fa-home"> </i> <a style="text-decoration:none; color:black" href="index.php"> <b>Trang chủ</b></a>
                            </div>
                            <div class="card-body" >
                                 <h5 style="text-align:center"> <B>NHẬP HÀNG </B></h5>
                                <table  id="datatablesSimple" >
                                    <thead>
                                        <tr >
                                            <th>ID</th>
                                            <th>Mã phiếu</th>
                                            <th >Nhân viên lập phiếu</th>
                                            <th >Ngày lập phiếu</th>
                                            <th>Xem chi tiết</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mã phiếu</th>
                                            <th>Nhân viên lập phiếu</th>
                                            <th>Ngày lập phiếu</th>
                                            <th>Xem chi tiết</th>
                                         </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include("config/connection.php");
                                        
                                            // $sql_select1 = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a ,tbl_nhanvien as b, tbl_chitietpxh as d
                                            // WHERE a.maNV=b.maNV AND a.maPXH=d.maPXH and a.tinhtrang = 'Từ chối' or a.tinhtrang='Đã xử lý' or a.tinhtrang='Chưa xử lý' GROUP BY a.maPXH ORDER BY ngaylap DESC"); 
                            
                                            $sql = "
                                            SELECT * from tbl_phieunhaphang as a join tbl_nhanvien as b on a.maNV=b.maNV;";
                                            $tintuc = $con -> query($sql);
                                            $i=0;
                                            while ($row = $tintuc ->fetch_assoc()) {
                                            $i++;

                                           
                                        ;?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["maPNH"];?></td>
                                            
                                            <td><?php echo $row["tenNV"];?></td>
                                            
                                            <td><?php echo $row["ngaylap"];?></td>
                                         
                                            <td><a class="btn btn-danger" style="color:white" href="z_pnh_view_detail.php?maPNH=<?php echo $row["maPNH"];?>">Chi tiết</a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>  
                                    </table>

                               
                                
                        
                        
 <!-- đổi hàng -->
 
</div>
                    </div>
                </div>
            </main>
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">


                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    function Del(name){
        return confirm('Bạn muốn từ chối xuất hàng cho phiếu mã số: ' + name + "?");
    }
</script>
<?php include("adminFooter.php"); ?>
</body>
</html>