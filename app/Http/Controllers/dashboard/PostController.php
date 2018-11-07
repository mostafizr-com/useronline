<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['sidebar'] = $this->dashboard_sidebar();
        $data['posts'] = Post::latest()->get();

        return view('dashboard/pages/post/index',  $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        return view('dashboard/pages/post/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq )
    {
        $data = new Post();
        $data->title = $rq->title;
        $data->slug = str_slug($rq->title);
        $data->description = $rq->description;
        $data->save();

        return Redirect::route('post.edit', $data->id);
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
        
        $data['post'] = Post::where('id', $id)->first();

        return view('dashboard/pages/post/edit',$data);
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

        $data = Post::findOrFail($id);
        $data->title = $rq->title;
        $data->slug = str_slug($rq->title);
        $data->description = $rq->description;
        $data->save();

        return Redirect::route('post.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Post::where('id',$id)->delete();
       return Redirect::route('post.index');
    }
}
