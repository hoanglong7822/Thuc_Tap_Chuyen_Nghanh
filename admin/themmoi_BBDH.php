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
                    <div class="container-fluid px-4"></br>
                        <!-- <h1 class="mt-4">Quản trị sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        </ol> -->
                        <div class="card mb-4" >

                        <h2 style="text-align:center">BIÊN BẢN ĐỔI HÀNG</h2>
</br>


                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách sản phẩm 
                                <a class="btn btn-primary" style="color:white; margin-left:850px" href="themmoi_BBDH.php?action=new" style="color: green; padding-left: 25px">Tạo mới</a> 
                            </div>
                            <div class="container">
            <div class="row">
            <div class="col-sm-7" >

            
<?php

if(isset($_GET['action']))
{
    switch ($_GET['action'])
{
case'new':
if(isset($_SESSION['s']))
    {
        unset($_SESSION['s']);
    }
break;

case'delete':

$id= $_GET['maSP'];

        unset($_SESSION['s'][$id]);
        
    
break;
case'ok':
$action=(isset($_GET['action']))?$_GET['action']:'add';
$sl=(isset($_GET['sl']))?$_GET['sl']:1;

if(isset($_GET['maSP']))
{
    $id=$_GET['maSP'];
}
//else echo"ko có";
$query=mysqli_query($con,"select * from tbl_sanpham where maSP = $id ");
if($query)
{
    $product= mysqli_fetch_assoc($query);
}
$item=
[
    'id'=>$product['maSP'],
    'name'=>$product['tenSP'],
    'sl'=>$sl
];
if($action=='update')
{
    $_SESSION['s'][$id]['sl']=$sl;
}
    if(isset($_SESSION['s'][$id]))

        {
            $_SESSION['s'][$id]['sl'] = $sl;
        }
        else
        {
            $_SESSION['s'][$id]=$item;
        }
        default:
    }
}
?>
                <!-- contains here -->
                                <table id="datatablesSimple" class="table table-hover table-bordered">
                                    <thead >
                                        <tr >
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã SP</th>  
                                            <th style="text-align: center;">Tên SP</th>
                                            <!-- <th style="text-align: center; width: 50px">Mô tả</th> -->
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">DVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại sản phẩm</th>
                                            <th style="text-align: center;">Mã NCC</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                        </tr>
                                    </thead>
                                    
                                    <tfoot >
                                        <tr >
                                        <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã SP</th>  
                                            <th style="text-align: center;">Tên SP</th>
                                            <!-- <th style="text-align: center; width: 50px">Mô tả</th> -->
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">DVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại sản phẩm</th>
                                            <th style="text-align: center;">Mã NCC</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                        include("config/connection.php");
 
                                        // 2. Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                                       $sql = " SELECT * FROM tbl_sanpham as a join tbl_nhacungcap as b join tbl_loaisanpham as c
                                                on a.maNCC=b.maNCC and a.maloai=c.maloai
                                                  ORDER BY maSP  ASC    ";
                                        // 3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                        $san_pham = $con -> query($sql);
                                          
                                        // 4. Hiển thị ra dữ liệu mà các bạn vừa lấy
                                        $i=0;
                                        while ($row = $san_pham ->fetch_assoc()) {
                                        $i++;
                                    ?>



                                        <tr>
                                            <td><?php echo $i;?></td>                                           
                                            <td  style="text-align: center;"><?php echo $row['maSP']; ?></td>
                                            <td><?php echo $row['tenSP']; ?></td>
                                            <!-- <td style="width: 300px"><?php echo $row['mota']; ?></td> -->
                                            <td style="text-align: center;"><?php echo $row['dongia']; ?></td>
                                            <td style="text-align: center;"><?php echo $row['DVT']; ?></td>
                                            <td style="text-align: center;"><?php echo $row['soluong']; ?></td>
                                             <td style="text-align: center;"><?php echo $row['tenloai'];?> </td>
                                            <td style="text-align: center;"><?php echo $row['tenNCC'];?> </td>
                                            <td><a class="btn btn-success" href="add_quatity_BBDH.php?maSP=<?php echo $row['maSP']; ?>">Chọn</a></td>
                                       
                                        </tr>
                                    <?php
                                        }
                                    ;?>
                                
                                    </tbody>
                                </table>
            </div>
            
                            <?php
                            $s=(isset($_SESSION['s']))?$_SESSION['s']: [];
                            if(isset($_SESSION['s']))
                            {?>
                             <div class="col-sm-5" style="padding-top:25px;">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên SP</th>
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
                                    <td scope="row"><?php echo $i; ?></td>
                                    <td><?php  echo $value['id']; ?> </td>
                                    <td><?php echo $value['name'];?> </td>
                                    <td>
                                    <form action="add_quatity_BBDH.php">
                                        <input style="width:50px;border:hidden" type="number" min=0 name="sl" value="<?php echo $value['sl'] ;?>">
                                        <input name="action" value="update" type="hidden" >
                                        <input name="maSP" value="<?php echo $value['id'] ;?>" type="hidden" >
                                        <button type="submit" class="btn"><i class="fas fa-check"></i></button> 
                                        </form>
                                    </td>
                                   <td>
                                   <a onclick="del()" class="btn btn-danger" style="color:white" href="themmoi_BBDH.php?maSP=<?php echo $value['id']?>&action=delete">Xóa</></a>
                                   </td>   
                                </tr>
                                  <?php
                                }
?>
                    <!-- //////// -->
                    <table width=100%>
    <tr><form action="up_BBDH.php">
        <td style="width: 250px">
<p ><b>Nhân viên lập phiếu:</b>  
            <?php
            include("config/connection.php");
            $sql_NV="SELECT * FROM tbl_nhanvien";
            $result_NV=$con->query($sql_NV);
            ?> </td>
            <td>
    <select name="manv" style="width:210px">
         <?php while ($row_NV=$result_NV->fetch_assoc()) {?>
        <option value="<?php echo $row_NV['maNV'];?>" >

            <?php echo $row_NV['maNV'];  
            echo "- " ;
            echo $row_NV['tenNV']; ?>
            
        </option>
    <?php } ?>
         </select></td></tr>
    <tr><td>
         <p ><b>Mã hóa đơn bán:</b>  
            <?php
            include("config/connection.php");
            $sql_HDB="SELECT * FROM tbl_hoadonban";
            $result_HDB=$con->query($sql_HDB);
            ?> </td>
            <td>
    <select name="mahdb" style="width:210px">
         <?php while ($row_HDB=$result_HDB->fetch_assoc()) {?>
        <option value="<?php echo $row_HDB['maHDB'];?>" >

            <?php echo $row_HDB['maHDB']; ?>
            
        </option>
    <?php } ?>
        </select> 
            </td> 
            <tr>
                               <td colspan="5">                        
                            <center> 
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form> </center>
                            </td>
                                </tr>
        </tr>
         </table>
      
                          <?php  }
                            ?>
                            </div>
                        </div>
                    </div>
                            </div>
                </main>
                <?php // include("layout/footer.php"); ?>
            </div>
        </div>
       <?php include("adminFooter.php"); ?>
        <script>
            function del(name){
                return confirm('Bạn có chắc chắn muốn xóa sản phẩm: ' + name + "?");
            }
        </script>
    </body>

</html>

