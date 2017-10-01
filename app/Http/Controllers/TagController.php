<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::search($request->name)->orderBy('id', 'DESC')->paginate(5);

        return view('admin.tags.index')->with('tags', $tags);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:50|required|unique:tags',
        ]);

        $tag = new Tag($request->all());
        $tag->save();

        flash("El tag $tag->name ha sido creada con éxito.")->success()->important();

        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'max:50|required|unique:tags',
        ]);

        $tag->fill($request->all());
        $tag->save();

        flash("El tag se actualizó con éxito.")->success()->important();

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        flash("El tag $tag->name ha sido eliminado con éxito.")->success()->important();

        return redirect()->route('tags.index');
    }
}
