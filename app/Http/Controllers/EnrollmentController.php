<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll(Request $request, $courseId) //Funcion para declarar error en caso de que ya se esté inscrito al mismo curso.
    {
        $user = $request->user();

        if (Enrollment::where('user_id', $user->id)->where('course_id', $courseId)->exists()) {
            return response()->json(['message' => 'Ya estás inscrito en este curso'], 409);
        }

        $enrollment = Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $courseId
        ]);

        return response()->json($enrollment, 201);
    }

    public function myCourses()
    {
        return auth()->user()->enrollments()->with('course')->get();
    }  //Funcion enroll y myCourses agregadas
    
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
