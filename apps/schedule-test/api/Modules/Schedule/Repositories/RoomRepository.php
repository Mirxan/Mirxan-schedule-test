<?php

namespace Modules\Schedule\Repositories;


use Modules\Schedule\Interfaces\RoomRepositoryInterface;
use Modules\Schedule\Entities\Room;

class RoomRepository implements RoomRepositoryInterface 
{

    public function __construct(private Room $room)
    {
        $this->room = $room;
    }

    public function getAllRooms() 
    {
        return $this->room->all();
    }

    public function getRoomById(int $id) 
    {
        return $this->room->findOrFail($id);
    }

    public function createRoom(array $item) 
    {
        return $this->room->create($item);
    }

    public function updateRoom(int $id, array $newItem) 
    {
        return tap($this->room->findOrFail($id), function ($item) use ($newItem){
            $item->update($newItem);
        });
    }

    public function deleteRoom(int $id) 
    {
        $this->room->destroy($id);
    }
}
