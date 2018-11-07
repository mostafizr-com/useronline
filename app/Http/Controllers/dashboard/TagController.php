<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Redirect;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        $data['tags'] = Tag::latest()->get();
        return view('dashboard/pages/tag/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        return view('dashboard/pages/tag/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq )
    {
        $data = new Tag();
        $data->name = $rq->name;
        $data->slug = str_slug($rq->name);
        $data->save();

        return Redirect::route('tag.edit', $data->id);
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
        
        $data['tag'] = Tag::where('id', $id)->first();

        return view('dashboard/pages/tag/edit',$data);
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

        $data = Tag::findOrFail($id);
        $data->name = $rq->name;
        $data->slug = str_slug($rq->name);
        $data->save();

        return Redirect::route('tag.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Tag::where('id',$id)->delete();
       return Redirect::route('tag.index');
    }
}
