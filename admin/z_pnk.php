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
             <?php   include("layout/aside.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                <h1 class="mt-4" style="text-align: center;">Phiếu nhập kho</h1></br>
                    <div class="container-fluid px-4">
                        <div class="row gx-5">
                            <div class="col-7">
                                <div class="card mb-4" >
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                <a class="btn btn-primary" style="color:white; margin-left:520px" href="z_pnk.php?action=new" style="color: green; padding-left: 25px"><b>Tạo mới</b></a> 
                                            </div>
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
                                <table id="datatablesSimple" class="table table-hover table-bordered">                                    
                                    <thead >
                                        <tr >
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Id</th>  
                                            <th style="text-align: center;">Tên</th>
                                            <!-- <th style="text-align: center; width: 50px">Mô tả</th> -->
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">ĐVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại</th>
                                            <th style="text-align: center;">NCC</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                    </thead>
                                    
                                    <tfoot >
                                        <tr >
                                        <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Id</th>  
                                            <th style="text-align: center;">Tên</th>
                                            <!-- <th style="text-align: center; width: 50px">Mô tả</th> -->
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">ĐVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại</th>
                                            <th style="text-align: center;">NCC</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                    <?php
                                      
                                        include("config/connection.php");
                                         $sql = "  SELECT *
                                         FROM tbl_sanpham a join tbl_nhacungcap b on a.maNCC = b.maNCC join tbl_loaisanpham c on a.maloai=c.maloai
                                         ORDER BY maSP  ASC  ";                                       
                                        $san_pham = $con -> query($sql);
                                        $i=0;
                                        while ($row = $san_pham ->fetch_assoc()) 
                                            {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>                                           
                                                        <td style="text-align: center;"><?php echo $row['maSP']; ?></td>
                                                        <td><?php echo $row['tenSP']; ?></td>
                                                    
                                                        <!-- <td style="width: 300px"><?php echo $row['mota']; ?></td> -->
                                                        <td style="text-align: center;"><?php echo $row['dongia']; ?></td>
                                                        <td style="text-align: center;"><?php echo $row['DVT']; ?></td>
                                                        <td style="text-align: center;"><?php echo $row['soluong']; ?></td>
                                                        <?php 
                                                                $sql_category="SELECT * FROM tbl_loaisanpham";
                                                                $result_category=$con->query($sql_category);
                                                                
                                                        ?>   
                                                    
                                                        <td style="text-align: center;"><?php echo $row['tenloai'];?> </td>
                                                        <?php 
                                                                $sql_category="SELECT * FROM tbl_nhacungcap";
                                                                $result_category=$con->query($sql_category);
                                                                
                                                        ?>  
                                                        <td style="text-align: center;"><?php echo $row['tenNCC'];?> </td>
                                                
                        
                                                        <td><a style="color:white" class="btn btn-success" href="z_pnk.php?maSP=<?php echo $row['maSP']; ?>&action=ok">Chọn</a></td>
                                                        <td>
                                                            
                                                            <a onclick="return Del ('<?php echo $row['tenSP'] ?>')" href="sanphamxoa.php?maSP=<?php echo $row['maSP']; ?>"></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                           }
                                    ;?>
                                
                                    </tbody>
                                </table>
                     
                        
                    </div>
                    </div>
                    <div class="col-5" style="padding-top: 120px;">
                    <?php
                            
                            $s=(isset($_SESSION['s']))?$_SESSION['s']: [];
                            if(isset($_SESSION['s']))
                            {?>
                                    <table id="datatablesSimple" class="table table-hover table-bordered" border="1">
                                        <thead>
                                            <tr>
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">ID</th>
                                            <th style="text-align: center;">Tên</th>
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Tác vụ</th>
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
                                    <form action="z_add_quatity.php">
                                        <input style="width:50px;border:hidden" type="number" name="sl" value="<?php echo $value['sl'] ;?>">
                                        <input name="action" value="update" type="hidden" >
                                        <input name="maSP" value="<?php echo $value['id'] ;?>" type="hidden" >
                                        <button type="submit" class="btn"><i class="fas fa-check"></i></button> 
                                    </form>
                                    </td>
                                   <td><a class="btn btn-danger" style="color:white" onclick="del()" href="z_pnk.php?maSP=<?php echo $value['id']?>&action=delete">Xóa</href=></a></td>   
                                </tr>
                                  <?php
                                }
                                        ?>
                            </tbody>
                            <tfoot align="right">
                                        <tr>
                                                 <td colspan="5">
                                                    <form action="z_up_pnk.php">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                 </td>
                                        </tr>
                            </tfoot>
                            <?php  } ?>
                        </table>
                    </div>
                </main>
            </div>
        </div>

        
       <?php include("adminFooter.php"); ?>
        <script>
            function Del(name){
                return confirm('Bạn có chắc chắn muốn xóa sản phẩm: ' + name + "?");
            }
        </script>
     <script>
function del() {
  alert("Chúc mừng bạn đã xóa thành công");
}
</script>
    </body>
</html>

