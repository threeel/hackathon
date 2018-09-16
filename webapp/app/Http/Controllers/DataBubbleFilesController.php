<?php

namespace App\Http\Controllers;

use App\DataBubble;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class DataBubbleFilesController extends Controller {

    public function post() {

        /** @var User $user */
        $user = \request()->user();

        $file = \request()->file('workspace_file');
        $filename = $file->getClientOriginalName();
        $file->storeAs($user->getRelativeWorkSpaceFolder(), $filename, 'workspaces');

        if (\request()->isJson()) {

            return \response([], 200);
        }
        $bubble = $user->bubbles()->first();

        return view('home')->with('dataBubble', $bubble);

    }
}
