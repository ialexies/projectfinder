<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class AdminProjectCrudController extends Controller
{
    //
    public function index(Request $request){
        //Recive Data
        $search = $request->get('search');
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $field = $request->get('field') != '' ? $request->get('field') : 'title';
        //new istance of tag model    
        $projects = new Project();
        $projects = $projects->orderBy($field, $sort)->where('title', 'like', '%' . $search . '%')->paginate(5)->withPath('$search='.$search.'$sort='.$sort);
        return view('admin_projects', compact('projects'));
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('admin_tags_form', ['tags' => Tag::find($id)]);
        else {
            $rules = [
                'name' => 'required',
            ];   
            $this->validate($request, $rules);
            $tags= Tag::find($id);
            $tags->name = $request->name;
     
            $tags->save();
            return redirect('/admin/tags');
        }
    }

    public function delete($id)
    {
        Tag::destroy($id);
        return redirect('/admin/tags');
    }


    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('admin_projects_form');
        else {
            $rules = [
                'name' => 'required',
            ];
            $this->validate($request, $rules);
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->save();
            return redirect('/admin/tags');
        }
    }


}
