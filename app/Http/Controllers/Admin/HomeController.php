<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Services\Image\ImageService;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::all();
        return view('admin.home.index' , compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeRequest $request , ImageService $imageService)
    {
       
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'home');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('home.index')->with('swal-error', 'There was an error uploading the image');
            }
            $inputs['image'] = $result;
        }
    
        $post = Home::create($inputs);
        return redirect()->route('home.index')->with('swal-success', 'Your new page has been successfully launched');
   
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
        $home = Home::findOrFail($id);
        return view('admin.home.edit' , compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomeRequest $request, $id, Home $home , ImageService $imageService)
    {
        $home = Home::findOrFail($id);
        $inputs = $request->all();
        
        if ($request->hasFile('image')) {
            if (!empty($home->image)) {
                $imageService->deleteDirectoryAndFiles($home->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'home');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('home.index')->with('swal-error', 'There was an error uploading the image');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($home->image)) {
                $image = $home->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $home->update($inputs);
        return redirect()->route('home.index')->with('swal-success', 'Your home page has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $home = Home::findOrFail($id);
        $result = $home->delete();
        

        return redirect()->route('home.index')->with('swal-success', 'Your home page has been successfully deleted');
   
    }
}
