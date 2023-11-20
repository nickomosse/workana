<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Unity;

class RoomController extends Controller
{
    private $repository;

    public function __construct(Room $room) {
        $this->repository = $room;
    }

    public function index() {
        $rooms = $this->repository->all();

        return view('pages.Rooms.index', [
            'rooms' => $rooms,
        ]);
    }

    public function create() {
        $unities = Unity::all();

        return view('pages.Rooms.create', [
            'unities' => $unities,
        ]);
    }

    public function store(Request $request) {
        $room = new Room;

        $room->name = $request->name;
        $room->unity_id = $request->unity;

        $room->save();

        return redirect()->route('rooms.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $room = $this->repository->find($id);

        return view('pages.Rooms.show', [
            'room' => $room,
        ]);
    }

    public function edit($id){
        $room = Room::find($id);
        $unities = Unity::all();

        if (!$id) {
            return back();
        }

        return view('pages.Rooms.edit', [
            'room' => $room,
            'unities' => $unities,

        ]);
    }

    public function update(Request $request, $id){
        $room = Room::find($id);

        if (!$id) {
            return back();
        }

        $room->name = $request->name;
        $room->unity_id = $request->unity;

        $room->save();

        return redirect()->route('rooms.index');
    }

    public function destroy($id){
        $room = $this->repository->find($id);

        $room->delete();

        return redirect()->route('rooms.index');
    }
}
