<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index' , compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request , ImageService $imageService)
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'blog');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('blog.index')->with('swal-error', 'There was an error uploading the image');
            }
            $inputs['image'] = $result;
        }
    
        $blog = Blog::create($inputs);
        return redirect()->route('blog.index')->with('swal-success', 'Your blog has been successfully launched');

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
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit' , compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id , Blog $blog , ImageService $imageService)
    {
        $blog = Blog::findOrFail($id);
        $inputs = $request->all();
        
        if ($request->hasFile('image')) {
            if (!empty($blog->image)) {
                $imageService->deleteDirectoryAndFiles($blog->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'blog');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('blog.index')->with('swal-error', 'There was an error uploading the image');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($blog->image)) {
                $image = $blog->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $blog->update($inputs);
        return redirect()->route('blog.index')->with('swal-success', 'Your blog has been successfully edited');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $result = $blog->delete();

        
        return redirect()->route('blog.index')->with('swal-success', 'Your blog has been successfully deleted');
   
    }
}
