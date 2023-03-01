<?php

namespace Modules\Schedule\Interfaces;

interface RoomRepositoryInterface 
{
    public function getAllRooms();
    public function getRoomById(int $id);
    public function createRoom(array $item);
    public function updateRoom(int $id, array $newItem);
    public function deleteRoom(int $id);
}