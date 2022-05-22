<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <button class="btn btn-dark"><a href="{{ url('users/index') }}" class="navbar-brand">Users</a></button>
        <button class="btn btn-dark"><a href="{{ url('customers/index') }}"
                class="navbar-brand">Customers</a></button>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('customers.update', $customer) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Edit Your Name"
                                value="{{ $customer->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" name="mobile" class="form-control"
                                placeholder="Edit Your Mobile Number" value="{{ $customer->mobile }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Edit Your Email ID"
                                value="{{ $customer->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Edit Your Address"
                                value="{{ $customer->address }}">
                        </div>
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" placeholder="Edit Your Date of Birth"
                                value="{{ $customer->dob }}">
                        </div>
                        <div class="form-group">
                            <label for="">Country ID</label>
                            <input type="number" name="country_id" class="form-control"
                                placeholder="Edit Your Country ID" value="{{ $customer->country_id }}">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" value="{{ old('status') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Image File</label>
                            <input type="file" name="image_file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>