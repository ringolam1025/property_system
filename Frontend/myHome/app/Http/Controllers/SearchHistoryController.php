<?php

namespace App\Http\Controllers;

use DataTables;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SearchHistory;
use App\Repositories\DBRepository;
use App\Http\Controllers\MasterController;

class SearchHistoryController extends Controller
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
        $result = SearchHistory::select()->get()->toArray();
        $this->data['listdata'] = Datatables::collection($result)->make(true);

        if ($request->ajax()) {
            return $this->data['listdata'];
        }
        // dd($this->data);
        return view('dashboard.data.searchHistoryList', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $searchResult = SearchHistory::select();
            for ($i=0;$i<sizeof($request->all()['formData']);$i++)
            {
                $key = $request->all()['formData'][$i]['name'];
                $val = $request->all()['formData'][$i]['value'];

                if ($key.'' != '_token' && $val.'' != ''){
                    $searchResult->where($key, 'like', '%'.$val.'%');
                }
            }
            $searchResult = $searchResult->get()->toArray();
            return Datatables::collection($searchResult)->make(true);
        }
    }

    public function getFormField()
    {
        $pageSetting = array(
            "page"=>array(
                "id"=>"searchHistory",
                "title"=>"Search History"
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
                'name'=>'search_date',
                'display'=>'Search Date',
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
                'name'=>'search_category',
                'display'=>'Search Category',
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
                'name'=>'search_val',
                'display'=>'Search Value',
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
                'name'=>'platform',
                'display'=>'Platform',
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
            ])
        );
        return $pageSetting;
    }
}
