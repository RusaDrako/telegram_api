<?php

namespace rd\telegram_api\object;

/**
 * Этот объект представляет собой место проведения.
 */
class Venue extends _object {



	/** */
	function add_setting() {
		$this->set_obj('location',        'Location');   # Место проведения. Не может быть живым местом
		$this->set('title',               'str');   # Название места проведения
		$this->set('address',             'str');   # Адрес места проведения
		$this->set('foursquare_id',       'str');   # Опционально. Идентификатор места проведения Foursquare
		$this->set('foursquare_type',     'str');   # Опционально. Тип площадки Foursquare. (Например, «arts_entertainment / default», «arts_entertainment / aquarium» или «food / icecream».)
		$this->set('google_place_id',     'str');   # Опционально. Идентификатор места проведения в Google Places
		$this->set('google_place_type',   'str');   # Опционально. Тип места проведения Google Places. (См. Поддерживаемые типы.)
	}



/**/
}
