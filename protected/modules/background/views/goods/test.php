<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$goods_model = new Goods();

    $back[0]="hello";
        $back[1]="hi";

        {
            $_POST['Goods']['goods_category']="1";
            $goods_model->goods_category=0;
        
         $goods_model -> goods_category=$back[ $_POST['Goods']['goods_category']];
         $i=$goods_model -> goods_category;
        }
        echo "$_POST[$category]";
        echo "$i";
