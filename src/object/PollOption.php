<?php

namespace rd\telegram_api\object;

/**
 * Этот объект содержит информацию об одном варианте ответа в опросе.
 */
class PollOption extends _object {



	/** */
	function add_setting() {
		$this->set('text',          'str');   # Текст варианта, 1-100 символов
		$this->set('voter_count',   'int');   # Количество пользователей, проголосовавших за эту опцию
	}



/**/
}
