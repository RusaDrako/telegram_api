<?php

namespace rd\telegram_api\data;

/**
 * Этот объект представляет файл, готовый к загрузке. Он может быть скачан по ссылке вида https://api.telegram.org/file/bot<token>/<file_path>. Ссылка будет действительна как минимум в течение 1 часа. По истечении этого срока она может быть запрошена заново с помощью метода getFile.
 */
class File extends _data {



	/** */
	function add_setting() {
		$this->set('file_id',          'str');   # Уникальный идентификатор файла
		$this->set('file_unique_id',   'str');   # Уникальный идентификатор этого файла, который должен быть одинаковым с течением времени и для разных ботов. Невозможно использовать для загрузки или повторного использования файла.
		$this->set('file_size',        'int');   # Опционально. Размер файла, если известен
		$this->set('file_path',        'str');   # Опционально. Расположение файла. Для скачивания воспользуйтейсь ссылкой вида https://api.telegram.org/file/bot<token>/<file_path>
	}





	public function get_url_upload() {
		$str = "file/bot:bot-token:/{$this->file_path}";
		$str = $this->bot->insert_token($str);
		return $str;
	}



/**/
}
