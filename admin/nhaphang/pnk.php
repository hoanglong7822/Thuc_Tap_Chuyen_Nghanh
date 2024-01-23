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
    <?php include("../adminHeader.php"); ?>
    <body class="sb-nav-fixed">
        <!-- nav-->
        <?php include("../layout/nav.php"); ?>
        <div id="layoutSidenav">
            <!-- layoutSidenav_nav-->
            <?php   include("../layout/aside.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản trị sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin/index.php">Bảng điều khiển</a></li>
                        </ol>
                        <div class="card mb-4" >
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách sản phẩm <a href="../loaisanpham.php" style="text-decoration: none"> Loại Sản Phẩm </a>
                                <a href="../sanphamthemmoi.php" style="color: green; padding-left: 750px">Thêm mới</a> 
                            </div>
                            <div class="container">
            <div class="row">
            <div class="col-sm-8" >
                <!-- contains here -->
                          <!--  <div class="card-body" > -->
                                <table id="datatablesSimple" class="table table-hover table-bordered">
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
                                            <th style="text-align: center;">Mã nhà cung cấp</th>
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
                                            <th style="text-align: center;">Mã nhà cung cấp</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;">Xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                        include("connection.php");
 
                                        $san_pham = $con -> query($sql);
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
                                           
                                             <td style="text-align: center;"><?php echo $row['maloai'];?> </td>
                                             <?php 
                                                    $sql_category="SELECT * FROM tbl_nhacungcap";
                                                    $result_category=$con->query($sql_category);
                                                    
                                            ?>  
                                            <td style="text-align: center;"><?php echo $row['maNCC'];?> </td>
                                    
              
                                            <td><a href="add_quatity.php?maSP=<?php echo $row['maSP']; ?>">Chọn</a></td>
                                            <td>
                                                
                                                <a onclick="return Del ('<?php echo $row['tenSP'] ?>')" href="sanphamxoa.php?maSP=<?php echo $row['maSP']; ?>"></a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ;?>
                                
                                    </tbody>
                                </table>
                            <!--</div>-->
            </div>
            
                            <?php
                            
                            $s=(isset($_SESSION['s']))?$_SESSION['s']: [];
                            if(isset($_SESSION['s']))
                            {?>
                             <div class="col-sm-4" style="padding-top:75px;">
                                                                        <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Id</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tác vụ</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                         <?php
                         $i=0;
                                foreach($s as $key=>$value)
                                { $i++  
                                 ?>   <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php  echo $value['id']; ?></td>
                                    <td> <?php echo $value['name'];?></td>
                                    <td>
                                    <form action="add_quatity.php">
                                        <input style="width:50px;border:hidden" type="number" name="sl" value="<?php echo $value['sl'] ;?>">
                                        <input name="action" value="update" type="hidden" >
                                        <input name="maSP" value="<?php echo $value['id'] ;?>" type="hidden" >
                                        <button type="submit" class="btn"><i class="fas fa-check"></i></button> 
                                    </form>
                                    </td>
                                   <td></td>   
                                </tr>
                                  <?php
                                }
?>
                                <tr>
                                    <td>
                                    
                                    </td>
                                    <td></td>
                                    <td></td>
                               <td>
                               <form action="up_pnk.php">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </td> 
                                </tr>
                          <?php  }
                            
                            ?>
                           
                            
                            </div>
                        </div>
                    </div>
                </main>
                <?php // include("layout/footer.php"); ?>
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

