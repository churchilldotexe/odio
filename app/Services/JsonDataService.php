<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use TKey;
use TValue;

class JsonDataService
{
    /**
     * @return Collection<TKey,TValue>
     */
    public function getJSONData(string $filename): Collection
    {
        try {
            $json = File::get(database_path("seeders/json/{$filename}.json"));

            return collect(
                json_decode(
                    json: $json,
                    associative: true)
            );
        } catch (\Exception $e) {
            throw new \Exception("Unable to load JSON data from {$filename}:{$e->getMessage()}");
        }
    }
}
