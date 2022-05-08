<?php

namespace App\Http\Controllers;

use DataTables;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubDistrict;
use App\Repositories\DBRepository;
use App\Http\Controllers\MasterController;

class subDistrictController extends Controller
{
    private $page = "";
    private $page_title = "";
    private $create_action = "";
    private $modify_action = "";
    private $delete_action = "";

    private $form_field = array();
    private $list_field = array();
    private $search_field = array();
    private $create_fields = array();
    private $groups = array();

    public $data = array();

    protected $masterService;

    public function __construct(MasterController $masterService)
	{
        $this->masterService = $masterService;

        $this->data['page_id'] = $this::getFormField()['page']['id'];
        $this->data['page_title'] = $this::getFormField()['page']['title'];
        $this->data['createAction'] = "/data/".$this::getFormField()['page']['id']."/store";
        $this->data['returnAction'] = "/data/".$this::getFormField()['page']['id']."/index";
        $this->data['modifyAction'] = "/data/".$this::getFormField()['page']['id']."/{id}";
        $this->data['deleteAction'] = "/data/".$this::getFormField()['page']['id']."/{id}/delete";

        $this->data['form_field'] = $this::getFormField();
        $this->data['list_field'] = $this->masterService->processListField($this->data['form_field']);
        $this->data['search_field'] = $this->masterService->processSearchField($this->data['form_field']);        
        $this->data['create_fields'] = $this->masterService->processCreateField($this->data['form_field']);
        $this->data['groups'] = $this->masterService->processGroupList($this->data['form_field']);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $result = SubDistrict::select()->with('district')->get()->toArray();
        $this->data['listdata'] = Datatables::collection($result)
                                    ->addColumn('action', function($data){
                                        return $this->masterService->generateButtons($data['sub_district_id'], '', $this->data['page_id'], $this->data['deleteAction']);
                                        })->rawColumns(['action'])->make(true);

        if ($request->ajax()) {
            return $this->data['listdata'];
        }
        return view('dashboard.data.subdistrictList', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['fields'] = $this->data['create_fields'];
        return view('dashboard.shared.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addToDB = new SubDistrict();
        $addToDB->sub_district_id = DBRepository::genAutoID('tbl_subdistrict', 'sub_district_id', 'SD');
        $addToDB->sub_district_eName = $request->input('sub_district_eName');
        $addToDB->sub_district_desc = $request->input('sub_district_desc');
        $addToDB->district_id = $request->input('district_id');        
        $addToDB->displayorder = DBRepository::getDisplayOrder('tbl_subdistrict');
        $addToDB->save();

        return redirect('/data/'.$this->data['page_id']."/".$addToDB->sub_district_id)->with('success',$this->data['page_title'].' created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['fields'] = $this->data['create_fields'];
        $this->data['data'] = SubDistrict::where('sub_district_id', $id)->get();
        foreach($this->data['data'] as $row){    
            for ($i=0;$i<sizeof($this->data['fields']);$i++){
                $v = $this->data['fields'][$i]['name'];
                $key = explode(".",$v);
                if (sizeof($key)>1) {
                    $key = $key[0]."_id";
                    $this->data['fields'][$i]['value'] = $row->$key;
                }else{
                    $this->data['fields'][$i]['value'] = $row->$v;
                } 
            }
        }
        return view('dashboard.shared.create', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $this->data['fields'] = $this->data['create_fields'];
        $this->data['modifyAction'] = str_replace("{id}", $id, $this->data['modifyAction']);
        $this->data['deleteAction'] = str_replace("{id}", $id, $this->data['deleteAction']);
        $this->data['data'] = SubDistrict::where('sub_district_id', $id)->get();
        foreach($this->data['data'] as $row){    
            for ($i=0;$i<sizeof($this->data['fields']);$i++){                
                $v = $this->data['fields'][$i]['name'];
                $key = explode(".",$v);
                if (sizeof($key)>1) {
                    $key = $key[0]."_id";
                    $this->data['fields'][$i]['value'] = $row->$key;
                }else{
                    $this->data['fields'][$i]['value'] = $row->$v;
                }              
            }
        }
        return view('dashboard.shared.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = array();
        foreach($request->all() as $key => $val)
        {
            if ($key.'' != '_method' && $key.'' != '_token' && $val.'' != '') 
            {
                $update[$key] = $val;
            }               
        }
        SubDistrict::where('sub_district_id',$id)->update($update);
        return redirect()->back()->with('success',$this->data['page_title'].' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteDB = SubDistrict::where('sub_district_id', 'like', '%'.$id.'%')->delete();
        return redirect()->route('subdistrict.index')->with('info',$this->data['page_title'].' deleted successfully');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $searchResult = SubDistrict::select()->with('district');
            for ($i=0;$i<sizeof($request->all()['formData']);$i++)
            {
                $key = $request->all()['formData'][$i]['name'];
                $val = $request->all()['formData'][$i]['value'];
                if ($key.'' != '_token' && $val.'' != ''){
                    $tmp = explode(".",$key);
                    if (sizeof($tmp)>1) $key = $tmp[0]."_id";
                    $searchResult->where($key, 'like', '%'.$val.'%');
                }
            }
            $searchResult = $searchResult->get()->toArray();
            return Datatables::collection($searchResult)
                ->addColumn('action', function($data){
                    return $this->masterService->generateButtons($data['sub_district_id'], '', $this->data['page_id'], $this->data['deleteAction']);
            })->rawColumns(['action'])->make(true);
        }
    }

    public function getFormField()
    {
        $pageSetting = array(
            "page"=>array(
                "id"=>"subdistrict",
                "title"=>"Sub District"
            ),
            "group"=>array(
                [
                    "name"=>"general",
                    "display"=>"General",
                    "show"=>1,
                    "default"=>1
                ],
                [
                    "name"=>"system",
                    "display"=>"System",
                    "show"=>1,
                    "default"=>0                
                ]
            ),
            "columns"=>array([
                'name'=>'sub_district_id',
                'display'=>'SubDistrict ID',
                'headerWidth'=>'10',
                'db_type'=>'text',
                'readonly'=>1,
                'group'=>'general',
                'required'=> 1,
                'sortable'=> 1,
                'show_in_search'=> 1,
                'show_in_list'=> 1,
                'searchArea_class'=>'col-md-4',
                'newModal_class'=>'col-md-12',
                'sub_search'=> 0,
                'required'=>1,
                'autofocus'=>0
                
            ],
            [
                'name'=> 'subDistrict_eName',
                'display'=>'Eng. Name',
                'headerWidth'=>'23',
                'db_type'=>'text',
                'readonly'=>0,
                'group'=>'general',
                'required'=>1,
                'sortable'=>1,
                'show_in_search'=>1,
                'show_in_list'=>1,
                'searchArea_class'=>'col-md-4',
                'newModal_class'=>'col-md-6',
                'sub_search'=>0,
                'required'=>1,
                'autofocus'=>0
            ],
            [
                'name'=> 'district.district_eName',
                'display'=>'District',
                'headerWidth'=>'39',
                'db_type'=>'select',
                'option'=>DBRepository::getDistrictSelectData(),
                'readonly'=>0,
                'group'=>'general',
                'required'=>1,
                'sortable'=>1,
                'show_in_search'=>0,
                'show_in_list'=>1,
                'searchArea_class'=>'col-md-6',
                'newModal_class'=>'col-md-6',
                'sub_search'=>1,
                'required'=>1,
                'autofocus'=>0
            ],
            [
                'name'=> 'subDistrict_desc',
                'display'=>'Description',
                'headerWidth'=>'39',
                'db_type'=>'textarea',
                'readonly'=>0,
                'textarea_row'=>'9',
                'group'=>'general',
                'required'=>1,
                'sortable'=>1,
                'show_in_search'=>1,
                'show_in_list'=>1,
                'searchArea_class'=>'col-md-12',
                'newModal_class'=>'col-md-12',
                'sub_search'=>1,
                'required'=>1,
                'autofocus'=>0
            ],
            [
                'name'=> 'created_at',
                'display'=>'Created on',
                'headerWidth'=>'2',
                'db_type'=>'datetime',
                'readonly'=>1,
                'textarea_row'=>'textarea',
                'group'=>'system',
                'required'=>1,
                'sortable'=>1,
                'show_in_search'=>0,
                'show_in_list'=>0,
                'searchArea_class'=>'col-md-12',
                'newModal_class'=>'col-md-6',
                'sub_search'=>1,
                'required'=>1,
                'autofocus'=>1
            ],
            [
                'name'=> 'updated_at',
                'display'=>'Updated on',
                'headerWidth'=>'2',
                'db_type'=>'datetime',
                'readonly'=>1,
                'textarea_row'=>'textarea',
                'group'=>'system',
                'required'=>1,
                'sortable'=>1,
                'show_in_search'=>0,
                'show_in_list'=>0,
                'searchArea_class'=>'col-md-12',
                'newModal_class'=>'col-md-6',
                'sub_search'=>1,
                'required'=>1,
                'autofocus'=>1
            ])
        );
        return $pageSetting;
    }
}
