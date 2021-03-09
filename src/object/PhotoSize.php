<?php

namespace rd\telegram_api\object;

/**
 * Этот объект представляет изображение определённого размера или превью файла / стикера.
 */
class PhotoSize extends _object {

	use _trait__file;



	/** */
	function add_setting() {
		$this->set('file_id',          'str');   # Уникальный идентификатор файла
		$this->set('file_unique_id',   'str');   # Уникальный идентификатор этого файла, который должен быть одинаковым с течением времени и для разных ботов. Невозможно использовать для загрузки или повторного использования файла.
		$this->set('width',            'int');   # Ширина фото
		$this->set('height',           'int');   # Высота фото
		$this->set('file_size',        'int');   # Опционально. Размер файла
	}



/**/
}
