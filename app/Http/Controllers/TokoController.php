<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Customer;

class TokoController extends Controller
{
    public function index()
    {
        return view('toko/index');
    }

    public function detail()
    {
        return view('toko/detail');
    }

    public function about()
    {
        return view('toko/about');
    }

    public function admin()
    {
        $products = product::all();
        return view('toko/admin', compact('products'));
    }

    public function create()
    {
        return view('toko/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        product::create($request->all());
        return redirect()->route('produk.admin')->with('success', 'product created successfully');
    }

    public function edit(product $product)
    {
        return view('toko/edit', compact('product'));
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('produk.admin')->with('success', 'product deleted successfully');

    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('produk.admin')->with('success', 'product updated successfully');
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('toko/customers', compact('customers'));
    }

    public function tambah()
    {
        return view('toko/tambah');
    }

    public function toko(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'no_hp' => 'required',
        ]);

        customer::create($request->all());
        return redirect()->route('pelanggan.customer')->with('success', 'customer created successfully');
    }

    public function ubah(Customer $customer)
    {
        return view('toko/ubah', compact('customer'));
    }

    public function hapus(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('pelanggan.customer')->with('success', 'customer deleted successfully');

    }

    public function add(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'no_hp' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('pelanggan.customer')->with('success', 'customer updated successfully');
    }
}
