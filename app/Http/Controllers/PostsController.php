<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use GMaps;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Post::all();
        return view('tasks.task')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
        $config = array();
        $config['center'] = 'auto';
        $pos =$config['center'] = 'auto';
        // $config['onboundschanged'] = 'if (!centreGot) {
        //     var mapCentre = map.getCenter();
        //     marker_0.setOptions({
        //         position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
        //     });
        // }
        // centreGot = true;';
        // $config['zoom'] ='18';
        $config['map_height']='300px';
        $config['scroll-wheel'] = true;
    
        GMaps::initialize($config);
        $marker = array();
        $marker['position'] = 'Mumbai,India';
      
        GMaps::add_marker($marker);

        $map = GMaps::create_map();
    
        
        return view('tasks.create_task')->with('map',$map);
        // return view('tasks.create_task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'task' => 'required',
            'month' =>'required',
            'location' => 'required',
            'city' => 'required'
        ]);
        $task = new Post;
        $task->task = $request->input('task');
        $task->location = $request->input('location');
        $task->city = $request->input('city');
        $task->month = $request->input('month');
        $task->save();
        return redirect('/');

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
}
