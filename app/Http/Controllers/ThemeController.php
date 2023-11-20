<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    private $repository;

    public function __construct(Theme $theme) {
        $this->repository = $theme;
    }

    public function index() {
        $themes = $this->repository->all();

        return view('pages.Themes.index', [
            'themes' => $themes,
        ]);
    }

    public function create() {
        return view('pages.Themes.create');
    }

    public function store(Request $request) {
        $theme = new Theme;

        $theme->name = $request->name;
        $theme->genero = $request->genero;

        $theme->save();

        return redirect()->route('themes.index');
    }

    public function show($id){
        $theme = $this->repository->find($id);

        if (!$theme) { return back(); }

        return view('pages.Themes.show', [
            'theme' => $theme,
        ]);
    }

    public function edit($id){
        $theme = Theme::find($id);

        if (!$theme) {
            return back();
        }

        return view('pages.Themes.edit', [
            'theme' => $theme,

        ]);
    }

    public function update(Request $request, $id){
        $theme = Theme::find($id);

        if (!$theme) {
            return back();
        }

        $theme->name = $request->name;
        $theme->genero = $request->genero;

        $theme->save();

        return redirect()->route('themes.index');
    }

    public function destroy($id){
        $theme = $this->repository->find($id);

        $theme->delete();

        return redirect()->route('themes.index');
    }
}
