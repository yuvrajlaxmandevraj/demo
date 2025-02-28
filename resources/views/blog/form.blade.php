@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Add Blogs</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 ">
                            <a class="btn btn-primary float-end" href="{{route('post.index')}}">Back</a>
                        </div>
                        <div class="col-12">
                            <form class=" w-100" action="{{ route('post.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row">

                                    <div class="col-md-12  mt-2">
                                        <div class="form-group">
                                            <label for="title">{{__('Title')}}</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid border-danger @enderror"
                                                value="{{ old('title') }}" placeholder="{{ __('Title')}}">
                                            @if($errors->has('title'))
                                            <span class="error text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label for="message">{{__('Description')}}</label>
                                            <textarea
                                                class="form-control @error('description') is-invalid border-danger @enderror"
                                                placeholder="{{ __('Description')}}" name="description"
                                                id="description">{{ old('description') }}</textarea>

                                            @if($errors->has('description'))
                                            <span class="error text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-block w-100">{{ __('Submit')}}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection