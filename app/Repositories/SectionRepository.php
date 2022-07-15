<?php

namespace App\Repositories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SectionRepository
{
    /**
     * @Var section
     */
    protected Section $section;

    /**
     * SectionRepository constructor
     * @param Section $section
     */
    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function getAllSections(): Collection
    {
        return Section::all()->sortBy('position');
    }

    public function getLast()
    {
        return Section::all()->max('position');
    }

    public function store($data): Section
    {
        $section = new Section($data->validated());
        $section->save();
        return $section->fresh();
    }

    public function update($data, $section): Section
    {
        $section->fill($data->validated());
        $section->save();
        return $section->fresh();
    }

    public function delete($section)
    {
        $section->delete();
        $sections = DB::table('sections')->orderBy('position')->get();
        $i=1;
        foreach ($sections as $section){
            DB::table('sections')->where('id', $section->id)->update(['position' => $i++]);
        }
    }

    public function moveUp($section)
    {
        if($section->position==1) return redirect(route('home'));
        else {
            DB::table('sections')->where('position','=', $section->position-1)->update([
                'position' => $section->position,
            ]);
            DB::table('sections')->where('id','=', $section->id)->update([
                'position' => $section->position-1,
            ]);
        }
    }

    public function moveDown($section)
    {
        $count = DB::table('sections')->get()->count();
        if($section->position==$count) return redirect(route('home'));
        else {
            DB::table('sections')->where('position','=', $section->position+1)->update([
                'position' => $section->position,
            ]);
            DB::table('sections')->where('id','=', $section->id)->update([
                'position' => $section->position+1,
            ]);
        }
    }

    public function changeStatus($section)
    {
        if($section->status=='public'){
            DB::table('sections')->where('id',$section->id)->update([
                'status' => 'private',
            ]);
        } else {
            DB::table('sections')->where('id',$section->id)->update([
                'status' => 'public',
            ]);
        }
    }



}
