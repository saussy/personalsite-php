<?php

namespace Model;

class Title extends Model
{
    protected $modelName = 'title';

    public function random()
    {
        $em = $this->container['entityManager'];
        $res = $em->getRepository('Entity\Title')->findAll();
        $idx = rand(0, count($res)-1);
        $data = ['title' => $res[$idx]->getTitle()];
        return $data;        
    }
}