<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index ()
    {
        $customers = Customer::all();
//        echo '<pre>';
//        print_r($customers);
//        echo '</pre>';
//        exit();
        dump($customers);
        foreach ($customers as $customer){
            dump([
               $customer->first_name,
               $customer->last_name,
               $customer->age,
            ]);
        }
    }
}
