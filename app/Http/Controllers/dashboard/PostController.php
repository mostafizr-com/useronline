<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Redirect;
use Auth;

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
        $data['cats'] = Category::orderBy('name', 'ASC')->get();
        $data['tags'] = Tag::orderBy('name', 'ASC')->get();

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
        // dd($rq->all());

        $data = new Post();
        $data->author_id = Auth::user()->id;
        $data->title = $rq->title;
        $data->slug = $rq->slug;
        $data->description = $rq->description;
        $data->save();

        $data->categories()->sync($rq->category, false);
        $data->tags()->sync($rq->tag, false);

        return Redirect::route('post.show', $data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        
        $data['post'] = Post::where('id', $id)->first();
        $data['cats'] = Category::orderBy('name', 'ASC')->get();
        $data['tags'] = Tag::orderBy('name', 'ASC')->get();

        return view('dashboard/pages/post/show',$data);
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
        $data['cats'] = Category::orderBy('name', 'ASC')->get();
        $data['tags'] = Tag::orderBy('name', 'ASC')->get();

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
        // dd($rq->all());

        $data = Post::findOrFail($id);
        $data->author_id = Auth::user()->id;
        $data->title = $rq->title;
        $data->slug = $rq->slug;
        $data->description = $rq->description;
        $data->save();

        $data->categories()->sync($rq->category);
        $data->tags()->sync($rq->tag);

        return Redirect::route('post.show', $id);
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
