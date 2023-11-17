<?php

namespace App\Http\Controllers\token;

use App\Http\Controllers\Controller;
use App\Models\ApiToken;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use TheSeer\Tokenizer\Token;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $workspaceId)
    {
        $workspace = Workspace::find($workspaceId);
        $tokens = ApiToken::where('workspace_id', $workspaceId)->get();
        return view('token.token-list', compact(['workspaceId', 'workspace', 'tokens']));
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
    public function store(Request $request, $workspaceId)
    {
        $request->validate([
            'name' => 'max:100'
        ]);

        $generatedToken = Str::random(40);

        ApiToken::create([
            'workspace_id' => $workspaceId,
            'name' => $request->name,
            'token' => $generatedToken,
            'created_at' => now(),
            'updated_at' => now(),
            'revoked_at' => null
        ]);

        return redirect()->route('workspace.token.index', $workspaceId)->with([
            'message' => "Token successfully created, Your token: $generatedToken"
        ]);
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
    public function destroy($workspaceId, string $id)
    {
        ApiToken::where('id', $id)
        ->update([
            'revoked_at' => now()
        ]);

        return redirect()->route('workspace.token.index', $workspaceId)
            ->with(['message' => 'Successfully revoked']);
    }
}
