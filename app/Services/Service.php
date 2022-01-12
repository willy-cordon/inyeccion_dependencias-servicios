<?php

namespace App\Services;

/**
 * Class Service
 * @package App\Services
 */
 abstract class Service
{
     /** @var string */
     protected $model;

     /**
      * Service constructor.
      *
      */
     public function __construct()
     {
         $this->setModel();

         if (!$this->model || !class_exists($this->model)) {
             return 'model no found';
         }
     }

     /**
      * Set model class name.
      *
      * @return void
      */
     abstract protected function setModel(): void;

     public function getModel(): string
     {
         return $this->model;
     }

}
