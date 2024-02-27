 @extends('layouts.app')

 @section('content')
     <table class="table">
         <thead>
             <tr>
                 <th scope="col">STT</th>
                 <th scope="col">Link Embed</th>
                 <th scope="col">Link M3U8</th>
                 <th scope="col">Tên phim</th>
                 <th scope="col">Slug</th>
                 <th scope="col">Số tập</th>
                 <th scope="col">Tập phim</th>

                 <th scope="col">Quản lý</th>
             </tr>
         </thead>
         <tbody class="order_position">
             @foreach ($reps['episodes'] as $key => $rep)
                 <tr>
                     <th scope="row">{{ $key }}</th>
                     <td>
                         @foreach ($rep['server_data'] as $key => $server_1)
                             <ul>
                                 <li> Tập {{ $server_1['name'] }}
                                     <input type="text" class="form-control" value="{{ $server_1['link_embed'] }}">
                                 </li>
                             </ul>
                         @endforeach
                     </td>
                     <td>
                         @foreach ($rep['server_data'] as $key => $server_2)
                             <ul>
                                 <li> Tập {{ $server_2['name'] }}
                                     <input type="text" class="form-control" value="{{ $server_2['link_m3u8'] }}">
                                 </li>
                             </ul>
                         @endforeach
                     </td>
                     <td>{{ $reps['movie']['name'] }}</td>
                     <td>{{ $reps['movie']['slug'] }}</td>
                     <td>{{ $reps['movie']['episode_total'] }}</td>


                     <td>
                         {{ $rep['server_name'] }}
                     </td>

                     <td>
                         <form method="POST" action="{{ route('leech-episode-store', [$reps['movie']['slug']] )}}" >
                             @csrf
                             <input type="submit" value="Thêm tập phim" class="btn btn-success btn-sm">
                         </form>
                         <form action="" method="POST">
                             @csrf
                             <input type="submit" value="Xóa tập phim" class="btn btn-danger btn-sm">
                         </form>
                     </td>

                 </tr>
             @endforeach
         </tbody>
     </table>
 @endsection
