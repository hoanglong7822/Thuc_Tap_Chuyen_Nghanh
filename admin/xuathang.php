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
                        <!-- <h2 class="mt-4">Xác nhận yêu cầu xuất hàng</h2> -->
                       <br/> 
                        <div class="card mb-4">
                            <br/><h1 style="text-align:center">  YÊU CẦU XUẤT HÀNG </h1>
                            <br/><div class="card-header">  
                                <i class="fas fa-home"> </i> <a href="index.php" style="text-decoration:none; color:black"><b>Trang chủ</b></a>
                                || <i class="fas fa-table me-1"></i> Danh sách yêu cầu xác nhận
                            </div> 
                            <div class="card-body" >
                                
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
                                        
                                            $sql_select1 = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a ,tbl_nhanvien as b, tbl_chitietpxh as d
                                            WHERE a.maNV=b.maNV AND a.maPXH=d.maPXH and a.tinhtrang = 'Từ chối' or a.tinhtrang='Đã xử lý' or a.tinhtrang='Chưa xử lý' GROUP BY a.maPXH ORDER BY ngaylap DESC"); 
                            
                                            $sql = "
                                            SELECT * from tbl_phieuxuathang as a join tbl_nhanvien as b on a.maNV=b.maNV where a.tinhtrang= ' ' or a.tinhtrang='Chưa xử lý';";
                                            $tintuc = $con -> query($sql);
                                            $i=0;
                                            while ($row = $tintuc ->fetch_assoc()) {
                                            $i++;
                                        ;?>
                                        
               
                                
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["maPXH"];?></td>
                                            
                                            <td><?php echo $row["tenNV"];?></td>
                                            
                                            <td><?php echo $row["ngaylap"];?></td>
<!-- PHÂN QUYỀN -->
<?php
    include("config/connection.php");
        $sql = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK where tennguoidung='".$_SESSION['ten_admin']."'";
        $kq = mysqli_query($con, $sql);
        $rowql = mysqli_fetch_array($kq);
    if ($rowql['maCV']=="2") 
    {
        $check=1;
    }
    else
        $check=0;
;?>

<?php 
    $sql26 = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK ";
    $ket_qua26 = mysqli_query($con, $sql26);
    $row1 = mysqli_fetch_array($ket_qua26);
    if($row1['maCV']=="2") $kiem_tra26=1;
    else $kiem_tra26=0;
;?>
<!--  -->
<?php
    if($check==1 && $kiem_tra26!=1)
    {
;?>
                    

                                         
                                            <td><a class="btn btn-danger" style="color:white" href="xemchitietdonhang_xacnhan.php?maPXH=<?php echo $row["maPXH"];?>">Xác nhận</a></td>
                                            <?php 
}
else
{
;?>     
                                            <td><a class="btn btn-danger" style="color:white" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Xác nhận</a></td>
                                            <?php
}
;?>
<?php
;?>

                                             <!-- <td><a class="btn btn-danger" style="color:white" href="" onclick="alert('Bạn không có quyền xác nhận')">Xác nhận</a></td> -->
                                        

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