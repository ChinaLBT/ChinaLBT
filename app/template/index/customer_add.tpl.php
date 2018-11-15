<?php include TXApp::$view_root . "/base/common.tpl.php" ?>
<?php include TXApp::$view_root . "/base/header.tpl.php" ?>

<body class="gray-bg">
    <!-- <input type="text" id="name">
    <input type="text" id="phone">
    <input type="text" id="grade">
    <input type="text" id="address">
    <input type="text" id="degree">
    <input type="text" id="time">
    <input type="text" id="remark">
    <button id="add">提交</button> -->
    <div class="ibox-content">
        <form class="form-horizontal m-t" id="signupForm">
            <div class="form-group">
                <label class="col-sm-3 control-label">客户名字：</label>
                <div class="col-sm-8">
                    <input id="name" class="form-control" type="text" aria-required="true" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">客户手机号：</label>
                <div class="col-sm-8">
                    <input id="phone" class="form-control" type="text" aria-required="true" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">客户性质：</label>
                <div class="col-sm-8">
                    <input id="grade" class="form-control" type="text">
                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 比如：直接客户、代理商等</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">客户地址：</label>
                <div class="col-sm-8">
                    <input id="address" class="form-control" type="text" aria-required="true" aria-invalid="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">客户身份：</label>
                <div class="col-sm-8">
                    <input id="degree" class="form-control" type="text">
                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 比如：高管、经理等</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">客户性别：</label>
                <div class="col-sm-8">
                    <label class="radio-inline">
                        <input type="radio" checked="" value="男" name="sex">男</label>
                    <label class="radio-inline">
                        <input type="radio" value="女" name="sex">女</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">其他备注：</label>
                <div class="col-sm-8">
                    <input id="remark" class="form-control" type="text" aria-required="true" aria-invalid="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">客户信息分享：</label>
                <div id="share"></div>
            </div><br>
            <div class="from-group">
                <label class="col-sm-3 control-label">采集时间：</label>
                <div class="col-sm-8">
                    <input readonly="" class="form-control layer-date" id="time">
                    <label class="laydate-icon inline demoicon" onclick="laydate({elem: '#time'});"></label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                    <button class="btn btn-primary" type="button" id="add">提交</button>
                </div>
            </div>
        </form>
    </div>
    <?php include TXApp::$view_root . "/base/footer.tpl.php" ?>
    <script>
        var jsParam = <?= $PRM -> json_encode() ?>;
        console.log(jsParam)
        if(jsParam != '') {
                $("#name").val(jsParam.[0].name);
        }
        Share();
        $("#add").click(function () {
            var u_id = '';
            $("input[type='checkbox']").each(function() {
                var check = $(this).is(':checked')
                if (check) {
                    var isTure=$(this).attr("id");
                    u_id = isTure +','+ u_id ;
                }
            })
            console.log(u_id)
            console.log($('input[name="sex"]:checked ').val())
            console.log($("#time").val())
            $.ajax({
                type: "POST",
                url: "/customer/addInfo",
                data: {
                    name: $("#name").val(),
                    phone: $("#phone").val(),
                    grade: $("#grade").val(),
                    sex:$('input[name="sex"]:checked ').val(),
                    address: $("#address").val(),
                    degree: $("#degree").val(),
                    time: $("#time").val(),
                    remark: $("#remark").val(),
                    u_id:u_id,
                },
                success: function (res) {
                    console.log(res)
                }
            });
        })
        function Share() {
            // $("#cus_id").text(cus_id);
            // $("#share").children().remove();
            $.ajax({
                type: "POST",
                url: "/customer/readyShare",
                // data:{cus_id:cus_id},
                dataType: "json",
                success: function (res) {
                    
                    console.log(res)
                    $.each(res, function (i, item) {
                        // console.log(item.username)
                        var check = '';
                        if(item.check == true) {
                            // $("input[type='checkbox']").prop("checked", true);
                            check = "checked";
                        }
                        var select = '<div class="col-md-1">';
                        select += '<label class="checkbox-inline">';
                        select += '<input type="checkbox"'+check+' value="option1" id="' + item.u_id + '">' + item.username + '</label>';
                        select += '</div>';
                        $("#share").append(select);
                    })
                }
            });
        }
    </script>