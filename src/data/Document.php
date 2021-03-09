<?php

namespace rd\telegram_api\data;

/**
 * Этот объект представляет файл, не являющийся фотографией, голосовым сообщением или аудиозаписью.
 */
class Document extends _data {



	/** */
	function add_setting() {
		$this->set('file_id',          'str');   # Идентификатор этого файла, который можно использовать для загрузки или повторного использования файла.
		$this->set('file_unique_id',   'str');   # Уникальный идентификатор этого файла, который должен быть одинаковым с течением времени и для разных ботов. Невозможно использовать для загрузки или повторного использования файла.
		$this->set_obj('thumb',        'PhotoSize');   # Опционально. Миниатюра обложки альбома, к которому принадлежит музыкальный файл
		$this->set('file_name',        'str');   # Опционально. Исходное имя файла, определенное отправителем
		$this->set('mime_type',        'str');   # Опционально. MIME-тип файла, определенный отправителем
		$this->set('file_size',        'int');   # Опционально. Размер файла
	}



/**/
}