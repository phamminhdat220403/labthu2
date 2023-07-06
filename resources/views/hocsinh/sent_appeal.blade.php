<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="GET" action="{{ route('gui_phuc_khao') }}">
        @csrf
        <div>
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" id="student_id">
        </div>
        <div>
            <label for="exam_id">Exam Name:</label>
            <input type="text" name="exam_id" id="exam_id">
        </div>
        <div>
            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>

</body>
</html>