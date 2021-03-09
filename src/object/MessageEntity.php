<?php

namespace rd\telegram_api\object;

/**
 * Этот объект представляет собой одну особую сущность в текстовом сообщении. Например, хэштеги, имена пользователей, URL-адреса и т.д.
 */
class MessageEntity extends _object {



	/** */
	function add_setting() {
		$this->set('type',       'str');   # Тип объекта. Может быть «упоминание» (@username), «hashtag» (#hashtag), «cashtag» ($ USD), «bot_command» (/ start @ jobs_bot), «url» (https://telegram.org), «электронная почта» (do-not-reply@telegram.org), «phone_number» (+1-212-555-0123), “bold” (жирный текст), «italic» (курсивный текст), «underline» (подчеркнутый текст), «strikethrough» (зачеркнутый текст), «code» (моноширинная строка), «pre» (моноширинный блок), «text_link» (для интерактивных текстовых URL-адресов), «text_mention» (для пользователей без имени пользователя)
		$this->set('offset',     'int');   # Cмещение в единицах кода UTF-16 до начала объекта
		$this->set('length',     'int');   # Длина объекта в единицах кода UTF-16
		$this->set('url',        'str');   # Опционально. Только для «text_link»: URL, который будет открыт после того, как пользователь нажмет на текст.
		$this->set_obj('user',   'User');   # Опционально. олько для «text_mention» указанный пользователь
		$this->set('language',   'str');   # Опционально. Только для «pre», язык программирования текста объекта
	}



/**/
}
