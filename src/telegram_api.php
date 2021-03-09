<?php

namespace rd\telegram_api;

require_once('autoload.php');



/**
 *
 */
class telegram_api {

//	use trait__set_bot;
	/** Выводит информацию */
	use trait__info;



	private $link = 'https://api.telegram.org/';
	private $token = null;
	private $name = '';





	/** */
	function __construct(string $token, string $name = '') {
		$this->token = $token;
		$this->name = $name;
	}





	/** */
	public function _curl($command, $post = []) {
		# Запускай curl
		$curl = curl_init();
		# Формируем 
		$url = $this->insert_token("bot:bot-token:/{$command}");
		# Выполняем настройки
		curl_setopt_array(
			$curl,
			[
				CURLOPT_URL => $url,
				CURLOPT_POST => TRUE,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_TIMEOUT => 10,
				CURLOPT_POSTFIELDS => $post,
			]
		);
		# Выполняем curl
		$result = curl_exec($curl);
		# Если curl выдал ошибку
		if ($result === false) {
			# Выводим сообщение
			echo 'Ошибка curl: ' . curl_error($curl);
			# Закрываем соединение
			curl_close($curl);
			return [];
		}
		# Закрываем соединение
		curl_close($curl);
		# Декодируем результат
		$arr_result = \json_decode($result, true);
		# Если telegram выдал ошибку
		if (!$arr_result['ok']) {
			# Выводим сообщение
			echo $arr_result['error_code'] . ' ' . $arr_result['description'];
		}
		return $arr_result;
	}





	/** */
	function _get_to_id_arr($to) {
		$arr_to = \explode(',', $to);
		foreach ($arr_to as $k => $v) {
			$arr_to[$k] = trim($v);
		}
		return $arr_to;
	}





	/** Разбиваем сообщение на массив части */
	function _send_msg___arr_sub_str($str_msg) {
		# Максимальная динна
		$max_len = 4096;
		# Длинна строки
		$str_len = \mb_strlen($str_msg);
		# Число необходимых сообщений
		$n = (int)(($str_len / $max_len)) + 1;
		$arr = [];
		# Формируем массив записей
		for ($i = 0; $i < $n ; $i++) {
			# Длинна оставшегося участка
			$len_control = $str_len - $i * $max_len;
			# Определяем длинну отрезка
			$_len = $len_control < $max_len
					? $len_control
					: $max_len;
			# Добавляем элемент в массив
			$arr[] = \mb_substr($str_msg, $i * $max_len, $_len);
		}
		# Возвращаем массив
		return $arr;
	}





	/* * Отправка сообщения * /
	function send_msg($to, string $text) {
		if ($this->name) {
			$text = "{$this->name}: $text";
		}

		$post = [];

		$arr_to = $this->_get_to_id_arr($to);
		$arr_text = $this->_send_msg___arr_sub_str($text);

		foreach ($arr_to as $k => $v) {
			foreach ($arr_text as $k_2 => $v_2) {
				$post['chat_id'] = $v;
				$post['text'] = $v_2;
				$result = $this->_curl('sendMessage', $post);
			}
		}
	}





	/** Возвращает объект сообщения */
	public function msg() {
		$obj = new msg();
		$obj->set_bot($this);
		return $obj;
	}





	/** Возвращает объект setup */
	public function setup() {
		$obj = new setup();
		$obj->set_bot($this);
		return $obj;
	}





	/** Добавление токена в строку */
	public function insert_token($str) {
		$str = $this->link . \str_replace(':bot-token:', $this->token, $str);
		return $str;
	}





	/** * /
	function test_func($to, $func) {
		$text = "test_func: " . $func();
		$post = [
			'chat_id' => $to,
			'text' => $text,
		];
		$result = $this->_curl('sendMessage', $post);
\print_info($result, __METHOD__);
	}



	/** * /
	function send_doc($to, $obj_doc, $caption = null) {
		$post = [
			'chat_id' => $to,
			'document' => $obj_doc,
			'caption' => $caption,
		];
		$result = $this->_curl('sendDocument', $post);
\print_info($result, __METHOD__);
	}





	/** * /
	function send_photo($to, $url_photo, $caption = null) {
		$post = [
			'chat_id' => $to,
			'photo' => $url_photo,
			'caption' => $caption,
		];
		$result = $this->_curl('sendPhoto', $post);
\print_info($result, __METHOD__);
	}



	/** * /
	function send_photo_2($to, $url_photo, $caption = null) {
		$keyboard=array(
			"inline_keyboard"=>$this->_button(),
//			"keyboard"=>$this->_button(),
			"one_time_keyboard" => true, // можно заменить на FALSE,клавиатура скроется после нажатия кнопки автоматически при True
			"resize_keyboard" => true // можно заменить на FALSE, клавиатура будет использовать компактный размер автоматически при True
		);
		$post = [
			'chat_id' => $to,
			'photo' => $url_photo,
			'caption' => $caption,
			'reply_markup' => json_encode($keyboard),
		];
		$result = $this->_curl('sendPhoto', $post);
\print_info($result, __METHOD__);
	}




	/** * /
	function send_but($to, $url_photo, $name = null) {
		$keyboard=array(
			"inline_keyboard"=>$this->_button(),
			"one_time_keyboard" => true, // можно заменить на FALSE,клавиатура скроется после нажатия кнопки автоматически при True
			"resize_keyboard" => true // можно заменить на FALSE, клавиатура будет использовать компактный размер автоматически при True
		);
		$post = [
			'chat_id' => $to,
			'text' => $name,
			'reply_markup' => json_encode($keyboard),
		];
		$result = $this->_curl('sendMessage', $post);
\print_info($result, __METHOD__);
	}





	/** * /
	function send_key_reply_remove($to, $url_photo, $name = null) {
		$keyboard=array(
			"keyboard"=>$this->_button(),
			"one_time_keyboard" => true, // можно заменить на FALSE,клавиатура скроется после нажатия кнопки автоматически при True
			"resize_keyboard" => true // можно заменить на FALSE, клавиатура будет использовать компактный размер автоматически при True
		);
		$post = [
			'chat_id' => $to,
			'text' => $name,
			'reply_markup' => json_encode($keyboard),
		];
		$result = $this->_curl('sendMessage', $post);
\print_info($result, __METHOD__);
	}





	/** * /
	function send_key_reply($to, $url_photo, $name = null) {
		$keyboard=array(
			"keyboard"=>$this->_button(),
			"one_time_keyboard" => true, // можно заменить на FALSE,клавиатура скроется после нажатия кнопки автоматически при True
			"resize_keyboard" => true // можно заменить на FALSE, клавиатура будет использовать компактный размер автоматически при True
		);
		$post = [
			'chat_id' => $to,
			'text' => $name,
			'reply_markup' => json_encode($keyboard),
		];
		$result = $this->_curl('sendMessage', $post);
\print_info($result, __METHOD__);
	}





	/** * /
	function send_key_clean($to, $name = null, $m_id = null) {
		$keyboard=array("remove_keyboard" => true);
		$post = [
			'chat_id' => $to,
//			'message_id' => $m_id,
			'text' => $name,
			'reply_markup' => json_encode($keyboard),
		];
		if ($m_id) {
			$post['message_id'] = $m_id;
		}
		$result = $this->_curl('sendMessage', $post);
\print_info($result, __METHOD__);
	}





/**/
}
