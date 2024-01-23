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
                <h1 class="mt-4" style="text-align: center;">Phiếu nhập hàng</h1></br>
                    <div class="container-fluid px-4">
                        <div class="row gx-5">
                            <div class="col-7">
                                <div class="card mb-4" >
                                            <div class="card-header">
                                    
                                                <div class="row">
                                                               
                                                                <div class="col-2">
                                                                <a class="btn btn-primary" style="background-color:#555555	;border-style: solid 2 px;border-color: grey;" href="z_pnh.php?action=new" style="color: green">Tạo mới</a> 
                                                                
                                                                </div>
                                                                <div class="col-3">
                                                                <button style="background-color:#555555	;border-style: solid 2 px;border-color: grey;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_2">Thêm sản phẩm</button>
                                                                </div>
                                                                <div class="col-4">
                                                                <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Gợi ý nhập hàng
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="#"> <button style="background-color:grey;border-style: solid 2 px;border-color: grey;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Theo số lượng</button></a> </li>
                                                            <li><a class="dropdown-item" href="#"><button style="background-color:grey;border-style: solid 2 px;border-color: grey;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Theo doanh thu</button></a></li>
                                                        </ul>
                                                        </div>
                                                                </div>
                                                            </div>
                                                
                                               

                                            </div>

                                            <!--Dialog box đề xuất nhập hàng-->
                                                                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Gợi ý nhập hàng</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">STT</th>
                                                                    <th scope="col">Mã SP</th>
                                                                    <th scope="col">Tên</th>
                                                                    <th scope="col">Số lượng</th>
                                                                    <th scope="col">Tác vụ</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                
                                                               
                                                                                                    <?php
                                                                                                    include("config/connection.php");
                                                                                                    $sql_category="SELECT * FROM tbl_sanpham where soluong<5";
                                                                                                    $result_category=$con->query($sql_category);
                                                                                                    $i=1;
                                                                                                    while ($row=$result_category->fetch_assoc()) 
                                                                                                    {?>

                                                                                                        <tr>
                                                                                                            <th><?php echo $i ?></th>
                                                                                                            <th><?php echo $row['maSP'] ?></th>
                                                                                                            <th><?php echo $row['tenSP'] ?></th>
                                                                                                            <th><?php echo $row['soluong'] ?></th>
                                                                                                            <td><a  style="color: white" class="btn btn-primary"  href="z_pnh.php?maSP=<?php echo $row['maSP']; ?>&action=ok">Chọn</a></td>
                                                                                                        </tr>
                                                                                                        <?php
                                                                                                    }
                                                                                            ?> 
                                                
                                                                                             
                                                                </tbody>
                                                                </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <!--Kết thúc-->
                                                                                                <!--Dialog box đề xuất nhập hàng-->
                                                 <div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                 <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header" >
                                                            <h5 class="modal-title" id="exampleModalLabel">Gợi ý nhập hàng</h5>
                                                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">STT</th>
                                                                    <th scope="col">Mã SP</th>
                                                                    <th scope="col">Tên</th>
                                                                    <th scope="col">Số lượng</th>
                                                                    <th scope="col">Tác vụ</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                
                                                               
                                                                                                    <?php
                                                                                                    include("config/connection.php");
                                                                                                    $sql_category="                                SELECT a.maSP, a.tensp as tenSP, a.soluong, sum(b.soluongxuat) as tongxuat from tbl_sanpham a join tbl_chitietpxh b on a.masp=b.masp join tbl_phieuxuathang c on b.maPXH=c.maPXH 
                                                                                                    where (a.soluong<20) AND (CURRENT_DATE()-c.ngaylap<30) group by a.masp HAVING SUM(b.soluongxuat)>20";
                                                                                                    $result_category=$con->query($sql_category);
                                                                                                    $i=1;
                                                                                                    while ($row=$result_category->fetch_assoc()) 
                                                                                                    {?>

                                                                                                        <tr>
                                                                                                            <th><?php echo $i ?></th>
                                                                                                            <th><?php echo $row['maSP'] ?></th>
                                                                                                            <th><?php echo $row['tenSP'] ?></th>
                                                                                                            <th><?php echo $row['soluong'] ?></th>
                                                                                                            <td><a  style="color: white" class="btn btn-primary"  href="z_pnh.php?maSP=<?php echo $row['maSP']; ?>&action=ok">Chọn</a></td>
                                                                                                        </tr>
                                                                                                        <?php
                                                                                                    }
                                                                                            ?> 
                                                
                                                                                             
                                                                </tbody>
                                                                </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <!--Kết thúc-->
                                                    <!--Thêm sản phẩm-->
                                                    <div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="container">
                                    
                                            <form method="GET" action="z_pnh_add_sp.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="tensanpham" placeholder="Tên sản phẩm" />
                                                <label for="tensanpham">Tên sản phẩm</label>
                                            </div>
                                 
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="sanpham_mota" name="mota" placeholder="Mô tả sản phẩm"></textarea>
                                                <label for="mota">Mô tả sản phẩm</label>
                                            </div> 
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="dongia" placeholder="Nhập giá sản phẩm" />
                                                <label for="dongia">Đơn giá sản phẩm</label>
                                            </div> 
                                        
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="soluong" placeholder="Nhập số lượng sản phẩm" />
                                                <label for="soluong">Số lượng</label>
                                            </div> 

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="DVT" name="DVT" placeholder="Đơn vị tính"></textarea>
                                                <label for="mota">DVT</label>
                                            </div> 
                                            <div class="form-floating mb-3">
                                            <?php
                                                    include("config/connection.php");
                                                    $sql_category="SELECT * FROM tbl_loaisanpham";
                                                    $result_category=$con->query($sql_category);
                                                            
                                            ?> 

                                             <div class="form-floating mb-3">
                                                <b style="margin-right: 70px">Loại sản phẩm:  </b>
                                               <select name="idtheloai">
                                                    <?php while ($row_category=$result_category->fetch_assoc()) {?>
                                                        <option value="<?php echo $row_category['maloai'];?>">

                                                            <?php echo $row_category['tenloai']; ?>
                                                            
                                                        </option>
                                                    <?php } ?>
                                                </select>  
                                                </div>
                                                <div>
                                             
                                            </div>
                                            
                                          
                                            <?php
                                                    include("config/connection.php");
                                                    $sql_category="SELECT * FROM tbl_nhacungcap";
                                                    $result_category=$con->query($sql_category);
                                                            
                                            ?> 

                                             <div class="form-floating mb-3">
                                                <b style="margin-right: 70px">Nhà cung cấp:  </b>
                                               <select name="idnhacungcap">
                                                    <?php while ($row_category=$result_category->fetch_assoc()) {?>
                                                        <option value="<?php echo $row_category['maNCC'];?>">

                                                            <?php echo $row_category['tenNCC']; ?>
                                                            
                                                        </option>
                                                    <?php } ?>
                                                </select>  
                                                </div>
                                    
                    </div>
                    </div>
                    </div>
                                                       
                                        
                                                        <div class="modal-footer">
                                                        
                                                <button class="btn btn-primary" type="submit" name="sbm">Thêm sản phẩm
                                                </button>
                                                <button class="btn btn-danger" type="reset" >Làm mới
                                                </button>
                                           

                                        </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <!---->
                                                            <?php
                                                            if(isset($_GET['action']))
                                                            {
                                                                switch ($_GET['action'])
                                                    {
                                                        case'new':
                                                            if(isset($_SESSION['a']))
                                                                {
                                                                    unset($_SESSION['a']);
                                                                }
                                                            break;
                                                        
                                                        case'delete':
                                                        
                                                            $id= $_GET['maSP'];
                                                        
                                                                    unset($_SESSION['a'][$id]);
                                                                    
                                                                
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
                                                                                                    $_SESSION['a'][$id]['sl']=$sl;
                                                                                                }
                                                                                                    if(isset($_SESSION['a'][$id]))

                                                                                                        {
                                                                                                            $_SESSION['a'][$id]['sl'] = $sl;
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                            $_SESSION['a'][$id]=$item;
                                                                                                        }
                                                        // case'gynh':
                                                        //     $sl=(isset($_GET['sl']))?$_GET['sl']:1;
                                                        //     $query=mysqli_query($con,"select * from tbl_sanpham where soluong < 15 ");
                                                        //     if($query)
                                                        //     {
                                                        //         while($product= mysqli_fetch_assoc($query))
                                                        //         {}
                                                        //     }
                                                        //     $item=
                                                        //     [
                                                        //         'id'=>$product['maSP'],
                                                        //         'name'=>$product['tenSP'],
                                                        //         'sl'=>$sl
                                                        //     ];   
                                                        //     if($action=='update')
                                                        //                                         {
                                                        //                                             $_SESSION['a'][$id]['sl']=$sl;
                                                        //                                         }
                                                        //                                             if(isset($_SESSION['a'][$id]))

                                                        //                                                 {
                                                        //                                                     $_SESSION['a'][$id]['sl'] = $sl;
                                                        //                                                 }
                                                        //                                                 else
                                                        //                                                 {
                                                        //                                                     $_SESSION['a'][$id]=$item;
                                                        //                                                 }                                     
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
                                            <th style="text-align: center; width: 50px">Mô tả</th>
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">ĐVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại</th>
                                            <th style="text-align: center;">Mã NCC</th>
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
                                            <th style="text-align: center; width: 50px">Mô tả</th>
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">ĐVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại</th>
                                            <th style="text-align: center;">Mã NCC</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                    <?php
                                      
                                        include("config/connection.php");
                                         $sql = "SELECT *
                                         FROM tbl_sanpham a join tbl_nhacungcap b on a.maNCC = b.maNCC join tbl_loaisanpham c on a.maloai=c.maloai
                                         ORDER BY maSP  ASC";                                       
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
                                                                $sql_category="SELECT * FROM tbl_nhacungcap";
                                                                $result_category=$con->query($sql_category);
                                                                
                                                        ?>  
                                                        <td style="text-align: center;"><?php echo $row['tenNCC'];?> </td>
                                                
                        
                                                        <td><a style="color:white" class="btn btn-success" href="z_pnh.php?maSP=<?php echo $row['maSP']; ?>&action=ok">Chọn</a></td>
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
                            
                            $s=(isset($_SESSION['a']))?$_SESSION['a']: [];
                            if(isset($_SESSION['a']))
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
                                    <form action="z_add_pnh.php">
                                        <input style="width:50px;border:hidden" type="number" name="sl" value="<?php echo $value['sl'] ;?>">
                                        <input name="action" value="update" type="hidden" >
                                        <input name="maSP" value="<?php echo $value['id'] ;?>" type="hidden" >
                                        <button type="submit" class="btn"><i class="fas fa-check"></i></button> 
                                    </form>
                                    </td>
                                   <td><a onclick="Del()" class="btn btn-danger" style="color:white" href="z_pnh.php?maSP=<?php echo $value['id']?>&action=delete">Xóa</></a></td>   
                                </tr>
                                  <?php
                                }

                                        ?>
                            </tbody>
                            <tfoot align="right">
                                        <tr>
                                                 <td colspan="5">
                                                    <form action="z_up_pnh.php">
                                                        <button type="submit" class="btn btn-primary" onclick="sm()">Lưu phiếu nhập hàng</button>
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
            function submit(){
                alert('Đã lưu phiếu nhập kho' );
            }
        </script>
                    <script>

                function del() {
                alert("Chúc mừng bạn đã xóa thành công");
                }
                </script>
                <script>
function sm() {
  return confirm("Lưu phiếu nhập hàng");
}
</script>
    </body>
</html>
