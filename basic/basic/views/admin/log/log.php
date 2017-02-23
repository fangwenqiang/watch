
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
    <div id="dcMain" >
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>操作记录</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>操作记录</h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" style="font-size: 14px;">
                <tr>
                    <th width="30" align="center">编号</th>
                    <th width="150" align="left">操作时间</th>
                    <th width="100" align="center">操作者</th>
                    <th align="left">操作记录</th>
                    <th width="100" align="center">IP地址</th>
                </tr>
                <?php foreach($data as $key=>$val){ ?>
                    <tr>
                        <td align="center"><?php echo $val['log_id']?></td>
                        <td><?php echo date('Y-m-d H:i:s',$val['log_time'])?></td>
                        <td align="center"><?php echo $val['username']?></td>
                        <td align="left"><?php echo $val['log_msg']?></td>
                        <td align="center"><?php echo $val['log_ip']?></td>
                    </tr>
               <?php }?>
            </table>
            <div class="pager">总计 12 个记录，共 1 页，当前第 1 页 | <a href="manager.php?rec=manager_log&page=1">第一页</a> 上一页 下一页 <a href="manager.php?rec=manager_log&page=1">最末页</a></div>           </div>
    </div>