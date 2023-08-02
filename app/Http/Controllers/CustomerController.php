<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::where('user_id', '=', Auth::id())->orderBy('id', 'DESC')->paginate(8);
        // dd($customers);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }


    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address' => 'nullable',
            'phone' => 'required',
            'email' => 'required|email|unique:customers,email',

        ]);
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $customers = Customer::create($request->all());
        return redirect()->route('admin.customers.index')->with('msg', 'customer created successfully')->with('type', 'primary');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::findOrFail($id);
        // dd($customers);
        return view('admin.customers.edit', compact('customers'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address' => 'nullable',
            'phone' => 'required',
            'email' => 'required|string|email|unique:customers,email,' . $id,
        ]);

        $customer = Customer::findOrFail($id);
        // Make sure the user can only update their own customers
        if ($customer->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Update the customer's data
        $customer->update($request->all());

        return redirect()
            ->route('admin.customers.index')
            ->with('msg', 'Customer updated successfully')
            ->with('type', 'primary');
    }


    public function destroy(string $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('admin.customers.index')->with('msg', 'customer deleted successfully')->with('type', 'danger');
    }

//--------------------------------------------

    public function trashed()
    {
        $customers = Customer::onlyTrashed()
            ->latest('deleted_at')
            ->get();
        return view('admin.customers.trashed', compact('customers'));
    }

    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();
        return redirect()->route('admin.customers.index')
            ->with('msg', "Customer ({$customer->name}) restore successfully")
            ->with('type', 'info');
    }

    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->forceDelete();

        return redirect()->route('admin.customers.index')
            ->with('msg', "Customer ({$customer->name}) deleted for ever successfully")
            ->with('type', 'success');
    }
}
