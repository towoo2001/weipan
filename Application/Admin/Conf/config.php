<?php
return array(

 'DEFAULT_MODULE'     => 'Admin',
 'DEFAULT_CONTROLLER'=>'User',//默认控制器
 'DEFAULT_ACTION'   =>  'signin',
    //'配置项'=>'配置值'
   'SHOW_PAGE_TRACE'=>false,
     /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/img',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        
    ),
	'UPLOAD' => array(
	    'maxSize'   => 3145728,                                // 设置附件上传大小
        'exts'      => array('jpg', 'gif', 'png', 'jpeg'),    // 设置附件上传类型
        'rootPath'  => './Uploads/',                    // 设置附件上传根目路
        'thumbPath' => './Uploads/',                    //设置缩略图保存的路径
    ),

	
 
);