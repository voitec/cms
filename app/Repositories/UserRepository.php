<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Array_;


class UserRepository
{
    /**
     * @Var user
     */
    protected User $user;

    /**
     * SectionRepository constructor
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(): Collection
    {
        return DB::table('users')->orderBy('role')->orderBy('name')->get();
    }

    public function store(User $user): User
    {
        $user->save();
        return $user->fresh();
    }

    public function changeStatus(User $user)
    {
        if($user->active == true){
            DB::table('users')->where('id',$user->id)->update([
                'active' => false,
            ]);
        } else {
            DB::table('users')->where('id',$user->id)->update([
                'active' => true,
            ]);
        }
    }



}
