<?php

namespace App\Services;

use App\Microservice;
use App\Rule;
use App\PayloadDatum;

class MicroserviceService
{
    public static function evaluatePayload(int $payloadId)
    {
        /*
            Rules table:
            microservice | key | value | blacklist

            so, if the rule was service1, key: name, value: Jimmy Joe, blackist: Y
            any payload from Jimmy Joe would not be sent to service1.

            if it were inner data (like title inside query type) it would be colon sererated:
            service2, key: query_type:title, value: sale, whitelist
            only payloads with titles as 'sale' inside the query_type JSON would be sent to service2

            To determine the appropriate service to send to, select on the breached rules, select where not in those breach rules after that
        */
        $payloadData = PayloadDatum::where('payload_id','=',$payloadId)->get()->toArray();
        $blacklistWhere = array('blacklist' => 'Y');
        $whitelistWhere = array('blacklist' => 'N');
        foreach($payloadData as $datum){
            if($datum->parent_key){
                //Select all rows with this keyval pair blacklisted
                $blacklistWhere[] = ['key', '=', $datum['parent_key'].":".$datum['key']]; 
                $blacklistWhere[] = ['value', '=', $datum['value']];
            } else {
                //Select all rows with this keyval pair blacklisted
                $blacklistWhere[] = ['key', '=', $datum['key']]; 
                $blacklistWhere[] = ['value', '=', $datum['value']];
            }
        }
        $breached = Rule::select('microservice')
            ->where($blacklistWhere)
            ->get()
            ->toArray();

        //NOTE: The whitelist functionality is not implemented due to time constraint

        
    }

    public static function deliverPayload(int $payloadId)
    {
        $payloadData = PayloadDatum::where('payload_id','=',$payloadId)->get()->toArray();
        $payload = [];
        foreach($payloadData as $payloadDatum){ // 1 payload datum -> key: name, value: john smith, parent_key: NULL
            if($payloadDatum['parent_key']){
                $payload[$payloadDatum['parent_key']][$payloadDatum['key']] = $payloadDatum['value'];//[call_stats => [id => 1234, length => 1:56:43]]
            } else {
                $payload[$payloadDatum['key']] = $payloadDatum['value'];//[name => jahn smith, email => john@mail.com]
            }
        }
        $payloadJSON = json_encode($payload);
        return $payloadJSON;
    }
}