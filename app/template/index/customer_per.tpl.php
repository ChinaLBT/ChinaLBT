<?php include TXApp::$view_root . "/base/common.tpl.php" ?>
<?php include TXApp::$view_root . "/base/header.tpl.php" ?>

<body class="gray-bg">
    <style>
        .name_img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color: #fff;
            background: #179d82;
            line-height: 50px;
            text-align: center;
            font-size: 24px;
            margin: 0 auto;
        }
        .text {
            line-height: 50px;
            font-size: 18px;
            color: #000;
        }
    </style>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>个人客户</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">客户管理</a>
                </li>
                <li>
                    <strong>个人客户</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="/customer/add" class="btn btn-primary">新建客户</a>
            </div>
        </div>
    </div>
    <div class="input-group" style="margin:10px;">
        <input type="text" id="search" class="form-control">
        <span class="input-group-btn">
            <button type="button" class="btn btn-primary">搜索</button>
        </span>
    </div>
    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">关闭</span>
                    </button>
                    <i class="fa fa-laptop modal-icon"></i>
                    <h4 class="modal-title">请仔细阅读</h4>
                    <small class="font-bold">这里可以显示副标题。
                    </small>
                </div><small class="font-bold">
                    <div class="modal-body">
                        <div class="text-center" id="cus_id" style="display:none;">

                        </div>
                        <p>
                            是一个完全响应式，基于Bootstrap3.3.6最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本(v2.1.1)，当然，也集成了很多功能强大，用途广泛的jQuery插件，她可以用于所有的Web应用程序，如网站管理后台，网站会员中心，CMS，CRM，OA等等，当然，您也可以对她进行深度定制，以做出更强系统。
                        </p>
                        <div class="form-group"><label>密码</label> <input id="passwd" type="password" placeholder="请输入您的账户密码"
                                class="form-control"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">取消删除</button>
                        <button type="button" class="btn btn-danger" onclick="Del()">确认删除</button>
                    </div>
                </small>
            </div><small class="font-bold">
            </small>
        </div><small class="font-bold">
        </small>
    </div>
    <div class="modal inmodal" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">关闭</span>
                    </button>
                    <i class="fa fa-laptop modal-icon"></i>
                    <h4 class="modal-title">请仔细阅读</h4>
                    <small class="font-bold">这里可以显示副标题。
                    </small>
                </div><small class="font-bold">
                    <div class="modal-body">
                        <p>
                            是一个完全响应式，基于Bootstrap3.3.6最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本(v2.1.1)，当然，也集成了很多功能强大，用途广泛的jQuery插件，她可以用于所有的Web应用程序，如网站管理后台，网站会员中心，CMS，CRM，OA等等，当然，您也可以对她进行深度定制，以做出更强系统。
                        </p>
                        <div class="form-group"><label>密码</label>
                            <div class="col-md-12" id="share"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">取消分享</button>
                        <button type="button" class="btn btn-danger" onclick="share()">确认分享</button>
                    </div>
                </small>
            </div><small class="font-bold">
            </small>
        </div><small class="font-bold">
        </small>
    </div>
    <div id="info"></div>
    <div class="col-md-12 text-center">
        <div class="btn-group">
            <button type="button" id="pages_left" class="btn btn-white"><i class="fa fa-chevron-left"></i>
            </button>
            <!-- <button class="btn btn-white active">1</button> -->
            <!-- <b id="pages"></b> -->
            <button type="button" id="pages_right" class="btn btn-white"><i class="fa fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <?php include TXApp::$view_root . "/base/footer.tpl.php" ?>
    <script>
        $("#search").focus(function () {
            search()
        })
        function search() {
            var seach = setInterval(function () {
                console.log("ok")
            }, 1000);
            $("#search").blur(function () {
                clearInterval(seach);
            })
        }
        var jsParam = <?= $PRM -> json_encode() ?>;
        $.ajax({
            type: "GET",
            url: "/customer/pages",
            success: function (res) {
                // console.log(res);
                for (var page = 1; page <= res; page++) {
                    var pages = '<button class="btn btn-white" id="page_num' + (page - 1) + '" onclick="pages(' + (page - 1) + ');">' + page + '</button>';
                    $("#pages_right").before(pages);
                }
                if (jsParam.page == null) {
                    jsParam.page = 0;
                }
                $("#page_num" + jsParam.page).addClass('active');
                // delete jsParam['page']
                console.log(jsParam.page)

            }
        });
        function pages(page) {
            // console.log(page)
            window.location.href = "/customer/index?pages=" + page;
        }
        console.log(jsParam);
        $.each(jsParam, function (i, item) {
            var text = '<div class="faq-item">';
            text += '<div class="row">';
            text += '<a data-toggle="collapse" href="#info' + item.cus_id + '">';
            text += '<div class="col-md-1">';
            text += '<div class="text text-center"><i class="fa fa-credit-card"></i></div>';
            text += '</div>';
            text += '<div class="col-md-1">';
            text += '<div class="name_img">' + item.name.substr(0, 1) + '</div>';
            text += '</div>';
            text += '<div class="col-md-2">';
            text += '<div class="text">' + item.name.substr(0, 20) + '</div>';
            text += '</div>';
            text += '<div class="col-md-2">';
            text += '<span class="text">' + item.phone + '</span>';
            text += '</div>';
            text += '<div class="col-md-3">';
            text += '<span class="text">' + item.grade + '</span>';
            text += '</div>';
            text += '</a>';
            text += '<div class="col-md-3">';
            text += '<div style="line-height:50px;">';
            text += '<button class="btn btn-info" type="button" onclick="edit(' + item.cus_id + ');"><i class="fa fa-paste"></i>编辑</button>';
            text += '<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#myModal" onclick="readyDel(' + item.cus_id + ');"><i class="fa fa-warning"></i>删除</button>';
            text += '<button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal1" onclick="readyShare(' + item.cus_id + ');"><i class="fa fa-upload"></i>分享</button>';
            text += '</div>';
            text += '</div>';
            text += '</div>';
            text += '<div class="row">';
            text += '<div class="col-sm-12">';
            text += '<div id="info' + item.cus_id + '" class="panel-collapse collapse faq-answer">';
            text += '<p>客户地址：' + item.address + '</p>';
            text += '<p>客户身份：' + item.degree + '</p>';
            text += '<p>客户性别：' + item.sex + '</p>';
            text += '<p>收集时间：' + item.time + '</p>';
            text += '<p>其他备注：' + item.remark + '</p>';
            text += '</div>';
            text += '</div>';
            text += '</div>';
            text += '</div>';
            $("#info").append(text);
        });
        function readyDel(cus_id) {
            $("#cus_id").text(cus_id);
        }
        function edit(cus_id) {
            window.location.href = "/customer/edit?cus_id=" + cus_id;
        }
        function readyShare(cus_id) {
            $("#cus_id").text(cus_id);
            $("#share").children().remove();
            $.ajax({
                type: "POST",
                url: "/customer/readyShare",
                data: { cus_id: cus_id },
                dataType: "json",
                success: function (res) {

                    console.log(res)
                    $.each(res, function (i, item) {
                        // console.log(item.username)
                        var check = '';
                        if (item.check == true) {
                            // $("input[type='checkbox']").prop("checked", true);
                            check = "checked";
                        }
                        var select = '<div class="col-md-3">';
                        select += '<label class="checkbox-inline">';
                        select += '<input type="checkbox"' + check + ' value="option1" id="' + item.u_id + '">' + item.username + '</label>';
                        select += '</div>';
                        $("#share").append(select);
                    })
                }
            });
        }
        function Del() {
            var cus_id = $("#cus_id").text();
            console.log(cus_id);
            $.ajax({
                type: "POST",
                url: "/customer/del",
                data: {
                    passwd: $("#passwd").val(),
                    cus_id: cus_id
                },
                success: function (res) {
                    if (res == 1) {
                        location = location;
                    } else {
                        console.log(res);
                        toastr.error(res, '错误')
                    }
                }
            });
        }
        function share() {
            var u_id = '';
            var cus_id = $("#cus_id").text();
            $("input[type='checkbox']").each(function () {
                var check = $(this).is(':checked')
                if (check) {
                    var isTure = $(this).attr("id");
                    u_id = isTure + ',' + u_id;
                }
            })
            // console.log($("input[type='checkbox']").is(':checked'))
            console.log(cus_id)
            $.ajax({
                type: "POST",
                url: "/customer/share",
                data: {
                    cus_id: cus_id,
                    u_id: u_id
                },
                success: function (res) {
                    if (res == 1) {
                        location = location;
                    }
                }
            });
        }
    </script>