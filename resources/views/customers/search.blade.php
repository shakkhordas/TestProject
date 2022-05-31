<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="{{ url('customers/index') }}" class="nav-link">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('users/index') }}" class="nav-link">Users</a>
                    </li>
                </ul>
            </div>

        </h2>

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
                    <div class="px-6">
                        <a href="{{ route('customers.index') }}"><button class="btn btn-dark">Back</button></a>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</td>
                                <th scope="col">Image</th>
                                <th scope="col">Name</td>
                                <th scope="col">Mobile</td>
                                <th scope="col">Email</td>
                                <th scope="col">Address</td>
                                <th scope="col">Date of Birth</td>
                                <th scope="col">Country ID</td>
                                <th scope="col">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($customers->isNotEmpty())
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
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ \Carbon\Carbon::parse($customer->dob)->format('d/m/Y') }}</td>
                                        <td>{{ $customer->country->name }}</td>
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
                                        <br>
                                    </tr>
                                @endforeach
                            @else
                                <div class="px-4">
                                    <h2>NO CUSTOMERS FOUND</h2>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
