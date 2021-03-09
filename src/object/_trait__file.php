<?php

namespace rd\telegram_api\object;

/**
 *
 */
trait _trait__file {



	/** Получаем объект файла */
	public function get_file() {
		$result = $this->bot->setup()->getFile($this->file_id);
		return $result->result;
	}



/**/
}
