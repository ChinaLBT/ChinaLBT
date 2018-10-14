
<?php include TXApp::$view_root . "/base/common.tpl.php" ?>
<?php include TXApp::$view_root . "/base/header.tpl.php" ?>
<body>
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">T</h1>

            </div>
            <h3>欢迎使用 ChinaLBT</h3>

            <form class="m-t" method="POST" role="form" action="/">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="passwd" class="form-control" placeholder="密码" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>


                <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>
                </p>

            </form>
        </div>
    </div>
    <?php include TXApp::$view_root . "/base/footer.tpl.php" ?>