<?php

namespace App\Repositories;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\{Database\Eloquent\Collection};

class PostRepository
{
    /**
     * @Var post
     */
    protected Post $post;

    /**
     * SectionRepository constructor
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAllPosts(): Collection
    {
        return Post::all()->sortByDesc('created_at');
    }

    public function show(Post $post): Post
    {
        return Post::all()->where('id', '=', $post->id)->first();
    }

//    public function getAllSections(): Collection
//    {
//        return Section::all()->sortBy('position');
//    }
//
//    public function getAllPosts(): Collection
//    {
//        return Post::all();
//    }
//
//    public function getLast()
//    {
//        return Section::all()->max('position');
//    }
//
    public function store($post): Post
    {
        $post->save();
        return $post->fresh();
    }
//
    public function update($request, Post $post): Post
    {
        $post->save();
        return $post->fresh();
    }
//
    public function delete(Post $post)
    {
        $post->delete();
    }
//
//    public function moveUp($section)
//    {
//        if($section->position==1) return redirect(route('home'));
//        else {
//            DB::table('sections')->where('position','=', $section->position-1)->update([
//                'position' => $section->position,
//            ]);
//            DB::table('sections')->where('id','=', $section->id)->update([
//                'position' => $section->position-1,
//            ]);
//        }
//    }
//
//    public function moveDown($section)
//    {
//        $count = DB::table('sections')->get()->count();
//        if($section->position==$count) return redirect(route('home'));
//        else {
//            DB::table('sections')->where('position','=', $section->position+1)->update([
//                'position' => $section->position,
//            ]);
//            DB::table('sections')->where('id','=', $section->id)->update([
//                'position' => $section->position+1,
//            ]);
//        }
//    }
//
//    public function changeStatus($section)
//    {
//        if($section->status=='public'){
//            DB::table('sections')->where('id',$section->id)->update([
//                'status' => 'private',
//            ]);
//        } else {
//            DB::table('sections')->where('id',$section->id)->update([
//                'status' => 'public',
//            ]);
//        }
//    }



}
