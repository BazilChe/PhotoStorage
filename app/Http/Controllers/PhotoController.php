<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use function Sodium\compare;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tagName = $request->input('tag', 'none');

        if ($tagName == 'none') {
            $photos = Photo::query()->get();
        } else {
            $tagName = '#'.$tagName;
            $tag = Tag::query()->where('name', $tagName)->first();

            if ($tag != null) {
                $photos = $tag->photos;
            } else {
                return response('not found :(', 404);
            }
        }

        return response(view('photos.index', compact('photos')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('photos.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $path = $request->file('photo')->store('public/photos');

        $path = str_replace('public/', '', $path);

        $photo = $user->photos()->create([
            'name' => $request->name,
            'photo' => $path
        ]);

        $tags = array();
        //'(#[a-z0-9]+)'
        $every_tag_pattern = "/(#\w+)/";
        preg_match_all($every_tag_pattern, $request->tags, $tags);

        foreach ($tags[1] as $tag) {
            if (!Tag::query()->where('name', $tag)->exists()) {
                Tag::query()->insert(['name' => $tag]);
            }
            $newTag = Tag::query()->where('name', $tag)->first();
            $photo->tags()->attach($newTag);
        }

        return response(redirect('/users/'.$user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
