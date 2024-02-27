@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{route('genre.index')}}" class="btn btn-primary">Liệt các thể loại</a>
                    <div class="card-header">{{ __('Quản Lý Thể Loại') }}</div>
                         @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($genre))
                            {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['genre.update', $genre->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'slug',
                                'onkeyup'=>'ChangeToSlug()',
                            ]) !!}
                        </div>
                         <div class="form-group">
                            {!! Form::label('slug', 'slug', []) !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'title',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'active', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển Thị', '0' => 'Ẩn'], isset($genre) ? $genre->status : '', ['class' => 'form-control']) !!}
                        </div>
                         @if (!isset($genre))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                         @else
                           {!! Form::submit('Cập Nhật', ['class' => 'btn btn-success']) !!}
                         @endif
                        {!! Form::close() !!}
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
