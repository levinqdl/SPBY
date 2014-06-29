<?php
/**
 * 后台管理员登录控制器
 * 13-5-8 下午9:03 
 */
class ManagerController extends Controller{
    /*
     * 实现用户登录
     */
    function actionLogin(){
        //创建登录模型对象
        $user_login = new LoginForm;
        
        if(isset($_POST['LoginForm'])){
            //收集表单信息
            $user_login->attributes = $_POST['LoginForm'];
            
            //校验数据,走的是rules()方法
            //该地方不只校验用户名和密码是否填写，还要校验真实性(在模型里边自定义方法校验真实性)
            //用户信息进行session存储，调用模型里边的一个方法login()，就可以进行session存储
            
            if($user_login->validate() && $user_login->login()){
                $this ->redirect ('./index.php?r=background/index');
            }
        }
        
        //$this -> renderPartial('login',array('user_login'=>$user_login));
        //$this ->redirect ('./index.php?r=background/index');
        $this ->renderPartial('login',array('user_login'=>$user_login));
    }
     function actionLogout(){
        //删除session信息
        Yii::app()->session->clear();  //删除内存里边sessiion变量信息
        Yii::app()->session->destroy(); //删除服务器的session文件
        
        //session和cookie一并删除
        //Yii::app()->user->logout();
        
        $this ->redirect ('./index.php?r=background/mannager/login');
    }

}