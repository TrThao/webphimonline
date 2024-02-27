 <form action="{{ route('locphim') }}" method="GET">
     <style>
         .style_filter {
             border: 0;
             background-color: #12171b;
             color: white;
         }

         .btn_filter {
             border: 0;
             background-color: #12171b;
             color: white;
             padding: 9px;
         }
     </style>

     <div class="col-md-2">
         <div class="form-group">
             <select class="form-control style_filter" name="order" id="exampleFormControlSelect1">
                 <option value="">-Sắp Xếp-</option>
                 <option value="ngaytao">Ngày đăng</option>
                 <option value="year">Năm sản xuất</option>
                 <option value="title">Tên phim</option>
                 <option value="topview">Lượt xem</option>

             </select>
         </div>
     </div>
     <div class="col-md-2">
         <div class="form-group">
             <select class="form-control style_filter" name="genre" id="exampleFormControlSelect1">
                 <option value="">-Thể Loại-</option>
                 @foreach ($genre as $key => $gen_filter)
                     <option {{ (isset($_GET['genre']) && $_GET['genre'] == $gen_filter->id) ? 'selected' : '' }} value="{{ $gen_filter->id }}">
                         {{ $gen_filter->title }}</option>
                 @endforeach
             </select>
         </div>
     </div>
     <div class="col-md-2">
         <div class="form-group">

             <select class="form-control style_filter" name="country" id="exampleFormControlSelect1">
                 <option value="">-Quốc Gia-</option>
                 @foreach ($country as $key => $coun_filter)
                     <option {{ (isset($_GET['country']) && $_GET['country'] == $coun_filter->id) ? 'selected' : '' }} value="{{ $coun_filter->id }}">{{ $coun_filter->title }}</option>
                 @endforeach
             </select>
         </div>
     </div>
     <div class="col-md-2">
         <div class="form-group ">
             @php
              
            @endphp
             {!! Form::selectYear('year', 2000, 2025, isset($_GET['year']) ? $_GET['year'] : '', [
                 'class' => 'form-control style_filter',
                 'placeholder' => '-Năm-',
             ]) !!}

         </div>
     </div>
     <div class="col-md-4">
         <input type="submit" name="locphim" class="btn btn-sm btn-default btn_filter" value="Lọc phim">
     </div>
 </form>
