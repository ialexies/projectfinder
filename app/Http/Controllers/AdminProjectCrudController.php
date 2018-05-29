<?php

namespace App\Http\Controllers;

use App\Project;
use App\Project_tag;
use Illuminate\Http\Request;

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
        //Oy!!!!!!!! tanga ganto ung process
        //pattern for creating the many to many relationship 
        //be sure that you already have the pivot table for project_tag 
        //Save first the project with the current id for pivot table
        //Create a foreach loop to save each tag in the pivot table with same project id

        //Bobo ka, gamitin mo na bago mo natutunan sa attach and detach para modify ung entry sa role_user LOL 

        if ($request->isMethod('get'))
            return view('admin_projects_form');
        else {
            $rules = [
                'title' => 'required',
            ];
            $this->validate($request, $rules);

            $project = new Project();
            $project->title = $request->title;
            $project->description =$request->description;
            $project->budget = $request->budget;
            $project->category_id = $request->category;
            $project->tag_id = 11;
            // $project->user_id = $request->user;
            $project->user_id = 1;
            $project->company_id = $request->company;
            $project->save();

            
            //get the id of the saved project record        
            $project_id = $project->id;

            //Sample array data of tag 
            $tag_arrays=[1,2,3,8];
            
            //adding entry through manual eloquent and looping, not a good solution
            // echo $project->id;
            // foreach ($tag_arrays as $tag_array ){
            //     $project_tag = new Project_tag();
            //     $project_tag->project_id = $project_id;
            //     $project_tag->tag_id= $tag_array;
            //     $project_tag->save();
            // }
            
            //Adding Tag using eloquent in Pivot
            $ta_lists = Project::findOrFail($project_id );
            $ta_lists->tags()->sync($tag_arrays); 

            return redirect('/admin/projects');

        }
    }


}
