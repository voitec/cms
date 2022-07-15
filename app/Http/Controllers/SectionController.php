<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\SectionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SectionController extends Controller
{
    protected SectionService $sectionService;
    protected PostService $postService;

    public function __construct(SectionService $sectionService, PostService $postService)
    {
        $this->sectionService = $sectionService;
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param SectionService $sectionService
     * @param PostService $postService
     * @return View
     */

    public function index(SectionService $sectionService, PostService $postService, CategoryService $categoryService): View
    {
        return view('home',[
            'sections' => $sectionService->indexSections(),
            'posts' => $postService->indexPostsAll(),
        ]);
    }

//    public function index(): View
//    {
//        return view('home',[
//            'sections' => Section::all()->sortBy('position')
//        ]);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */

    public function create(): View
    {
        return view('sections.create',['last' => $this->sectionService->last()]);
    }

//    public function create(): View
//    {
//        return view('sections.create',[
//            'last' => Section::all()->max('position')
//        ]);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SectionService $sectionService
     * @param StoreSectionRequest $request
     * @return RedirectResponse
     */
//    public function store(StoreSectionRequest $request): RedirectResponse
//    {
//        $section = new Section($request->validated());
//        $section->save();
//        return redirect(route('home'));
//    }

    public function store(SectionService $sectionService ,StoreSectionRequest $request): RedirectResponse
    {
        $sectionService->store($request);
        return redirect(route('home'));
    }

    /**
     * Display the specified resource
     *
     * @param Section $section
     * @return Response
     */
//    public function show(Section $section)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Section $section
     * @return View
     */
    public function edit(Section $section): View
    {
        return view('sections.edit', [
            'section' => $section
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionService $sectionService
     * @param UpdateSectionRequest $request
     * @param Section $section
     * @return RedirectResponse
     */

    public function update(SectionService $sectionService ,UpdateSectionRequest $request, Section $section): RedirectResponse
    {
        $sectionService->update($request, $section);
        return redirect(route('home'));
    }
//    public function update(UpdateSectionRequest $request, Section $section): RedirectResponse
//    {
//        $section->fill($request->validated());
//        $section->save();
//        return redirect(route('home'));
//
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Section $section
     * @return RedirectResponse
     */

    public function destroy(SectionService $sectionService, Section $section): RedirectResponse
    {
        $sectionService->destroy($section);
        return redirect(route('home'));
    }

//    public function destroy(Section $section): RedirectResponse
//    {
//        $section->delete();
//        $sections = DB::table('sections')->orderBy('position')->get();
//        $i=1;
//        foreach ($sections as $section){
//            DB::table('sections')->where('id', $section->id)->update([
//                'position' => $i++,
//            ]);
//        }
//        return redirect(route('home'));
//    }

    /**
     * Confirm the specified resource before delete from storage.
     *
     * @param Section $section
     * @return View
     */
    public function confirm(Section $section): View
    {
        return view('sections.confirm',[
            'section' => $section,
        ]);
    }

    /**
     * Move up the specified resource in storage.
     *
     * @param Section $section
     * @return RedirectResponse
     */

    public function up(SectionService $sectionService ,Section $section): RedirectResponse
    {
        $this->sectionService->up($section);
        return redirect(route('home'));
    }

//    public function up(Section $section): RedirectResponse
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
//
//        return redirect(route('home'));
//    }

    /**
     * Move down the specified resource in storage.
     *
     * @param Section $section
     * @return RedirectResponse
     */

    public function down(SectionService $sectionService ,Section $section): RedirectResponse
    {
        $this->sectionService->down($section);
        return redirect(route('home'));
    }

//    public function down(Section $section): RedirectResponse
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
//
//        return redirect(route('home'));
//    }

    /**
     * Change status of the specified resource in storage.
     *
     * @param Section $section
     * @return RedirectResponse
     */

    public function changeStatus(SectionService $sectionService, Section $section): RedirectResponse
    {
        $this->sectionService->changeStatus($section);
        return redirect(route('home'));
    }

//    public function changeStatus(Section $section): RedirectResponse
//    {
//
//        if($section->status=='public'){
//            DB::table('sections')->where('id',$section->id)->update([
//                'status' => 'private',
//            ]);
//        } else {
//            DB::table('sections')->where('id',$section->id)->update([
//                'status' => 'public',
//            ]);
//        }
//
//        return redirect(route('home'));
//    }
}
