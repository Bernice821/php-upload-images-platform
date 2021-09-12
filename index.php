<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>圖片上傳系統</title>

        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- Plugin CSS -->
        <link href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/lib/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="./css/index.css">
    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#006bb3;">
            <div class="container1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html" target="_blank" style="color:white;" >圖片上傳系統</a>
                </div>
            </div>
        </div>
      <div class="banner">
	  <div class="menulist">
	  <div class="up">
		<h2>圖片上傳系統</h2>
		</div>
		<div class="site-nav-toggle">
		<div class="toggle" aria-label="切換導航欄">
		  <span class="toggle-line toggle-line-first"></span>
		  <span class="toggle-line toggle-line-middle"></span>
		  <span class="toggle-line toggle-line-last"></span>
		</div>
	  </div>
		<ul id="menu" class="menu">
			<li class="menu-item menu-item-home">
			<a href="index.html" rel="section"><i class="fa fa-fw fa-home"></i>首頁</a>

		  </li>
				<li class="menu-item menu-item-tags">

			<a href="login.php" rel="section"><i class="fa fa-fw fa-tags"></i>登入</a>

		  </li>
				<li class="menu-item menu-item-categories">

			<a href="/categories/" rel="section"><i class="fa fa-fw fa-th"></i>上傳</a>

		  </li>
		</ul>
	</div>
	</div>
	<div class="main-inner" style="border-style:none;">
	<div class="upload" style="background-color:white; border-style:none;">
	<h5>檔案</h5>
	<div class="row">
	      	<div class="col-lg-12" >
	           <form class="well" style="background-color:hsl(200,60%,93%)"action="upload.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="file">選擇照片上傳</label>
				    <input type="file" name="file[]" multiple>
				  </div>
				  <input type="submit" class="btn btn-primary" value="上傳照片" style="margin-right:73%;">
				  <!--<button type="submit" class="btn btn-primary active" onclick="Connect.php">確認上傳</button>-->
				</form>
			</div>
	      </div>
	<div class="container" style="width:100%;height:500px;overflow:scroll;overflow-X:hidden;background-color:hsl(200,60%,93%);">
    	<div class="row1" style="width:50%;">
	       <?php 
	       	//scan "uploads" folder and display them accordingly
	       $folder = "uploads";
	       $results = scandir('uploads');
	       foreach ($results as $result) {
	       	if ($result === '.' or $result === '..') continue;
	       	if (is_file($folder . '/' . $result)) {
	       		echo '
	       		<div class="col-md-5"style="margin-left:50%;" >
		       		<div class="thumbnail" style="padding:10px;width:240px;height:225px;text-align:center;margin:10px;list-style:none;">
			       		<li><img src="'.$folder . '/' . $result.'" alt="..." width="210" height="130"></li>
				       		<div class="caption">
							<p>檔案名稱:'.$result.'</p>
				       		<p><a href="remove.php?name='.$result.'" class="btn btn-info" type="button">移除</a></p>
			       		</div>
						</div>
	       		</div>';
	       	}
	       }
	       ?>
    	</div>
	</div>
	</div>
	</div>
	</body>
</html>
	


	
	  