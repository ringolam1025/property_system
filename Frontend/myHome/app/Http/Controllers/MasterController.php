<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MasterController extends Controller
{
    public function handleSubTable($arr, $objArr){
        $outputArr = array();
        for ($j=0; $j < sizeof($arr); $j++) {
            $tmp = array();
            for ($i=0; $i < sizeof($objArr['form_field']['columns']); $i++) { 
                $item = $objArr['form_field']['columns'][$i];
                if (isset($item['subTable']) && $item['subTable'].'' != '') {
                    $subTable = explode(".",$item['subTable']);
                    $subTmp = $arr[$j];
                    for ($k=0; $k < sizeof($subTable); $k++) {
                        $subTmp = $subTmp[$subTable[$k]];
                    }
                    $tmp[$item['name']] = $subTmp[$item['name']];
                }else{
                    $tmp[$item['name']] = $arr[$j][$item['name']];
                }
            }
            $outputArr[] = (object)$tmp;
        }
        return $outputArr;
    }
    public function processListField($obj)
    {
        $fields = array();
        for ($i=0;$i<sizeof($obj['columns']);$i++){            
            if ($obj['columns'][$i]['show_in_list']){
                $tmp = array();
                $arr = $obj['columns'][$i];

                $tmp['display'] = $arr['display'];
                $tmp['data'] = $arr['name'];
                $tmp['name'] = $arr['name'];
                $tmp['headerWidth'] = $arr['headerWidth'];                
                $fields[] = $tmp;            
            }                   
        }
        return $fields;
    }

    public function processSearchField($obj)
    {
        $fields = array();
        $main_search = array();
        $sub_search = array();

        for ($i=0;$i<sizeof($obj['columns']);$i++){
            $tmp = array();
            $arr = $obj['columns'][$i];

            $tmp['display'] = $arr['display'];
            $tmp['name'] = $arr['name'];
            $tmp['db_type'] = $arr['db_type'];
            $tmp['searchArea_class'] = $arr['searchArea_class']; 
            if (isset($arr ['option'])){
                $tmp['options'] = $arr ['option'];
            }

            if ($arr['show_in_search'] && !$arr['sub_search']){                   
                $main_search[] = $tmp;
            }else if ($arr['show_in_search'] && $arr['sub_search']){
                $sub_search[] = $tmp;
            }
            
        }
        $fields= array('main_search'=> $main_search, 'sub_search'=> $sub_search);
        return $fields;
    }

    public function processCreateField($obj)
    {
        $fields = array();
        for ($i=0;$i<sizeof($obj['columns']);$i++){
            $tmp = array();
            $arr = $obj['columns'][$i];

            $tmp['display'] = $arr['display'];
            $tmp['name'] = $arr['name'];
            $tmp['db_type'] = $arr['db_type'];
            $tmp['newModal_class'] = $arr['newModal_class'];
            $tmp['group'] = $arr['group']; 
            $tmp['readonly'] = $arr['readonly'];
            if (isset($arr ['option'])){
                $tmp['options'] = $arr ['option'];
            }
            $fields[] = $tmp;
        }
        return $fields;
    }

    public function processGroupList($obj)
    {
        $fields = array();
        for ($i=0;$i<sizeof($obj['group']);$i++){            
            if ($obj['group'][$i]['show']){
                $tmp = array();
                $arr = $obj['group'][$i];

                $tmp['display'] = $arr['display'];
                $tmp['name'] = $arr['name'];
                $tmp['default'] = $arr['default'];    
                $fields[] = $tmp;            
            }                   
        }
        return $fields;
    }

    public function generateButtons($id, $eName, $page_id, $deleteAction)
    {
        $buttons = '';
        $buttons = '<a class="remove" href="javascript:void(0)" data-toggle="modal" data-target="#warningModal" data-name="'.$eName.'" data-id="'.$id.'" data-url="'.$page_id.'/'.$id.'/delete" style="color:red;"><i class="cil cil-x"></i></a>';
        $buttons .= '&nbsp;&nbsp;';
        $buttons .= '<a class="edit" id="'.$id.'" href="'.$page_id.'/'.$id.'/edit" title="Edit" style="color:blue;"><i class="cil cil-pencil"></i></a>';
        return $buttons;
    }

    public function generateControlButtons($id, $data, $deleteAction)
    {
        $buttons = '';
        $buttons = '<a class="remove" href="javascript:void(0)" data-toggle="modal" data-target="#warningModal" data-name="'.$eName.'" data-id="'.$id.'" data-url="'.$page_id.'/'.$id.'/delete" style="color:red;"><i class="cil cil-x"></i></a>';
        $buttons .= '&nbsp;&nbsp;';
        $buttons .= '<a class="edit" id="'.$id.'" href="'.data['page_id'].'/'.$id.'/edit" title="Edit" style="color:blue;"><i class="cil cil-pencil"></i></a>';
        return $buttons;
    }

    public function getDistrict(Request $request)
    {
        $res = array();
        $data = DB::table("tbl_district")->where('district_eName', 'like', '%'.trim($request->q).'%')->get()->toArray();        
        $data = json_decode(json_encode($data), true);
        for ($i=0; $i<sizeof($data); $i++) { 
            $res[] = array("id"=>$data[$i]['district_id'], "text"=>$data[$i]['district_eName']);
        }        
        return response()->json($res);
    }
}

