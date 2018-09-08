<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // List all index
    public function index()
    {
        $categories = Category::all()->where('parentId', '=', 0);
        return view('category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'parentId' => 'required|int',
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string'
        ]);

        if ((new Category($data))->save())
        {
            return redirect('cat');
        }
    }

    public function destroy(Request $request, $id)
    {
        // Check there is sub-cat
        $subCat = Category::all()->where('parentId', '=', $id);
        if($subCat->count() === 0)
        {
            Category::destroy($id);
        }

        return redirect('cat');
    }
}
