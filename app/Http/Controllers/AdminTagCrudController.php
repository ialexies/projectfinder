<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class AdminTagCrudController extends Controller
{
  //
  public function index(Request $request){
    //Recive Data
    $search = $request->get('search');
    $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
    $field = $request->get('field') != '' ? $request->get('field') : 'name';
    //new istance of tag model    
    $tags = new Tag();
    $tags = $tags->orderBy($field, $sort)->where('name', 'like', '%' . $search . '%')->paginate(5)->withPath('$search='.$search.'$sort='.$sort);
    return view('admin_tags', compact('tags'));
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
      return view('admin_tags_form');
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
