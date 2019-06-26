<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:06
 */
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
include_once 'AutoProduceName.php';

/**
 * 获取设置信息
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
function getSettingValueByKey($key){
    return app('setting')->valueOfKey($key);
}


/**
 * 验证是否展开
 * @return [int] [是否展开tools 0不展开 1展开]
 */
function varifyTools($input,$order=false){
    $tools=0;
    if(count($input)){
        $tools=1;
        if(array_key_exists('page', $input) && count($input)==1) {
            $tools = 0;
        }
        if($order){
            if(array_key_exists('menu_type', $input) && count($input)==1) {
                $tools = 0;
            }
        }
    }
    return $tools;
}

function getSettingValueByKeyCache($key){
    return Cache::remember('getSettingValueByKey'.$key, Config::get('web.cachetime'), function() use ($key){
        return getSettingValueByKey($key);
    });
}


function get_page_custom_value_by_key($page,$key){
    return Cache::remember('zcjy_custom_page_'.$key.'_'.$page->id, Config::get('web.shrottimecache'), function() use ($page,$key) {
        $pageItems = $page->pageItems();
        if (empty($pageItems->get())) {
            return '';
        } else {
            if (empty($pageItems->where('key', $key)->first())) {
                return '';
            } else {
                return $pageItems->where('key', $key)->first()->value;
            }
        }
    });
}

function get_post_custom_value_by_key($post,$key){
    return Cache::remember('zcjy_custom_post_'.$key.'_'.$post->id, Config::get('web.shrottimecache'), function() use ($post,$key) {
        $postItems = $post->items();
        if (empty($postItems->get())) {
            return '';
        } else {
            if (empty($postItems->where('key', $key)->first())) {
                return '';
            } else {
                return $postItems->where('key', $key)->first()->value;
            }
        }
    });
}

/**
 * 在数组$a中任意m个元素组合
 *
 * @param array $a 候选的集合
 * @param int $n 候选的集合大小
 * @param int $m 组合元素大小
 * @param array $b 储存当前组合中的元素，这里储存的是元素键值
 * @param int $M 相当一个常量，一直保持不变
 * @return */
function combine($a,$n,$m,$b,$M){
     for($i=$n;$i>=$m;$i--){
          $b[$m-1]=$i-1;
          if($m > 1){
           $combine[]=combine($a,$i-1,$m-1,$b,$M);
          }else{
           $onecombine='';
           for($j=$M-1;$j>=0;$j--){
            $onecombine.=$a[$b[$j]];
           }
           $combine[]=$onecombine;
           $onecombine='';
          }
     }
    return $combine;
}
/**
 * 递归输出数组
 *
 * @param array $arr 待输出的数组
 * @return int 返回数组元素个数*/
function recursionarray($arr){
     $i=0;
     foreach($arr as $value){
      if(is_array($value)){
       $i =recursionarray($value);
      }else{
       echo $value."<br/>";
       $i ;
      }
     }
     return $i;
}

/**
 * [全排列]
 * @param  [type] $arr [description]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function func2($arr, $str){ // $str 为保存由 i 组成的一个排列情况
    $cnt = count($arr);
    if($cnt == 1){
        echo $str . $arr[0] . "\n<br>";
    }  else {
        for ($i = 0; $i < count($arr); $i++) {
            $tmp = $arr[0];
            $arr[0] = $arr[$i];
            $arr[$i] = $tmp;
            func2(array_slice($arr, 1), $str . $arr[0]);
        }
    }   
}


/**
 * [数组去重]
 * @param  [type] $t [description]
 * @return [type]    [description]
 */
function getunique($t){
    $t2 = array();
    //print_r($t);
    for($i=0;$i<count($t);$i++){
        $count_list = array_count_values($t[$i]);
        $flag = 1;
        foreach($count_list as $ck=>$cv){
            if($cv>1){
                $flag = 0;
                break;
            }
        }
        if($flag){
            sort($t[$i]);
            $flag2 = 1;
            if($t2){
                foreach($t2 as $t2k=>$t2v){
                    if($t[$i]==$t2v){
                        $flag2 = 0;
                        break;
                    }
                }
            }
            if($flag2){
                $t2[] = $t[$i];
            }
        }
    }
    return $t2;
}

/**
 * [指定数组的组合次数]
 * @param  [type] $arr [description]
 * @param  [type] $m   [description]
 * @return [type]      [description]
 */
function getCombinationToString($arr, $m) {
    if ($m ==1) {
       return $arr;
    }
    $result = array();
    
    $tmpArr = $arr;
    unset($tmpArr[0]);
    for($i=0;$i<count($arr);$i++) {
        $s = $arr[$i];
        $ret = getCombinationToString(array_values($tmpArr), ($m-1), $result);
        foreach($ret as $row) {
            //$result[] = $s . $row;
            $temp = array();
            $temp[] = $s;
            if(is_array($row)){
                $temp = array_merge($temp,$row);
            }else{
                $temp[] = $row;
            }
            sort($temp);
            $result[] = $temp;
        }
    }
    return $result;
}

/**
 * 两个数组的笛卡尔积
 * @param unknown_type $arr1
 * @param unknown_type $arr2
*/
function combineArray($arr1,$arr2) {         
    $result = array();
    foreach ($arr1 as $item1) 
    {
        foreach ($arr2 as $item2) 
        {
            $temp = $item1;
            $temp[] = $item2;
            $result[] = $temp;
        }
    }
    return $result;
}

/**
 * 笛卡尔积
 * @return [type] [description]
 */
function combineDika() {
    $data = func_get_args();
    $data = current($data);
    $cnt = count($data);
    $result = array();
    $arr1 = array_shift($data);
    foreach($arr1 as $key=>$item) 
    {
        $result[] = array($item);
    }       

    foreach($data as $key=>$item) 
    {                                
        $result = combineArray($result,$item);
    }
    return $result;
}

/**
 * 所有性格
 */
function characterAll(){
  $list= preg_replace("/\n|\r\n/", "_",getSettingValueByKey('character_all'));
  $list_arr = explode('_',$list);
  return $list_arr;
}

//获取指定前几个数组
function getArrLength($arr,$length){
    $arrs = [];
    $i = 0;
    if(count($arr)){
        foreach ($arr as $key => $value) {
           $i++;
           if($i<=$length){
                array_push($arrs,$value);
           }
        }
    }
    return $arrs;
}

//自动生成名称
function generateName($sex="man"){
    $auto_produce_name = new AutoProduceName($sex);
    $name = $auto_produce_name->getNames();
    return $name;
}

/**
 * 倒序分页显示
 * @parameter [object]
 * @return [array] [desc]
 */
function descAndPaginateToShow($obj){
    if(!empty($obj)){
      return  $obj->orderBy('created_at','desc')->paginate(defaultPage());
    }else{
        return [];
    }
}

/**
 * 默认分页数量
 * @parameter []
 * @return [int] [每页显示数量]
 */
function defaultPage(){
    return empty(getSettingValueByKey('records_per_page')) ? 15 : getSettingValueByKey('records_per_page');
}

