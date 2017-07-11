<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Game;
use App\Player;
use App\Score;
use Illuminate\Http\Request;
use Session;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $game = Game::paginate($perPage);
        } else {
            $game = Game::paginate($perPage);
        }

        return view('game.index', compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('game.create', [
            'players' => Player::all()->pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GameRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(GameRequest $request)
    {
        $game = Game::create([
            'winner_id' => $request->input('winner_id'),
            'looser_id' => $request->input('looser_id'),
        ]);

        Score::create([
            'game_id' => $game->id,
            'player_id' => $request->input('winner_id'),
            'score' => $request->input('winner_score')
        ]);

        Score::create([
            'game_id' => $game->id,
            'player_id' => $request->input('looser_id'),
            'score' => $request->input('looser_score')
        ]);

        Session::flash('flash_message', 'Game added!');

        return redirect('game');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);

        return view('game.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $game = Game::findOrFail($id);

        return view('game.edit', [
            'game' => $game,
            'players' => Player::all()->pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param GameRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, GameRequest $request)
    {
        $game = Game::findOrFail($id);
        $game->update([
            'winner_id' => $request->input('winner_id'),
            'looser_id' => $request->input('looser_id'),
        ]);

        $game->winnerScore()->update([
            'score' => $request->input('winner_score')
        ]);

        $game->looserScore()->update([
            'score' => $request->input('looser_score')
        ]);

        Session::flash('flash_message', 'Game updated!');

        return redirect('game');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Game::destroy($id);

        Session::flash('flash_message', 'Game deleted!');

        return redirect('game');
    }
}
