<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Category;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function list()
    {
        $clubs = Club::with('category')->get();
        return view('admin.clubs.list', compact('clubs'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.clubs.add', compact('categories'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:clubs|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        Club::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('clubs.list')
            ->with('success', 'Club ajouté avec succès');
    }

    public function edit($id)
    {
        $club = Club::findOrFail($id);
        $categories = Category::all();
        return view('admin.clubs.edit', compact('club', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $club = Club::findOrFail($id);
        
        $request->validate([
            'name' => 'required|max:255|unique:clubs,name,'.$id,
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $club->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('clubs.list')
            ->with('success', 'Club modifié avec succès');
    }

    public function delete($id)
    {
        $club = Club::findOrFail($id);
        $club->delete();
        return redirect()->route('clubs.list')
            ->with('success', 'Club supprimé avec succès');
    }
}