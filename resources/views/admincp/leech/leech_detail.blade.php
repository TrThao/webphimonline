 @extends('layouts.app')

 @section('content')
     <div class="table-responsive">
         <table class="table">
             <thead>
                 <tr>
                     <th scope="col">STT</th>
                     <th scope="col">_id</th>
                     <th scope="col">name</th>
                     <th scope="col">origin_name</th>
                     <th scope="col">content</th>
                     <th scope="col">type</th>
                     <th scope="col">status</th>
                     <th scope="col">thumb_url</th>
                     <th scope="col">trailer_url</th>
                     <th scope="col">time</th>
                     <th scope="col">episode_current</th>
                     <th scope="col">episode_total</th>
                     <th scope="col">quality</th>
                     <th scope="col">lang</th>
                     <th scope="col">notify</th>
                     <th scope="col">showtimes</th>
                     <th scope="col">slug</th>
                     <th scope="col">year</th>
                     <th scope="col">view</th>
                     <th scope="col">actor</th>
                     <th scope="col">director</th>
                     <th scope="col">category</th>
                     <th scope="col">country</th>
                     <th scope="col">is_copyright</th>
                     <th scope="col">chieurap</th>
                     <th scope="col">poster_url</th>
                     <th scope="col">sub_docquyen</th>


                 </tr>
             </thead>
             <tbody class="order_position">
                 @foreach ($reps_movie as $key => $rep)
                     <tr>
                         <th scope="row">{{ $key }}</th>
                         <td>{{ $rep['_id'] }}</td>
                         <td>{{ $rep['name'] }}</td>
                         <td>{{ $rep['origin_name'] }}</td>
                         <td>{{ $rep['content'] }}</td>
                         <td>{{ $rep['type'] }}</td>

                         <td>{{ $rep['status'] }}</td>
                         <td><img src="{{ $rep['thumb_url'] }}" width="80" height="80"></td>
                         <td>{{ $rep['trailer_url'] }}</td>
                         <td>{{ $rep['time'] }}</td>
                         <td>{{ $rep['episode_current'] }}</td>

                         <td>{{ $rep['episode_total'] }}</td>
                         <td>{{ $rep['quality'] }}</td>
                         <td>{{ $rep['lang'] }}</td>
                         <td>{{ $rep['notify'] }}</td>
                         <td>{{ $rep['showtimes'] }}</td>

                         <td>{{ $rep['slug'] }}</td>
                         <td>{{ $rep['year'] }}</td>
                         <td>{{ $rep['view'] }}</td>
                         <td>
                             @foreach ($rep['actor'] as $ac)
                                 <span class="badge badge-info">{{ $ac }}</span>
                             @endforeach
                         </td>
                         <td>
                             @foreach ($rep['director'] as $director)
                                 <span class="badge badge-info">{{ $director }}</span>
                             @endforeach
                         </td>
                         <td>
                             @foreach ($rep['category'] as $category)
                                 <span class="badge badge-info">{{ $category['name'] }}</span>
                             @endforeach
                         </td>
                         <td>
                             @foreach ($rep['country'] as $country)
                                 <span class="badge badge-info">{{ $country['name'] }}</span>
                             @endforeach
                         </td>
                         <td>
                             @if ($rep['is_copyright'] == true)
                                 <span class="text text-success">True</span>
                             @else
                                 <span class="text text-success">False</span>
                             @endif
                         </td>
                         <td>
                             @if ($rep['chieurap'] == true)
                                 <span class="text text-success">True</span>
                             @else
                                 <span class="text text-success">False</span>
                             @endif
                         </td>
                         <td><img src="{{ $rep['poster_url'] }}" width="80" height="80"></td>
                         <td>
                             @if ($rep['sub_docquyen'] == true)
                                 <span class="text text-success">True</span>
                             @else
                                 <span class="text text-success">False</span>
                             @endif
                         </td>

                         {{-- <td>{{ $rep['actor'] }}</td>
                     <td>{{ $rep['director'] }}</td>

                     <td>{{ $rep['category'] }}</td>
                     <td>{{ $rep['country'] }}</td>
                     <td>{{ $rep['is_copyright'] }}</td>
                     <td>{{ $rep['chieurap'] }}</td>
                     <td>{{ $rep['poster_url'] }}</td>

                     <td>{{ $rep['sub_docquyen'] }}</td>
                     <td>{{ $rep['episodes'] }}</td> --}}
                         {{-- <td>{{ $rep['name'] }}</td>
                     <td>{{ $rep['origin_name'] }}</td>
                     <td><img src="{{ $reps['pathImage'] . $rep['thumb_url'] }}" width="80" height="80"></td>
                     <td><img src="{{ $reps['pathImage'] . $rep['poster_url'] }}" width="80" height="80"></td>
                     <td>{{ $rep['slug'] }}</td>
                     <td>{{ $rep['_id'] }}</td>
                     <td>{{ $rep['year'] }}</td> --}}

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
     </div>
 @endsection
