<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bubbles() {

        return $this->hasMany(DataBubble::class);
    }

    public function createWorkspaceFolder() {

        if (!file_exists($this->getWorkSpaceFolder())) {
            mkdir($this->getWorkSpaceFolder(), 0777, true);
        }

    }

    public function getWorkSpaceFolder() {
        return config('data_fizz.users_base_folder')."/". $this->getKey() . '/workspace';

    }

}
