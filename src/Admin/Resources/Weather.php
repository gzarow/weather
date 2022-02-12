<?php

namespace Gzarow\Weather\Admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Weather extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'city_name' => $this->city_name,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'temp' => $this->temp,
            'feels_like' => $this->feels_like,
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'description' => $this->description,
            'icon' => $this->icon,
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
