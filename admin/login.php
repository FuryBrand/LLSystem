<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>登陆</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

    <div class="container">

        <div class="form-signin">
            <div class="form-signin-heading text-center">
                <h1 class="sign-title">欢迎使用SJAE后台管理系统</h1>
                <img src="../view/imgs/icon.png" style="width:130px"/>
            </div>
            <div class="login-wrap">
                <input type="text" name="uname" id="uname" class="form-control" placeholder="请输入用户名" autofocus>
                <input type="password" name="pwd" id="pwd" class="form-control" placeholder="请输入密码">

                <button class="btn btn-lg btn-login btn-block" onclick="login()">
                    <i class="fa fa-check"></i>
                </button>
            </div>

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-primary" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

        </div>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script type="text/javascript">
        function login(id){
            var uname=$("#uname").val();
            var pwd=$("#pwd").val();
            $.ajax({
                url: '../controller/ajax.php?fun=login',
                type: 'POST',
                dataType: 'json',
                data:{uname:uname,pwd:pwd}
            })
            .done(function(data) {
                if(data.succ){
                    setCookie('user',uname,1)
                    window.location.href="./index.php";
                }else{
                    alert("登录失败,请重试!");
                    window.location.reload();
                }
            })
            .fail(function(a,b,c) {
                alert("登录错误!");
                console.log(a.responseText);
            })
        }

        function setCookie(name,value,expirehour)
        {
            var d = new Date();
            d.setTime(d.getTime() + (expirehour*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = name + "=" + value + "; " + expires+"; path=/";
        }
    </script>
</body>
</html>
