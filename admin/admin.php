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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("layout/nav.php"); 
            include("adminHeader.php");
    ?>

    <div id="layoutSidenav">
    <?php
                include("../db/connect.php");
                $sql="SELECT * FROM tbl_admin where ademail = '".$_SESSION['ten_admin']."'";
                $kq = mysqli_query($con, $sql);
                $rowql = mysqli_fetch_array($kq);
                if ($rowql['chuc_vu']=='Quản lý') {
                    $check=1;
                }
                else
                    $check=0;
                
    ;?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Quản trị người dùng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách người dùng|

                                <?php 
                                        $sql26 = "SELECT * FROM tbl_admin";
                                        $ket_qua26 = mysqli_query($con, $sql26);
                                       
                                        $row1 = mysqli_fetch_array($ket_qua26);
                                            

                                        if($row1["chuc_vu"]=='Quản lý') $kiem_tra26=1;
                                        else $kiem_tra26=0;
                                    ;?>
                                    <?php
                                                if($check==1 && $kiem_tra26!=1)
                                                {
                                            ;?>
                                                <a href="adminthemmoi.php?id=<?php 
                                                echo $row1["idadmin"]; ?>">Thêm mới quản trị viên</a>
                                            <?php }
                                                else
                                                {
                                            ;?>
                                                 <a href="" onclick="alert('Bạn không có quyền thêm quản trị viên')" >Thêm mới quản trị viên</a>
                                            <?php
                                                }
                                            ;?>
 
                                    <?php
                                        
                                    ;?>

                                
                                        
                                |<a href="dangxuat.php">Đăng Xuất</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên admin</th>
                                            <th>Email</th>
                                            <th>Chức vụ</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên admin</th>
                                            <th>Email</th>
                                            <th>Chức vụ</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                     <?php 
                                        $sql1 = "SELECT * FROM tbl_admin";
                                        $ket_qua = mysqli_query($con, $sql1);
                                        $i=0;
                                        while ($row1 = mysqli_fetch_array($ket_qua)) {
                                            $i++;

                                        if($row1["chuc_vu"]=='Quản lý') $kiem_tra=1;
                                        else $kiem_tra=0;
                                    ;?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row1["idadmin"];?></td>
                                            <td><?php echo $row1["adten"];?></td>
                                            <td><?php echo $row1["ademail"];?></td>
                                            <td><?php echo $row1["chuc_vu"];?></td>


                                           <?php
                                                if($check==1 && $kiem_tra!=1)
                                                {
                                            ;?>
                                                <td><a  class="btn btn-success" href="adminsua.php?id=<?php 
                                                echo $row1["idadmin"]; ?>">Sửa</a></td>
                                            <?php }
                                                else
                                                {
                                            ;?>
                                                 <td><a  class="btn btn-success" href="" onclick="alert('Bạn không có quyền sửa thông tin quản trị viên')" >Sửa</a></td>
                                            <?php
                                                }
                                            ;?>
                                            <?php
                                                if($check==1 && $kiem_tra!=1)
                                                {
                                            ;?>
                                                <td><a  class="btn btn-danger" href="adminxoa.php?id=<?php echo $row1["idadmin"]; ?>" onclick="return confirm('Bạn có muốn xoá?')">Xoá</a></td>
                                            <?php }
                                                else
                                                {
                                            ;?>
                                                 <td><a  class="btn btn-danger" href="" onclick="alert('Bạn không có quyền xoá quản trị viên')" >Xoá</a></td>
                                            <?php
                                                }
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
                <?php //include("layout/footer.php"); ?>
            </div>
        </div>
        <?php include("adminFooter.php"); ?>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
        function Del(name){
            return confirm('Bạn có chắc chắn muốn xóa admin: ' + name + "?");
        }
    </script>
    </body>
</html>