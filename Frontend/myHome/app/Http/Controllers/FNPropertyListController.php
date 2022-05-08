<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Repositories\DBRepository;
use App\Http\Controllers\MasterController;

class FNPropertyListController extends Controller
{
    public $result = "";
    public $property = "";

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

                            'tbl_agent.agent_eName_firstName', 'tbl_agent.agent_eName_lastName', 'tbl_agent.agent_title', 'tbl_agent.agent_mobile', 'tbl_agent.agent_email',
                            DB::raw('(select path from tbl_property_photo where tbl_property_photo.property_id = tbl_property.property_id and tbl_property_photo.photo_type = "unitPhoto" limit 0,1) as photo'),
                            DB::raw('(select COUNT(photo_id) from tbl_property_photo where tbl_property_photo.property_id = tbl_property.property_id and photo_type = "unitPhoto") as numOfphoto'),
                            )
                    ->leftJoin('tbl_phase','tbl_phase.phase_id','=','tbl_property.phase_id')
                    ->leftJoin('tbl_estate','tbl_estate.estate_id','=','tbl_phase.estate_id')
                    ->leftJoin('tbl_agent','tbl_agent.agent_id','=','tbl_property.agent_id')
                    ->leftJoin('tbl_sub_district','tbl_sub_district.sub_district_id','=','tbl_estate.sub_district_id')
                    ->leftJoin('tbl_district','tbl_district.district_id','=','tbl_sub_district.district_id')
                    ->orderBy('tbl_property.created_at', 'desc');

        $this->property = Property::whereNotNull('property_id')->with('phase')->with('phase')->with('agent')->with('propertyUnitPhoto')->paginate(12);          
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        DB::enableQueryLog(); // Enable query log

        $searchCond = array();
        $showInMap = array();

        if ($request->has('tranType')) {
            $this->result = $this->result->where('sales_price', '!=', '0');
            $this->result = $this->result->where('rent_price', '!=', '0');
            $searchCond['tranType'] = $request->tranType;
        }
        if ($request->has('bedroom')) {
            if ($request->bedroom != null){
                if ($request->bedroom == 4){
                    $this->result = $this->result->where('num_of_bedroom', '>=', '4');
                }else{
                    $this->result = $this->result->where('num_of_bedroom', '=', $request->bedroom);
                }
            }
            $searchCond['bedroom'] = $request->bedroom;
        }
        if ($request->has('bathroom')) {
            if ($request->bathroom != null){
                if ($request->bathroom == 4){
                    $this->result = $this->result->where('num_of_bathroom', '>=', '4');
                }else{
                    $this->result = $this->result->where('num_of_bathroom', '=', $request->bathroom);
                }
            }

            $searchCond['bathroom'] = $request->bathroom;
        }
        // if ($request->has('keywords')) {
        //     $this->result = $this->result->orWhere('tbl_phase.phase_eName', 'like', '%'.$request->keywandds.'%');
        //     $this->result = $this->result->orWhere('tbl_phase.phase_e_street_name', 'like', '%'.$request->keywandds.'%');
        //     $this->result = $this->result->orWhere('tbl_estate.estate_e_street_name', 'like', '%'.$request->keywandds.'%');
        //     $this->result = $this->result->orWhere('tbl_estate.estate_eName', 'like', '%'.$request->keywandds.'%');
        //     $this->result = $this->result->orWhere('tbl_property.property_desc', 'like', '%'.$request->keywandds.'%');
        //     $this->result = $this->result->orWhere('tbl_property.property_eName', 'like', '%'.$request->keywords.'%');
        //     $searchCond['keywords'] = $request->keywords;
        // }
        if ($request->has('salesArea')) {
            $salesArea = explode(';', $request->salesArea);
            $this->result = $this->result->whereBetween('actual_size', [$salesArea[0], $salesArea[1]]);
            $searchCond['salesArea'] = $request->salesArea;
        }
        if ($request->has('buildingArea')) {
            $buildingArea = explode(';', $request->buildingArea);
            $this->result = $this->result->whereBetween('building_size', [$buildingArea[0], $buildingArea[1]]);
            $searchCond['buildingArea'] = $request->buildingArea;
        }
        if ($request->has('salesprice')) {
            $salesprice = explode(';', $request->salesprice);
            $this->result = $this->result->whereBetween('sales_price', [$salesprice[0], $salesprice[1]]);
            $searchCond['salesprice'] = $request->salesprice;
        }
        if ($request->has('rentprice')) {
            $rentprice = explode(';', $request->rentprice);
            $this->result = $this->result->whereBetween('rent_price', [$rentprice[0], $rentprice[1]]);
            $searchCond['rentprice'] = $request->rentprice;
        }
        if ($request->has('sortBy')) {
            switch ($request->sortBy) {
                case 'dateDesc':
                    $this->result = $this->result->orderBy('created_at', 'desc');
                    break;
                case 'dateAsc':
                    $this->result = $this->result->orderBy('created_at', 'asc');
                    break;                
                case 'SalesPriceDesc':
                    $this->result = $this->result->orderBy('sales_price', 'desc');
                    break;
                case 'SalesPriceAsc':
                    $this->result = $this->result->orderBy('sales_price', 'asc');
                    break;    
                case 'RentPriceDesc':
                    $this->result = $this->result->orderBy('rent_price', 'desc');
                    break;
                case 'RentPriceAsc':
                    $this->result = $this->result->orderBy('rent_price', 'asc');
                    break;
            }
            $searchCond['sortBy'] = $request->sortBy;
        }

        if ($request->has('listing')) {
            $this->result = $this->result->paginate($request->listing);
            $searchCond['listing'] = $request->listing;
        }else{
            $this->result = $this->result->paginate(5);
            $searchCond['listing'] = '12';
        }

        $allProperty = Property::select('property_eName','room','block','property_id','agent_id','phase_id','rent_price','sales_price','property_latitude', 'property_longitude')->with('demoPhoto')->with('agent')->with('phase')->get()->toArray();

        //foreach ($allProperty as $property){
        for ($pty=0; $pty < sizeof($allProperty) ; $pty++) { 
            $property = $allProperty[$pty];
            $tmp = array();
            $body = "<p><i class='fas fa-map-marker-alt pr-2'></i>
                        {$property['phase']['estate']['estate_e_street_name']}
                     </p>";                     
            $body .= "<div class='d-flex align-items-center mt-2 property-item-map-price'>";
            if ($property['sales_price'] > 0 && $property['rent_price'] <= 0){
                $body .= "<h6>$".number_format($property['sales_price'],0,'.',',')."</h6>";
                
            }else if ($property['rent_price'] > 0 && $property['sales_price'] <= 0){
                $body .= "<h6>$".number_format($property['rent_price'],0,'.',',')."/month</h6>";
            }else{
                $body .= "<h6>$".number_format($property['sales_price'],0,'.',',')."</h6>
                          <span class='ml-auto'>$".number_format($property['rent_price'],0,'.',',')."/month</span>";
            }
            $body .= "</div>";
            $body .= "<a href='tel:{$property['agent']['agent_mobile']}'>{$property['agent']['agent_eName_firstName']} {$property['agent']['agent_eName_lastName']}</a>";

            $tmp["title"] = "Rm".$property['room'].", ".$property['property_eName'].", Bk".$property['block'].", Phase".$property['phase']['phase_eName'].", ".$property['phase']['estate']['estate_eName'];
            $tmp["link"] = "/property/".$property['property_id'];
            $tmp["bgImg"] = asset('assets/property/'.$property['demo_photo']['path']);
            $tmp["body"] = $body;
            $tmp["LatLng"] = array("lat"=>$property['property_latitude'], "lng"=>$property['property_longitude']);
            $showInMap[] = $tmp;
        }
        //print_r($this->result);
        return view('frontend.propertyList', ['propertyData' => $this->result,
                                              'searchCond'=>$searchCond,
                                              'showInMap'=>json_encode($showInMap)
                                              ]);
    }

    // public function search(Request $request)
    // {        
    //     $searchCond = array();

    //     if ($request->has('tranType')) {
    //         $this->result = $this->result->where('sales_price', '!=', '0');
    //         $this->result = $this->result->where('rent_price', '!=', '0');
    //         $searchCond['tranType'] = $request->tranType;
    //     }
    //     if ($request->has('bedroom')) {
    //         if ($request->bedroom == 4){
    //             $this->result = $this->result->where('num_of_bedroom', '>=', '4');
    //         }else{
    //             $this->result = $this->result->where('num_of_bedroom', '=', $request->bedroom);
    //         }
    //         $searchCond['bedroom'] = $request->bedroom;
    //     }
    //     if ($request->has('bathroom')) {
    //         if ($request->bathroom == 4){
    //             $this->result = $this->result->where('num_of_bathroom', '>=', '4');
    //         }else{
    //             $this->result = $this->result->where('num_of_bathroom', '=', $request->bathroom);
    //         }
    //         $searchCond['bathroom'] = $request->bathroom;
    //     }
    //     if ($request->has('keywords')) {
    //         $this->result = $this->result->orWhere('tbl_phase.phase_eName', 'like', '%'.$request->keywandds.'%');
    //         $this->result = $this->result->orWhere('tbl_phase.phase_e_street_name', 'like', '%'.$request->keywandds.'%');
    //         $this->result = $this->result->orWhere('tbl_estate.estate_e_street_name', 'like', '%'.$request->keywandds.'%');
    //         $this->result = $this->result->orWhere('tbl_estate.estate_eName', 'like', '%'.$request->keywandds.'%');
    //         $this->result = $this->result->orWhere('tbl_property.property_desc', 'like', '%'.$request->keywandds.'%');
    //         $this->result = $this->result->orWhere('tbl_property.property_eName', 'like', '%'.$request->keywords.'%');
    //         $searchCond['keywords'] = $request->keywords;
    //     }
    //     if ($request->has('salesArea')) {
    //         $salesArea = explode(';', $request->salesArea);
    //         $this->result = $this->result->whereBetween('actual_size', [$salesArea[0], $salesArea[1]]);
    //         $searchCond['salesArea'] = $request->salesArea;
    //     }
    //     if ($request->has('buildingArea')) {
    //         $buildingArea = explode(';', $request->buildingArea);
    //         $this->result = $this->result->whereBetween('building_size', [$buildingArea[0], $buildingArea[1]]);
    //         $searchCond['buildingArea'] = $request->buildingArea;
    //     }
    //     if ($request->has('salesprice')) {
    //         $salesprice = explode(';', $request->salesprice);
    //         $this->result = $this->result->whereBetween('sales_price', [$salesprice[0], $salesprice[1]]);
    //         $searchCond['salesprice'] = $request->salesprice;
    //     }
    //     if ($request->has('rentprice')) {
    //         $rentprice = explode(';', $request->rentprice);
    //         $this->result = $this->result->whereBetween('rent_price', [$rentprice[0], $rentprice[1]]);
    //         $searchCond['rentprice'] = $request->rentprice;
    //     }

    //     if ($request->has('listing')) {
    //         $this->result = $this->result->paginate($request->listing);
    //     }else{
    //         $this->result = $this->result->paginate(12);
    //     }

    //     $salesCountRes = 0;
    //     $rentCountRes = 0;
    //     $showInMap = "";

    //     return view('frontend.propertyList', ['propertyData' => $this->result,
    //                                             'searchCond'=>$searchCond,
    //                                             'salesCount'=>$salesCountRes,
    //                                             'rentCount'=>$rentCountRes,
    //                                             'showInMap'=>json_encode($showInMap)           
    //                                             ]);
    // }
}

