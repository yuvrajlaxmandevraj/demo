@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Send Mail</div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <form class=" w-100" action="{{ route('email-send') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12  mt-2">
                                        <div class="form-group">
                                            <label for="email">{{__('Email')}}</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid border-danger @enderror"
                                                value="{{ old('email') }}" placeholder="{{ __('Email')}}">
                                            @if($errors->has('email'))
                                            <span class="error text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12  mt-2">
                                        <div class="form-group">
                                            <label for="subject">{{__('Subject')}}</label>
                                            <input type="text" name="subject"
                                                class="form-control @error('subject') is-invalid border-danger @enderror"
                                                value="{{ old('subject') }}" placeholder="{{ __('Subject')}}">
                                            @if($errors->has('subject'))
                                            <span class="error text-danger">{{ $errors->first('subject') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label for="message">{{__('Message')}}</label>
                                            <textarea
                                                class="form-control @error('message') is-invalid border-danger @enderror"
                                                placeholder="{{ __('Message')}}" name="message"
                                                id="message">{{ old('message') }}</textarea>

                                            @if($errors->has('message'))
                                            <span class="error text-danger">{{ $errors->first('message') }}</span>
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