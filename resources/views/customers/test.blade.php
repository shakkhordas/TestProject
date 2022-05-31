<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers DataTable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="mt-2 p-3 d-flex flex-row">
            <a href="{{ route('customers.index') }}">
                <button type="button" class="btn btn-dark">
                    Go Back
                </button>
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table id="customerData" class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sl.</td>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</td>
                            <th scope="col">Mobile</td>
                            <th scope="col">Email</td>
                            <th scope="col">Date of Birth</td>
                            <th scope="col">Country</td>
                            <th scope="col">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key => $customer)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td><img class="img-circle" height="75" width="75"
                                        src="{{ $customer->image_file
                                            ? asset('storage/customer_images/' . $customer->image_file)
                                            : asset('images/no-photo.png') }}" />
                                </td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->mobile }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($customer->dob)->format('d/m/Y') }}</td>
                                <td>{{ $customer->country->name ?? '' }}</td>
                                <td>
                                    @if ($customer->status)
                                        <strong class="text-success text-align-justify">Active</strong>
                                    @else
                                        <strong class="text-danger text-align-justify">Inactive</strong>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerData').DataTable();
        });
    </script>

</body>

</html>
