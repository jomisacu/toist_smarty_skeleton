<?php

namespace Toist;


class ContentList
{
    protected $urlKeywords = '';
    public $contents    = [];
    
    
    public function __construct(
        $urlKeywords,
        $contents
    ) {
        $this->urlKeywords = $urlKeywords;
        
        $this->contents = $contents;
    }
    
    
    
    public function get(int $page = CURRENT_PAGE, int $pageSize = PAGE_SIZE)
    {
        // reduce the list to the current page
        return array_slice($this->contents, ($page - 1) * $pageSize, $pageSize);
    }
	
	public function getTitle () {
		
		return "the title for '" . $this->urlKeywords . "' list";
    }
    
    
    
    public function getPermanentUrl(int $page = null)
    {
        $page = (int)$page ?: 1;
        
        return '?page=' . $page;
    }
    
    /**
     * a example list of pages
     *
     * @param int $pageSize
     *
     * @return array
     */
    public function getPages(int $pageSize = 20)
    {
        $pages = [];
        
        foreach (range(1, $this->getPagesCount($pageSize)) as $page) {
            $pages[$page] = $this->getPermanentUrl($page);
        }
        
        return $pages;
    }
	
	public function getPagesCount (int $pageSize = 20) {
		
		return ceil(count($this->contents) / $pageSize);
    }
}