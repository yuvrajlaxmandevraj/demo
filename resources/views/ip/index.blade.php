@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Blogs</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>IP Address</th>
                                            <td>{{$ip_address}}</td>
                                        </tr>
                                        <tr>
                                            <th>IP Country</th>
                                            <td>{{$responseData->geoplugin_countryName}}</td>
                                        </tr>
                                        <tr>
                                            <th>IP State</th>
                                            <td>{{$responseData->geoplugin_regionName}}</td>
                                        </tr>
                                        <tr>
                                            <th>IP City</th>
                                            <td>{{$responseData->geoplugin_city}}</td>
                                        </tr>
                                        <tr>
                                            <th>IP Lat</th>
                                            <td>{{$responseData->geoplugin_latitude}}</td>
                                        </tr>
                                        <tr>
                                            <th>IP Long</th>
                                            <td>{{$responseData->geoplugin_longitude}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection