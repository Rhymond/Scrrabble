<div class="col-3">
    <ul class="nav nav-pills nav-fill flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('leaderboard*') ? 'active' : '' }}" href="{{ url('/leaderboard') }}">
                Leaderboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('player*') ? 'active' : '' }}" href="{{ url('/player') }}">
                Players
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('game*') ? 'active' : '' }}" href="{{ url('/game') }}">
                Games
            </a>
        </li>
    </ul>
</div>
