<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\UserChart;
use App\Charts\SearchHistoryChart;
use App\Models\SearchHistory;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outputArr = array();
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        /* By District */
        $data_label = array();
        $data_dataSet = array();
        $res = SearchHistory::select(DB::raw('count(search_val) as search_val_count, search_val'))
                                ->where('platform','chatbot')
                                ->where('search_category','district')
                                ->groupBy('search_val')->get()->toArray();
        for ($i=0; $i < sizeof($res); $i++) { 
            $data_label[] = $res[$i]['search_val'];
            $data_dataSet[] = $res[$i]['search_val_count'];
        }
        $districtByChatbotChart = new SearchHistoryChart;
        $districtByChatbotChart->labels($data_label);
        $districtByChatbotChart->dataset('', 'doughnut', $data_dataSet)
                                ->color($borderColors)
                                ->backgroundcolor($fillColors);
        $districtByChatbotChart->title("Chatbot Search History", 16, '#3D4852', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $outputArr['districtByChatbotChart'] = $districtByChatbotChart;
        // =================================================================
        $data_label = array();
        $data_dataSet = array();
        $res = SearchHistory::select(DB::raw('count(search_val) as search_val_count, search_val'))
                                ->where('platform','website')
                                ->where('search_category','district')
                                ->groupBy('search_val')->get()->toArray();
        for ($i=0; $i < sizeof($res); $i++) { 
            $data_label[] = $res[$i]['search_val'];
            $data_dataSet[] = $res[$i]['search_val_count'];
        }
        $districtByWebChart = new SearchHistoryChart;
        $districtByWebChart->labels($data_label);
        $districtByWebChart->dataset('', 'doughnut', $data_dataSet)
                            ->color($borderColors)
                            ->backgroundcolor($fillColors);
        $districtByWebChart->title("Website Search History", 16, '#3D4852', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $outputArr['districtByWebChart'] = $districtByWebChart;
        /* End By District */

        /* By Tran Type */
        $data_label = array();
        $data_dataSet = array();
        $res = SearchHistory::select(DB::raw('count(search_val) as search_val_count, search_val'))
                                ->where('platform','chatbot')
                                ->where('search_category','tranType')
                                ->groupBy('search_val')->get()->toArray();
        for ($i=0; $i < sizeof($res); $i++) { 
            $data_label[] = $res[$i]['search_val'];
            $data_dataSet[] = $res[$i]['search_val_count'];
        }        
        $tranTypeByChatbotChart = new SearchHistoryChart;
        $tranTypeByChatbotChart->labels($data_label);
        $tranTypeByChatbotChart->dataset('', 'doughnut', $data_dataSet)
                                ->color($borderColors)
                                ->backgroundcolor($fillColors);
        $tranTypeByChatbotChart->title("Chatbot", 16, '#3D4852', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $outputArr['tranTypeByChatbotChart'] = $tranTypeByChatbotChart;
        // =================================================================
        $data_label = array();
        $data_dataSet = array();
        $res = SearchHistory::select(DB::raw('count(search_val) as search_val_count, search_val'))
                                ->where('platform','website')
                                ->where('search_category','tranType')
                                ->groupBy('search_val')->get()->toArray();     
        for ($i=0; $i < sizeof($res); $i++) { 
            $data_label[] = $res[$i]['search_val'];
            $data_dataSet[] = $res[$i]['search_val_count'];
        }
        $tranTypeByWebChart = new SearchHistoryChart;
        $tranTypeByWebChart->labels($data_label);
        $tranTypeByWebChart->dataset('', 'doughnut', $data_dataSet)
                            ->color($borderColors)
                            ->backgroundcolor($fillColors);
        $tranTypeByWebChart->title("Website", 16, '#3D4852', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $outputArr['tranTypeByWebChart'] = $tranTypeByWebChart;
        /* End By Tran Type */
        
                            
        return view('dashboard.dashboard', $outputArr);
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
