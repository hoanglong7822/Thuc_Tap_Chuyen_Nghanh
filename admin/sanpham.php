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
                        <h2 class="mt-4" STYLE="text-align:center">QUẢN TRỊ SẢN PHẨM</h2></br>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        </ol> -->
                        <div class="card mb-4">
                            <div class="card-header">      <i class="fas fa-home"> </i>  <a style="text-decoration: none;color:black"href="index.php"><b>Trang chủ</b></a>
                                <i class="fas fa-table me-1"></i><a href="loaisanpham.php" style="text-decoration: none; color:black"> <b>Loại Sản Phẩm</b> </a>
                               || Danh sách sản phẩm 
                                <a class="btn btn-primary" href="sanphamthemmoi.php" style="color: white; margin-left: 550px"><b>Thêm mới</b></a> 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead >
                                        <tr >
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã sản phẩm</th>  
                                            <th style="text-align: center;">Tên sản phẩm</th>
                                            <th style="text-align: center; width: 50px">Mô tả</th>
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">DVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại sản phẩm</th>
                                            <th style="text-align: center;">Nhà cung cấp</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot >
                                        <tr >
                                        <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã sản phẩm</th>  
                                            <th style="text-align: center;">Tên sản phẩm</th>
                                            <th style="text-align: center; width: 50px">Mô tả</th>
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">DVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại sản phẩm</th>
                                            <th style="text-align: center;">Nhà cung cấp</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;">Xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                        include("config/connection.php");
 
                                        // 2. Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                                       $sql = "
                                                  SELECT *
                                                  FROM tbl_sanpham a join tbl_nhacungcap b on a.maNCC = b.maNCC join tbl_loaisanpham c on a.maloai=c.maloai
                                                  ORDER BY maSP  ASC 
                                                 
                                        ";
                                        // 3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                        $san_pham = $con -> query($sql);
                                          
                                        // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                        $i=0;
                                        while ($row = $san_pham ->fetch_assoc()) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>                                           
                                            <td style="text-align: center;"><?php echo $row['maSP']; ?></td>
                                            <td><?php echo $row['tenSP']; ?></td>
                                        
                                            <td style="width: 300px"><?php echo $row['mota']; ?></td>
                                            <td style="text-align: center;"><?php echo $row['dongia']; ?></td>
                                            <td style="text-align: center;"><?php echo $row['DVT']; ?></td>
                                            <td style="text-align: center;"><?php echo $row['soluong']; ?></td>
                                            <?php 
                                                    $sql_category="SELECT * FROM tbl_loaisanpham";
                                                    $result_category=$con->query($sql_category);
                                                    
                                            ?>   
                                           
                                             <td style="text-align: center;"><?php echo $row['tenloai'];?> </td>
                                            
                                            
                                            
                                            <?php 
                                                    $sql_category="SELECT * FROM tbl_nhacungcap a join tbl_sanpham b on a.maNCC = b.maNCC";
                                                    $result_category=$con->query($sql_category);
                                                    
                                            ?>  
                                            <td style="text-align: center;"><?php echo $row['tenNCC'];?> </td>
                                    
              
                                            <td><a class="btn btn-success" style="color: white" href="sanphamsua.php?maSP=<?php echo $row['maSP']; ?>">Sửa</a></td>
                                            <td>
           <!-- PHÂN QUYỀN -->
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
                                                <a  class="btn btn-danger" style="color: white" onclick="return Del ('<?php echo $row['tenSP'] ?>')" href="sanphamxoa.php?maSP=<?php echo $row['maSP']; ?>">Xóa</a>
                                                <?php 
}
else
{
;?>       
<a  class="btn btn-danger" style="color:white" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Xóa</a>                                    
  <?php
}
;?>
<?php
;?>                                                </td>
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
                return confirm('Bạn có chắc chắn muốn xóa sản phẩm: ' + name + "?");
            }
        </script>
    </body>
</html>

