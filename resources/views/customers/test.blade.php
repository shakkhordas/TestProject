<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers DataTable</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>

<body>
    <div class="container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table id="customer_data" class="table table-striped table-bordered table-hover">
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
                                <th scope="row">{{ $loop->iteration }}</th>
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
                                <td><a href="{{ url('customers/show', $customer->id) }}"><button type="button"
                                            class="btn btn-info">View</button></a>
                                </td>
                                <td><a href="{{ url('customers/edit', $customer->id) }}"><button type="button"
                                            class="btn btn-primary">Edit</button></a></td>
                                <td>
                                    <form action="{{ route('customers.delete', $customer) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete ?')">
                                        @csrf
                                        @method('Delete')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#customer_data').DataTable();
        });
    </script>
</body>

</html>
