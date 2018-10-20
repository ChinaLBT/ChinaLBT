<?php include TXApp::$view_root . "/base/common.tpl.php" ?>
<?php include TXApp::$view_root . "/base/header.tpl.php" ?>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 第一个选项卡</a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">第二个选项卡</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="">
                                        <ul class="list-inline">
                                            <li><a href="/goods/add" class="btn btn-primary ">添加商品</a></li>
                                            <li><a href="javascript:void(0);" class="btn btn-primary ">添加行</a></li>
                                            <li><a href="javascript:void(0);" class="btn btn-primary ">添加行</a></li>
                                            <li><a href="javascript:void(0);" class="btn btn-primary ">添加行</a></li>
                                            <li><a href="javascript:void(0);" class="btn btn-primary ">添加行</a></li>
                                            <li><a onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">添加行</a></li>
                                        </ul>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover " id="editable">
                                        <thead>
                                            <tr>
                                                <th>商品名称</th>
                                                <th>库存</th>
                                                <th>平台</th>
                                                <th>排序</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeX">
                                                <td>Trident</td>
                                                <td>Internet Explorer 4.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td class="center">4</td>
                                                <td class="center">X</td>
                                            </tr>
                                            <tr class="gradeC">
                                                <td>Trident</td>
                                                <td>Internet Explorer 5.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td class="center">5</td>
                                                <td class="center">C</td>
                                            </tr>
                                            <tr class="gradeA">
                                                <td>Trident</td>
                                                <td>Internet Explorer 5.5
                                                </td>
                                                <td>Win 95+</td>
                                                <td class="center">5.5</td>
                                                <td class="center">A</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>渲染引擎</th>
                                                <th>浏览器</th>
                                                <th>平台</th>
                                                <th>引擎版本</th>
                                                <th>CSS等级</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <strong>移动设备优先</strong>
                            <p>在 Bootstrap 2 中，我们对框架中的某些关键部分增加了对移动设备友好的样式。而在 Bootstrap 3
                                中，我们重写了整个框架，使其一开始就是对移动设备友好的。这次不是简单的增加一些可选的针对移动设备的样式，而是直接融合进了框架的内核中。也就是说，Bootstrap
                                是移动设备优先的。针对移动设备的样式融合进了框架的每个角落，而不是增加一个额外的文件。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include TXApp::$view_root . "/base/footer.tpl.php" ?>
    <script>
        $(function a() {
            // $('.dataTables-example').dataTable();
            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('/goods.php', {
                "callback": function (sValue, y) {
                    console.log(sValue)
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function (value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });
        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "<?=$PRM['last_login']?>",
                "New row",
                "New row",
                "New row",
                "New row"
            ]);
        }
    </script>