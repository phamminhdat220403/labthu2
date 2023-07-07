<!DOCTYPE html>
<html>
<head>
    <title>Xem Điểm</title>
</head>
<body>
    <a href="{{route('hs_begin')}}">Back</a>
    <h1>Xem Điểm</h1>
    <!-- Form nhập student_id -->
<form action="{{ route('xem_diem') }}" method="POST">
    @csrf
    <label for="student_id">Mã học sinh:</label>
    <input type="text" name="student_id" id="student_id">
    <button type="submit">Xem kết quả</button>
</form>

<!-- Hiển thị kết quả -->
{{-- @if (isset($student))
    
@endif --}}

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error )
            <p>
                {{$error}}
            </p>
        @endforeach
    </div>
@else
    @foreach ($student as $student)
                <tr>
                    <td>Học sinh: {{$student->student_name}}</td>
                </tr>
    @endforeach
    
    @if (count($results) > 0)
    <table>
        <thead>
            <tr>
                <th>Môn học</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->exam_name }}</td>
                    <td>{{ $result->result_score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

@endif

</body>
</html>
