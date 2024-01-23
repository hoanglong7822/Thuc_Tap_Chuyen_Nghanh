<?php 
    include("../db/connect.php");
    $admin_id=$_POST['txtid'];
    $ho_ten = $_POST['txthoten'];
    $chuc_vu = $_POST['txtchucvu'];
    $dien_thoai = $_POST['txtdienthoai'];
    $email = $_POST['txtemail'];
    $sql = "
    UPDATE tbl_admin SET adten = '".$ho_ten."',  ademail = '".$email."', chuc_vu = '".$chuc_vu."' WHERE tbl_admin.`idadmin` = '".$admin_id."'
        ";

    $kq = mysqli_query($con, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã chỉnh sửa thông tin quản trị viên thành công');
            window.location.href='admin.php';
        </script>
    ";
;?>
