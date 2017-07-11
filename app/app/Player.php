<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'surname',
        'club',
        'email',
        'contact_number'
    ];

    public function winner()
    {
        return $this->hasMany('App\Game', 'winner_id');
    }

    public function looser()
    {
        return $this->hasMany('App\Game', 'looser_id');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function getWonAttribute()
    {
        return Game::where('winner_id', $this->id)->count();
    }

    public function getLostAttribute()
    {
        return Game::where('looser_id', $this->id)->count();
    }

    public function getPlayedAttribute()
    {
        return $this->won + $this->lost;
    }

    public function getAvarageScoreAttribute()
    {
        return number_format($this->scores()->avg('score'), 2);
    }

    public function getBestGameAttribute()
    {
        $scores = $this->scores()->orderBy('score', 'desc');

        if ($scores->exists()) {
            return Game::find($scores->first()->game_id);
        }

        return null;
    }

    public function getHasGamesAttribute()
    {
        return $this->hasMany('App\Score')->exists();
    }

    public function getBestScoreAttribute()
    {
        return $this->scores()->max('score');
    }

    /**
     * Get player full name
     * @return string
     */
    public function getNameAttribute()
    {
        $name = $this->first_name . ' ' . $this->surname;

        if ($this->club) {
            $name .= ' (' . $this->club . ')';
        }

        return $name;
    }
}
