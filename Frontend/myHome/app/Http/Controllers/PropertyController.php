<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Repositories\DBRepository;
use App\Http\Controllers\MasterController;

class propertyController extends Controller
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
        $result = Property::select()->with('phase')->get()->toArray();
        $this->data['listdata'] = Datatables::collection($result)
                                            ->addColumn('action', function($data){
                                                return $this->masterService->generateButtons($data['property_id'], '', $this->data['page_id'], $this->data['deleteAction']);
                                                })->rawColumns(['action'])->make(true);
        if(request()->ajax())
        {
            return $this->data['listdata'];
        }
        return view('dashboard.data.propertyList', $this->data);
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
        $property = new Property();
        $property->property_id = DBRepository::genAutoID('tbl_property', 'property_id', 'P');
        $property->property_eName = $request->input('property_eName');
        $property->desc = $request->input('property_desc');    
        $property->displayorder = DBRepository::getDisplayOrder('tbl_property');
        $property->save();

        return redirect('/data/property/'.$property->property_id)->with('success','Property created successfully ');
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
        $this->data['data'] = Property::where('property_id', $id)->get();
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
        $this->data['data'] = Property::where('property_id', $id)->get();
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
        Property::where('property_id',$id)->update($update);
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
        $property = Property::where('property_id', 'like', '%'.$id.'%')->delete();
        return redirect()->route('property.index')->with('info',$this->data['page_title'].' deleted successfully');
    }

    public function search(Request $request)
    {        
        if ($request->ajax()) {
            $searchResult = Property::select()->with('phase');
            for ($i=0;$i<sizeof($request->all()['formData']);$i++)
            {
                $key = $request->all()['formData'][$i]['name'];
                $val = $request->all()['formData'][$i]['value'];
                if ($key.'' != '_token' && $val.'' != ''){                    
                    $tmp = explode(".",$key);
                    if (sizeof($tmp)==2) {
                        $key = $tmp[0]."_id";

                    } else if (sizeof($tmp)==3) {
                        //$searchResult->
                    }
                    //print_r($key); print_r("<br>"); exit;
                    $searchResult->where($key, 'like', '%'.$val.'%');
                }
            }
            $searchResult = $searchResult->get()->toArray();
            return Datatables::collection($searchResult)
                ->addColumn('action', function($data){
                    return $this->masterService->generateButtons($data['property_id'], '', $this->data['page_id'], $this->data['deleteAction']);
            })->rawColumns(['action'])->make(true);
        }
    }    

    public static function getFormField()
    {
        $pageSetting = array(
            "page"=>array(
                "id"=>"property",
                "title"=>"Property"
            ),
            "group"=>array(
                [
                    "name"=>"general",
                    "display"=>"General",
                    "show"=>1,
                    "default"=>1
                ],
                [
                    "name"=>"features",
                    "display"=>"Features",
                    "show"=>1,
                    "default"=>0                
                ],
                [
                    "name"=>"photos",
                    "display"=>"Photos",
                    "show"=>1,
                    "default"=>0                
                ],
                [
                    "name"=>"system",
                    "display"=>"System",
                    "show"=>1,
                    "default"=>0
                ]
            ),
            "columns"=>array(
                            ['name'=>'property_id',
                             'display'=>'Property ID',
                             'headerWidth'=>'10',
                             'db_type'=>'text',
                             'readonly'=>1,
                             'group'=>'general',
                             'required'=> 1,
                             'sortable'=> 1,
                             'show_in_search'=> 1,
                             'show_in_list'=> 1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=> 0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=>'phase.estate.estate_eName',
                             'display'=>'Estate',
                             'headerWidth'=>'10',
                             'db_type'=>'select',
                             'option'=>DBRepository::getEstateSelectData(),
                             'readonly'=>1,
                             'group'=>'general',
                             'required'=> 1,
                             'sortable'=> 1,
                             'show_in_search'=> 0,
                             'show_in_list'=> 1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=> 0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=>'phase.phase_eName',
                              'display'=>'Phase',
                              'headerWidth'=>'10',
                              'db_type'=>'select',
                              'option'=>DBRepository::getPhaseSelectData(),
                              'readonly'=>1,
                              'group'=>'general',
                              'required'=> 1,
                              'sortable'=> 1,
                              'show_in_search'=> 1,
                              'show_in_list'=> 1,
                              'searchArea_class'=>'col-md-4',
                              'newModal_class'=>'col-md-4',
                              'sub_search'=> 0,
                              'required'=>1,
                              'autofocus'=>0],
                            ['name'=>'property_eName',
                             'display'=>'Property Name',
                             'headerWidth'=>'10',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=> 1,
                             'sortable'=> 1,
                             'show_in_search'=> 0,
                             'show_in_list'=> 1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-6',
                             'sub_search'=> 0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'room',
                             'display'=>'Room',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-2',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'floor',
                             'display'=>'Floor',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-2',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'block',
                             'display'=>'Block',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-2',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'building_size',
                             'display'=>'Building Size',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'actual_size',
                             'display'=>'Actual Size',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'sales_price',
                             'display'=>'Sales',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'rent_price',
                             'display'=>'Rent',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'last_remodel_yr',
                             'display'=>'Last Remodel',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'property_latitude',
                             'display'=>'Latitude',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0], 
                            ['name'=> 'property_longitude',
                             'display'=>'Longitude',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'general',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0], 
                            ['name'=> 'num_of_carpark',
                             'display'=>'num_of_carpark',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'num_of_bedroom',
                             'display'=>'num_of_bedroom',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'num_of_kitchen',
                             'display'=>'num_of_kitchen',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0], 
                            ['name'=> 'num_of_bedroom',
                             'display'=>'num_of_bedroom',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0], 
                            ['name'=> 'num_of_bathroom',
                             'display'=>'num_of_bathroom',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'num_of_dining_room',
                             'display'=>'num_of_dining_room',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],  
                            ['name'=> 'num_of_living_room',
                             'display'=>'num_of_living_room',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],  
                            ['name'=> 'clubhouse',
                             'display'=>'ClubHouse',
                             'headerWidth'=>'23',
                             'db_type'=>'checkbox',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>1,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'has_seaview',
                             'display'=>'has_seaview',
                             'headerWidth'=>'23',
                             'db_type'=>'check',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>1,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'near_mtr',
                             'display'=>'near_mtr',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'near_bus',
                             'display'=>'near_bus',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'near_shopping',
                             'display'=>'near_shopping',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'near_park',
                             'display'=>'near_park',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'near_school',
                             'display'=>'near_school',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'mountainview',
                             'display'=>'mountainview',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'courtyardview',
                             'display'=>'courtyardview',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0],
                            ['name'=> 'propertyPhoto',
                             'display'=>'photos',
                             'headerWidth'=>'23',
                             'db_type'=>'text',
                             'readonly'=>0,
                             'group'=>'features',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>1,
                             'show_in_list'=>0,
                             'searchArea_class'=>'col-md-4',
                             'newModal_class'=>'col-md-4',
                             'sub_search'=>0,
                             'required'=>1,
                             'autofocus'=>0], 
                            ['name'=> 'created_at',
                             'display'=>'Created on',
                             'headerWidth'=>'2',
                             'db_type'=>'datetime',
                             'readonly'=>1,
                             'textarea_row'=>'textarea',
                             'group'=>'system',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>0,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-12',
                             'newModal_class'=>'col-md-6',
                             'sub_search'=>1,
                             'required'=>1,
                             'autofocus'=>1],
                            ['name'=> 'updated_at',
                             'display'=>'Updated on',
                             'headerWidth'=>'2',
                             'db_type'=>'datetime',
                             'readonly'=>1,
                             'textarea_row'=>'textarea',
                             'group'=>'system',
                             'required'=>1,
                             'sortable'=>1,
                             'show_in_search'=>0,
                             'show_in_list'=>1,
                             'searchArea_class'=>'col-md-12',
                             'newModal_class'=>'col-md-6',
                             'sub_search'=>1,
                             'required'=>1,
                             'autofocus'=>1])
        );
        return $pageSetting;
    }
}
