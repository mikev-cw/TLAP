<?php

namespace App\Services;

use App\Models\Trackable;

class TrackableService
{
    public function getTrackableDataByUid(string $uid) {
        $trackable = Trackable::where('uid', $uid)->firstOrFail();

        $data = [
            'uid' => $trackable->uid,
            'name' => $trackable->name,
            'created_at' => $trackable->created_at,
            'updated_at' => $trackable->updated_at,
            'fields' => []
        ];

//        foreach ($trackable->dataValues as $value) {
//            $fieldName = $value->field->name;
//            $data['fields'][$fieldName] = $value->value;
//        }

        return $data;
    }
}
