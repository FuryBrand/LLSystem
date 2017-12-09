<?php include('./pages/islogin.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>欢迎使用SJAE后台管理系统</title>
  <link href="../view/css/base.css" rel="stylesheet">

  <!--common-->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <script src="js/jquery-1.10.2.min.js"></script>
  <style type="text/css">
    div.validator-error {
      color: #f00;
      font-size: 12px;
      font-weight: bold;
      margin: 5px 0;
    }
    label.error {
      color: #f00;
    }
    input.error, select.error, textarea.error {
      border: 1px solid red;
      background-color: #fff6f6;
    }
  </style>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

  <section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt=""></a>
          </div>-->

          <div class="logo-icon text-center">
            <a href="index.html"><img src="images/logo_icon.png" alt=""></a>
          </div>
          <!--logo and iconic logo end-->

          <div class="left-side-inner">
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav" id="navBar">
              <li id="welcome"><a href="./index.php?page=welcome"><i class="fa fa-smile-o"></i><span>欢迎使用</span></a></li>
              <li id="changeNav"><a href="./index.php?page=changeNav"><i class="fa fa-list-ul"></i><span>导航栏</span></a></li>
              <li id="sliderUpload"><a href="./index.php?page=sliderUpload"><i class="fa fa-film"></i><span>轮播图</span></a></li>
              <li class="menu-list"><a href=""><i class="fa fa-columns"></i> <span>新闻管理</span></a>
                <ul class="sub-menu-list">
                  <li id="newsType"><a href="./index.php?page=newsType">分类</a></li>
                  <li id="newsList"><a href="./index.php?page=newsList">列表</a></li>
                  <li id="newsAdd"><a href="./index.php?page=newsAdd">添加</a></li>
                </ul>
              </li>
              <li class="menu-list"><a href=""><i class="fa fa-archive"></i> <span>产品管理</span></a>
                <ul class="sub-menu-list">
                  <li id="productsallType"><a href="./index.php?page=productsallType">分类</a></li>
                  <li id="productsallList"><a href="./index.php?page=productsallList">列表</a></li>
                  <li id="productsallAdd"><a href="./index.php?page=productsallAdd">添加</a></li>
                </ul>
              </li>

              <!--<li id="prodPic"><a href="./index.php?page=prodPic"><i class="fa fa-picture-o"></i><span>产品展示图</span></a></li>-->
              <li id="changePwd"><a href="./index.php?page=changePwd"><i class="fa fa-key"></i><span>修改密码</span></a></li>
              <li id=""><a href="#" onclick="delCookie('user')"><i class="fa fa-sign-in"></i> <span>安全退出</span></a></li>
            </ul>
            <!--sidebar nav end-->

          </div>
        </div>
        <!-- left side end-->

        <!-- main content start-->
        <div class="main-content" >

          <!--body wrapper start-->
          <div class="wrapper">
            <?php
            if(array_key_exists('page', $_GET)){
             $page=$_GET['page'];
             switch ($page) {
              case 'changePwd':
              include("./pages/changePwd.php");
              break;
              default:
              include("./pages/welcome.php");
              break;
              case 'changeNav':
              include("./pages/changeNav.php");
              break;
              case 'sliderUpload':
              include("./pages/sliderUpload.php");
              break;
              case 'news':
              include("./pages/article.php");
              break;
              case 'prodPic':
              include("./pages/prodPic.php");
              break;
              case 'newsType':
              include("./pages/newsType.php");
              break;
              case 'newsList':
              include("./pages/newsList.php");
              break;
              case 'newsAdd':
              include("./pages/newsAdd.php");
              break;
              case 'productsallType':
              include("./pages/productsallType.php");
              break;
              case 'productsallList':
              include("./pages/productsallList.php");
              break;
              case 'productsallAdd':
              include("./pages/productsallAdd.php");
              break;
            }
          }else{
            include("./pages/welcome.php");
          }
          ?>
        </div>
        <!--body wrapper end-->
        <div style="width:100%;height:50px">
        </div>
        <!--footer section start-->
        <footer style="position:fixed">
          <div style="color:#65CEA7;">盛达杰森(北京)自动化设备有限公司后台管理系统</div>
        </footer>
        <!--footer section end-->


      </div>
      <!-- main content end-->
    </section>

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/fm.validator.js"></script>
    <!--common scripts for all pages-->
    <script src="js/scripts.js"></script>

    <script type="text/javascript">
      function delCookie(name)
      {
        var exp = new Date();
        exp.setTime(exp.getTime() + (-1 * 24 * 60 * 60 * 1000));
        var cval=getCookie(name);
        if(cval!=null){
          document.cookie= name + "="+cval+"; expires="+exp.toGMTString()+"; path=/";
        }
        window.location.href='./login.php';
      }
      function getCookie(name)
      {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
          return unescape(arr[2]);
        else
          return null;
      }

      function GetQueryString(name)
      {
       var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
       var r = window.location.search.substr(1).match(reg);
       if(r!=null)return  unescape(r[2]); return null;
     }

     $(function(){
      var page=GetQueryString('page');
      $("#"+page).addClass("active").parents(".menu-list").addClass('nav-active');

      Validator.language = 'zh-cn';
    });
   </script>
 </body>
 </html>
