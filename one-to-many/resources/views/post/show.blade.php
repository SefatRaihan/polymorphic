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
            <a href="{{ route('post-index') }}" class="btn btn-success">Post List</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th width="30%">Index</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Title </td>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <td>Body </td>
                    <td>{{ $post->body }}</td>
                </tr>
                <!-- (Mapping Comment Show part) -->
                <tr>
                    <td> @if (count($post->comments) > 0)
                        <p>Comments <span class="badge badge-dark">{{count($post->comments)}}</span></p>
                        @else
                        <h3>Comment</h3>
                        @endif
                    </td>
                    <td>
                        <ul>
                            @foreach ($post->comments as $comment)
                            <li>{{$comment->body}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('post.comment', $post->id)
        }}" method="POST">
            @csrf
            <div class="form-gourp row">
                <label for="comment" class="col-sm-4 col-form-label">Comment</label>
                <div class="col-sm-8">
                    <textarea name="comment" id="comment" rows="3"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
