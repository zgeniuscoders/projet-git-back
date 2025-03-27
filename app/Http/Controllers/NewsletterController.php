<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Newsletter::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email|unique:newsletters'
        ]);

        return Newsletter::create([
            'email' => $validate['email']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        return $newsletter;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $validate = $request->validate([
            'email' => 'required|email|unique:newsletters'
        ]);

        return $newsletter->update([
            'email' => $validate['email']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
    }
}
