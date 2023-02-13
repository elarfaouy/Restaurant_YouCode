<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Http\Requests\StorePlatRequest;
use App\Http\Requests\UpdatePlatRequest;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlatRequest $request)
    {
        $array = [
            'title' => $request['title'],
            'description' => $request['description'],
        ];

        if($request->image){
            $random = rand(0, 100000);
            $imageName = "Image" . date('ymd') . $random .'.'.$request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $array['image'] = $imageName;
        }

        Plat::create($array);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function show(Plat $plat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function edit(Plat $plat)
    {
        return view('plat.edit', compact('plat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlatRequest  $request
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlatRequest $request, Plat $plat)
    {
        $array = [
            'title' => $request['title'],
            'description' => $request['description'],
        ];

        if($request->image){
            $random = rand(0, 100000);
            $imageName = "Image" . date('ymd') . $random .'.'.$request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $array['image'] = $imageName;
        }

        $plat->update($array);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plat $plat)
    {
        $plat->delete();

        return redirect()->route('dashboard');
    }
}
