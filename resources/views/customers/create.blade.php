<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Customer') }}
        </h2>
        <button class="btn btn-dark"><a href="{{ url('users/index') }}" class="navbar-brand">Users</a></button>
        <button class="btn btn-dark"><a href="{{ url('customers/index') }}"
                class="navbar-brand">Customers</a></button>
    </x-slot>
    <div class="py-12 w-50 container-fluid">
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

                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-xs-2">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Customer Name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Customer Mobile"
                                value="{{ old('mobile') }}">
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Customer Email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control"
                                placeholder="Enter Customer Address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Date of Birth</label>
                            <input type="date" name="dob" class="form-control"
                                placeholder="Enter Customer Date of Birth" value="{{ old('dob') }}">
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Country ID</label>
                            <select id="selectCountry" name="country_id" class="form-control">
                                <?php foreach($countries as $key => $country) :  ?>
                                <option id="countryOption" value="{{ $country->country_id }}">{{ $country->name }}
                                </option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" value="{{ old('status') }}">
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="">Upload Photo</label>
                            <input type="file" name="image_file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
            <p>
                {{ session('success') }}
            </p>
        </div>
    @endif

    <script>
        $('#selectCountry').click(function() {
            $('#countryOption').slideDown();
        });
    </script>
</x-app-layout>
