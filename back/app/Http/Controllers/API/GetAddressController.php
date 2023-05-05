<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class GetAddressController
{
    public function __invoke(Request $request)
    {
        $lat="38.115583";
        $long = "13.37579";

        $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        $curlData = curl_exec($curl);
        curl_close($curl);

        $address = json_decode($curlData);
        return response(['address' => $address]);
    }
}
