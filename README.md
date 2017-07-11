# Scrrabble club application

1. Database schema definition (create table statements) for your solution

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

2. A member's profile screen showing their

* number of wins,
* number of losses,
* their average score,
* their highest score, when and where it was scored, and against whom

![1](/resources/1.png?raw=true "Optional Title")