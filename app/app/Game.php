<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Game extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'winner_id',
        'looser_id',
    ];

    /**
     * Player relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winner()
    {
        return $this->belongsTo('App\Player');
    }

    /**
     * Player Opponent relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function looser()
    {
        return $this->belongsTo('App\Player');
    }

    public function scores()
    {
        return $this->hasMany('App\Score');
    }

    public function winnerScore()
    {
        return $this->scores()->where('player_id', '=', $this->winner->id)->first();
    }

    public function looserScore()
    {
        return $this->scores()->where('player_id', '=', $this->looser->id)->first();
    }

    public function getWinnerScoreAttribute()
    {
        return $this->winnerScore()->score;
    }

    public function getLooserScoreAttribute()
    {
        return $this->looserScore()->score;
    }
}
