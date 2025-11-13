<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Post;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index ()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create(){
        return view('customer.create');
    }
    public function store(){
        $data = request()->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'middle_name' => 'string',
            'email' => 'string'
        ]);
//        dd($data);
        Customer::create($data);
        return redirect()->route('customer.index');
    }
    public function show(Customer $customer){
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer){
        return view('customer.edit', compact('customer'));
    }

    public function update(Customer $customer){
        $data = request()->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'middle_name' => 'string',
            'email' => 'string'
        ]);
        $customer->update($data);
        return redirect()->route('customer.show', $customer->id);
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
