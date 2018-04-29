<?php

namespace App\Http\Controllers;

class FloorsDataTablesController extends Controller
{
    public function index()
    {
        header("Access-Control-Allow-Origin: *");

        $floors = Floor::with('user')->get();

        return datatables()
            ->of($floors)
            ->addColumn('action', function ($data) {
                return view('floors.actionDataTables', compact('data'));
            })
            ->make(true);
    }

}
