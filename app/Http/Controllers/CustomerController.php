<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        $customers = $query-> orderBy('id','DESC') ->get();
        if ($customers->isEmpty()) {
            return redirect()->route('customers.index')->with('error', 'No results found for the search term: ' . $searchTerm);
        }

        return view('customers.index', compact('customers'))
            ->with('i', 0);
}
    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:customers',
            'status' => 'required|boolean',
            'company' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(string $id)
    {
        $customer=Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:customers,email,'.$id,
            'status' => 'required|boolean',
            'company' => 'required',
        ]);
        $customer=Customer::find($id);
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    public function destroy(string $id)
    {
     
        $customer=Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
