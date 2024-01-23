<?php 
session_start();
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
<?php include("adminHeader.php"); ?>
<body class="sb-nav-fixed">
    <!-- nav-->
    <?php include("layout/nav.php"); ?>
    <div id="layoutSidenav">
        <!-- layoutSidenav_nav-->
        <?php   include("layout/aside.php"); ?>
        <div id="layoutSidenav_content">                
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" style="text-align:center">QUẢN TRỊ NHÂN VIÊN</h1><BR>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                    </ol> -->
                    <div class="card mb-4">
                        <div class="card-header">
                        <i class="fas fa-home"> </i>  <a style="text-decoration:none; color:black" href="index.php"><b>Trang chủ</b></a>  <i class="fas fa-table me-1"></i>
                            Danh sách nhân viên
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Nhân Viên</th>
                                        <th>Tên Nhân Viên</th>
                                        <th>Ngày Sinh</th>
                                        <th>Giới Tính</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>                                                                                
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>STT</th>
                                        <th>Mã Nhân Viên</th>
                                        <th>Tên Nhân Viên</th>
                                        <th>Ngày Sinh</th>
                                        <th>Giới Tính</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>                                                                                
                                        <th>Xóa</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                    include("config/connection.php");

                                        // 2. Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                                    $sql = " SELECT *
    FROM tbl_nhanvien
    ORDER BY maNV DESC 
                                    ";
                                        // 3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                    $result=$con->query($sql);

                                    $i=0;
                                    while ($row = $result ->fetch_assoc()) {
                                        $i++;
                                        ;?>

                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["maNV"];?></td>
                                            <td><?php echo $row["tenNV"];?></td>
                                            <td><?php echo $row["ngaysinh"];?></td>
                                            <td><?php echo $row["gioitinh"];?></td>
                                            <td><?php echo $row["diachi"];?></td>
                                            <td><?php echo $row["email"];?></td>
                                            <td><?php echo $row["sdt"];?></td>
        <td>                                            <!-- PHÂN QUYỀN -->
<?php
    include("config/connection.php");
        $sql = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK where tennguoidung='".$_SESSION['ten_admin']."'";
        $kq = mysqli_query($con, $sql);
        $rowql = mysqli_fetch_array($kq);
    if ($rowql['maCV']=="4") 
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
    if($row1['maCV']=="4") $kiem_tra26=1;
    else $kiem_tra26=0;
;?>
<!--  -->
<?php
    if($check==1 && $kiem_tra26!=1)
    {
;?>
                                            
                                                 <a onclick=" return Del('<?php echo $row['email']; ?>')" class="btn btn-danger" style="color:white" href="nhanvienxoa.php?maNV=<?php echo $row['maNV']; ?>">Xóa</a>
                                                 <?php 
}
else
{
;?>       <a  class="btn btn-danger" style="color:white" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Xóa</a>                                    
  <?php
}
;?>
<?php
;?>                                              </td>
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
            <?php //include("layout/footer.php"); ?>
        </div>
    </div>
    <?php include("adminFooter.php"); ?>
    <script>
        function Del(name){
            return confirm('Bạn có chắc chắn muốn xóa người dùng: ' + name + "?");
        }
    </script>
</body>
</html>
