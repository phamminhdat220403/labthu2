<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('hs_begin')}}">Back</a>
    <h1>Trang gửi phản hồi</h1>
    <form method="GET" action="{{ route('gui_phan_hoi') }}">
        @csrf
        <label for="student_id">Mã học sinh:</label>
        <input type="text" name="student_id" id="student_id" required>
        <br>
        <label for="content">Nội dung phản hồi:</label>
        <textarea name="content" id="content" required></textarea>
        <br>
        <button type="submit">Gửi phản hồi</button>
    </form>
    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error )
            <p>
                {{$error}}
            </p>
        @endforeach
    </div>
    @endif
</body>
</html>