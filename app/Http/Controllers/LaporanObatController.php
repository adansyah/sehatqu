<?php

namespace App\Http\Controllers;

use App\Models\LaporanObat;
use Illuminate\Http\Request;

class LaporanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.laporanobat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanObat $laporanObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanObat $laporanObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanObat $laporanObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanObat $laporanObat)
    {
        //
    }
}
