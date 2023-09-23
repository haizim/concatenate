<?php

namespace App\Http\Controllers;

use App\Service\RajaOngkirService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCities($province)
    {
        $service = new RajaOngkirService();

        $cities = $service->getCities($province);

        return $cities;
    }
}
