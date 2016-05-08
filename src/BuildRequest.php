<?php

/**
 * This a lib to crawl the Academic Network Systems.
 * You can easely achieve the querying of grade/schedule/cet/free classroom ...
 * 
 * @author Ning Luo <luoning@Luoning.me>
 * @link https://github.com/lndj/Lcrawl
 * @license  MIT
 */ 

namespace Lndj;

/**
 * This is a trait to build get & post request.
 */
trait BuildRequest {

    /**
     * Build the get request.
     * @param type $uri 
     * @param type|array $param 
     * @param type|bool $isAsync 
     * @return type
     */
    public function buildGetRequest($uri, $param = [], $isAsync = false)
    {
        $query_param = array_merge(['xh' => $this->stu_id], $param);
        $query = [
                 'query' => $query_param,
            ];
        if ($this->cacheCookie) {
            $query['cookies'] = $this->getCookie();
        }
        //If use getAll(), use the Async request.
        return $isAsync 
        ? $this->client->getAsync($uri, $query) 
        : $this->client->get($uri, $query);
    }

    public function buildPostRequest($uri, $param, $isAsync = false)
    {
        //TODO
    }
}