<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminCategoryCrudController extends Controller
{
    //
    public function index(Request $request){
        //Recive Data
        $search = $request->get('search');
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $field = $request->get('field') != '' ? $request->get('field') : 'name';
        //new istance of Category model    
        $categories = new Category();
        $categories = $categories->orderBy($field, $sort)->where('name', 'like', '%' . $search . '%')->paginate(5)->withPath('$search='.$search.'$sort='.$sort);

        return view('admin_categories', compact('categories'));
        // $categories = $categories
		// ->paginate(5);
        // return view('admin_categories', compact('categories'));

    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('admin_categories_form', ['categories' => Category::find($id)]);
        else {
            $rules = [
                'name' => 'required',
            ];   
            $this->validate($request, $rules);
            $categories= Category::find($id);
            $categories->name = $request->name;
     
            $categories->save();
            return redirect('/admin/categories');
        }
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect('/admin/categories');
    }


    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('admin_categories_form');
        else {
            $rules = [
                'name' => 'required',
            ];
            $this->validate($request, $rules);
            $Category = new Category();
            $Category->name = $request->name;
            $Category->project_id = 1111;
            $Category->save();
            return redirect('/admin/categories');
        }
    }

}
