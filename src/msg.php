<?php

namespace rd\telegram_api;

/**
 *
 */
class msg {

	/** Выводит информацию */
	use trait__info;



	private $bot = null;

	private $to = null;
	private $msg = null;
	private $photo = null;
	private $video = null;
	private $document = null;
	private $button = [];





	/** */
	function __construct() {}





	/** Привязываем бот */
	function set_bot($bot) {
		$this->bot = $bot;
	}





	/** Добавляет Id адресата назначения */
	function to_id($to) {
		$this->to = $to;
	}





	/** Добавляет сообщение */
	function msg($text) {
		$this->msg = $text;
	}





	/** Добавляет фото */
	function photo($url) {
		$this->photo = $url;
	}





	/* * Добавляет видео * /
	function video($url) {
		$this->video = $url;
	}





	/** Добавляет документ */
	function document($url) {
		$this->document = $url;
	}





	/** Добавляет строчку клавиатуры */
	function btn_line($arr_btn) {
		$this->button[] = $arr_btn;
	}





	/** Добавляет кнопку со ссылкой */
	function btn_url($caption, $url) {
		return [
			"text" => $caption,
			"url" => $url,
//			'pay' => true,
//			request_contact 	Boolean 	Опционально. Если значение True, то при нажатии на кнопку боту отправится контакт пользователя с его номером телефона. Доступно только в диалогах с ботом.
//			request_location 	Boolean 	Опционально. Если значение True, то при нажатии на кнопку боту отправится местоположение пользователя. Доступно только в диалогах с ботом.
		];
	}





	/** Добавляет кнопку с callback */
	function btn_callback($caption, $callback) {
		return [
			"text" => $caption,
			"callback_data" => $callback,
//			'request_contact' => true,
		];
	}





	/** Формирует сообщение бота */
	function send() {
		$post = [];
		$post['chat_id'] = $this->to;
		if ($this->photo) {
			$command = 'sendPhoto';
			if ($this->msg) {
				$post['caption'] = $this->msg;
			}
			$post['photo'] = $this->photo;
/*		} elseif ($this->video) {
			$command = 'sendVideo';
			if ($this->msg) {
				$post['caption'] = $this->msg;
			}
			$post['video'] = $this->video;
			/**/
		} elseif ($this->document) {
			$command = 'sendDocument';
			if ($this->msg) {
				$post['caption'] = $this->msg;
			}
			$post['document'] = $this->document;
		} else {
			$command = 'sendMessage';
			if ($this->msg) {
				$post['text'] = $this->msg;
			}
		}

		if ($this->button) {
			$keyboard = [
				"inline_keyboard" => $this->button,
				"one_time_keyboard" => true, // можно заменить на FALSE,клавиатура скроется после нажатия кнопки автоматически при True
				"resize_keyboard" => true // можно заменить на FALSE, клавиатура будет использовать компактный размер автоматически при True
			];
			$post['reply_markup'] =  json_encode($keyboard);
		}/**/
/*		if ($this->button) {
			$keyboard = [
				"keyboard" => $this->button,
				"one_time_keyboard" => true, // можно заменить на FALSE,клавиатура скроется после нажатия кнопки автоматически при True
				"resize_keyboard" => true // можно заменить на FALSE, клавиатура будет использовать компактный размер автоматически при True
			];
			$post['reply_markup'] =  json_encode($keyboard);
		}/**/
\print_info($post, $command);
		$this->bot->_curl($command, $post);
//		return [$command, $post];
	}





/**/
}
