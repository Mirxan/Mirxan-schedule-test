<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Schedule\Http\Requests\GroupRequest;
use Modules\Schedule\Interfaces\GroupRepositoryInterface;

class GroupController extends Controller
{

    public function __construct(private GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->successResponse($this->groupRepository->getAllGroups());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        return response()->successResponse($this->groupRepository->createGroup($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->successResponse($this->groupRepository->getGroupById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->successResponse($this->groupRepository->getGroupById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        return response()->successResponse($this->groupRepository->updateGroup($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->successResponse($this->groupRepository->deleteGroup($id));
    }
}
