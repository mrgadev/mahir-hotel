<?php

namespace App\Http\Controllers;

use App\Models\AccomdationPlan;
use Illuminate\Http\Request;

class AccomdationPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accomdation_plans = AccomdationPlan::all();
        return view('dashboard.admin.accomdation-plan.index', compact('accomdation_plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.accomdation-plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        AccomdationPlan::create($data);
        return redirect()->route('dashboard.accomodation_plan.index')->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccomdationPlan $accomodation_plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccomdationPlan $accomodation_plan)
    {
        return view('dashboard.admin.accomdation-plan.edit', compact('accomodation_plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccomdationPlan $accomodation_plan)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $accomodation_plan->update($data);
        return redirect()->route('dashboard.accomodation_plan.index')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccomdationPlan $accomodation_plan)
    {
        $accomodation_plan->delete();
        return redirect()->route('dashboard.accomodation_plan.index')->with('success', 'Berhasil menghapus data');
    }
}
