<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Http\Resources\PublicationResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{

    public function index()
    {
        $publications = Publication::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return PublicationResource::collection($publications);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'publication_type_id' => 'required|exists:publication_types,id',
                'name' => 'required|string',
                'students' => 'required|string',
                'TFG' => 'required|boolean',
                'postgraduate_scholarship' => 'required|boolean',
                'coauthors' => 'required|string',
                'objectives' => 'required|string',
                'goals' => 'required|string',
                'dissemination_medium' => 'required|string',
                'ORCID' => 'required|string',
                'user_id' => 'required|exists:users,id',
            ]
        );

        DB::transaction(function () use ($request) {
            $collaborator = User::find($request->user_id)->collaborator;

            $publication = new Publication();
            $publication->collaborator_id = $collaborator->id;
            $publication->publication_type_id = $request->publication_type_id;
            $publication->name = $request->name;
            $publication->coauthors = $request->coauthors;
            $publication->objectives = $request->objectives;
            $publication->goals = $request->goals;
            $publication->dissemination_medium = $request->dissemination_medium;
            $publication->ORCID = $request->ORCID;
            $publication->save();

            $student = new Student();
            $student->publication_id = $publication->id;
            $student->full_name = $request->students;
            $student->postgraduate_scholarship = $request->postgraduate_scholarship;
            $student->TFG = $request->TFG;
            $student->save();

            return PublicationResource::make($publication)->additional(['student' => $student]);
        });
    }

    public function show($id)
    {
        $publication = Publication::included()->findOrfail($id);
        return PublicationResource::make($publication);
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $publication->collaborator_id = $request->collaborator_id;
        $publication->publication_type_id = $request->publication_type_id;
        $publication->name = $request->name;
        $publication->coauthors = $request->coauthors;
        $publication->objectives = $request->objectives;
        $publication->goals = $request->goals;
        $publication->dissemination_medium = $request->dissemination_medium;
        $publication->ORCID = $request->ORCID;
        $publication->save();

        return PublicationResource::make($publication);
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return PublicationResource::make($publication);
    }
}
