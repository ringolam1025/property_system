<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\District;
use App\Repositories\DBRepository;
use App\Http\Controllers\MasterController;

class DistrictController extends Controller
{
    private $page = "";
    private $page_title = "";
    private $createAction = "";
    private $modifyAction = "";
    private $deleteAction = "";

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
        $result = District::select()->with('subdistrict')->get()->toArray();
        $this->data['listdata'] = Datatables::collection($result)
                                    ->addColumn('action', function($data){
                                            return $this->masterService->generateButtons($data['district_id'], '', $this->data['page_id'], $this->data['deleteAction']);
                                        })->rawColumns(['action'])->make(true);

        if ($request->ajax()) {
            return $this->data['listdata'];
        }
        return view('dashboard.data.districtList', $this->data);
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
        $addToDB = new District();
        $addToDB->district_id = DBRepository::genAutoID('tbl_district', 'district_id', 'D');
        $addToDB->district_eName = $request->input('district_eName');
        $addToDB->district_cName = $request->input('district_cName');
        $addToDB->desc = $request->input('district_desc');    
        $addToDB->displayorder = DBRepository::getDisplayOrder('tbl_district');
        $addToDB->save();

        return redirect('/data/'.$this->data['page_title']."/".$addToDB->district_id)->with('success',$this->data['page_title'].' created successfully');
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
        $this->data['data'] = District::where('district_id', $id)->get();
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
        $this->data['data'] = District::where('district_id', $id)->get();
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
        District::where('district_id',$id)->update($update);
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
        $district = District::where('district_id', 'like', '%'.$id.'%')->delete();
        return redirect()->route('district.index')->with('info',$this->data['page_title'].' deleted successfully');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $searchResult = District::select()->with('subdistrict');
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
            return Datatables::of($searchResult)
                ->addColumn('action', function($data){
                    return $this->masterService->generateButtons($data['district_id'], '', $this->data['page_id'], $this->data['deleteAction']);
            })->rawColumns(['action'])->make(true);
        }
    }

    public static function getFormField()
    {
        $pageSetting = array(
            "page"=>array(
                "id"=>"district",
                "title"=>"District"
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
                'name'=>'district_id',
                'display'=>'District ID',
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
                'name'=> 'district_eName',
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
                'name'=> 'district_desc',
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
                'name'=> 'create_at',
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
                'name'=> 'update_at',
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
