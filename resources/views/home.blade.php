@extends('layouts.app')

@section('content')
<div class="container">
    <p>Chào mừng bạn đến với trang quản trị</p>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <p>Chào mừng bạn đến với trang quản trị</p>
            <div class="card">
                <div class="card-header">{{ __('Trang Quản Lý') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Well Come To Admin') }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
{{-- fghjkl; --}}
@endsection
