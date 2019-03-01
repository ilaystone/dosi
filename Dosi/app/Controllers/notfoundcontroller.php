<?php

namespace DOSI\CONTROLLERS;

class notFoundController extends abstractController
{
    public function defaultAction()
    {
        $this->_view();
    }
}