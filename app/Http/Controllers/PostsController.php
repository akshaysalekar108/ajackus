<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use GuzzleHttp\Client;
use App\Library\Curls;
use Illuminate\Support\Arr;
// use FarhanWazir\GoogleMaps\GMaps;


class PostsController extends Controller
{
    
    public function cities(Request $request){
        // dd($country);
        $cntry = $request->get('location');
        $dependent = $request->get('dependent');
        $path = storage_path() . "/countriesToCities.json";
    $json = json_decode(file_get_contents($path), true); 
    $contains = Arr::only($json, $cntry);
        // dd($contains);
            // $output = '<option value="select">Select'.ucfirst($dependent).'</option>';
            
            // foreach($contains as $contain){
            // $output .='<option value="'.$contain->$dependent.'">'.$contain->$dependent.'</option>';
            // }
       

            // foreach($contains as $contain){
            //     $output .='<option value="'.$contain[$inc].'">'.$contain[$inc].'</option>';
            //     $inc++;
            // }
       
       
        
             
        return $contains;
        // return view('tasks.create_task')->with('names',$contains);
    	// return $contains;
    }


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
    var $gmap ;
    public function create()
    {
    //     $country = '';
    //     $path = storage_path() . "/countriesToCities.json";
    // $json = json_decode(file_get_contents($path), true); 
    // $contains = Arr::only($json, $country);

        return view('tasks.create_task');
    
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
            'logitude'=>'required',
            'latitude'=>'required',
            'city' => 'required'
        ]);
        $task = new Post;
        $task->task = $request->input('task');
        $task->location = $request->input('location');
        $task->logitude = $request->input('logitude');
        $task->latitude = $request->input('latitude');
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
