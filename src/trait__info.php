<?php

namespace rd\telegram_api;

/**
 *
 */
trait trait__info {



	/** Выводит информацию */
	protected function _info($data, $title = null) {
//		print_info($data, $title);
		echo '<pre style="border: 1px solid #777; background: #fdb; padding: 10px;">';
		if ($title) {
			echo $title . '<br><br>';
		}
		\print_r($data);
		echo '</pre>';/**/
	}



/**/
}
