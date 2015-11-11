<?php
namespace Bookmark\Model\Interfaces;

interface BookmarkDaoInterface
{
    public function findAll();
    public function getById($id);
    public function save($data);
    public function delete($id);
    public function update($data);
}