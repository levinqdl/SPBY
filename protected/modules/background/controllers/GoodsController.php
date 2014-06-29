<?php


date_default_timezone_set('PRC');
/**
 * 后台商品管理控制器 
 */
class GoodsController extends Controller {
    /*
     * 商品展示
     */
    function actionShow(){
        //通过数据模型获得商品的全部信息
        $goods_model = Goods::model();
        // 执行sql语句获得每页数据
        $sql="select * from goods order by goods_create_time DESC";
        $goods_infos = $goods_model -> findAllBySql($sql);        
        $this ->renderPartial('show',array('goods_infos'=>$goods_infos));
    }
    
    /*
     * 添加商品
     */
    function actionAdd(){
        $goods_model = new Goods();
        //定义分类
        $category[1] = "-请选择-";
        $category["led发光字制作"] = "led发光字制作";
        $category["广告牌制作"] = "广告牌制作";
        $category["楼宇亮化工程"] = "楼宇亮化工程";
        $category["门头店招制作"] = "门头店招制作";
        $category["不锈钢金属字制作"] = "不锈钢金属字制作";
        $category["LED显示屏制作"] = "LED显示屏制作";
        $category["装饰装潢工程"] = "装饰装潢工程";
        $category["LED显示屏制作"] = "LED显示屏制作";
        $category[ "广告印刷制作"] = "广告印刷制作";
        $category["平面广告设计"] = "平面广告设计";
        $category["企业CI/VI设计"] = "企业CI/VI设计";
        $category["海报、广告设计"] = "海报、广告设计";
        $category["品牌包装设计"] = "品牌包装设计";
        $category["标志商标设计"] = "标志商标设计";
        
        //如果商品有注册表单
        if(isset($_POST['Goods'])){
            $goods_model -> attributes = $_POST['Goods'];
            //$goods_model -> goods_category =$category[ $_POST['Goods']['goods_category']];
            $goods_model -> goods_create_time =date('Y-m-d H:i:s');
            $file = CUploadedFile::getInstance($goods_model,'goods_path');   //获得一个CUploadedFile的实例
            if(is_object($file)&&get_class($file) === 'CUploadedFile'){
               $filename=$file->getName();
               $goods_model->goods_path = './assets/default/img/file_'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称                   
            }
             if ($goods_model->save()) //实现信息存储
                if($file!=NULL){  
                     $file->saveAs($goods_model->goods_path);    // 上传图片 
                     $this->redirect('./index.php?r=background/goods/show');  //重定向到首页
                }                  
        }        
        $this ->renderPartial('add',array('goods_model'=> $goods_model,'category'=>$category));
    }
    
    /*
     * 修改商品
     */
    function actionUpdate($id){
        $goods_model = Goods::model();
        //定义分类
        $category[1] = "-请选择-";
        $category["led发光字制作"] = "led发光字制作";
        $category["广告牌制作"] = "广告牌制作";
        $category["楼宇亮化工程"] = "楼宇亮化工程";
        $category["门头店招制作"] = "门头店招制作";
        $category["不锈钢金属字制作"] = "不锈钢金属字制作";
        $category["LED显示屏制作"] = "LED显示屏制作";
        $category["装饰装潢工程"] = "装饰装潢工程";
        $category["LED显示屏制作"] = "LED显示屏制作";
        $category[ "广告印刷制作"] = "广告印刷制作";
        $category["平面广告设计"] = "平面广告设计";
        $category["企业CI/VI设计"] = "企业CI/VI设计";
        $category["海报、广告设计"] = "海报、广告设计";
        $category["品牌包装设计"] = "品牌包装设计";
        $category["标志商标设计"] = "标志商标设计";
        
        $sql = "select * from goods where goods_id ="."'".$id."'";
        $goods_model = $goods_model -> findBySql($sql);
        $this ->renderPartial('update',array('goods_model'=> $goods_model,'category'=>$category));
    }
    function actionUpdate2(){
        $goods_model = Goods::model();
        echo $_POST['Goods']['goods_category'];
        echo "由于图片有问题，此处测试了";
        echo $_POST['Goods']['goods_category'];
                exit();
        $goods_model -> attributes = $_POST['Goods'];
        $goods_model -> goods_create_time =date('Y-m-d H:i:s');
        $file = CUploadedFile::getInstance($goods_model,'goods_path');   //获得一个CUploadedFile的实例
        if(is_object($file)&&get_class($file) === 'CUploadedFile'){
               $filename=$file->getName();
               $goods_model->goods_path = './assets/default/img/file_'.time().'_'.rand(0,9999).'.'.$file->extensionName;   //定义文件保存的名称                   
               $file->saveAs($goods_model->goods_path);  
         }
         if ($goods_model->save())
         $this->redirect('./index.php?r=background/goods/show');  //重定向到首页
    }
    function actionFindBySql(){
        $goods_model = Goods::model();
        if($_POST['attribute']===NULL||$_POST['attribute']===0||$_POST['value']===NULL){
             $goods_infos = $goods_model -> findAll();
        }else {
            $sql = "select * from goods where ".$_POST['attribute']." LIKE "."'%".$_POST['value']."%'"."order by goods_create_time DESC";        
            $goods_infos = $goods_model -> findAllBySql($sql); 
        }
       // $sql = "select * from goods where goods_category = '楼宇亮化工程'";
        $this ->renderPartial('show',array('goods_infos'=>$goods_infos));
    }
}