
<?php include TXApp::$view_root . "/base/common.tpl.php" ?>
<?php include TXApp::$view_root . "/base/header.tpl.php" ?>
<body>
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">T</h1>

            </div>
            <h3>欢迎使用 ChinaLBT</h3>

            <!-- <form class="m-t" method="POST" role="form" action="/"> -->
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password" id="passwd" name="passwd" class="form-control" placeholder="密码" required="">
                </div>
                <button type="button" id="submit" class="btn btn-primary block full-width m-b">登 录</button>

            <!-- </form> -->
        </div>
    </div>
    <?php include TXApp::$view_root . "/base/footer.tpl.php" ?>
    <script>
        $("#submit").click(function (e) { 
            if ($("#username").val()=='') {
                toastr.error('请输入用户名!','错误')
            } else if($("#passwd").val()=='') {
                toastr.error('请输入密码!','错误')
            } else {
                $.ajax({
                    type: "POST",
                    url: "/admin",
                    data: {
                        username:$("#username").val(),
                        passwd:$("#passwd").val()
                    },
                    // dataType: "dataType",
                    success: function (res) {
                        if (Number(res)) {
                            console.log(res)
                            window.location.href='/admin'
                        } else {
                            console.log(res)
                            // toastr.error(res,'错误')
                        }
                    }
                });
            }
        });
    </script>