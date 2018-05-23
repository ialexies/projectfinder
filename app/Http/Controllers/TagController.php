<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
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
  

        $this->validate($request, [
            'tagname' => 'required',
            'tagname'=> 'regex:/(^[A-Za-z0-9 ]+$)+/'   //Numbers & Letters Only
        ]);

        //return 'SUCCESS';

        //Create new message
        $tag = new Tag;
        $tag->name = $request->input('tagname'); 
        $tag->save();
        //Redirect
        return redirect('/admin_tags/')->with('success', 'Tag was Added');

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
        Tag::destroy($id);
        return redirect('/admin_tags/')->with('success', 'Tag was Deleted');
    }


    public function show_all()
    {
        //
        $tags = Tag::all();
        return view('admin_tags')->with('tags', $tags);
    }

}
