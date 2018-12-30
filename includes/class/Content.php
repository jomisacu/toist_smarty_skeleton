<?php

namespace Toist;

class Content extends TemplateObject {
    public function checkDynamicOffset($offset) : bool
    {
        return false;
    }
    
    
    
    public function getDynamicOffset($offset)
    {
        return null;
    }
}