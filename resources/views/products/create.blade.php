<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Product</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{$message}}</strong>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h1>Add New Product</h1>
                <div class="card mt-3 p-3">
                    <form method="POST" action="/products/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="4" name="description">{{old('description')}}</textarea>
                            @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" value="{{old('image')}}">
                            @if($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-dark mt-3">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="/bootstrap/js/bootstrap.min.js">
</script>
<script src="/bootstrap/js/bootstrap.bundle.js">
</script>

</html>