<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class AdminCompanyCrudController extends Controller
{
    //
    public function index(Request $request){
        //Recive Data
        $search = $request->get('search');
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $field = $request->get('field') != '' ? $request->get('field') : 'name';
        //new istance of tag model    
        $companies = new Company();
        $companies = $companies->orderBy($field, $sort)->where('name', 'like', '%' . $search . '%')->paginate(5)->withPath('$search='.$search.'$sort='.$sort);
        return view('admin_companies', compact('companies'));
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('admin_companies_form', ['companies' => Company::find($id)]);
        else {
            $rules = [
                'name' => 'required',
            ];   
            $this->validate($request, $rules);
            $companies= Company::find($id);
            $companies->name = $request->name;
     
            $companies->save();
            return redirect('/admin/companies');
        }
    }

    public function delete($id)
    {
        Tag::destroy($id);
        return redirect('/admin/companies');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('admin_companies_form');
        else {
            $rules = [
                'name' => 'required',
            ];
            $this->validate($request, $rules);
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->save();
            return redirect('/admin/companies');
        }
    }

}
