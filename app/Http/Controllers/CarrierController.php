<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CarrierController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('manage-carriers');
        $carriers = \App\Models\Carrier::all(); // Fetch all carriers
        return Inertia::render('Carriers/Index', [
            'carriers' => $carriers,
        ]);
    }

    public function create()
    {
        $this->authorize('manage-carriers');
        return Inertia::render('Carriers/Create');
    }

    public function store(Request $request)
    {
        $this->authorize('manage-carriers');
        // Logic to store a new carrier
    }

    public function edit($id)
    {
        $this->authorize('manage-carriers');
        return Inertia::render('Carriers/Edit', [
            'carrierId' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('manage-carriers');
        // Logic to update a carrier
    }

    public function destroy($id)
    {
        $this->authorize('manage-carriers');
        // Logic to delete a carrier
    }
}
