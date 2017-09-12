<?php

namespace Model;

use Interop\Container\ContainerInterface;

abstract class Model
{
    protected $container;
    protected $modelName;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function getEntity()
    {
        return 'Entity\\' . ucfirst($this->modelName); 
    }

    public function get(string $id = null)
    {
        $em = $this->container['entityManager'];
        if ($id !== null) {
            $res = $em->getRepository($this->getEntity())->find($id);
            $data = $res->toArray();
        } else {
            $res = $em->getRepository($this->getEntity())->findAll();
            $data = [];
            foreach($res as $ent) {
                $data[] = $ent->toArray();
            }
        }
        return $data;        
    }
}