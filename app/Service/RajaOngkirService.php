<?php

namespace App\Service;

class RajaOngkirService
{
    public function __construct()
    {
    }
    
    private function send($endpoint, $data=[], $method='GET', $keys=['results'])
    {
        $curl = curl_init();

        $dataSend = '';

        if (!empty($data)) {
            if ($method == 'GET') {
                $val = http_build_query($data);
                $endpoint .= "?$val";
            } else {
                $dataSend = $data;
            }
        }
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/$endpoint",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $dataSend,
            CURLOPT_HTTPHEADER => array(
                "key: " . config('rajaongkir.key'),
            ),
        ));
        
        $response = json_decode(curl_exec($curl), true);
        
        curl_close($curl);

        $status = $response['rajaongkir']['status'];
        if ($status['code'] >= 400) {
            return [
                'status' => 'error',
                'data' => $status['description']
            ];
        }
        
        $result = [];

        foreach ($keys as $key) {
            $result[$key] = $response['rajaongkir'][$key];
        }
        return [
            'status' => 'ok',
            'data' => $result
        ];
    }

    public function getProvinces()
    {
        $provinces = $this->send('province');
        $result = [];

        if ($provinces['status'] == 'ok') {
            $data = $provinces['data']['results'];
            
            foreach ($data as $val) {
                $result[$val['province_id']] = $val['province'];
            }
        } else {
            return $provinces['data'];
        }

        return $result;
    }

    public function getCities($province)
    {
        $cities = $this->send('city', ['province' => $province]);

        $result = [];

        if ($cities['status'] == 'ok') {
            $data = $cities['data']['results'];

            foreach ($data as $value) {
                $result[$value['city_id']] = $value['city_name'];
            }
        } else {
            return $cities['data'];
        }

        return $result;
    }

    public function checkCost($data)
    {
        $cost = $this->send('cost', $data, 'POST', ['origin_details', 'destination_details', 'results']);

        return $cost['data'];
    }
}
