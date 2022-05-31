<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of') }}
        </h2>
        <button class="btn btn-dark"><a href="{{ url('users/index') }}" class="navbar-brand">Users</a></button>
        <button class="btn btn-dark"><a href="{{ url('customers/index') }}"
                class="navbar-brand">Customers</a></button>

        <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {__('Dashboard') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{url('customers/index')}}">Customers</a>
        </h2> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-100">
                    <form action="{{ route('customers.search') }}" class="form-group" method="GET">
                        <input type="text" name="search" required />
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                    <div style="text-align:right">
                        <a href="{{ url('customers/create') }}">
                            <button type="button" class="btn btn-warning">New
                                Customer</button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
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
                                        <td><a href="{{ url('customers/show', $customer->id) }}"><button
                                                    type="button" class="btn btn-info">View</button></a>
                                        </td>
                                        <td><a href="{{ url('customers/edit', $customer->id) }}"><button
                                                    type="button" class="btn btn-primary">Edit</button></a></td>
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
        </div>
        <div class="mt-5 p-5">
            {{ $customers->links() }}
        </div>
    </div>
</x-app-layout>
