<?php

namespace App\Http\Controllers;

use App\Models\Usermail;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsermailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render(
            'Usermails/Index',
            [
                'usermails' => Usermail::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        Usermail::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Usermail $usermail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usermail $usermail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usermail $usermail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usermail $usermail)
    {
        $usermail->delete();

        return redirect()->route('usermails.index');
    }
}
