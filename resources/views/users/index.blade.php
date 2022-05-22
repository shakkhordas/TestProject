<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Dashboard') }}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="{{url('customers/index')}}" class="nav-link">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('users/index')}}" class="nav-link">Users</a>
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
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</td>
                                    <th scope="col">Name</td>
                                    <th scope="col">Email</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <th scope="row">{{$data->id}}</th>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
