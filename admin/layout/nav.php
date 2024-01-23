<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">
                 <img src="../logo.png" style="margin-top:15px" width="110px" > 
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <i class="fas fa-search"></i>
                </div>
            </form>
            <!-- Navbar-->
            <?php
                include("config/connection.php");
                // $sql="SELECT * FROM tbl_taikhoan as a join tbl_nhanvien as b where atennguoidung = '".$_SESSION['login']."'";
                $sql="SELECT * FROM tbl_taikhoan as a join tbl_nhanvien as b where a.maTK = b.maTK";
                $kq = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($kq);
            ;?>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>   
                      XIN CHÀO <?php echo $_SESSION['ten_admin'];?>
                        <!-- <?php //echo $row["tenNV"];?> -->
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="dangxuat.php">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>