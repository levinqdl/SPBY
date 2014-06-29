<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Manager extends CActiveRecord{
    //在当前模型增加一个属性password2，因为数据库表里边没有这个属性
    //我们可以在当前类直接设置这个属性使用
    public $manager_password2;
    
    //获得数据模型方法
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    //定义数据表名字
    public function tableName(){
        return "mananger";
    }
    
    //设置标签名字与数据库字段对应
    public function attributeLabels() {
        return array(
            'manager_name'=>'用户名',
            'manager_password'=>'密  码',
            'manager_password2'=>'确认密码',
            'manager_gender'=>'性  别',
            'manager_email'=>'邮  箱',
            'manager_tel'=>'手机号码',
        );
    }
    public function rules() {
        return array(
            
            array('manager_name','required','message'=>'用户名必填'),
           
            //用户名不能重复(与数据库比较)
            array('manager_name', 'unique', 'message'=>'用户名已经占用'),
            
            array('manager_password','required','message'=>'密码必填'),
            
            //验证确认密码password2  要与密码的信息一致
            array('manager_password2','compare','compareAttribute'=>'password','message'=>'两次密码必须一致'),
            
            //邮箱默认不能为空
            array('manager_email','email','allowEmpty'=>false,  'message'=>'邮箱格式不正确'),
            
            
            //验证手机号码(都是数字，13开始，一共有11位)
            array('manager_tel','match','pattern'=>'/^13\d{9}$/','message'=>'手机号码格式不正确'),

            //为没有具体验证规则的属性，设置安全的验证规则，否则attributes不给接收信息
            array('manager_tel','safe'),
        );
    }
    
}