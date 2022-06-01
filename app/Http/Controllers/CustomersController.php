<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('customers.index', compact('customers'));
    }

    public function test()
    {
        $customers = Customer::all();

        return view('customers.test', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::get();
        $countries = Country::all();

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

        $customer = $request->all();
        $customer['status'] = $request->has('status');

        if (!empty($request->file('image_file'))) {
            $fileName = $request->file('image_file')->getClientOriginalName();
            $request->file('image_file')->storeAs('customer_images', $fileName);
            $customer['image_file'] = $fileName;
        }

        $customer = Customer::create($customer);

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
        $countries = Country::all();

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

        if (!empty($request->file('image_file'))) {
            $fileName = $request->file('image_file')->getClientOriginalName();
            $file = $request->file('image_file')->storeAs('customer_images', $fileName);
            $customer->image_file = $fileName;
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer Updated Successfully');
    }

    public function data()
    {
        $customers = Customer::all();
        return view('customers.data', compact('customers'));
    }

    public function downloadPdf()
    {
        $customers = Customer::get();
        //dd($customers);
        $pdf = PDF::loadview('customers.data', compact('customers'))
                    ->setOptions(['defaultFont' => 'serif'])
                    ->setPaper('A4', 'landscape');
        return $pdf->download('customers.pdf');
        //exit;
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
