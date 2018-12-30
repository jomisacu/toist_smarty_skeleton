<?php

namespace Toist;

class Lang extends TemplateObject
{
    protected $phrases                = null;
    protected $pendingPhrasesFilePath = __DIR__.'/../lang.pending.xml';
    protected $phrasesFilePath        = __DIR__.'/../templates/lang.xml';
    
    
    
    public function __call($key, $args)
    {
        $phrase = $this->$key;
        $index  = 1;
        
        foreach ($args as $arg) {
            $phrase = str_replace("{".$index."}", $arg, $phrase);
            $index++;
        }
    }
    
    
    
    public function __get($key)
    {
        if ($this->phrases === null) {
            $this->loadLangFile();
        }
        
        if ( ! isset($this->phrases[$key])) {
            $this->addToPendingPhrases($key);
            
            return $key;
        }
        
        return $this->phrases[$key];
    }
    
    
    
    public function addToPendingPhrases($key)
    {
        $filename    = $this->pendingPhrasesFilePath;
        $fileContent = '';
        
        if ( ! file_exists($filename)) {
            $fileContent = file_get_contents($filename);
            $toAdd       = "\n<phrase key=\"{$key}\"><![CDATA[{$key}]]></phrase>";
            
            if (strpos($fileContent, $toAdd) !== false) {
                return false;
            }
        }
        
        $fileContent .= $toAdd;
        file_put_contents($filename, $fileContent);
        
        return true;
    }
    
    
    
    public function loadLangFile()
    {
        $this->parseXml(file_get_contents($this->phrasesFilePath));
    }
    
    
    
    public function parseXml($xml)
    {
        if ($xml) {
            $this->phrases = [];
            
            $xml = new SimpleXML($xml);
            
            if ($xml && $xml->phrase) {
                /**@var SimpleXML $phrase */
                foreach ($xml->phrase as $phrase) {
                    $key                 = (string)$phrase->getAttribute('key');
                    $this->phrases[$key] = trim((string)$phrase);
                }
            }
        }
    }
    
    
    
    public function checkDynamicOffset($offset) : bool
    {
        return false;
    }
    
    
    
    public function getDynamicOffset($offset)
    {
        return null;
    }
}