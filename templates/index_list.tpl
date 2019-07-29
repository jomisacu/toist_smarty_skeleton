{extends file="_layout.tpl"}
{foreach $currentList->get($section.page_size, $current_page) as $content}
	{include "blocks/content_list_item.tpl"}
{/foreach}
{include "blocks/pagination_links.tpl" currentList=$currentList}
