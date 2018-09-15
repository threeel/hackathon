<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'name'       => 'Machine Learning',
            'slug'       => 'machine-learning',
            'command'    => 'docker run --restart unless-stopped -p ##JUPYTER_PORT##:8888 --rm -p ##NTERACT_PORT##:8889 -v ##WORKSPACE##:/opt/notebooks -d  --name ##NAME## threeel/jupyter',
            'entrypoint' => '/opt/conda/bin/jupyter nteract --notebook-dir=/opt/notebooks --ip=\'*\' --port=8889 --no-browser --allow-root',
        ]);

        BubbleType::query()->create([
            'name'       => 'Natural Language Processing',
            'slug'       => 'natural-language-processing',
            'command'    => 'docker run --restart unless-stopped -p ##JUPYTER_PORT##:8888 --rm -p ##NTERACT_PORT##:8889 -v ##WORKSPACE##:/opt/notebooks -d  --name ##NAME## threeel/jupyter',
            'entrypoint' => '',
        ]);

        BubbleType::query()->create([
            'name'       => 'Data Mining',
            'slug'       => 'data-mining',
            'command'    => 'docker run --restart unless-stopped -p ##JUPYTER_PORT##:8888 --rm -p ##NTERACT_PORT##:8889 -v ##WORKSPACE##:/opt/notebooks -d  --name ##NAME## threeel/jupyter',
            'entrypoint' => '',
    }

}
