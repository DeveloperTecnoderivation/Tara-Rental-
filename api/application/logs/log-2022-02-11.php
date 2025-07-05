<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-11 05:47:41 --> Query error: Column 'type' in where clause is ambiguous - Invalid query: SELECT `activities`.*, `cat`.`icon` as `new_activity_icon`
FROM `activities`
LEFT JOIN `icon` `cat` ON `cat`.`id`=`activities`.`activity_icon`
WHERE `category_id` = '1'
AND `is_deleted` = 0
AND `type` = 0
ORDER BY `activities`.`name` ASC
ERROR - 2022-02-11 05:47:52 --> Query error: Column 'type' in where clause is ambiguous - Invalid query: SELECT `activities`.*, `cat`.`icon` as `new_activity_icon`
FROM `activities`
LEFT JOIN `icon` `cat` ON `cat`.`id`=`activities`.`activity_icon`
WHERE `category_id` = '1'
AND `is_deleted` = 0
AND `type` = 0
ORDER BY `activities`.`name` ASC
ERROR - 2022-02-11 05:48:57 --> Query error: Column 'type' in where clause is ambiguous - Invalid query: SELECT `activities`.*, `cat`.`icon` as `new_activity_icon`
FROM `activities`
LEFT JOIN `icon` `cat` ON `cat`.`id`=`activities`.`activity_icon`
WHERE `category_id` = '1'
AND `is_deleted` = 0
AND `type` = 0
ORDER BY `activities`.`name` ASC
ERROR - 2022-02-11 06:03:33 --> Severity: Notice --> Undefined index: category_id D:\xampp\htdocs\logly-api\application\controllers\Admin\Activity.php 227
ERROR - 2022-02-11 06:04:04 --> Severity: Notice --> Undefined index: category_id D:\xampp\htdocs\logly-api\application\controllers\Admin\Activity.php 227
ERROR - 2022-02-11 06:47:55 --> Severity: Notice --> Undefined index: color D:\xampp\htdocs\logly-api\application\controllers\Admin\Activity.php 603
ERROR - 2022-02-11 07:09:51 --> Severity: Notice --> Array to string conversion D:\xampp\htdocs\logly-api\application\controllers\App\User.php 4857
ERROR - 2022-02-11 07:14:50 --> Query error: Unknown column 'activity_name' in 'where clause' - Invalid query: SELECT *
FROM `activities`
WHERE `activity_name` = 'stepcount'
ERROR - 2022-02-11 07:15:42 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\xampp\htdocs\logly-api\application\controllers\App\User.php 4858
ERROR - 2022-02-11 07:15:53 --> Severity: error --> Exception: syntax error, unexpected '[', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' D:\xampp\htdocs\logly-api\application\controllers\App\User.php 4858
ERROR - 2022-02-11 07:19:20 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `user_activities` (`user_id`, `activity_name`, `activity_id`, `step_count`, `streak`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES ('657', 'stepcount', '383', 300, 'true', '2022-01-26', '2022-01-26', '2022-02-11', '2022-02-11 07:19:20')
ERROR - 2022-02-11 07:24:57 --> Severity: Notice --> Undefined index: workouts D:\xampp\htdocs\logly-api\application\controllers\App\User.php 4890
