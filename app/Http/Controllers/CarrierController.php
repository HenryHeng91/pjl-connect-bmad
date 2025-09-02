<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Carriers/Index', [
            'carriers' => Carrier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'contact_person' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'cost_details' => ['nullable', 'string'],
        ]);

        Carrier::create($data);

        return redirect()->route('carriers.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrier $carrier): RedirectResponse
    {
        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'contact_person' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'cost_details' => ['nullable', 'string'],
        ]);

        $carrier->update($data);

        return redirect()->route('carriers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrier $carrier): RedirectResponse
    {
        $carrier->delete();

        return redirect()->route('carriers.index');
    }
}
