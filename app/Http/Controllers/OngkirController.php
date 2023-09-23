<?php

namespace App\Http\Controllers;

use App\Http\Requests\OngkirRequest;
use App\Service\RajaOngkirService;
use Illuminate\Http\Request;

class OngkirController extends Controller
{
    private $ekspedisi = ['jne', 'pos', 'tiki'];
    // private $rajaOngkir = new RajaOngkirService(config('rajaongkir.key'));
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = new RajaOngkirService();
        $provinces = $service->getProvinces();
        $ekspedisi = $this->ekspedisi;
        
        return view('ongkir.index', compact('provinces', 'ekspedisi'));
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
    public function store(OngkirRequest $request)
    {
        $service = new RajaOngkirService();
        $check = $service->checkCost($request->validated());
        
        $costs = $check['results'][0];
        $asal = $check['origin_details'];
        $tujuan = $check['destination_details'];
        
        $provinces = $service->getProvinces();
        $ekspedisi = $this->ekspedisi;
        
        return view('ongkir.result', compact('provinces', 'ekspedisi', 'costs', 'asal', 'tujuan'));
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
