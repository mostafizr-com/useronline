<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\User;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $data['sidebar'] = $this->dashboard_sidebar();
        $data['categories'] = Category::latest()->get();

        return view('dashboard/pages/category/index',  $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        return view('dashboard/pages/category/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq )
    {
        $data = new Category();
        $data->name = $rq->name;
        $data->slug = str_slug($rq->name);
        $data->description = $rq->description;
        $data->save();

        return Redirect::route('category.edit', $data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo"show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        
        $data['category'] = Category::where('id', $id)->first();

        return view('dashboard/pages/category/edit',$data);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, $id)
    {
        // print_r($id); die;

        $data = Category::findOrFail($id);
        $data->name = $rq->name;
        $data->slug = str_slug($rq->name);
        $data->description = $rq->description;
        $data->save();

        return Redirect::route('category.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Category::where('id',$id)->delete();
       return Redirect::route('category.index');
    }
}
