<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['students'] = count(AssignStudent::all());
        $data['teachers'] = count(User::where('usertype', 'employee')->get());
        $data['science'] = count(AssignStudent::where('group_id', '4')->get());
        $data['commerce'] = count(AssignStudent::where('group_id', '5')->get());
        $data['arts'] = count(AssignStudent::where('group_id', '6')->get());
        return view('admin.index', $data);
    }
}
