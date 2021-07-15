<!doctype html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Laravel URL Shortner</title>
    </head>
    <body>
        
        <div class="container">
            <div class="container-fluid py-5" style="background: #f8f9fa; box-shadow: #ccc 5px 10px 5px;">
                <h1 class="display-5 fw-bold">Criando um encurtador de links simples</h1>
                <p class="col-md-8 fs-4"></p>
            </div>

            <div class="card rounded-0" style="margin-top:35px ;">
                <div class="card-header">
                    <form method="POST" action="{{ route('shortlink.generate') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="link" class="form-control rounded-0" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success rounded-0" type="submit">
                                    Generate Shorten Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-borderless table-striped table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Short Link</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shortLinks as $row)
                                <tr>
                                    <td>
                                        <a href="{{ route('shorten.link', $row->code) }}" target="_blank" class="btn btn-link">
                                            {{ route('shorten.link', $row->code) }}
                                        </a>
                                    </td>
                                    <td>
                                        <small>{{ $row->link }}</small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>