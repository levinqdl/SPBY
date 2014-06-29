<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>商品列表</title>

        <link href="<?php echo BACKGROUND_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="./index.php?r=background/goods/add">【添加商品】</a>
                </span>
            </span>
        </div>
        <div>
            <?php
                //判断是否有提示信息
                if(Yii::app()->user->hasFlash('success')){
                    echo Yii::app()->user->getFlash('success');
                }
            ?>
        </div>
        <div class="div_search">
            <span>
                <form action="./index.php?r=background/goods/findBySql&attribute=attribute&value=value" method="post">
                    查询属性<select name="attribute" style="width: 100px;">
                        <option value="0">-请选择-</option>
                        <option value="goods_name">商品名称</option>
                        <option value="goods_category">商品分类</option>
                        <option value="goods_norms">商品规格</option>
                        <option value="goods_material">商品材质</option>
                        <option value="goods_create_time">商品添加时间</option>
                        <option value="goods_priority">商品优先级</option>
                        <option value="goods_introduce">商品简介</option>
                    </select>
                    <input type="text" name="value"/>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>商品名称</td>
                        <td>分类</td>
                        <td>商品规格</td>
                        <td>商品材质</td>
                        <td>商品图片</td>
                        <td>添加时间</td>
                        <td>优先级</td>
                        <td>详细介绍</td>
                        <td  colspan="2" style="text-align: center">操作</td>
                    </tr>
                    
                    <?php
                    //遍历传递过来的商品变量值$goods_infos
                    $i=1;
                    foreach($goods_infos as $_v){
                    ?>
                    <tr id="product1">
                        <td><?php echo $i; ?></td>
                        <td><a href="#"><?php echo $_v->goods_name; ?></a></td>
                        <td><?php echo $_v->goods_category; ?></td>
                        <td><?php echo $_v ->goods_norms; ?></td>
                        <td><?php echo $_v ->goods_material; ?></td>
                        <td><img src="<?php echo $_v ->goods_path; ?>" height="60" width="60"></td>
                        <td><?php echo $_v ->goods_create_time; ?></td>
                        <td><?php echo $_v ->goods_priority ?></td>
                        <td height="10" width="70">
                            <?php 
                                if(strlen($_v ->goods_introduce)<=170)
                                        echo $_v ->goods_introduce;
                                else
                                        echo substr($_v ->goods_introduce,0,169)."...";
                            ?>
                        </td>
                        <td><a href="./index.php?r=background/goods/update&id=<?php echo $_v->goods_id; ?>">修改</a></td>
                        <td><a href="./index.php?r=background/goods/del&id=<?php echo $_v->goods_id; ?>">删除</a></td>
                    </tr>
                    <?php  
                        $i++;
                    }
                    ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php //echo $page_list; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>