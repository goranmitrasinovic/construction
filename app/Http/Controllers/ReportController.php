<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;


class ReportController extends Controller
{
    public function index() {
        $reports = Report::with(['workItems', 'checkList', 'checkList.checkListItems'])->get();
        return $reports;
    }

    public function store(Request $request) {
        $report = Report::Create($request->all());
    }

    public function update(Request $request) {
        $report = Report::updateOrCreate($request->all());
    }
}
