<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FolderRequest;
use App\Models\Folder;
use App\Http\Requests\StoreFolderRequest;
use App\Http\Requests\UpdateFolderRequest;
use App\Http\Resources\FoldersResource;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $folders = Folder::oldest('name')->with('user')
                    ->paginate(20);
        return response()->json(FoldersResource::collection($folders)->response()->getData(true),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(FolderRequest $request)
    {
        $user = $request->user();
        $folder = $user->folders()->create($request->validated());
        return response()->json(new FoldersResource($folder),200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FolderRequest $request, Folder $folder)
    {
        $folder = $folder->where('id', $folder->id)->where('user_id', $request->user()->id)->firstOrfail();
        $folder->update($request->validated());
        return response()->json(new FoldersResource($folder),200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        //
    }
}
