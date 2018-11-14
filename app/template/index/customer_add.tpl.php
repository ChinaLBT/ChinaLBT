<?php include TXApp::$view_root . "/base/common.tpl.php" ?>
<?php include TXApp::$view_root . "/base/header.tpl.php" ?>

<body class="gray-bg">
    <input type="text" id="name">
    <input type="text" id="phone">
    <input type="text" id="grade">
    <input type="text" id="address">
    <input type="text" id="degree">
    <input type="text" id="time">
    <input type="text" id="remark">
    <button id="add">提交</button>
    <?php include TXApp::$view_root . "/base/footer.tpl.php" ?>
    <script>
        $("#add").click(function () {
            $.ajax({
                type: "POST",
                url: "/customer/addInfo",
                data: {
                    name: $("#name").val(),
                    phone: $("#phone").val(),
                    grade: $("#grade").val(),
                    address: $("#address").val(),
                    degree: $("#degree").val(),
                    time: $("#time").val(),
                    remark: $("#remark").val()
                },
                success: function (res) {
                    console.log(res)
                }
            });
        })
    </script>