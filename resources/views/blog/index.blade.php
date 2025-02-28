@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Blogs</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 ">
                            <a class="btn btn-primary mb-4 float-end" href="{{route('post.create')}}">Add Record</a>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Equation Time</th>
                                    </thead>
                                    <tbody>
                                        @foreach($records as $record)
                                        <tr>
                                            <td>{{$record->title}}</td>
                                            <td>{{$record->description}}</td>
                                            <td>{{$record->education_time}} seconds</td>
                                        </tr>
                                        @endforeach
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