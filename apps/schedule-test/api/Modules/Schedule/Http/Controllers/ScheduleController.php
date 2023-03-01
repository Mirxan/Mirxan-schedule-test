<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Schedule\Http\Requests\ScheduleRequest;
use Modules\Schedule\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function __construct(private ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->successResponse($this->scheduleRepository->getAllSchedules($request->all()));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return response()->successResponse($this->scheduleRepository->getListSchedules());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $teached_id
     * @param  int  $group_id
     * @param  int  $room_id
     * @param  date  $date
     * @param  time  $start_time
     * @param  time  $end_time
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        return response()->successResponse($this->scheduleRepository->createSchedule($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->successResponse($this->scheduleRepository->getScheduleById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->successResponse($this->scheduleRepository->getScheduleById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $teached_id
     * @param  int  $group_id
     * @param  int  $room_id
     * @param  date  $date
     * @param  time  $start_time
     * @param  time  $end_time
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $id)
    {
        return response()->successResponse($this->scheduleRepository->updateSchedule($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->successResponse($this->scheduleRepository->deleteSchedule($id));
    }
}
