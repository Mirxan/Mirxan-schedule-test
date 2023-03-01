<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Schedule\Http\Requests\TeacherRequest;
use Modules\Schedule\Interfaces\TeacherRepositoryInterface;

class TeacherController extends Controller
{

    public function __construct(private TeacherRepositoryInterface $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->successResponse($this->teacherRepository->getAllTeachers());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @param  string  $surname
     * @param  string  $middlename
     * @param  int  $age
     * @param  date  $birthday
     * @param  int  $experience_year
     * @param  string  $extra_info
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        return response()->successResponse($this->teacherRepository->createTeacher($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->successResponse($this->teacherRepository->getTeacherById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->successResponse($this->teacherRepository->getTeacherById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $name
     * @param  string  $surname
     * @param  string  $middlename
     * @param  int  $age
     * @param  date  $birthday
     * @param  int  $experience_year
     * @param  string  $extra_info
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        return response()->successResponse($this->teacherRepository->updateTeacher($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->successResponse($this->teacherRepository->deleteTeacher($id));
    }
}
