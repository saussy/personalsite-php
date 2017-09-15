<?php

namespace Controller;

class TitleController extends Controller
{

    protected $modelName = 'title';

    public function random($request, $response, $args)
    {
        $data = $this->getModel()->random();
        $response = $response->withJson($data);
        return $response;        
    }

}