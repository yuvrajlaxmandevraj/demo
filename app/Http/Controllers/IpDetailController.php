<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class IpDetailController extends Controller
{
    public function index()
    {
        $ip_address = $this->getIpAddress();
        $cookieData = Cookie::get("geolocation_{$ip_address}");

        if ($cookieData) {
            $responseData = json_decode($cookieData, true);
        } else {
            $responseData = Cache::get("geolocation_{$ip_address}");

            if (!$responseData) {
                $responseData = $this->getGeolocationData($ip_address);
                Cache::put("geolocation_{$ip_address}", $responseData, 1440);
                $cookie = cookie("geolocation_{$ip_address}", json_encode($responseData), 1440);
                return response()->view('ip.index', compact('responseData', 'ip_address'))->cookie($cookie);
            }
        }

        return view('ip.index', compact('responseData', 'ip_address'));
    }

    private function getIpAddress()
    {
        $response = $this->makeRequest('https://api.ipify.org');
        return $response ? $response : 'Unknown IP';
    }

    private function getGeolocationData($ip_address)
    {
        $url = "http://www.geoplugin.net/json.gp?ip=" . $ip_address;
        $response = $this->makeRequest($url);

        return $response ? json_decode($response) : null;
    }

    private function makeRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);
            return null;
        }

        curl_close($ch);
        return $response;
    }
}
