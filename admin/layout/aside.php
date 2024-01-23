
 <div id="layoutSidenav_nav" >
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Hệ thống</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Trang chủ              </a>      
                   <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                        Quản trị sản phẩm
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="sanpham.php"> Sản phẩm</a>                                                            
                        <a class="nav-link" href="loaisanpham.php">Loại sản phẩm</a> 

     <!-- PHÂN QUYỀN -->
<?php
    // include("config/connection.php");
        $sql1 = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK where tennguoidung='".$_SESSION['ten_admin']."'";
        $kq1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_array($kq1);
    if ($row1['maCV']=="1"||$row1['maCV']=="3") 
    {
        $check1=1;
    }
    else
        $check1=0;
;?>

<?php 
    $sql11 = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK ";
    $ket_qua211 = mysqli_query($con, $sql11);
    $row11 = mysqli_fetch_array($ket_qua211);
    if($row11['maCV']=="1"||$row11['maCV']=="3") $kiem_tra11=1;
    else $kiem_tra11=0;
;?>
<!--  -->
<?php
    if($check1==1 && $kiem_tra11==1)
    {
;?>
     

                        <a class="nav-link" href="goiynhaphang.php">Gợi ý nhập hàng</a>
                        <?php 
}
else
{
;?>             
<a class="nav-link" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Gợi ý nhập hàng</a>
<?php
}
;?>
<?php
;?>  </nav>
                </div>                     

                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                        Quản trị nhà cung cấp
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a> -->
                <a class="nav-link" href="nhacungcap.php">
                    <div class="sb-nav-link-icon"> <i class="fas fa-handshake"></i>
                    </div>
                       Quản trị Nhà cung cấp                                                           
                   </a> 
      
                <a class="nav-link collapsed" href="tintuc.php" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                    Quản trị nhập hàng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFive" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
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
                        <a class="nav-link" href="z_pnk.php">Nhập kho</a>   
                        <?php 
}
else
{
;?>  <a class="nav-link" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Nhập kho</a>   
 <?php
}
;?>
<?php
;?>

                            <a class="nav-link" href="z_pnk_detail.php">Phiếu nhập kho</a>

     <!-- PHÂN QUYỀN -->
     <?php
    // include("config/connection.php");
    //     $sql1 = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK where tennguoidung='".$_SESSION['ten_admin']."'";
    //     $kq1 = mysqli_query($con, $sql1);
    //     $rowql1 = mysqli_fetch_array($kq1);
    // if ($rowql1['maCV']=="1") 
    // {
    //     $check1=1;
    // }
    // else
    //     $check1=0;
;?>

<?php 
    // $sql261 = "SELECT * From tbl_taikhoan as a join tbl_nhanvien as b on a.maTK=b.maTK ";
    // $ket_qua261 = mysqli_query($con, $sql261);
    // $row11 = mysqli_fetch_array($ket_qua261);
    // if($row11['maCV']=="1") $kiem_tra261=1;
    // else $kiem_tra261=0;
;?>
<!--  -->
<?php
   if($check1==1 && $kiem_tra11==1)
    {
;
?>
                            <a class="nav-link" href="z_pnh.php">Nhập hàng</a>  
                            <?php 
}
else
{
;?>      
  <a class="nav-link" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Nhập hàng</a>  
 <?php
}
;?>
<?php
;?>

                            <a class="nav-link" href="z_pnh_detail.php">Phiếu nhập hàng</a>                    
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Quản trị xuất hàng 
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="xuathang.php">Xác nhận xuất hàng</a>   
                    <a class="nav-link" href="doihang.php">Xác nhận đổi hàng</a>   
                        <a class="nav-link" href="xulydonhang.php">Phiếu xuất hàng</a>
                        <a class="nav-link" href="BBDH.php">Phiếu đổi hàng</a>
                     </nav>
                </div>
               
                <a class="nav-link" href="nhanvien.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                    Quản trị nhân viên
                </a> 
                <a class="nav-link" href="khachhang.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-portrait"></i></div>
                    Quản trị khách hàng
                </a>  
                <a class="nav-link" href="z_sanpham.php">
                    <div class="sb-nav-link-icon"> <i class="fas fa-pen-nib"></i>
                    </div>
                       Báo cáo Nhập Xuất tồn                                                        
                   </a> 
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đã đăng nhập</div>
        </div>
    </nav>
</div>


