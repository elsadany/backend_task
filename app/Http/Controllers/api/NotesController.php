<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotesRequest;
use App\Models\Notes;
use App\Http\Requests\UpdateNotesRequest;
use App\Http\Resources\NotesResource;
use App\Http\Traits\HasFile;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    use HasFile;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $notes = Note::latest('id')->where('user_id', auth()->guard('sanctum')->user()?->id)
                ->orWhere('is_shared', 1)->paginate(20);
        return response()->json(NotesResource::collection($notes)->response()->getData(true),200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(NotesRequest $request)
    {
        $data=$request->validated();
        if($request->type=='file' && $request->hasFile('file')){
            $data['content'] = $this->uploadRequestFile('notes',$request,'file');
        }
        $user = $request->user();
        $note = $user->notes()->create($data);
        return response()->json(new NotesResource($note),200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotesRequest $request, Notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $notes)
    {
        //
    }
}
