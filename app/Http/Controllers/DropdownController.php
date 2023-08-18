<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\Block;

class DropdownController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('index', compact('states'));
    }

    public function getDistricts($stateId)
    {
        $districts = District::where('state_id', $stateId)->get();
        return response()->json($districts);
    }

    public function getBlocks($districtId)
    {
        $blocks = Block::where('district_id', $districtId)->get();
        return response()->json($blocks);
    }
}
