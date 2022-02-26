<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Shoes list</div>

                    <div class="card-body">

                        <a href="{{ route('shoes.create') }}" class="btn btn-primary">Add new Shoe</a>
                        <br /><br />

                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Download file</th>
                                <th>Delete file</th>
                            </tr>
                            @forelse ($shoes as $shoe)
                            <tr>
                                <td>{{ $shoe->title }}</td>

                                <td><a href="{{ route('shoes.download', $shoe->uuid) }}">{{ $shoe->cover }}</a></td>
                                <td><a href="{{ route('shoes.delete', $shoe->uuid) }}">{{ $shoe->cover }}</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">No books found.</td>
                            </tr>
                            @endforelse


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>