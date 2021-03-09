<?php

namespace rd\telegram_api;

/**
 *
 */
class setup {

	use trait__set_bot;
	/** Выводит информацию */
	use trait__info;



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





	/** Привязываем бот */
	private function _request($command, $post = []) {
		return $this->bot->_curl($command, $post);
	}





	/** Проверяет аутентификацию подключения к боту */
	function getMe() {
		$post = [];
		$result = $this->_request('getMe', $post);
		$result['result'] = $this->set_object('data\User', $result['result']);
		$this->_info($result, __METHOD__);
		return $result;
	}





	/** Проверяет текущий статус вебхука */
	function getWebhookInfo() {
		$post = [];
		$result = $this->_request('getWebhookInfo', $post);
		$this->_info($result, __METHOD__);
		return $result;
	}





	/** Получает данные по последним сообщениям для бота (за последние сутки) */
	function getUpdates($id = 0) {
		$post = ['offset' => $id];
		$result = $this->_request('getUpdates', $post);
//		$this->_info($_result, __METHOD__);

		$result['result'] = $this->set_object_arr('data\Update', $result['result']);

/*		$result = [];
		foreach ($_result['result'] as $k => $v) {
			$result[] = $this->set_object('data\Update', $v);
		}/**/
		$this->_info($result, __METHOD__);
		return $result;
	}





	/** */
	function getUserProfilePhotos($id) {
		$post = ['user_id' => $id];
		$result = $this->_request('getUserProfilePhotos', $post);
		$this->_info($result, __METHOD__);
		return $result;
	}





	/** Получает актуальную информацию о чате (текущее имя пользователя для разговоров один на один, текущее имя пользователя, группы или канала и т. Д.). В случае успеха возвращает объект Chat.  */
	function getChat($id) {
		$post = ['chat_id' => $id];
		$result = $this->_request('getChat', $post);
		$result['result'] = $this->set_object('data\Chat', $result['result']);
		$this->_info($result, __METHOD__);
		return $result;
	}





	/** Получает файл по ID */
	function getFile($id) {
		$post = ['file_id' => $id];
		$result = $this->_request('getFile', $post);
		$result['result'] = $this->set_object('data\File', $result['result']);
		$this->_info($result, __METHOD__);
		return $result;
	}





	/** Получает файл по ID */
	function set_object_arr($class_name, $data) {
		$result = [];
		foreach ($data as $k => $v) {
			$result[] = $this->set_object($class_name, $v);
		}
		return $result;
	}





	/** Получает файл по ID */
	function set_object($class_name, $data) {
		$class_name = __NAMESPACE__ . '\\' . $class_name;
		$obj = new $class_name();
		$obj->set_bot($this->bot);
		$obj->set_data($data);
		return $obj;
	}





	/** */
	function test() {
		$this->getMe();
		$this->getUpdates();
		$this->getWebhookInfo();
		$this->getUserProfilePhotos(1175393600);
		$this->getChat(1175393600);/**/
		$this->getFile('AgACAgIAAxkBAAMxYEDUcsDFEQgzCVJfJCQuGVRcc2AAAlmwMRumEghKLzrYs4tVimrTagABny4AAwEAAwIAA3kAA4jjAAIeBA');/**/
	}





/**/
}
