<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function getWithAddress()
    {
        $companies = Company::with('contactInfo')->get();

        return response()->json($companies);
    }
}
