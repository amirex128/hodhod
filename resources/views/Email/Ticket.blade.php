{{--
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="btn btn-danger">{{$title}}</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>--}}
    <!DOCTYPE html>
<html>

<head>
    <style>
        body {
            display: flex;
            align-content: center;
            justify-content: center;
        }

        .flex-container {
            width: 50%;
            align-content: center;
            display: flexbox;
        }

        .flex-container > :nth-child(even) {
            background-color: dodgerblue
        }

        .flex-container > :nth-child(odd) {
            background-color: green
        }

        .header {
            width: 100%;
            height: 50px;
            display: flex;
            flex-direction: row-reverse;
        }

        .logo {
            height: 150px;
        }

        .content {
            padding: 10px;
        }
    </style>
</head>

<body>
<div class="flex-container">
    <div class="header">
        <img style="height:inherit;width:auto" src="main_icon.png">
    </div>
    <div class="logo">
        &nbsp;
    </div>

    <div class="content">
        <p>{{$title}}</p>
    </div>

    <div class="footer">
        &copy; {{ now()->year }} <a href="http://marcoweb.ir/" class="font-weight-bold ml-1" target="_blank">برنامه
            نویسی و طراحی</a>از
        <a href="http://marcoweb.ir/" class="font-weight-bold ml-1" target="_blank">مارکو وب</a>
    </div>
</div>
</body>

</html>
