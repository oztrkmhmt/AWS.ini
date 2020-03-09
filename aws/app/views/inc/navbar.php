<!-- Page-top for scroll to top Page-->
<body id="page-top">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" style="color:snow !important;" >Atlas Web Service</a>
    <?php if(isset($_SESSION['AWSession'])) : ?>
    </button>
    <?php endif; ?>
    <!-- Navbar Shift Right icons -->
    <ul id="productList" class="nav">
       
    </ul>  
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <?php if(isset($_SESSION['AWSession'])) : ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- Call login details to navbar-->
                <?php if(empty($_SESSION['policyScreen']['errorMessage'])){ ?>
                <?php $this->loginDetailsModel->GetLoginDetails($data);?>
                <label style="color:snow !important"><?php Utils::LoginDetailonNavbar($data);?></label>
                <?php }else{
                    
                } ?>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i style="color:snow !important;line-height: 1.5 !important;" class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../users/logout" >Güvenli Çıkış</a>
            </div>
        </li>
        <?php else : ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../policy/login" >Kullanıcı Giriş</a>
            </div>
        </li>
        <?php endif; ?>
    </ul>
</nav>

