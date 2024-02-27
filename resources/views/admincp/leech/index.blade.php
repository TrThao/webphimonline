 @extends('layouts.app')

 @section('content')
     <table class="table" id="tablephim">
         <thead>
             <tr>
                 <th scope="col">STT</th>
                 <th scope="col">Tên phim</th>
                 <th scope="col">Tên chính thức</th>
                 <th scope="col">Hình ảnh phim</th>
                 <th scope="col">Hình ảnh poster</th>
                 <th scope="col">Slug</th>
                 <th scope="col">Id</th>
                 <th scope="col">Năm phim</th>
                 <th scope="col">Quản lý</th>
             </tr>
         </thead>
         <tbody class="order_position">
             @foreach ($reps['items'] as $key => $rep)
                 <tr>
                     <th scope="row">{{ $key }}</th>
                     <td>{{ $rep['name'] }}</td>
                     <td>{{ $rep['origin_name'] }}</td>
                     <td><img src="{{ $reps['pathImage'] . $rep['thumb_url'] }}" width="80" height="80"></td>
                     <td><img src="{{ $reps['pathImage'] . $rep['poster_url'] }}" width="80" height="80"></td>
                     <td>{{ $rep['slug'] }}</td>
                     <td>{{ $rep['_id'] }}</td>
                     <td>{{ $rep['year'] }}</td>
                     <td><a href="{{ Route('leech-detail', $rep['slug']) }}" class="btn btn-primary btn-sm">Chi tiết
                             Phim</a>
                         <a href="{{ Route('leech-episode', $rep['slug']) }}" class="btn btn-warning btn-sm">Tập Phim</a>
                         @php
                             $movie = \App\Models\Movie::where('slug', $rep['slug'])->first();
                         @endphp
                         @if (!$movie)
                             <form action="{{ route('leech-store', $rep['slug']) }}" method="POST">
                                 @csrf
                                 <input type="submit" class="btn btn-success btn-sm" value="Thêm Phim">
                             </form>
                         @else
                             <form action="{{ route('movie.destroy', $movie->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <input type="submit" class="btn btn-danger btn-sm" value="xóa phim">
                             </form>
                         @endif

                     </td>

                     {{-- <td>
                         {!! Form::open([
                             'method' => 'DELETE',
                             'route' => ['category.destroy', $rep->id],
                             'onsubmit' => 'return confirm("Xóa hay không ?")',
                         ]) !!}
                         {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                         {!! Form::close() !!}
                         <a href="{{ route('category.edit', $rep->id) }}" class="btn btn-warning">Sửa</a>
                     </td> --}}
                 </tr>
             @endforeach
         </tbody>
     </table>
 @endsection
