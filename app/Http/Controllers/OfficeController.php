<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::paginate(5);
        return view("office.index", [
            "offices" => $offices
        ]);
    }
}
