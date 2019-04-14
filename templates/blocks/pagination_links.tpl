{foreach $currentList->getPages(20) as $pageNumber => $pageUrl}
	<a href="{$pageUrl}">{$pageNumber}</a>
{/foreach}