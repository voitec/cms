<?php

namespace App\Services;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserService
{
    /**
     * @Var $userRepository
     */
    protected UserRepository $userRepository;

    /**
     * UserRepository constructor
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(): Collection
    {
        $users = $this->userRepository->index();

        return $users;
    }

    public function store($request)
    {
        try {
            $user = new User($request->validated());
            $user->password = Hash::make(request('password'));
            $this->userRepository->store($user);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.user.create.success',['name' => $request->name]));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update($request->validated());
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.user.update.success',['name' => $user->name]));
    }

    public function updatePassword(UpdateUserPasswordRequest $request)
    {
        try {
            $user = Auth::user();
            $user->update($request->validated());

        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.user.password_reset.success',['name' => $user->name]));
    }

    public function changeStatus(User $user)
    {
        try {
            $this->userRepository->changeStatus($user);
        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return back();
        }
        session()->flash('success', __('messages.changeStatus.success',['name' => $user->name]));
    }

}
