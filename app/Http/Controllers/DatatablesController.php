<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class DatatablesController extends Controller
{
    public function anyData()
{
    return Datatables::of(User::query())->make(true);
}
}
