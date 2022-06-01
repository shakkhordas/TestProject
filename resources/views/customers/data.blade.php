<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers' Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="mt-5 container">
        <table class="table table-striped table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Country</th>
                    <th scope="col">Status</th>
                    <th scope="col">Member Since</th>
                    <th scope="col">Last Updated on</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->mobile }}</td>
                        <td>{{ \Carbon\Carbon::parse($customer->dob)->format('d/m/Y') }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->country->name }}</td>
                        <td>
                            @if ($customer->status)
                                <strong class="text-success text-align-justify">Active</strong>
                            @else
                                <strong class="text-danger text-align-justify">Inactive</strong>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($customer->updated_at)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
