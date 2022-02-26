<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <style>
    h1 {
        display: flex;
        justify-content: center;
    }

    form {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
    </style>
</head>

<body>

    <h1>TAUQEER AHMAD</h1>
    <h1>SP19-BCS-044</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enter New Shop</div>

                    <div class="card-body">

                        <form action="{{ route('shoes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            Title:
                            <br>
                            <input type="text" name="title" class="form-control">

                            <br>

                            Cover File:
                            <br>
                            <input type="file" name="cover">

                            <br><br>

                            <input type="submit" value=" Upload book " class="btn btn-primary">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>