<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品信息</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo BACKGROUND_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <style type="text/css">
            div .errorMessage{color:red;}
             label  .required {color:red;}
        </style>
 
        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=background/goods/show">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            
            <?php $form = $this -> beginWidget('CActiveForm',array( 'id'=>'link-form','enableAjaxValidation'=>false,'htmlOptions' => array('enctype'=>'multipart/form-data'),'action'=>'./index.php?r=background/goods/update2')); 
            ?>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>
                        <?php echo $form -> labelEx($goods_model, 'goods_name') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($goods_model,'goods_name',array('maxlength'=>20,'class'=>'abc')); ?>
                         <?php echo $form ->error($goods_model,'goods_name'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form -> labelEx($goods_model, 'goods_category') ?>
                    </td>
                    <td>
                        <?php echo $form -> dropDownList($goods_model,'goods_category',$category); ?>
                        <?php echo $form->error($goods_model,'goods_category'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form -> labelEx($goods_model, 'goods_norms') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($goods_model,'goods_norms'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form -> labelEx($goods_model, 'goods_material') ?>
                    </td>
                    <td>
                        <?php echo $form -> textField($goods_model,'goods_material'); ?>
                    </td>
                </tr>
                <!--
               图片路径
                -->
                 <tr>
                    <td>
                        <?php echo $form->labelEx($goods_model, 'goods_path'); ?>  
                    </td>
                    <td>
                        <?php //echo $form -> textField($goods_model,'goods_path'); ?>
                        <?php echo $form->FileField($goods_model, 'goods_path'); ?> 
                        <?php echo $form->error($goods_model, 'goods_path'); ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <?php echo $form -> labelEx($goods_model, 'goods_introduce');?>
                    </td>
                    <td>
                        <?php echo $form -> textArea($goods_model,'goods_introduce',array('cols'=>60,'rows'=>10)); ?>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="id" value="0"></input>
                        <input type="submit" value="提交">
                    </td>
                </tr>  
            </table>
            <?php $this -> endwidget(); ?>
        </div>
    </body>
</html>