<?php

namespace App\Services;

use App\PayloadDatum;

class PayloadDatumService
{
    public static function parsePayload(array $payload) : PayloadDatum // returns newly instantiated payload datum
    {
        //Payload ID groups each json keyval pair to its corresponding element in the payload.
        //ie. {{name: jane, email: jane@mail.com}{name: john, email: john@mail.com}} - data in table would be:
        /*
            id: 0 | payloadid: 1 | key: name  | value: jane
            id: 1 | payloadid: 1 | key: email | value: jane@mail.com
            id: 2 | payloadid: 2 | key: name  | value: john
            id: 3 | payloadid: 2 | key: email | value: john@mail.com
        */
        $payloadId = $last_row = PayloadDatum::latest()->first()->payload_id;
        $payloadId++;
        foreach($payload as $outerKey => $outerValue){ // 1 outerkey => outervalue -> "name": "john smith" OR "call_stats": {}
            if(is_array($outerValue)){
                $datumParentKey = $outerKey;
                foreach($outerValue as $innerKey => $innerValue){ // 1 innerkey => innervalue -> "id": "1234" that's within the call_stats outer data
                    $datum = new PayloadDatum;
                    $datum->parent_key = $datumParentKey;
                    $datum->key = $innerKey;
                    $datum->value = $innerValue;
                    $datum->payloadId = $payloadId;
                    return $datum;
                }
            } else {
                $datum = new PayloadDatum;
                $datum->key = $outerKey;
                $datum->value = $outerValue;
                $datum->payloadId = $payloadId;
                return $datum;
            }
        }
    }
}