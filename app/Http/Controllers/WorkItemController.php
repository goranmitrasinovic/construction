<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkItem;


class WorkItemController extends Controller
{
    public function store(Request $request) {
        $workItem = WorkItem::Create($request->all());
    }

    public function delete(Request $request) {
        $workItem = WorkItem::find($request->id);
        $workItem->delete();
    }
}
