<?php

namespace App\Http\Controllers\quota;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($workspaceId)
    {
        $startTime = Carbon::parse(now());
        $workspace = Workspace::find($workspaceId);

        $quota = Quota::create([
            'workspace_id' => 1,
            'month' => 11,
            'limit' => 25,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $quota->quota_used_cost = Carbon::now()->diffInMilliseconds($startTime);
        $quota->save();
        return view('quota.quota-list', compact('workspaceId', 'workspace'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
