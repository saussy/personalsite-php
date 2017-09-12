<?php

namespace Controller;

use Interop\Container\ContainerInterface;

abstract class Controller
{

    protected $container;
    protected $modelName;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function route($request, $response, $args)
    {
        switch ($request->getMethod()) {
            case 'GET' : $response = $this->get($request, $response, $args); break;
            default : break;
        }
        return $response;
    }

    protected function instantiateModel($modelName)
    {
        $this->model = $this->container['models'][$modelName];
    }

    protected function getModel()
    {
        if (empty($this->model)) {
            $this->instantiateModel($this->getModelName());
        }
        return $this->model;
    }

    protected function getModelName()
    {
        return $this->modelName;
    }

    public function get($request, $response, $args)
    {
        $model = $this->getModel();
        $id = $request->getAttribute('id');
        if (!empty($id)) {// = $request->getAttribute('parameters'))) {
            $data = $model->get($id);
        } else {
            $data = $model->get();
        }
        $response = $response->withJson($data);
        return $response;
    }
}