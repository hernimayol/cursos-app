<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'enrollment_id'=>'required|exists:enrollments,id',
            'title'=>'required|string',
            'grade'=>'nullable|numeric|min:0|max:10',
            'date'=>'required|date',
        ]);
        return Evaluation::create($request->all());
    }
    public function myEvaluations() //Confirmando la evaluacion con las inscripciones.
    {
        return Evaluation::whereHas('enrollment', function ($query) {
            $query->where('user_id', auth()->id());
        })->with('enrollment.course')->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
