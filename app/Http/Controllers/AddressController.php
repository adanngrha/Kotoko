<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        return view ('address.index', [
            'title' => 'Alamat Saya',
            'addresses' => Address::where('user_id', $user->id)
            ->orderBy('main')
            ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.add-address', [
            'title' => 'Tambahkan Alamat Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->id());
        $count = Address::where('user_id', $user->id)->get();
        $validated = $request->validate([
            'receiver_name' => 'required|min:3',
            'receiver_phone_number' => 'required|min:7',
            'address_name' => 'required|min:10',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
        ]);

        $validated['user_id'] = $user->id;

        if($count->count() == 0)
        {
            $validated['main'] = '1';
        }

        Address::create($validated);

        return redirect('/address')->with('success', 'Alamat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('address.edit', [
            'title' => "Edit Alamat Anda",
            'address' => $address,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'receiver_name' => 'required|min:3',
            'receiver_phone_number' => 'required|min:7',
            'address_name' => 'required|min:10',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
        ]);

        Address::where('id', $address->id)->update($validated);

        return redirect('/address')->with('success', 'Alamat berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        Address::destroy($address->id);

        return redirect('/address')->with('success', 'Post has been deleted.');
    }

    public function main($id)
    {
        $user = User::find(auth()->id());
        Address::where('user_id', $user->id)
                    ->update(['main' => '0']);

        Address::where('id', $id)->update(['main' => '1']);

        return redirect('/address')->with('success', 'Sukses menentukan alamat utama yang baru!');
    }
}
