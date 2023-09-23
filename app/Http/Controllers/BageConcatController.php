<?php

namespace App\Http\Controllers;

use App\Http\Requests\BageConcatRequest;
use App\Service\BageConcatService;
use Illuminate\Http\Request;

class BageConcatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loops = [];
        return view('bage-concat.index', compact('loops'));
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
    public function store(BageConcatRequest $request)
    {
        $number = $request->number;

        $service = new BageConcatService($number);
        $loops = $service->loop();
        
        return view('bage-concat.index', compact('loops', 'request'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
