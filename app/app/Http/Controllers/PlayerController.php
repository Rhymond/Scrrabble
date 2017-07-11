<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Player;
use Illuminate\Http\Request;
use Session;
use DB;

class PlayerController extends Controller
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
            $player = Player::paginate($perPage);
        } else {
            $player = Player::paginate($perPage);
        }

        return view('player.index', compact('player'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlayerRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PlayerRequest $request)
    {

        $requestData = $request->all();

        Player::create($requestData);

        Session::flash('flash_message', 'Player added!');

        return redirect('player');
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
        $player = Player::findOrFail($id);

        return view('player.show', compact('player'));
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
        $player = Player::findOrFail($id);

        return view('player.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param PlayerRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PlayerRequest $request)
    {

        $requestData = $request->all();

        $player = Player::findOrFail($id);
        $player->update($requestData);

        Session::flash('flash_message', 'Player updated!');

        return redirect('player');
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
        Player::destroy($id);

        Session::flash('flash_message', 'Player deleted!');

        return redirect('player');
    }

    /**
     * Show leaderboard
     */
    public function leaderboard()
    {
        $leaderboard = DB::table('players')
            ->select(DB::raw('players.id, COUNT(scores.id) as played'))
            ->leftJoin('scores', 'players.id', '=', 'scores.player_id')
            ->groupBy('players.id')
            ->having('played', '>=', 10)
            ->orderByRaw(DB::raw('AVG(scores.score) DESC'))
            ->take(10)
            ->get();

        $players = [];
        foreach ($leaderboard as $player) {
            $players[] = Player::find($player->id);
        }

        return view('player.leaderboard', compact('players'));
    }
}
