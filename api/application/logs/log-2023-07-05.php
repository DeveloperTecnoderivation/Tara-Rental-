<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-05 06:20:23 --> Severity: Warning --> Undefined array key "image" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 33
ERROR - 2023-07-05 06:20:23 --> Query error: Column 'image' cannot be null - Invalid query: INSERT INTO `tbl_category` (`name`, `description`, `image`, `status`, `created_at`) VALUES ('Detol', 'Detol', NULL, '1', '2023-07-05 06:20:23')
ERROR - 2023-07-05 06:20:36 --> Severity: Warning --> Undefined array key "image" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 33
ERROR - 2023-07-05 06:20:36 --> Query error: Column 'image' cannot be null - Invalid query: INSERT INTO `tbl_category` (`name`, `description`, `image`, `status`, `created_at`) VALUES ('Detol', 'Detol', NULL, '1', '2023-07-05 06:20:36')
ERROR - 2023-07-05 06:23:45 --> 404 Page Not Found: Assets/img
ERROR - 2023-07-05 06:24:19 --> 404 Page Not Found: Assets/img
ERROR - 2023-07-05 06:26:58 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-05 06:27:07 --> 404 Page Not Found: Assets/img
ERROR - 2023-07-05 06:33:20 --> 404 Page Not Found: admin/Category/2
ERROR - 2023-07-05 06:34:09 --> 404 Page Not Found: admin/Category/2
ERROR - 2023-07-05 06:36:13 --> 404 Page Not Found: admin/Category/2
ERROR - 2023-07-05 06:38:41 --> 404 Page Not Found: admin/Category/2
ERROR - 2023-07-05 06:41:06 --> 404 Page Not Found: admin/Category/2
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 169
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 170
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 172
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 108
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 109
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 114
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 32
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 33
ERROR - 2023-07-05 06:45:27 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 35
ERROR - 2023-07-05 06:45:27 --> Query error: Table 'npc_parmacy.pending_activities' doesn't exist - Invalid query: SELECT `pending_activities`.*, `cat`.`name` as `category_name`, `cate`.`email` as `user_email`
FROM `pending_activities`
LEFT JOIN `categories` `cat` ON `cat`.`id`=`pending_activities`.`category_id`
LEFT JOIN `users` `cate` ON `cate`.`id`=`pending_activities`.`user_id`
ORDER BY `pending_activities`.`id` ASC
ERROR - 2023-07-05 06:45:27 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT *
FROM `icon`
ERROR - 2023-07-05 06:45:27 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 169
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 170
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 172
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 108
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 109
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 114
ERROR - 2023-07-05 06:45:31 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT *
FROM `icon`
ERROR - 2023-07-05 06:45:31 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 32
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 33
ERROR - 2023-07-05 06:45:31 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 35
ERROR - 2023-07-05 06:45:31 --> Query error: Table 'npc_parmacy.pending_activities' doesn't exist - Invalid query: SELECT `pending_activities`.*, `cat`.`name` as `category_name`, `cate`.`email` as `user_email`
FROM `pending_activities`
LEFT JOIN `categories` `cat` ON `cat`.`id`=`pending_activities`.`category_id`
LEFT JOIN `users` `cate` ON `cate`.`id`=`pending_activities`.`user_id`
ORDER BY `pending_activities`.`id` ASC
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 108
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 109
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 114
ERROR - 2023-07-05 06:45:36 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT *
FROM `icon`
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 169
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 170
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 172
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 32
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 33
ERROR - 2023-07-05 06:45:36 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 35
ERROR - 2023-07-05 06:45:36 --> Query error: Table 'npc_parmacy.pending_activities' doesn't exist - Invalid query: SELECT `pending_activities`.*, `cat`.`name` as `category_name`, `cate`.`email` as `user_email`
FROM `pending_activities`
LEFT JOIN `categories` `cat` ON `cat`.`id`=`pending_activities`.`category_id`
LEFT JOIN `users` `cate` ON `cate`.`id`=`pending_activities`.`user_id`
ORDER BY `pending_activities`.`id` ASC
ERROR - 2023-07-05 06:45:36 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-05 06:53:25 --> 404 Page Not Found: admin/Category/addrecord1111
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 171
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 32
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 108
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 109
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 33
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Icon.php 114
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Submission.php 35
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 172
ERROR - 2023-07-05 07:25:07 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 174
ERROR - 2023-07-05 07:25:07 --> Query error: Table 'npc_parmacy.pending_activities' doesn't exist - Invalid query: SELECT `pending_activities`.*, `cat`.`name` as `category_name`, `cate`.`email` as `user_email`
FROM `pending_activities`
LEFT JOIN `categories` `cat` ON `cat`.`id`=`pending_activities`.`category_id`
LEFT JOIN `users` `cate` ON `cate`.`id`=`pending_activities`.`user_id`
ORDER BY `pending_activities`.`id` ASC
ERROR - 2023-07-05 07:25:07 --> Query error: Table 'npc_parmacy.icon' doesn't exist - Invalid query: SELECT *
FROM `icon`
ERROR - 2023-07-05 07:25:07 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-05 07:26:13 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-05 09:20:03 --> 404 Page Not Found: admin/Mecician/all_category_list
ERROR - 2023-07-05 09:45:00 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 24
ERROR - 2023-07-05 09:45:00 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 27
ERROR - 2023-07-05 09:45:00 --> 404 Page Not Found: admin/Icon/getallrecord
ERROR - 2023-07-05 09:45:00 --> 404 Page Not Found: admin/Submission/getallrecord
ERROR - 2023-07-05 09:45:00 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 171
ERROR - 2023-07-05 09:45:00 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 172
ERROR - 2023-07-05 09:45:00 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 174
ERROR - 2023-07-05 09:45:01 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-05 09:45:07 --> 404 Page Not Found: admin/Mecician/all_category_list
ERROR - 2023-07-05 09:45:57 --> 404 Page Not Found: admin/Medician/all_category_list
ERROR - 2023-07-05 09:46:42 --> 404 Page Not Found: admin/Medician/all_category_list
ERROR - 2023-07-05 09:46:56 --> 404 Page Not Found: admin/Medician/all_category_list
ERROR - 2023-07-05 09:47:30 --> 404 Page Not Found: admin/Medician/all_category_list
ERROR - 2023-07-05 09:47:37 --> 404 Page Not Found: admin/Medician/all_category_list
ERROR - 2023-07-05 09:47:48 --> 404 Page Not Found: admin/Medician/all_category_list
ERROR - 2023-07-05 09:48:10 --> 404 Page Not Found: admin/Medician/index
ERROR - 2023-07-05 09:48:14 --> 404 Page Not Found: admin/Medician/index
ERROR - 2023-07-05 11:12:35 --> Severity: Warning --> Undefined array key "uploaded" E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Upload.php 29
ERROR - 2023-07-05 11:12:40 --> Query error: Table 'npc_parmacy.tbl_medicine' doesn't exist - Invalid query: INSERT INTO `tbl_medicine` (`name`, `description`, `image`, `status`, `created_at`) VALUES ('Jalra-m', '', 'assets/images/1688548355.png', '1', '2023-07-05 11:12:40')
ERROR - 2023-07-05 11:25:05 --> Query error: Unknown column 'description' in 'field list' - Invalid query: INSERT INTO `tbl_medicine` (`name`, `description`, `image`, `status`, `created_at`) VALUES ('Jalra-m', '', 'assets/images/1688548355.png', '1', '2023-07-05 11:25:05')
ERROR - 2023-07-05 11:27:43 --> Severity: Warning --> Undefined property: stdClass::$description E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Medicine.php 135
ERROR - 2023-07-05 11:30:27 --> Query error: Unknown table 'npc_parmacy.categories' - Invalid query: SELECT `categories`.*, `cat`.`name` as `category_name`
FROM `tbl_medicine`
LEFT JOIN `tbl_category` `cat` ON `cat`.`id`=`tbl_medicine`.`category_id`
ORDER BY `tbl_medicine`.`id` ASC
ERROR - 2023-07-05 11:30:40 --> Query error: Unknown table 'npc_parmacy.tbl_category' - Invalid query: SELECT `tbl_category`.*, `cat`.`name` as `category_name`
FROM `tbl_medicine`
LEFT JOIN `tbl_category` `cat` ON `cat`.`id`=`tbl_medicine`.`category_id`
ORDER BY `tbl_medicine`.`id` ASC
ERROR - 2023-07-05 11:32:01 --> Query error: Unknown table 'npc_parmacy.tbl_category' - Invalid query: SELECT `tbl_category`.*, `cat`.`name` as `category_name`
FROM `tbl_medicine`
LEFT JOIN `tbl_medicine` `cat` ON `cat`.`category_id`=`tbl_category`.`id`
ORDER BY `tbl_medicine`.`id` ASC
ERROR - 2023-07-05 15:04:30 --> 404 Page Not Found: admin/Submission/getallrecord
ERROR - 2023-07-05 15:04:30 --> 404 Page Not Found: admin/Icon/getallrecord
ERROR - 2023-07-05 15:04:30 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 171
ERROR - 2023-07-05 15:04:30 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 172
ERROR - 2023-07-05 15:04:30 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 174
ERROR - 2023-07-05 15:04:30 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
ERROR - 2023-07-05 15:16:03 --> Query error: Table 'npc_parmacy.tbl_admin' doesn't exist - Invalid query: SELECT *
FROM `tbl_admin`
WHERE `token` IS NULL
ERROR - 2023-07-05 15:16:32 --> Query error: Table 'npc_parmacy.tbl_admin' doesn't exist - Invalid query: SELECT *
FROM `tbl_admin`
WHERE `token` IS NULL
ERROR - 2023-07-05 15:17:07 --> Query error: Table 'npc_parmacy.tbl_admin' doesn't exist - Invalid query: SELECT *
FROM `tbl_admin`
WHERE `token` IS NULL
ERROR - 2023-07-05 15:19:04 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 24
ERROR - 2023-07-05 15:19:04 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 27
ERROR - 2023-07-05 15:19:56 --> Query error: Table 'npc_parmacy.tbl_admin' doesn't exist - Invalid query: SELECT *
FROM `tbl_admin`
WHERE `token` IS NULL
ERROR - 2023-07-05 15:20:07 --> Query error: Table 'npc_parmacy.tbl_admin' doesn't exist - Invalid query: SELECT *
FROM `tbl_admin`
WHERE `token` IS NULL
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$first_name E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 76
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$last_name E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 77
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$username E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 78
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$mobile E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 80
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$protocol E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 81
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$smtp_host E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 82
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$smtp_port E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 83
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$smtp_user E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 84
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Undefined property: stdClass::$smtp_pass E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 85
ERROR - 2023-07-05 15:20:58 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at E:\xampp\htdocs\pharmacy-api\system\core\Exceptions.php:271) E:\xampp\htdocs\pharmacy-api\system\core\Common.php 570
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$first_name E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 76
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$last_name E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 77
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$username E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 78
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$mobile E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 80
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$protocol E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 81
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$smtp_host E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 82
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$smtp_port E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 83
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$smtp_user E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 84
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Undefined property: stdClass::$smtp_pass E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 85
ERROR - 2023-07-05 15:23:06 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at E:\xampp\htdocs\pharmacy-api\system\core\Exceptions.php:271) E:\xampp\htdocs\pharmacy-api\system\core\Common.php 570
ERROR - 2023-07-05 15:29:12 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 110
ERROR - 2023-07-05 15:29:20 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 110
ERROR - 2023-07-05 15:29:28 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 110
ERROR - 2023-07-05 15:31:10 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 203
ERROR - 2023-07-05 15:31:10 --> Query error: Unknown column 'password' in 'field list' - Invalid query: UPDATE `admin_users` SET `password` = '12345678'
WHERE `id` = '1'
ERROR - 2023-07-05 15:31:38 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 203
ERROR - 2023-07-05 15:32:00 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 24
ERROR - 2023-07-05 15:32:00 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 27
ERROR - 2023-07-05 15:32:05 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 24
ERROR - 2023-07-05 15:32:05 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Login.php 27
ERROR - 2023-07-05 15:32:06 --> 404 Page Not Found: admin/Icon/getallrecord
ERROR - 2023-07-05 15:32:06 --> 404 Page Not Found: admin/Submission/getallrecord
ERROR - 2023-07-05 15:32:06 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 171
ERROR - 2023-07-05 15:32:06 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 172
ERROR - 2023-07-05 15:32:06 --> Severity: Warning --> Trying to access array offset on value of type null E:\xampp\htdocs\pharmacy-api\application\controllers\Admin\Category.php 174
ERROR - 2023-07-05 15:32:06 --> Query error: Table 'npc_parmacy.user_activities' doesn't exist - Invalid query: SELECT *
FROM `user_activities`
WHERE `updated_at` >= '2023-07-01'
AND `updated_at` <= '2023-07-31'
GROUP BY `user_id`
