<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>NUL - Census Data Management</title>
  <meta name="description" content="About NUL - Census Data Management">
  <meta name="og:title" property="og:title" content="NUL - Census Data Management">
  <meta name="og:description" property="og:description" content="About NUL - Census Data Management">
  <meta name="og:type" property="og:type" content="website">
  <meta name="og:url" property="og:url" content="/">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="NUL - Census Data Management">
  <meta name="twitter:description" content="About NUL - Census Data Management">
  <meta name="twitter:image" content="./images/logo.png">

  <link rel="stylesheet" href="<?php echo base_url('/resources/css/census_style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/resources/css/development.css'); ?>">

  <meta name="apple-mobile-web-app-status-bar-style" content="#00558b">
  <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
  <link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/png">
  <link rel="manifest" href="./site.webmanifest">
  <link rel="mask-icon" href="./safari-pinned-tab.svg" color="#5bbad5">
  <!-- <link rel="stylesheet" href="./_census-reports.scss"> -->
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-top">
      <div class="container">
        <a class="navbar-brand ml-3" href="<?php echo base_url()?>">
        <img src="<?php echo base_url('/resources/images/login/nul-logo-new.png'); ?>" alt="logo" class="logomain" loading="lazy">

        </a>

        <ul class="navbar-nav iconNav justify-content-end">

          <!-- <li class="nav-item">
            <a class="nav-link name">

              <div class="logtxt">
                <span>Abby Anderson</span>
                <div class="h6">Logout</div>
              </div>
              <i class="i i-person"></i>
            </a>
          </li> -->
          <li class="nav-item">
            <?php if($this->session->role_id == 1) {?>
              <a class="nav-link" title="Home" href="<?php echo base_url('/module/census_affiliate'); ?>"><i class="i i-home-new"></i><span class="sr-only"></span></a>
            <?php }else {?>
              <a class="nav-link" title="Home" href="<?php echo base_url('/module/censuses-for-my-affiliate'); ?>"><i class="i i-home-new"></i><span class="sr-only"></span></a>
              <?php }?>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" title="Affiliates"><i class="i i-person_add"></i></a>
          </li> -->
          <?php if($this->session->role_id == 1): ?>
          <li class="nav-item">
            <a class="nav-link" title="All Affiliates Status" href="<?php echo base_url('/module/affiliate/status'); ?>"><i class="i i-table_chart"></i></a>
          </li>
          <?php endif; ?>
          <?php if($this->session->role_id==1 || $this->session->role_id==3): ?>
          <li class="nav-item">
            <a class="nav-link" title="Settings" href="<?php echo base_url('/user/profile/modules'); ?>"><i class="i i-settings"></i></a>
          </li>
          <?php endif; ?>
          <!-- <li class="nav-item">
            <a class="nav-link" title="Notification"><i class="i i-notifications"></i></a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" title="Profile" href="<?php echo base_url('/user/view-profile/').$this->session->user_id; ?>"><i class="i i-person"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" title="Log out" id="btn-logout" href="<?php echo base_url('/logout'); ?>"><i class="i i-logout"></i></a>
        </li>

        </ul>
        <div class="srtittle">Census Data Management</div>
      </div>
    </nav>




    <div class="container">
      <nav class="navbar navbar-expand-lg nav-btm">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="i i-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

          <?php if($this->session->role_id == 2){?>
            <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link active censusadmin"  href="<?php echo base_url(); ?>module/censuses-for-my-affiliate/">CENSUS</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link censusreport" href="<?php echo base_url(); ?>module/census_report/">NUL CENSUS REPORTS</a>
            </li> -->
            <!--
            <li class="nav-item">
              <a class="nav-link censuspdm" href="#" >PDM</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link censuscongressionadvocacy" href="#" >CONGRESSIONAL ADVOCACY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link censuslocalprogram" href="#" >LOCAL PROGRAMS -> PDM</a>
            </li>
            -->
            </ul>
          <?php } elseif($this->session->role_id == 3){?>
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link active censusadmin"  href="<?php echo base_url(); ?>module/censuses-for-my-affiliate/">CENSUS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link censusreport" href="<?php echo base_url(); ?>module/census_report/">NUL CENSUS REPORTS</a>
                </li>
              </ul>
      <?php } elseif($this->session->role_id == 1){?>

          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link active censusadmin"  href="<?php echo base_url(); ?>module/census_affiliate/">CENSUS ADMIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link censusreport" href="<?php echo base_url(); ?>module/census_report/">CENSUS REPORTS</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link censususers" href="#" >CENSUS USERS</a>
            </li> -->
            <!--
            <li class="nav-item">
              <a class="nav-link censuspdm" href="#" >PDM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link censususers" href="#" >PROGRAM MATRIX</a>
            </li>
            -->
            <!-- <li class="nav-item">
              <a class="nav-link censususers" href="#" >USERS</a>
            </li> -->

          </ul>


      <?php } else{?>
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link active censuslogout"  <?php echo base_url('/logout'); ?>>Logout</a>
            </li>
          </ul>
      <?php } ?>
          
        </div>
      </nav>
    </div>

  </header>