# HomeWork-Notice-Group-Maker
과제 공지 그룹을 만들고 관리할 수 있는 PHP 기반 웹사이트 시스템
---
2024년 약 1년 동안 `hw.minseo.net`에 배포 되었던 PHP 기반 과제 공지 그룹 생성 및 관리 웹사이트입니다.

사용자가 직접 과제 공지 그룹을 생성하고 관리(과제 등록 등) 할 수 있으며, 간편하게 url만으로 과제 그룹의 페이지를 공유할 수 있습니다.

`db_con.php`에 DB 정보를 입력해주셔야 합니다.

```
CREATE DATABASE IF NOT EXISTS `web_hw`;
USE `web_hw`;
```

```
CREATE TABLE IF NOT EXISTS `items` (
  `group_id` text COLLATE utf8mb4_general_ci,
  `item_id` text COLLATE utf8mb4_general_ci,
  `deadline` date DEFAULT NULL,
  `sub1` text COLLATE utf8mb4_general_ci,
  `sub2` text COLLATE utf8mb4_general_ci,
  `title` text COLLATE utf8mb4_general_ci,
  `deleted` tinyint unsigned NOT NULL DEFAULT '0',
  `creation_datetime` datetime DEFAULT NULL,
  `creation_ip` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

```
CREATE TABLE IF NOT EXISTS `teams` (
  `group_id` text COLLATE utf8mb4_general_ci,
  `group_name` text COLLATE utf8mb4_general_ci,
  `group_pw` text COLLATE utf8mb4_general_ci,
  `ban` tinyint unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

```
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enrolled` tinyint NOT NULL DEFAULT '1',
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creation_ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastlogin_datetime` datetime DEFAULT NULL,
  `lastlogin_ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```
