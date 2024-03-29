<?php

namespace App\Services;

use App\Repositories\SectionRepository;
use Illuminate\Database\Eloquent\Collection;

class SectionService
{
    /**
     * @Var $sectionRepository
     */
    protected SectionRepository $sectionRepository;

    /**
     * SectionRepository constructor
     * @param SectionRepository $sectionRepository
     */
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function indexSections(): Collection
    {
        return $this->sectionRepository->getAllSections();
    }

    public function last()
    {
        return $this->sectionRepository->getLast();
    }

    public function store($data)
    {
        try {
            $this->sectionRepository->store($data);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.section.store.success',['name' => $data->name]));
    }

    public function update($data, $section)
    {
        try {
            $this->sectionRepository->update($data, $section);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.section.update.success',['name' => $data->name]));
    }

    public function destroy($section)
    {
        try {
            $this->sectionRepository->delete($section);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.section.destroy.success',['name' => $section->name]));
    }

    public function up($section)
    {
        try {
            $this->sectionRepository->moveUp($section);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.section.move.success',['name' => $section->name]));
    }

    public function down($section)
    {
        try {
            $this->sectionRepository->moveDown($section);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.section.move.success',['name' => $section->name]));
    }

    public function changeStatus($section)
    {
        try {
            $this->sectionRepository->changeStatus($section);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.changeStatus.success',['name' => $section->name]));
    }

}
