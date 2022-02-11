<?php

namespace Gzarow\Weather\Utilities;

class OpenApiSource implements WeatherSource {
	
	public function currentWeather($userId) {
		//implementacja pobieranie pogody przez api OpenWeather
		return 'dane pogodowe dla usera ' . $userId;

	}
}