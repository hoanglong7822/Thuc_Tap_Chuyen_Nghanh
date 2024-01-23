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
                        <h1 class="mt-4" style="text-align:center">ĐỔI HÀNG</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Biên bản đổi hàng    </li>
                        </ol> -->
                        
                        <div class="card mb-4">


                        <div class="card-header" >
							
							<i class="fas fa-home"></i><a style="text-decoration:none; color:black" href="index.php"> <b>Trang chủ</b></a> || <i class="fas fa-table me-1"></i> Danh sách phiếu đổi hàng
<!-- PHÂN QUYỀN -->
<?php
    include("config/connection.php");
        $sql = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK where tennguoidung='".$_SESSION['ten_admin']."'";
        $kq = mysqli_query($con, $sql);
        $rowql = mysqli_fetch_array($kq);
    if ($rowql['maCV']=="3") 
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
    if($row1['maCV']=="3") $kiem_tra26=1;
    else $kiem_tra26=0;
;?>
<!--  -->
<?php
    if($check==1 && $kiem_tra26!=1)
    {
;?>
     

                            <a href="themmoi_BBDH.php" class="btn btn-primary" style="margin-left:610px"><b> Thêm mới </b></a>    
 <?php 
}
else
{
;?>                  
                            <a href="" onclick="alert('Bạn không có quyền dùng chức năng này')" class="btn btn-primary" style="margin-left:610px"><b> Thêm mới </b></a>    
                            <?php
}
;?>
<?php
;?>

                        </div>


                            <!-- <div class="card-header"> -->
                                <!-- <i class="fas fa-table me-1"></i>
                               
                                <a class="btn btn-success" style="margin-left:650px" href="themmoi_BBDH.php">Thêm mới </a>
                            </div> -->
                            <div class="card-body">
                                <table  id="datatablesSimple" >
                                    <thead>
                                        <tr >
                                            <th >ID</th>
                                            <th>Mã phiếu</th>
                                            <th >Nhân viên lập phiếu</th>
                                            <th >Ngày lập phiếu</th>
                                            <!-- <th>Lý do</th> -->
                                           <th>Hành động</th>
                                            <!-- <th >Sửa</th>
                                            <th >Xóa</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th> ID </th>
                                            <th>Mã phiếu</th>
                                            <th>Nhân viên lập phiếu</th>
                                            <th>Ngày lập phiếu</th>
                                            <!-- <th>Lý do</th> -->
                                           <th>Hành động</th>
                                            <!-- <th>Sửa</th>
                                            <th>Xóa</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                            include("config/connection.php");
                                            // $sql_select1 = mysqli_query($con,"SELECT * FROM tbl_doihang as a ,tbl_nhanvien as b,tbl_khachhang as c, tbl_chitietdh as d, tbl_hoadonban as e
                                            // WHERE a.maNV=b.maNV AND a.maBBDH=d.maBBDH and a.maHDB=e.maHDB and e.maKH = c.maKH  GROUP BY a.maBBDH ORDER BY ngaylap DESC"); 
                                        
                                            // $sql_select1 = mysqli_query($con,"SELECT * FROM tbl_doihang as a ,tbl_nhanvien as b,tbl_khachhang as c, tbl_chitietdh as d, tbl_hoadonban as e
                                            // WHERE a.maNV=b.maNV AND a.maBBDH=d.maBBDH and a.maHDB=e.maHDB and e.maKH = c.maKH and a.tinhtrang = 'Từ chối' or a.tinhtrang='Đã xử lý' or a.tinhtrang='Chưa xử lý' GROUP BY a.maBBDH ORDER BY ngaylap DESC"); 

                                            // $sql_select1 = mysqli_query($con,"SELECT * FROM tbl_doihang as a ,tbl_nhanvien as b,tbl_khachhang as c, tbl_chitietdh as d
                                            // WHERE a.maNV=b.maNV AND a.maBBDH=d.maBBDH and a.maKH=c.maKH and a.tinhtrang = 'Từ chối' or a.tinhtrang='Đã xử lý' or a.tinhtrang='Chưa xử lý' GROUP BY a.maBBDH ORDER BY ngaylap DESC"); 
                            
                                            $sql = "
                                            SELECT * from tbl_doihang as a join tbl_nhanvien as b on a.maNVDH=b.maNV where a.tinhtrangdh= 'Từ chôi' or a.tinhtrangdh='Chưa xử lý' or a.tinhtrangdh='Đã xử lý';";
                                            $tintuc = $con -> query($sql);
                                            $i=0;
                                            while ($row = $tintuc ->fetch_assoc()) {
                                            $i++;
                                        ;?>

                                          <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["maBBDH"];?></td>
                                            
                                            <td><?php echo $row["tenNV"];?></td>
                                            
                                            <td><?php echo $row["ngaylap"];?></td>
                                            <!-- <td><?php echo $row["lydo"];?></td> -->
                                           
                                            <td>
                                                
                                                <a class="btn btn-primary" style="color:white" href="xemchitiet_BBDH.php?maBBDH=<?php echo $row["maBBDH"];?>">Xem chi tiết</a>
                                                
<?php
if($check==1 && $kiem_tra26!=1)
{
;?>
                                          
                                                <a class="btn btn-danger" style="color:white"  onclick="return del ('<?php echo $row['maBBDH'] ?>')" href="xemchitietBBDH_xoa.php?maBBDH=<?php echo $row["maBBDH"];?>">Xóa</a>
<?php 
}
else
{
;?>
      <a class="btn btn-danger" style="color:white" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Xóa</a>
  <?php
}
;?>
<?php
;?>                                          </td>
                                            <!-- <td><a href="xacnhan_xuathang.php?maBBDH=<?php echo $row["maBBDH"];?>">Xuất hàng</a></td>
                                            <td><a onclick=" return Del('<?php echo $row['maBBDH']; ?>')" href="tin_tuc_xoa.php?maBBDH=<?php echo $row["maBBDH"];?>">Từ chối</a></td> -->
                                        </tr>
                                        <?php
                                    }
                                    ;?>


                                </tbody>
                                
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
    function del(name){
        return confirm('Bạn chắc chắn muốn xóa  Biên bản đổi hàng mã số: ' + name + "?");
    }
</script>
<?php include("adminFooter.php"); ?>
</body>
</html>