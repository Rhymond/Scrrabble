# Scrabble club application

## Installation

1. Install dependencies

```bash
composer install
```

2. Copy `.env.example` to `.env` and update environment variables

3. Run migrations

```bash
php artisan migrate
```

4. Run docker environment

```bash
docker-compose up
```

Launch application from a browser `http://localhost`

**1. Database schema definition (create table statements) for your solution**

#### Players

```SQL
CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB
```

#### Games

```SQL
CREATE TABLE `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `winner_id` int(10) unsigned NOT NULL,
  `looser_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `games_winner_id_index` (`winner_id`),
  KEY `games_looser_id_index` (`looser_id`),
  CONSTRAINT `games_looser_id_foreign` FOREIGN KEY (`looser_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  CONSTRAINT `games_winner_id_foreign` FOREIGN KEY (`winner_id`) REFERENCES `players` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB 
```

#### Score

```SQL
CREATE TABLE `scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL,
  `player_id` int(10) unsigned NOT NULL,
  `score` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scores_player_id_index` (`player_id`),
  KEY `scores_game_id_index` (`game_id`),
  CONSTRAINT `scores_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  CONSTRAINT `scores_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB 
```

**2. A member's profile screen showing their**

* number of wins,
* number of losses,
* their average score,
* their highest score, when and where it was scored, and against whom

![2](/resources/2.png?raw=true)

**3. Interfaces (preferably browser based) to create and edit members' details, such as name,
contact number etc. (not match results (unless you want to!)).
and perhaps, if time**

![1](/resources/1.png?raw=true)
![4](/resources/4.png?raw=true)

**4. A leader board screen to list the members with the top 10 average scores, for those members
who have played at least 10 matches.**

![3](/resources/3.png?raw=true)

## todo
- [ ] Unit Tests
- [ ] Acceptance Tests
- [ ] Clean not used Laravel code
- [ ] Comments
- [ ] CSRF integration
