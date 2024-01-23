<?php 
    // // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
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

<?php
    include("config/connection.php");
    // if(isset($_POST['sbm'])){ 
        $idsanpham=$_GET["idsanpham"];
        $tensp=$_GET["tensp"];
        // $chitiet=$_POST["chitiet"];
        $mota=$_GET["mota"];
        $dongia=$_GET["dongia"];
        $soluong=$_GET["soluong"];
        $DVT=$_GET["DVT"];
        $idtheloai=$_GET["idtheloai"];
        // $maTH=$_POST["maTH"];
        $idnhacungcap=$_GET['idnhacungcap'];
        // echo $hinhanh;
        $con=new mysqli($host, $user, $pass, $db);
    //    $noi_luu_anh = "../../Bangiay/images/".basename($_FILES['hinhanh']['name']);
        // $luu_file_anh = $_FILES['hinhanh']['tmp_name'];

        // $up_anh = move_uploaded_file($luu_file_anh, $noi_luu_anh);

        // if (!$up_anh) {
        //         $sanpham_image = NULL;
        // } else {
        //         $sanpham_image = basename($_FILES['hinhanh']['name']);
        // }
        // if ($sanpham_image==NULL) {


            // $sql = "UPDATE tbl_sanpham SET tensanpham='$tensp',mota='$mota',dongia=$dongia,tinhtrang=$tinhtrang,giasale=$giasale,sphot=$sphot,spsale=$spsale,spnew=$spnew,soluong=$soluong,idtheloai=$category_id, hinhanh='$hinhanh'WHERE idsanpham=$idsanpham";
            // $sql="UPDATE `tbl_sanpham` SET `tensanpham`='$tensp',`soluong`='$soluong',`dongia`='$dongia',`giasale`='$giasale',`hinhanh`='$hinhanh',`mota`='$mota',`sphot`='$sphot',`spnew`='$spnew',`spsale`='$spsale',`tinhtrang`='$tinhtrang',`idtheloai`=$idtheloai WHERE idsanpham=$idsanpham";
        
        // }
        // else{

        //    $sql = "UPDATE tbl_sanpham SET tensanpham='$tensp',mota='$mota',dongia=$dongia,tinhtrang=$tinhtrang,giasale=$giasale,sphot=$sphot,spsale=$spsale,spnew=$spnew,soluong=$soluong,idtheloai=$category_id WHERE idsanpham=$idsanpham";
        // 
        $sql="UPDATE `tbl_sanpham` SET `tenSP`='$tensp',`maloai`='$idtheloai',`maNCC`='$idnhacungcap',`soluong`='$soluong',`dongia`='$dongia',`DVT`='$DVT',`mota`='$mota' WHERE maSP=$idsanpham";
        // if($con -> query($sql)===True){
        //     echo "
        //         <script type='text/javascript'>
        //         window.alert('Cập nhật sản phẩm thành công');
        //         window.location.href='sanpham.php';
        //         </script>
        //        ";
        //     }
        // else
        //     {
        //         echo "
        //         <script type='text/javascript'>
        //         window.alert('lỗi cập nhật');
        //         window.location.href='sanphamsua.php';
        //         </script>
        //        ";
        //     }

        if($con->query($sql)){
            echo "Sửa thành công";
            echo "
                <script>
                window.alert('Cập nhật sản phẩm thành công');
                window.location.href = 'sanpham.php';
                </script>
            ";
        }
        else {
            echo "Không sửa được";
            // echo "
            //     <script>
            //     window.location = 'hienthi.php';
            //     </script>
            // ";
        } 


    // }


?>