<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Tag;
use App\Tagoption;



class ControllerProject extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showall(Request $request)
    {
        //
        $categories= category::all();


        $search = $request->get('search');
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $field = $request->get('field') != '' ? $request->get('field') : 'title';

        $projects = new Project();
        $projects =$projects->orderBy($field, $sort)->where('title', 'like', '%' . $search . '%')->paginate(4)->withPath('$search='.$search.'$sort='.$sort);
        // $projects= Project::all();
        
        $tags= Tag::all();
        return view('page_projects')->with('projects', $projects)->with('categories', $categories)->with('tags', $tags);
        //return dd($projects);


    }

}
