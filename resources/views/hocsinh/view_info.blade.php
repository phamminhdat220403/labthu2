<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
   
    <a href="{{route('hs_begin')}}">Back</a>
    <h1>Xem Thông Tin</h1>
    <!-- Form nhập student_id -->
<form action="{{ route('xem_thong_tin') }}" method="HEAD">
    @csrf
    <label for="student_id">Mã học sinh:</label>
    <input type="text" name="student_id" id="student_id">
    <button type="submit">Xem kết quả</button>
</form>

<!-- Hiển thị kết quả -->
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error )
            <p>
                {{$error}}
            </p>
        @endforeach
    </div>
@else
     @foreach ($info as $info)
                <tr>
                    <td>Học sinh: {{$info->student_name}}<br></td>
                    <td>Mã sinh viên:{{ $info->student_id}}<br></td>
                    <td>Email:{{ $info->student_email}}<br></td>
                    <td>Ngày sinh:{{ $info->student_date_of_birth}}<br></td>
                    <td>Giới tính:{{ $info->student_gender}}<br></td>
                    <td>Địa chỉ:{{ $info->student_address}}<br></td>
                </tr>
    @endforeach 
@endif
</body>
</html>
