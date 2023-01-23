<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Phone Number Listing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <label style="font-size:30px"><strong>Phone Numbers</strong></label>

        <div class="card my-2">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{url('/')}}" id='filter' method="post">
                    @csrf
                    <div class="form-group">
                        <label><strong>Country :</strong></label>
                        <select id='country' name='country' class="form-control" style="width: 200px">
                            <option value="">--Select Country--</option>
                            <option value="237">Cameroon</option>
                            <option value="251">Ethiopia</option>
                            <option value="212">Morocco</option>
                            <option value="258">Mozambique</option>
                            <option value="256">Uganda</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><strong>State :</strong></label>
                        <select id='state' name='state' class="form-control" style="width: 200px">
                            <option value="">--Select State--</option>
                            <option value="1">Valid</option>
                            <option value="0">Not Valid</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">Country</th>
                    <th scope="col">State</th>
                    <th scope="col">Country Code</th>
                    <th scope="col">Phone num</th>
                </tr>
            </thead>
            <tbody>
                @foreach($phone_numbers as $data)
                <tr>
                    <td>{{ $data->country }}</td>
                    <td>{{ $data->state }}</td>
                    <td>{{ $data->country_code }}</td>
                    <td>{{ $data->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        @if($phone_numbers instanceof \Illuminate\Pagination\Paginator )

        <div class="d-flex justify-content-center">
            {!! $phone_numbers->links() !!}
        </div>

        @endif

    </div>
</body>

</html>