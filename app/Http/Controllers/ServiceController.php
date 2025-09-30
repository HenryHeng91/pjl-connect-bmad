<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Carrier;
use App\Models\Service;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Services/Index', [
            'services' => Service::with('carrierServiceCosts.carrier')->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Services/Create', [
            'carriers' => Carrier::all(),
        ]);
    }

    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();
        $service = Service::create($validated);
        $this->syncCarrierCosts($service, $validated['carrier_costs'] ?? []);

        return redirect()->route('services.index');
    }

    public function edit(Service $service)
    {
        $service->load('carrierServiceCosts');
        return Inertia::render('Services/Edit', [
            'service' => $service,
            'carriers' => Carrier::all(),
        ]);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $validated = $request->validated();
        $service->update($validated);
        $this->syncCarrierCosts($service, $validated['carrier_costs'] ?? []);

        return redirect()->route('services.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index');
    }

    private function syncCarrierCosts(Service $service, array $carrierCosts)
    {
        $service->carrierServiceCosts()->delete();
        foreach ($carrierCosts as $carrierCost) {
            $service->carrierServiceCosts()->create($carrierCost);
        }
    }
}