<?php

namespace resources\telegram_api;





/** Загружает все файлы из текущей папки и подпапок, кроме указанных в ограничении */
function autoload($dir, array $exclusion = []) {
	$exclusion = array_merge([".",".."], $exclusion);
	$result = [];
	$cdir = scandir($dir);
	foreach ($cdir as $key => $value) {
		if (!in_array($value, $exclusion)) {
			if (mb_substr($value, 0, 3) == '___') {
				continue;
			}
			if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
				$result[$value] = autoload($dir . DIRECTORY_SEPARATOR . $value);
			} elseif (substr($value, -4, 4) == '.php') {
				require_once($dir . DIRECTORY_SEPARATOR . $value);
				$result[] = $value;
			}
		}
	}
	return $result;
}


//print_r(autoload(__DIR__));
autoload(__DIR__);

/*require_once('_data.php');
require_once('from.php');
require_once('message.php');
require_once('update.php');/**/
