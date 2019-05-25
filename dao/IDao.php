<?php

namespace dao;

interface IDao
{
    public function create($entity);

    public function read($busca);

    public function update($entity);

    public function delete($entity);

}
