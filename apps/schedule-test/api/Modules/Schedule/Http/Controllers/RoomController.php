<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Schedule\Http\Requests\RoomRequest;
use Modules\Schedule\Interfaces\RoomRepositoryInterface;

class RoomController extends Controller
{

    public function __construct(private RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->successResponse($this->roomRepository->getAllRooms());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @param  int  $number
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        return response()->successResponse($this->roomRepository->createRoom($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->successResponse($this->roomRepository->getRoomById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->successResponse($this->roomRepository->getRoomById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $name
     * @param  int  $number
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        return response()->successResponse($this->roomRepository->updateRoom($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->successResponse($this->roomRepository->deleteRoom($id));
    }
}
