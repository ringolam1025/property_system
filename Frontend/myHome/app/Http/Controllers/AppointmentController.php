<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Repositories\DBRepository;
use App\Http\Controllers\MasterController;
use Redirect,Response;
use PDF;
use Dompdf\Dompdf;

class AppointmentController extends Controller
{
    public function index()
    {
        if(request()->ajax()) 
        {
            $bookings = array();
            $data = Appointment::select()->with('agent')->with('property')->get()->toArray();
            // print_r($data); exit;
            for ($i=0;$i<sizeof($data);$i++) {
                $statusColor = array("#ff0000","#73e600","#0066ff");
                $colorCode = "";
                if ($data[$i]['status'].'' == 'hold') {
                    $colorCode = "#ff0000";
                }else if ($data[$i]['status'].'' == 'finish') {
                    $colorCode = "#73e600";
                }else if ($data[$i]['status'].'' == 'pending') {
                    $colorCode = "#0066ff";
                }
                $bookings[] = array("title"=>$data[$i]['cust_name']." ".$data[$i]['property_id'],
                                    "start"=>$data[$i]['booked_date']."T".$data[$i]['booked_start_time'],
                                    "end"=>$data[$i]['booked_date']."T".$data[$i]['booked_end_time'],
                                    'color'=>$colorCode,
                                    'textColor'=>"#FFF",
                                    "booked_date"=>$data[$i]['booked_date'],
                                    "booking_id"=>$data[$i]['booking_id'],
                                    "remark"=>$data[$i]['remark'],
                                    "created_at"=>$data[$i]['created_at'],
                                    "status"=>$data[$i]['status'],
                                    "customer"=>array("Name"=>$data[$i]['cust_name'],
                                                      "Email"=>$data[$i]['cust_email'],
                                                      "Phone"=>$data[$i]['cust_phone']),
                                    "property_id"=>$data[$i]['property']['property_id'],
                                    "property"=>array("Name"=>$data[$i]['property']['phase']['phase_eName'],
                                                      "Address"=>"Room ".$data[$i]['property']['room'].", ".$data[$i]['property']['floor']."/F, Block ".$data[$i]['property']['block'].", ".$data[$i]['property']['phase']['phase_e_street_name'],
                                                      "Latitude"=>$data[$i]['property']['property_latitude'],
                                                      "Longitude"=>$data[$i]['property']['property_longitude']),
                                    "agent_id"=>$data[$i]['agent']['agent_id'],
                                    "agent"=>array("Name"=>$data[$i]['agent']['agent_eName_firstName']." ".$data[$i]['agent']['agent_eName_lastName'],
                                                   "Title"=>$data[$i]['agent']['agent_title'],
                                                   "Contract"=>$data[$i]['agent']['agent_phone']." (".$data[$i]['agent']['agent_mobile'].")",
                                                   "Email"=>$data[$i]['agent']['agent_email'])
                                );
            }
            return Response::json($bookings);
        }
        return view('dashboard.data.appointment'); 
    }
    public function create()
    {        
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
        //return redirect('/data/property/'.$property->property_id)->with('success','Property created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return redirect()->back()->with('success','Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('property.index')->with('info','Property deleted successfully');
    }

    public function printPASP()
    {                
        $pdf = PDF::loadView('docTemplate.PASP');
        $pdf->download('invoice.pdf');
        //return $pdf->download('invoice.pdf');
        // return $pdf->stream('medium.pdf');
        // return view('docTemplate.pasp');


        // $dompdf = new Dompdf();
        // $dompdf->loadHtml('<span style="font-family: Fyrefly Sung">正體中文</span>');
        // $dompdf->loadView('docTemplate.pasp');
        
        // $dompdf->setPaper('A4', 'landscape');
        // //$dompdf->set_option('defaultFont', 'Courier'); // 預設字型(僅支援英文)
        // $dompdf->render();
        
        // // Attachment: 0 直接顯示, 1 強制下載
        // $dompdf->stream(null, ['Attachment' => 0]);
    }
}
