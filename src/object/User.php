<?php

namespace rd\telegram_api\object;

/**
 * Этот объект представляет бота или пользователя Telegram.
 */
class User extends _object {



	/** https://core.telegram.org/bots/api#chat */
	function add_setting() {
		$this->set('id',                            'int');    # Уникальный идентификатор пользователя или бота
		$this->set('is_bot',                        'bool');   # True, если это бот
		$this->set('first_name',                    'str');    # Имя бота или пользователя
		$this->set('last_name',                     'str');    # Опционально. Фамилия бота или пользователя
		$this->set('username',                      'str');    # Опционально. Username пользователя или бота
		$this->set('language_code',                 'str');    # Опционально. IETF языковой тег пользователя
		$this->set('can_join_groups',               'bool');   # Опционально. True, если бота можно будет приглашать в группы. Возвращает только через getMe.
		$this->set('can_read_all_group_messages',   'bool');   # Опционально. True, если для бота отключен приватный режим. Возвращает только через getMe.
		$this->set('supports_inline_queries',       'bool');   # Опционально. True, если бот поддерживает встроенные запросы. Возвращает только через getMe.
	}



/**/
}
