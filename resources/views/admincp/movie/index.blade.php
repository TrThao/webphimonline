@extends('layouts.app')

@section('content')
    <div class="modal" id="videoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <span id="video_title"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>

                    </button>
                </div>
                <div class="modal-body">
                    <p id="video_desc"></p>
                    <p id="video_link"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm Phim</a>
                <div class="table-responsive">
                    <table class="table" id="tablephim">
                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Phim</th>
                                <th scope="col">Tập Phim</th>
                                <th scope="col">Số Tập</th>
                                <th scope="col">Tên Tiếng Anh</th>
                                <th scope="col">Thời Lượng Phim</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Phim Hot</th>
                                <th scope="col">Định Dạng</th>
                                <th scope="col">Phụ Đề</th>
                                {{-- <th scope="col">Mô Tả</th> --}}
                                <th scope="col">Đường Dẫn</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Thuộc Phim</th>
                                <th scope="col">Thể Loại</th>
                                <th scope="col">Quốc Gia</th>

                                <th scope="col">Ngày Tạo</th>
                                <th scope="col">Ngày Cập Nhật</th>
                                <th scope="col">Tags Phim</th>
                                <th scope="col">Năm Phim</th>
                                <th scope="col">Top Views</th>
                                <th scope="col">Season</th>
                                <th scope="col">Quản Lý</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $cate)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $cate->title }}</td>
                                    <td> <a href="{{ route('add-episode', [$cate->id]) }}"
                                            class="btn btn-primary btn-sm">Thêm tập phim</a>
                                        @foreach ($cate->episode as $key => $epi)
                                            <a class="show_video" data-movie_video_id="{{ $epi->movie->id }}"
                                                data-video_episode="{{ $epi->episode }}" style="color:#fff;cursor:pointer;">
                                                <span class="badge badge-dark"> {{ $epi->episode }}</span>
                                            </a>
                                        @endforeach
                                    </td>



                                    <td>{{ $cate->episode_count }}/{{ $cate->sotap }} Tập</td>
                                    <td>{{ $cate->name_eng }}</td>
                                    <td>{{ $cate->thoiluong }}</td>
                                    <td>
                                        @php
                                            $image_check = substr($cate->image, 0, 5);
                                        @endphp
                                        @if ($image_check == 'https')
                                            <img width="100" src="{{ $cate->image }}">
                                        @else
                                            <img width="100" src="{{ asset('uploads/movie/' . $cate->image) }}">
                                        @endif



                                        <input type="file" data-movie_id="{{ $cate->id }}"
                                            id="file-{{ $cate->id }}" class="form-control-file file_image"
                                            accept="image/*">
                                        <span id="success_image"></span>

                                    </td>
                                    <td>
                                        <select id="{{ $cate->id }}" class="phimhot_choose">
                                            @if ($cate->phim_hot == 0)
                                                <option selected value="0">Không Hót</option>
                                                <option value="1">Hot</option>
                                            @else
                                                <option value="0">Không Hot</option>
                                                <option selected value="1">Hot</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        {{-- @if ($cate->resolution == 0)
                                        HD
                                    @elseif($cate->resolution == 1)
                                        SD
                                    @elseif($cate->resolution == 2)
                                        HDcam
                                    @elseif($cate->resolution == 3)
                                        Cam
                                    @elseif($cate->resolution == 4)
                                        Full HD
                                    @else
                                        Trailer
                                    @endif --}}

                                        @php
                                            $options = ['0' => 'HD', '1' => 'SD', '2' => 'HDcam', '3' => 'Cam', '4' => 'Full HD', '5' => 'Trailer'];
                                        @endphp
                                        <select id="{{ $cate->id }}" class="resolution_choose">
                                            @foreach ($options as $key => $resolution)
                                                <option {{ $cate->resolution == $key ? 'selected' : '' }}
                                                    value="{{ $key }}">{{ $resolution }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>

                                        <select id="{{ $cate->id }}" class="phude_choose">
                                            @if ($cate->phude == 0)
                                                <option selected value="0">Phụ Đề</option>
                                                <option value="1">Thuyết Minh </option>
                                            @else
                                                <option value="0">Phụ Đề</option>
                                                <option selected value="1">Thuyết Minh</option>
                                            @endif
                                        </select>
                                    </td>
                                    {{-- <td>{{ $cate->description }}</td> --}}
                                    <td>{{ $cate->slug }}</td>
                                    <td>
                                        {{-- @if ($cate->status == 1)
                                        Hiển Thị
                                    @else
                                        Không Hiển Thị
                                    @endif --}}
                                        <select id="{{ $cate->id }}" class="trangthai_choose">
                                            @if ($cate->status == 0)
                                                <option selected value="0">Không</option>
                                                <option value="1">Hiển Thị</option>
                                            @else
                                                <option value="0">Không</option>
                                                <option selected value="1">Hiển Thị</option>
                                            @endif
                                        </select>


                                    </td>
                                    <td>
                                        @foreach ($cate->movie_category as $cate_in)
                                            <span class="badge badge-danger" style="background-color: black">
                                                {{ $cate_in->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- @if ($cate->thuocphim == 'phimle')
                                        Phim Lẻ
                                    @else
                                        Phim Bộ
                                    @endif --}}
                                        <select id="{{ $cate->id }}" class="thuocphim_choose">
                                            @if ($cate->thuocphim == 'phimle')
                                                <option value="phimbo">Phim Bộ</option>
                                                <option selected value="phimle">Phim Lẻ</option>
                                            @else
                                                <option selected value="phimbo">Phim Bộ</option>
                                                <option value="phimle">Phim Lẻ</option>
                                            @endif
                                        </select>
                                    </td>

                                    <td>
                                        @foreach ($cate->movie_genre as $gen)
                                            <span class="badge badge-danger" style="background-color: black">
                                                {{ $gen->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- {{ $cate->country->title }} --}}
                                        {!! Form::select('country_id', $country, isset($cate) ? $cate->country->id : '', [
                                            'class' => 'country_choose',
                                            'id' => $cate->id,
                                        ]) !!}

                                    </td>

                                    <td>{{ $cate->ngaytao }}</td>
                                    <td>{{ $cate->ngaycapnhat }}</td>
                                    <td>
                                        @if (strlen($cate->tags) > 150)
                                            @php
                                                $tags = substr($cate->tags, 0, 50);
                                                echo $tags . '.......';
                                            @endphp
                                        @endif
                                    </td>
                                    <td>

                                        {!! Form::selectYear('year', 2000, 2024, isset($cate->year) ? $cate->year : '', [
                                            'class' => 'select-year',
                                            'placeholder' => '--Năm Phim--',
                                            'id' => $cate->id,
                                        ]) !!}

                                    </td>
                                    <td>
                                        {!! Form::select(
                                            'topview',
                                            ['0' => 'Ngày', '1' => 'Tuần', '2' => 'Tháng'],
                                            isset($cate->topview) ? $cate->topview : '',
                                            [
                                                'class' => 'select-topview',
                                                'placeholder' => '--Views--',
                                                'id' => $cate->id,
                                            ],
                                        ) !!}
                                    </td>

                                    <td>

                                        {!! Form::selectRange('season', 0, 20, isset($cate->season) ? $cate->season : '', [
                                            'class' => 'select-season',
                                            'id' => $cate->id,
                                        ]) !!}

                                    </td>


                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['movie.destroy', $cate->id],
                                            'onsubmit' => 'return confirm("Xóa hay không ?")',
                                        ]) !!}
                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('movie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
