<?php

namespace rd\telegram_api\object;

/**
 * Этот объект представляет собой уникальный идентификатор сообщения. 
 */
class MessageId extends _object {



	/** */
	function add_setting() {
		$this->set('message_id',                'int');   # Уникальный идентификатор сообщения
	}



/**/
}
