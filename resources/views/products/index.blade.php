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
        <div class="alert alert-danger alert-block">
            <strong>{{$message}}</strong>
        </div>
    @endif
    <div class="container">
        <div class="text-right">
            <a href="products/create" class="btn btn-dark mt-2">New product</a>
        </div>
        <h1>Products</h1>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sr no</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)

                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>
                        <a class="text-dark" href="products/{{$product->id}}/show">
                            {{$product->name}}
                        </a>
                    </td>
                    <td><img src="products/{{$product->image}}" class="rounded-circle" width="50" height="50"></td>
                    <td>
                        <a href="products/{{$product->id}}/edit" class="btn btn-dark">Edit</a>
                        <form method="POST" class="d-inline" action="products/{{$product->id}}/delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
<script src="/bootstrap/js/bootstrap.min.js">
</script>
<script src="/bootstrap/js/bootstrap.bundle.js">
</script>

</html>