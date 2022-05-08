<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\Estate;
use App\Models\Phase;
use App\Repositories\DBRepository;
use App\Http\Controllers\MasterController;

class FNIndexController extends Controller
{
    public $result = "";

    public function __construct(MasterController $masterService, Request $request)
	{
        $this->result = DB::table('tbl_property')
                    ->select('tbl_property.*',
                            'tbl_estate.estate_eName',
                            'tbl_estate.estate_c_street_name',
                            'tbl_estate.estate_e_street_name',
                            'tbl_estate.estate_status',
                            'tbl_phase.phase_eName',
                            'tbl_phase.phase_c_street_name',
                            'tbl_phase.phase_e_street_name',
                            'tbl_phase.phase_latitude',
                            'tbl_phase.phase_longitude',
                            'tbl_agent.agent_eName_firstName', 'tbl_agent.agent_eName_lastName', 'tbl_agent.agent_title', 'tbl_agent.agent_mobile', 'tbl_agent.agent_email'
                            )
                    ->leftJoin('tbl_phase','tbl_phase.phase_id','=','tbl_property.phase_id')
                    ->leftJoin('tbl_estate','tbl_estate.estate_id','=','tbl_phase.estate_id')
                    ->leftJoin('tbl_agent','tbl_agent.agent_id','=','tbl_property.agent_id')
                    ->leftJoin('tbl_sub_district','tbl_sub_district.sub_district_id','=','tbl_estate.sub_district_id')
                    ->leftJoin('tbl_district','tbl_district.district_id','=','tbl_sub_district.district_id')
                    ->orderBy('tbl_property.created_at', 'desc');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->result = $this->result->paginate(3);
        // return view('frontend.index', ['propertyData' => $this->result]);

        $property = Property::whereNotNull('property_id')->with('phase')->with('phase')->with('agent')->with('propertyUnitPhoto')->get()->take(10);

        return view('frontend.index', ['propertyData' => $property]);
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
}
