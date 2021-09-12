<?php
   ob_start();
   session_start();
?>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <title>醫院上傳系統</title>
		<link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- Plugin CSS -->
        <link href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		 <style type="text/css">
            body {
                padding-top: 70px; margin-bottom: 15px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                font-family: "Roboto", "SF Pro SC", "SF Pro Display", "SF Pro Icons", "PingFang SC", BlinkMacSystemFont, -apple-system, "Segoe UI", "Microsoft Yahei", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
                font-weight: 400;
            }
            h2        { font-size: 1.6em; }
            hr        { margin-top: 10px; }
            .tab-pane { padding-top: 10px; }
            .mt0      { margin-top: 0px; }
            .footer   { font-size: 12px; color: #666; }
            .label    { display: inline-block; min-width: 65px; padding: 0.3em 0.6em 0.3em; }
            .string   { color: green; }
            .number   { color: darkorange; }
            .boolean  { color: blue; }
            .null     { color: magenta; }
            .key      { color: red; }
            .popover  { max-width: 400px; max-height: 400px; overflow-y: auto;}
            .list-group.panel > .list-group-item {
            }
            .list-group-item:last-child {
                border-radius:0;
            }
            h4.panel-title a {
                font-weight:normal;
                font-size:14px;
            }
            h4.panel-title a .text-muted {
                font-size:12px;
                font-weight:normal;
                font-family: 'Verdana';
            }
            
            @media (max-width: 1620px){
                #sidebar {
                    margin:0;
                }
                #accordion {
                    padding-left:235px;
                }
            }
            @media (max-width: 768px){
                #sidebar {
                    display: none;
                }
                #accordion {
                    padding-left:0px;
                }
            }
            .label-primary {
                background-color: #248aff;
            }
			.log{
				font-size:12px;
                font-weight:normal;
                font-family: 'Verdana';
				padding-left:7%;

			}
			.input{
				padding-top:20px;
				font-size:14px;
                font-weight:normal;
                font-family: 'Verdana';
				position:absolute;
				top:50%;
				left:50%;
				margin-top: -100px;     /*高度的一半*/
				margin-left: -200px;    /*
			}
			.container:
			{
				padding-top:20px;
				font-size:14px;
                font-weight:normal;
                font-family: 'Verdana';
				position:absolute;
				top:50%;
				left:50%;
				margin-top: -100px;     /*高度的一半*/
				margin-left: -200px;    /*
			}
			.form-signin {
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
				color: #017572;
			}
         
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
				margin-bottom: 10px;
			}
			 
			.form-signin .checkbox {
				font-weight: normal;
			}
			 
			.form-signin .form-control {
				position: relative;
				height: auto;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				padding: 30px;
				font-size: 16px;
			}
			 
			.form-signin .form-control:focus {
				z-index: 2;
			}
			 
			.form-signin input[type="email"] {
				margin-bottom: -1px;
				border-bottom-right-radius: 0;
				border-bottom-left-radius: 0;
				border-color:#017572;
			}
			 
			.form-signin input[type="password"] {
				margin-bottom: 10px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
				border-color:#017572;
			}
			.container h3{
				font-size:10px;
			}
        </style>
    </head>
	<body>
	<!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./" target="_blank">醫院上傳系統</a>
                </div>
            </div>
        </div>
		<div class="log">
		<h2>會員登入</h2>
		<div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'admin' && 
                  $_POST['password'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'admin';
                  
                  echo '<span style="color: blue; font-size: 13px;">登入成功';
				  header('Refresh:0; URL = index.html');
               }else {
                  $msg ='<span style="color:red;font-size: 10px;"> 錯誤帳號或密碼，請重新輸入!</span>';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      <h2>輸入帳號密碼:</h2> 
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "帳號 = admin" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "密碼= 1234" required>
			   <br>
            <button class = "btn-info" type = "submit" 
               name = "login">Login</button>
         </form>
      </div>  	  
		</div>
