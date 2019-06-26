<?php

namespace App\Repositories;

use App\Models\NameSet;
use InfyOm\Generator\Common\BaseRepository;
use Log;

/**
 * Class NameSetRepository
 * @package App\Repositories
 * @version July 19, 2018, 9:27 am CST
 *
 * @method NameSet findWithoutFail($id, $columns = ['*'])
 * @method NameSet find($id, $columns = ['*'])
 * @method NameSet first($columns = ['*'])
*/
class NameSetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'use_time',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NameSet::class;
    }

    /**
     * [根据name获取当前对象]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public function getAttrByName($name){
        return NameSet::where('name',$name)->first();
    }

    #根据5个性格和性别获取姓名列表
    public function varifyCharacterGivenName($character_arr,$sex){
        if(!is_array($character_arr)){
            $character_arr = explode(',', $character_arr);
        }
       // dd($character_arr);
        #取出所有姓氏 并且使用次数是最少的
        $surnames =  NameSet::where('type','姓氏')->orderBy('use_time','asc')->get();
        #在所有姓氏中挑选 5个性格最符合的
        $surnames = $this->dealWithCharacterForNames($character_arr,$surnames,'surname');

        if($sex == 'man'){
            $sex_type = '男生名字';
        }
        else{
            $sex_type = '女生名字';
        }

        $names = NameSet::where('type',$sex_type)->orderBy('use_time','asc')->get();

        $names = $this->dealWithCharacterForNames($character_arr,$names,'name');
        #合并数组
        $name_arr = array_merge($surnames,$names);
        #去重 组合
        $name_arr =  getunique(getCombinationToString($name_arr,2));
        #处理名字组合
        $name_arr = $this->dealNameCombinations($name_arr);
        #只取5个名字
        //$name_arr = getArrLength($name_arr,5);
        //$given_name = $surname_name->name.' '. $name->name;
        return $name_arr;
    }

    #处理姓名组合
    private function dealNameCombinations($name_arr){
        $name_combination = [];
        $i=0;
        foreach ($name_arr as $key => $names) {
            $i++;
            $name_attr1 = $this->getAttrByName($names[0]);
            $name_attr2 = $this->getAttrByName($names[1]);
            //dd(mb_substr($name_attr2->type,1,2,'utf-8'));
            //Log::info(mb_substr($name_attr1->type,1,3,'utf-8'));
            //Log::info(mb_substr($name_attr2->type,1,3,'utf-8'));
            #过滤相同类型的
            if($name_attr1->type == $name_attr2->type || mb_substr($name_attr1->type,1,3,'utf-8') == mb_substr($name_attr2->type,1,3,'utf-8')){
                unset($name_arr[$key]);
                continue;
                Log::info('去除');
                //break;
            }
            if($name_attr1->type == '姓氏'){
                $surname = $name_attr1->name;
                $name = $name_attr2->name;
            }
            else{
                $name = $name_attr1->name;
                $surname = $name_attr2->name;
            }
            //if($i<6){
                array_push($name_combination,$surname.' '.$name);
            //}
        }
        return $name_combination;

    }

    #处理性格根据名字列表
    private function dealWithCharacterForNames($character_arr,$names){
        foreach ($names as $key => $surname) {
             $surname['i'] = 0;
        }
        foreach ($character_arr as $key => $character) {
                foreach ($names as $key => $name) {
                   $characters = $name->characters()->get();
                   foreach ($characters as $key => $character_name) {
                        if($character == $character_name->character){
                            $name['i'] = $name['i'] + 1 ;
                        }
                   }
                }
        }
        //$id = 0;
        //$max_time = $names->max('i');
        #清除没有的
        foreach ($names as $key => $name_item) {
            if($name_item['i'] == 0){
                unset($names[$key]);
            }
            // if($name_item['i'] == $max_time){
            //     $id = $name_item->id;
            // }
        }
        $name_arr = [];
        #只要name
        foreach ($names as $key => $value) {
            array_push($name_arr,$value->name);
        }
        //$name = $this->findWithoutFail($id);
        return $name_arr;
    }

}
