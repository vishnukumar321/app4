<body>
    <style>
        .poppins-extralight {
  font-family: "Poppins", sans-serif;
  font-weight: 200;
  font-style: normal;
}
        *{
            
            padding: 0px;
            margin: 0px;
        }
        /* body{
            background-image: url('back.jpg') !important;
            background-attachment: fixed;
        } */
        /* .main3{
            background-color: transparent !important;
            backdrop-filter: blur(20px);
        } */
        .header{
            padding: 15px;
            height: auto;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .comm{
            width: 33%;
        }
        .menu{
            display: flex;
            align-items:center;
            justify-content: end;
        }
        .submenu,.submenu1{
            transition: 0.2s;
            width: 70px;
            padding: 2px;
            margin-right: 15px;
            border: 1px solid;
            border-radius: 40px;
        }
        .submenu1{
            background-color: #d30000;
            color: white;
            border-color: #d30000;
        }
        .submenu:hover{
            background-color: #0858d1;
            color: white;
            border-color: #0858d1;
        }
        .submenu1:hover{
            background-color: red;
            color: black;
        }
        
    </style>
    <div class="header main3">
        <div class="comm">
            <div>
            <a style="text-decoration: none;color: white; display: flex;" href="index.php"><img style="width: 185px;height:54px" src="album3.png"></a>
            </div>
        </div>
        <div class="comm"></div><?php 
        if(isset($_SESSION['token'])){
            ?><div class="menu comm">
            <div>
                <a href="index.php?a=clear"><button class="submenu1">Logout</button></a>
            </div>

        </div><?php
        }else{
            ?><div class="menu comm">
            <div>
                <a href="signup.php"><button class="submenu">Signup</button></a>
            </div>
            <div>
                <a href="login.php"><button class="submenu">Login</button></a>
            </div>

        </div><?php
        }
        ?>
        
    </div>