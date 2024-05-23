<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    public function register($data)
    {
        return DB::table($this->table)->insert($data);
    }
    public function login($data)
    {
        return Auth::attempt($data);
    }
    public function getUser($data)
    {
        return  DB::table($this->table)->where($data)->select();
    }
    public function countUser()
    {
        return  DB::table($this->table)->count();
    }
    public function logout()
    {
        return Auth::logout();
    }
    public function getAllUser($filters = [], $keywords = null, $sortArr = [], $perPage = 3)
    {
        $users = DB::table($this->table)
            ->select('users.id', 'users.name', 'users.level');
        $orderBy = 'users.name';
        if (!empty($sortBy) && is_array($sortArr)) {
            if (!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])) {
                $orderBy = trim($sortArr['sortBy']);
            }
        }
        $users = $users->orderBy($orderBy);
        if (!empty($filters)) {
            $users = $users->where($filters);
        }
        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                $query->orWhere('user.name', 'like', '%' . $keywords . '%');
            });
        }
        if (!empty($perPage)) {
            $users = $users->paginate($perPage);
        } else {
            $users = $users->get();
        }
        return $users;
    }
    public function deleteUser($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
