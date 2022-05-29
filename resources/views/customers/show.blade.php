<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="p-4">Customer Profile</h2>
                <div class="px-4 col-7">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $customer->mobile }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ \Carbon\Carbon::parse($customer->dob)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $customer->country->name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                @if ($customer->status)
                                    <td><strong class="text-success">Active</strong></td>
                                @else
                                    <td><strong class="text-danger">Inactive</strong></td>
                                @endif
                            </tr>
                            <tr>
                                <th>Member Since</th>
                                <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated</th>
                                <td>{{ \Carbon\Carbon::parse($customer->updated_at)->format('d/m/Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-5">
                    <img class="img-thumbnail rounded mx-auto d-block" src="{{ ($customer->image_file)? 
                    asset('images/'.$customer->image_file) : asset('images/no-photo.png') }}"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
