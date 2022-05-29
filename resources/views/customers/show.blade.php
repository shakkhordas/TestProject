<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="p-3">Customer Profile</h2>
                @foreach ($customerInfo[0] as $key => $customer)
                    <p class="p-3">Name: {{ $customer->name }}</p>
                    <p class="p-3">Mobile: {{ $customer->mobile }}</p>
                    <p class="p-3">Email: {{ $customer->email }}</p>
                    <p class="p-3">Address: {{ $customer->address }}</p>
                    <p class="p-3">Date of Birth: {{ $customer->dob }}</p>
                    <p class="p-3">Country: {{ $customer->country }}</p>
                    
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
