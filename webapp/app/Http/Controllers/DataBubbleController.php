<?php

namespace App\Http\Controllers;

use App\BubbleMaker;
use App\BubbleType;
use App\DataBubble;
use Illuminate\Http\Request;

class DataBubbleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $user = \request()->user();

        return $user->bubbles;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return DataBubble
     */
    public function store(Request $request) {

        //
        $user = $request->user();

        $data = $this->validate($request, [
            'bubble_type' => 'exists:bubble_types,slug'
        ]);

        /** @var BubbleType $bubbleType */
        $bubbleType = BubbleType::query()->where('slug' , $data['bubble_type'])->firstOrFail();

        $bubble = new BubbleMaker($bubbleType, $user);

        $dataBubble =  $bubble->make();

        /** @var DataBubble $dataBubble */
        return view('home')->with('dataBubble',$dataBubble);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataBubble $dataBubble
     * @return \Illuminate\Http\Response
     */
    public function show(DataBubble $dataBubble) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBubble $dataBubble
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBubble $dataBubble) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\DataBubble $dataBubble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBubble $dataBubble) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataBubble $dataBubble
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataBubble $dataBubble) {
        //
    }
}
