<?php

namespace App\Http\Controllers\workspace;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $workspaces = Workspace::where('author_id', $request->user()->id)->get();
        return view('workspace.workspace-list', compact('workspaces'));
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
        $data = $request->validate([
            'title' => 'required|max:100|'
        ]);

        $createdWorkspace = Workspace::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->user()->id
        ]);

        return redirect()->back()->with('message', 'Created a workspace');
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
    public function edit(string $workspaceId)
    {
        $workspace = Workspace::where('id', $workspaceId)->firstOrFail();
        return view('workspace.workspace-edit', compact('workspaceId', 'workspace'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Workspace::where('id', $id)
            ->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
        return redirect()->route('workspace.index')->with(['message' => 'Workspace successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
