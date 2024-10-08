

<style>
    body{
    background:#eee;
}

.card{
    border:none;

    position:relative;
    overflow:hidden;
    border-radius:8px;
    cursor:pointer;
}

.card:before{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#E1BEE7;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:after{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#8E24AA;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:hover::after{
    transform:scaleY(1);
}


.fonts{
    font-size:11px;
}

.social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:0;
}

.social-list li{
    padding:10px;
    color:#8E24AA;
    font-size:19px;
}


.buttons button:nth-child(1){
       border:1px solid #8E24AA !important;
       color:#8E24AA;
       height:40px;
}

.buttons button:nth-child(1):hover{
       border:1px solid #8E24AA !important;
       color:#fff;
       height:40px;
       background-color:#8E24AA;
}

.buttons button:nth-child(2){
       border:1px solid #8E24AA !important;
       background-color:#8E24AA;
       color:#fff;
        height:40px;
}
</style>
<?php
include_once "lib/load.php";
get_page('head');
get_page('header');
$user=new user($_SESSION['uid']);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center" style="height: 65vh;justify-content:center;align-items:center;color:black">
        
        <div class="col-md-7" >
            
            <div class="card p-3 py-4" style="background-color: black;text-align:center;">
            <h2 class="mt-2 mb-0" ><?= strtoupper($_SESSION['username'])?></h2>
                
                <div class="text-center" style="margin: 10px;">
                    <img src="blank-profile-picture.webp" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <a href="profile_edit.php"><span class="bg-secondary p-1 px-4 rounded text-white">edit</span></a>
                    <h3><?= $user->getfirst_name();?> <?= $user->getlast_name();?></h3>
                    
                    
                    
                    <div class="px-4 mt-1">
                        <p class="fonts"><?= $user->getbio()?> </p>
                    
                    </div>
                    <div class="text-center mt-3">
                        <h6>DOB: <?= $user->getdate();?></h6>
                    </div>

                    
                     <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                    </ul>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>
<?php get_page('footer');