@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    <ul>
                        <li class="mb-2 list-style"><a class="btn btn-primary" href="{{route('post.index')}}">First</a>
                        </li>
                        <li class="mb-2 list-style"><a class="btn btn-primary" href="{{route('ip-details')}}">Second</a>
                        </li>
                        <li class="mb-2 list-style"><a class="btn btn-primary"
                                href="{{route('open-context-ids')}}">Third</a>
                        </li>
                        <li class="mb-2 list-style"><a class="btn btn-primary" href="{{route('send-email')}}">Fourth</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection