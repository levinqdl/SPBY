<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Goods extends CActiveRecord{
    /*
     * 返回当前模型对象的静态方法
     * 重写父类CActiveRecord对应的方法
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /*
     * 返回当前数据表的名字
     *  重写父类CActiveRecord对应的方法
     */
    public function tableName() {
        return 'goods';
    }
    
     /*
     * 可以定义其他方法，调用类似find()  findAll()
     */
    
    //对应标签名字
    function attributeLabels() {
        return array(
            'goods_name'=>'商品名称',
            'goods_category'=>'商品分类',
            'goods_norms'=>'商品规格(长*宽*厚)',
            'goods_material'=>'材质',
            'goods_path'=>'图片',
            'goods_create_time'=>'创建时间',
            //'goods_priority'=>'展示优先级',
            'goods_introduce'=>'简介',
        );
    }
     public function rules() {
        return array(
            
            array('goods_name','required','message'=>'商品名必须填写'),
            
            //分类不为1 范围限制
            array('goods_category','required','message'=>'分类别必须选择'),
            array('goods_category','in','not'=>true,'range'=>array(1),'message'=>'分类必须选择'),
            //必须有上传图片
            array('goods_path','required','message'=>'商品图片必须选择'),
            array('goods_path','file','allowEmpty'=>true,'types'=>'jpeg,bmp,tiff,psd,swf,svg,jpg,png,gif','maxSize'=>1024*1024*10,'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！'), 
            //为没有具体验证规则的属性，设置安全的验证规则，否则attributes不给接收信息
            array('goods_classic,goods_norms,goods_material,goods_create_time,goods_priority,goods_introduce','safe'),
        );
    }
}

