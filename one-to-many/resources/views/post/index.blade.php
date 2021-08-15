<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Post</title>
</head>

<body>
    <div class="container">
        <div class="col-sm-2 offset-12 mb-2">
            <a href="{{ url('create') }}" class="btn btn-success">Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                   
                    <th>Serial No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($posts->count())
                @foreach ($posts as $kye=>$post)
                <tr>
                    <td>{{++$kye}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>
                        <a href="{{ url('show', $post->id)}}" class="btn btn-info">show</a>
                        <a href="{{ url('edit', $post->id)}}" class="btn btn-warning">edit</a>
                        {!! Form::open([
                        'url' => ['delete', $post->id],
                        'method' => 'GET',
                        'style' => 'display: inline'
                        ]) !!}
                        <button class="btn btn-iconwaves-effect btn-danger" type="submit"
                            onclick="return confirm('Are You Sure To Delete This')">
                            Delete </button>
                        {!! Form::close() !!}
                    </td>

                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        <div class="d-flex display-inline">
            {!! $posts->links() !!}
        </div>

    </div>





</body>

</html>