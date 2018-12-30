{extends file="_layout.tpl"}
{foreach $currentList->get($section.page_size, $current_page) as $content}
	{include "{$theme_path}/blocks/content_list_item.tpl"}
{/foreach}
{include "{$theme_path}/blocks/pagination_links.tpl" currentList=$currentList}
