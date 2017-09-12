<?php

namespace Model;

use Interop\Container\ContainerInterface;


class Title
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function get(string $id = null)
    {
        $em = $this->container['entityManager'];
        if ($id !== null) {
            $res = $em->getRepository('Entity\Title')->find($id);
            $data = ['title' => $res->getTitle()];
        } else {
            $res = $em->getRepository('Entity\Title')->findAll();
            $data = [];
            foreach($res as $ent) {
                $data[] = ['title' => $ent->getTitle()];
            }
        }
        return $data;        
    }
    
    public function random()
    {
        $em = $this->container['entityManager'];
        $res = $em->getRepository('Entity\Title')->findAll();
        $idx = rand(0, count($res)-1);
        $data = ['title' => $res[$idx]->getTitle()];
        return $data;        
    }
}