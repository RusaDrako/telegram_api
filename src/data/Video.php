<?php

namespace rd\telegram_api\data;

/**
 * Этот объект представляет контакт с номером телефона.
 */
class Video extends _data {



	/** */
	function add_setting() {
		$this->set('file_id',          'str');   # Идентификатор этого файла, который можно использовать для загрузки или повторного использования файла.
		$this->set('file_unique_id',   'str');   # Уникальный идентификатор этого файла, который должен быть одинаковым с течением времени и для разных ботов. Невозможно использовать для загрузки или повторного использования файла.
		$this->set('width',            'int');   # Ширина видео, определенная отправителем
		$this->set('height',           'int');   # Высота видео, определенная отправителем
		$this->set('duration',         'int');   # Продолжительность звука в секундах, определенная отправителем
		$this->set_obj('thumb',        'PhotoSize');   # Опционально. Миниатюра видео
		$this->set('file_name',        'str');   # Опционально. Исходное имя файла, определенное отправителем
		$this->set('mime_type',        'str');   # Опционально. MIME-тип файла, определенный отправителем
		$this->set('file_size',        'int');   # Опционально. Размер файла
	}



/**/
}