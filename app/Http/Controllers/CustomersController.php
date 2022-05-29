<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageServiceProvider;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::paginate(10);
        //dd($customers);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::get();
        $countries = array([
             1 => 'Bangladesh',
             2 => 'India',
             3 => 'Sri Lanka',
        ]);
        //dd($customers);
        return view('customers.create', compact('customers', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isValidated = $request->validate([
            'name' => 'required|max:200',
            'mobile' => 'required|max:11',
            'email' => 'email|required|max:100',
            'address' => 'required|max:255',
            'dob' => 'required|date',
            'country_id' => 'numeric|required|min:1'
        ]);

        $customer = new Customer;

        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->dob = $request->dob;
        $customer->country_id = $request->country_id;
        $customer->status = $request->has('status');
        $customer->image_file = $request->image_file;
        $customer->save();

        //dd($customer);

        return redirect()->route('customers.index')->with('success', 'Customer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        
        return view('customers.show', compact('customer'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('mobile', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('address', 'LIKE', '%' . $search . '%')
            ->get();

        //dd($customers);

        return view('customers.search', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $countries = array([
            1 => 'Bangladesh',
            2 => 'India',
            3 => 'Sri Lanka',
        ]);
        //dd($countries);
        return view('customers.edit', compact('customer', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $isValidated = $request->validate([
            'name' => 'required|max:200',
            'mobile' => 'required|max:11',
            'email' => 'required|max:100',
            'address' => 'required|max:255',
            'dob' => 'required|date',
            'country_id' => 'numeric|required|min:1',
        ]);

        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->dob = $request->dob;
        $customer->country_id = $request->country_id;
        $customer->status = $request->has('status');

        
        if (!empty($request->image_file)) {
            $customer->image_file = $request->image_file;
        }
        $customer->save();

        //dd($customer->image_file);

        return redirect()->route('customers.index')->with('success', 'Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('Success', 'Customer Deleted Successfully!');
    }
}
