<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>National Urban League</title>
  <link rel="stylesheet" href="<?php echo base_url('/resources/css/style.css'); ?>">

  <meta name="theme-color" content="#AA1B20">
  <meta name="msapplication-TileColor" content="#AA1B20">
  <meta name="msapplication-navbutton-color" content="#ffffff">
  <meta name="apple-mobile-web-app-status-bar-style" content="#AA1B20">
</head>

<body>
  <header class="header">

		<!-- Showing Navbar only for the logged in user. -->
		<?php if ( $this->session->has_userdata('logged_in') && $this->session->logged_in ){ ?>
			<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand ml-3" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url('/resources/images/login/NUL-new-logo.png'); ?>" alt="NUL Logo" class="logo1" loading="lazy">
                <img src="<?php echo base_url('/resources/images/login/nationalurbanleague.png'); ?>" alt="NUL Logo" class="logo2" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenuDark"
              aria-controls="mainMenuDark" aria-expanded="false" aria-label="Toggle navigation">
              <i class="i i-burger-menu"></i>
              <i class="i i-close-icon"></i>
            </button>
      
            <div class="collapse navbar-collapse" id="mainMenuDark">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item affiliatehead active">
                  <a class="nav-link"><span>Affiliate Data Management </span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('/user/view-profile/').$this->session->user_id; ?>"><i class="i i-admin"></i><span class="sr-only">Profile</span></a>
								</li>
								<?php if($this->session->role_id==1): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('/user/profile/modules'); ?>"><i class="i i-setting"></i><span class="sr-only">Modules</span></a>
								</li>
								<?php endif; ?>
                <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="i i-notification"></i>
										<div class="rounded_notification"><?=isset($notifications)?count($notifications):'0'?></div>
									</a>
									
									<div class="dropdown-menu dropdown-nul" aria-labelledby="navbarDropdown">
                    <div class="dropdownHead">
                        <h5>Notifications</h5>
                        <div class="rounded_notification"><?=isset($notifications)?count($notifications):''?></div>
                    </div>
                    <ul>
                      <div class="dropContent">
                        <?php foreach($notifications as $notification){ 
                            $curr_time=$notification['created']; 
                            $time_ago =strtotime($curr_time); ?>
                          <li>
                            <div class="col-lg-4 col-md-4 col-4 d-flex justify-content-center align-items-center border-right pr-2">
                              <i class="i i-upload-line"></i>
                            </div>
                            <div class="col-lg-18 col-md-18 col-18 ml-3">
                              <a href="<?php echo base_url('module/affiliate/status/details/'.$notification["affiliate_id"].'?&id='.$notification['notification_id'].'&year='.$notification['document_year'].'&month='.$notification['document_month']); ?>"><?=$notification['notification']?></a>
                                <p class="status">Upload</p>
                                <?php if(isset($time_ago) && !empty($time_ago)){ ?>
                                  <p class="time"><?php echo time_Ago($time_ago); ?></p>
                              <?php  } ?>
                            </div>
                          </li>
                        <?php } ?>
                      </div>
                    </ul>
                    <?php if(isset($notifications) && !empty($notification)){?>
                    <div class="liFoot">
                      <a href="<?php echo base_url('/module/notification/all'); ?>" class="btn btn-primary btn-rounded min w-100px mb-4">VIEW ALL</a>
                    </div>
                    <?php } ?>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="btn-logout" href="<?php echo base_url('/logout'); ?>"><i class="i i-download_left"></i><span class="sr-only">Sign out</span></a>
                </li>
              </ul>
            </div>
        </div>
    	</nav>
		<?php } ?>
		<!-- Navbar End -->
    <?php 
// PHP program to convert timestamp 
// to time ago 
  
function time_Ago($time) { 
    $diff     = time() - $time; 
    $sec     = $diff;  
    $min     = round($diff / 60 ); 
    $hrs     = round($diff / 3600); 
    $days     = round($diff / 86400 ); 
    $weeks     = round($diff / 604800);  
    $mnths     = round($diff / 2600640 );  
    $yrs     = round($diff / 31207680 ); 
    if($sec <= 60) { 
        echo "$sec seconds ago"; 
    } else if($min <= 60) { 
        if($min==1) { 
            echo "one minute ago"; 
        } 
        else { 
            echo "$min minutes ago"; 
        } 
    }else if($hrs <= 24) { 
        if($hrs == 1) {  
            echo "an hour ago"; 
        } 
        else { 
            echo "$hrs hours ago"; 
        } 
    }else if($days <= 7) { 
        if($days == 1) { 
            echo "Yesterday"; 
        } 
        else { 
            echo "$days days ago"; 
        } 
    }else if($weeks <= 4.3) { 
        if($weeks == 1) { 
            echo "a week ago"; 
        } 
        else { 
            echo "$weeks weeks ago"; 
        } 
    } else if($mnths <= 12) { 
        if($mnths == 1) { 
            echo "a month ago"; 
        } 
        else { 
            echo "$mnths months ago"; 
        } 
    }else { 
        if($yrs == 1) { 
            echo "one year ago"; 
        } 
        else { 
            echo "$yrs years ago"; 
        } 
    } 
} ?>
  </header>
