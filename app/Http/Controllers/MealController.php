<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    private $repository;
    public function __construct(Meal $meal) {
        $this->repository = $meal;
    }

    public function index() {
        $meals = $this->repository->all();

        return view('pages.Meals.index', [
            'meals' => $meals,
        ]);
    }

    public function create() {
        return view('pages.Meals.create');
    }

    public function store(Request $request) {
        $meal = new Meal;

        $meal->name = $request->name;

        $meal->save();

        return redirect()->route('meals.index');
    }

    public function show($id){
        $meal = $this->repository->find($id);

        if (!$meal) { return back(); }

        return view('pages.Meals.show', [
            'meal' => $meal,
        ]);
    }

    public function edit($id){
        $meal = Meal::find($id);

        if (!$meal) {
            return back();
        }

        return view('pages.Meals.edit', [
            'meal' => $meal,

        ]);
    }

    public function update(Request $request, $id){
        $meal = Meal::find($id);

        if (!$meal) {
            return back();
        }

        $meal->name = $request->name;

        $meal->save();

        return redirect()->route('meals.index');
    }

    public function destroy($id){
        $meal = $this->repository->find($id);

        $meal->delete();

        return redirect()->route('meals.index');
    }
}
