<?php

namespace Toist;


class ContentList extends TemplateObject implements \Iterator
{
    public $urlKeywords = '';
    public $paginationSegmentTemplate;
    public $contents    = [];
    public $pages       = [];
    public $pageSize    = 20;
    public $page        = 1;
    
    
    
    public function __construct(
        $urlKeywords,
        $paginationSegmentTemplate,
        $pageSize,
        $contents,
        $page = 1
    ) {
        $this->urlKeywords               = $urlKeywords;
        $this->paginationSegmentTemplate = $paginationSegmentTemplate;
        
        $this->contents = $contents;
        $this->pageSize = $pageSize;
        $this->pages    = $this->getPages();
        $this->page     = $page;
    }
    
    
    
    public function get($page = CURRENT_PAGE, $pageSize = PAGE_SIZE)
    {
        // reduce the list to the current page
        return array_slice($this->contents, ($page - 1) * $pageSize, $pageSize);
    }
	
	public function getTitle () {
		
		return "the title for '" . $this->urlKeywords . "' list";
    }
    
    
    
    public function getPermanentUrl(int $page = 1)
    {
        $page = (int)$page ?: 1;
        
        return '?page=' . $page;
    }
    
    
    
    /**
     * a example list of pages
     *
     * @return array
     */
    public function getPages()
    {
        $pages = [];
        
        foreach (range(1, count($this->contents) / $this->pageSize) as $page) {
            $pages[$page] = $this->getPermanentUrl($page);
        }
        
        return $pages;
    }
	
	public function getPagesCount () {
		
		return count($this->getPages());
    }
    
    
    
    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->contents);
    }
    
    
    
    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        next($this->contents);
    }
    
    
    
    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->contents);
    }
    
    
    
    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return array_key_exists($this->key(), $this->contents);
    }
    
    
    
    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        reset($this->contents);
    }
}