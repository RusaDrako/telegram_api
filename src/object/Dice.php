<?php

namespace rd\telegram_api\object;

/**
 * Этот объект представляет собой анимированный смайлик, отображающий случайное значение.
 */
class Contact extends _object {



	/** */
	function add_setting() {
		$this->set('emoji',   'str');   # Emoji, на котором основана анимация броска кости
		$this->set('value',   'int');   # Значение кубика, 1-6 для базовых смайлов «🎲», «🎯» и «🎳», 1-5 для базовых смайлов «🏀» и «⚽», 1-64 для базовых смайлов «🎰»
	}



/**/
}