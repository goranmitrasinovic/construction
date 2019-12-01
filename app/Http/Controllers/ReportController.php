<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Checklist;


class ReportController extends Controller
{
    public function index() {
        $reports = Report::with(['workItems', 'checkList', 'checkList.checkListItems'])->get();
        return $reports;
    }

    public function store(Request $request) {
        $report = Report::Create($request->all());
        foreach ($request->check_list as $check_list_id){ 
            $report->checklist()->attach($check_list_id);
        }
    }

    public function update(Request $request) {
        $report = Report::updateOrCreate($request->all());
    }
}
