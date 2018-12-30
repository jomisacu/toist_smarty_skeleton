<?php

namespace Toist;

class SimpleXML extends \SimpleXMLElement
{
    public function getAttribute(
        $strAttributeName,
        $strNameSpace = null,
        $blIsPrefix = false
    ) {
        foreach ($this->attributes(
            $strNameSpace,
            $blIsPrefix
        ) as $attr => $value) {
            if ($attr == $strAttributeName) {
                return $value;
            }
        }
        
        return null;
    }
}