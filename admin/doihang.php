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
                        <!-- <h2 class="mt-4">Xác nhận yêu cầu đổi hàng</h2> -->
                       
                        <BR/>
                        <div class="card mb-4">
                            <br/> <h1 style="text-align:center">YÊU CẦU ĐỔI HÀNG </h1>
</br>
                            <div class="card-header">

                            <i class="fas fa-home"></i><a style="text-decoration:none; color:black"href="index.php"><b>Trang chủ</b></a>
                                || Danh sách yêu cầu xác nhận
                            <i class="fas fa-table me-1"></i>
                               
                            </div>
                            <div class="card-body" >
                             
                        
 <!-- đổi hàng -->

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
                                            <th>ID</th>
                                            <th>Mã phiếu</th>
                                            <th>Nhân viên lập phiếu</th>
                                            <th>Ngày lập phiếu</th>
                                            <th>Xem chi tiết</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                            include("config/connection.php");
                                        
                                        
                                            $sql_select2 = mysqli_query($con,"SELECT * FROM tbl_doihang as a ,tbl_nhanvien as b, tbl_chitietdh as d
                                            WHERE a.maNVDH=b.maNV AND a.maBBDH=d.maBBDH and a.tinhtrangdh = 'Từ chối' or a.tinhtrangdh='Đã xử lý' or a.tinhtrangdh='Chưa xử lý' GROUP BY a.maBBDH ORDER BY ngaylap DESC"); 
                            
                                            $sql2 = "
                                            SELECT * from tbl_doihang as a join tbl_nhanvien as b on a.maNVDH=b.maNV where a.tinhtrangdh= ' ' or a.tinhtrangdh='Chưa xử lý';";
                                            $tintuc2 = $con -> query($sql2);
                                            $i=0;
                                            while ($row2 = $tintuc2 ->fetch_assoc()) {
                                            $i++;
                                        ;?>

                                          <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row2["maBBDH"];?></td>
                                            <td><?php echo $row2["tenNV"];?></td>
                                            <td><?php echo $row2["ngaylap"];?></td>
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
     
                                       
                                            <td><a class="btn btn-danger" style="color:white" href="xemchitietBBDH_xacnhan.php?maBBDH=<?php echo $row2["maBBDH"];?>">Xác nhận</a></td>
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

                                        </tr>
                                        <?php
                                    }
                                    ;?>


                                </tbody>
                                </table>                              

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