<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-04 06:39:44 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Website\Auth.php 27
ERROR - 2023-07-04 06:39:45 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Website\Auth.php 40
ERROR - 2023-07-04 06:39:45 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Website\Auth.php 42
ERROR - 2023-07-04 06:39:45 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Website\Auth.php 43
ERROR - 2023-07-04 08:04:53 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 24
ERROR - 2023-07-04 08:04:53 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 27
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 108
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 109
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 114
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 156
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 157
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 159
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 32
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 33
ERROR - 2023-07-04 08:04:54 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 35
ERROR - 2023-07-04 08:04:54 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT `categories`.*, `cat`.`icon` as `icon`
FROM `categories`
LEFT JOIN `icon` `cat` ON `cat`.`id`=`categories`.`icon_id`
ORDER BY `categories`.`id` ASC
ERROR - 2023-07-04 08:04:54 --> Query error: Table 'npc_parmacy.pending_activities' doesn't exist - Invalid query: SELECT `pending_activities`.*, `cat`.`name` as `category_name`, `cate`.`email` as `user_email`
FROM `pending_activities`
LEFT JOIN `categories` `cat` ON `cat`.`id`=`pending_activities`.`category_id`
LEFT JOIN `users` `cate` ON `cate`.`id`=`pending_activities`.`user_id`
ORDER BY `pending_activities`.`id` ASC
ERROR - 2023-07-04 08:04:54 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT *
FROM `icon`
ERROR - 2023-07-04 08:04:55 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 108
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 156
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 109
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 114
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 157
ERROR - 2023-07-04 08:19:51 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-04 08:19:51 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT *
FROM `icon`
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 159
ERROR - 2023-07-04 08:19:51 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT `categories`.*, `cat`.`icon` as `icon`
FROM `categories`
LEFT JOIN `icon` `cat` ON `cat`.`id`=`categories`.`icon_id`
ORDER BY `categories`.`id` ASC
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 32
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 33
ERROR - 2023-07-04 08:19:51 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 35
ERROR - 2023-07-04 08:19:51 --> Query error: Table 'npc_parmacy.pending_activities' doesn't exist - Invalid query: SELECT `pending_activities`.*, `cat`.`name` as `category_name`, `cate`.`email` as `user_email`
FROM `pending_activities`
LEFT JOIN `categories` `cat` ON `cat`.`id`=`pending_activities`.`category_id`
LEFT JOIN `users` `cate` ON `cate`.`id`=`pending_activities`.`user_id`
ORDER BY `pending_activities`.`id` ASC
ERROR - 2023-07-04 14:17:35 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 14:19:20 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 14:19:55 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 14:28:58 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 14:29:03 --> Severity: Warning --> Undefined array key "image" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 33
ERROR - 2023-07-04 14:29:48 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 14:29:54 --> Severity: Warning --> Undefined array key "image" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 33
ERROR - 2023-07-04 14:30:38 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 15:58:54 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 15:59:38 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 16:08:15 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-04 16:17:09 --> Severity: Warning --> Undefined array key "limit" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 157
ERROR - 2023-07-04 16:17:09 --> Severity: Warning --> Undefined array key "keyword" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 160
ERROR - 2023-07-04 16:19:28 --> Severity: Warning --> Undefined array key "keyword" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 160
ERROR - 2023-07-04 16:24:58 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:25:08 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:25:08 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:25:08 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:25:10 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:25:12 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:25:13 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:26:20 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:26:21 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:26:54 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:26:55 --> 404 Page Not Found: admin/Category/index
ERROR - 2023-07-04 16:36:43 --> Severity: error --> Exception: Call to undefined function baseurl() E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 177
ERROR - 2023-07-04 16:38:31 --> Severity: Warning --> Undefined property: stdClass::$icon E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 177
