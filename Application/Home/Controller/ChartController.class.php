<?php

/*

Product���洢��Ʒ����
CREATE TABLE `op_Product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(100) NOT NULL,
  `Code` char(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Product` (`Id`,`Code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;




ProductChart���洢K��ͼ����
CREATE TABLE `op_ProductChart` (
  `ItemId` int(11) NOT NULL,
  `IntervalId` int(11) NOT NULL,  //(1:��ʱ 2:5��ͼ 3:15��ͼ 4:30��ͼ 5��Сʱͼ 6������ͼ)
  `High` char(100) NOT NULL,
  `Low` char(100) NOT NULL,
  `Open` char(100) NOT NULL,
  `Close` char(100) NOT NULL,
  `AddTime` char(100) NOT NULL,
  `QuoteTime` char(100) NOT NULL,
  KEY `ItemId` (`ItemId`,`IntervalId`,`AddTime`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

*/


namespace Home\Controller;
use Think\Controller;
class ChartController extends Controller {


    public function GetPrice(){

            
            $Data['Code'] = 'CAD-LME';   //��Ʒ����
            $Data['Price'] = 123;  //ʵʱ��λ
            $Data['High'] = 123;   //������߼�
            $Data['Low'] = 123;    //������ͼ�
            $Data['Open'] = 123;   //���쿪�̼�
            $Data['Close'] = 123;  //�������̼�
			$Data['UpdateTime'] = time();

            $Product = M('Product')->where(array('Code'=>$Data['Code']))->find();
            
            //����K��ͼ����
            $Min = date("i",$Data['UpdateTime']);
			
			
            $Time =  strtotime(date('Y-m-d', $Data['UpdateTime']))+date("H",$Data['UpdateTime'])*60*60;
            //���ɷ�ʱͼ��ÿ����һ��
            for($I=0;$I<60;$I++){
				
                if($Min>= 0 + 1 * $I&&$Min<1+1*$I){$AddTime = $Time+60*1*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>1,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP1['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP1['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP1['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>1,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP1);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>1,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
				echo mysql_error();
            }






            

            //���ɷ�ʱͼ��ÿ5����һ��
            for($I=0;$I<12;$I++){
                if($Min>=0+5*$I&&$Min<5+5*$I){$AddTime = $Time+60*5+60*5*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>2,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP2['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP2['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP2['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>2,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP2);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>2,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }            
            
            
            
            //���ɷ�ʱͼ��ÿ15����һ��
            for($I=0;$I<4;$I++){
                if($Min>=0+15*$I&&$Min<15+15*$I){$AddTime = $Time + 60*15+60*15*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>3,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP3['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP3['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP3['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>3,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP3);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>3,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }   

            //���ɷ�ʱͼ��ÿ30����һ��
            for($I=0;$I<2;$I++){
                if($Min>=0+30*$I&&$Min<30+30*$I){$AddTime = $Time + 60*30+60*30*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>4,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP4['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP4['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP4['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>4,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP4);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>4,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }   

            //���ɷ�ʱͼ��ÿСʱһ��
            for($I=0;$I<1;$I++){
                if($Min>=0+60*$I&&$Min<60+5*$I){$AddTime = $Time + 60*60+60*5*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>5,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP5['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP5['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP5['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>5,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP5);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>5,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }               
               
            //��������ͼ      
            $AddTime = strtotime(date('Y-m-d', $Data['UpdateTime']));      
            $Chart = M('ProductChart')->where(array('IntervalId'=>6,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['High']!=$Chart['High']){$UP6['High']=$Data['High'];}
                if($Data['Low']!=$Chart['Low']){$UP6['Low']=$Data['Low'];}
                if($Data['Close']!=$Chart['Close']){$UP6['Close'] = $Data['Close'];}
                M('ProductChart')->where(array('IntervalId'=>6,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP6);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>6,
                    'High'=>$Data['High'],
                    'Low'=>$Data['Low'],
                    'Open'=>$Data['Open'],
                    'Close'=>$Data['Close'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }                    
                             
    }


    

}