{extends file="_layout.tpl"}
{block name="main_menu"}
	{*
	use $section.menus to access to current section menus.
	It is important because when you use sections you can
	override menus from site to customize any section on
	your site.
	*}
	{if $section.menus.main_menu && $section.menus.main_menu.items}
		<div class="header-menu">
			<header>
				<nav>
					{foreach $section.menus.main_menu.items as $menu_item}
						<li><a href="{$menu_item.href}" {if $menu_item.target}target="{$menu_item.target}" {/if}>{$menu_item.caption}</a></li>
					{/foreach}
				</nav>
			</header>
		</div>
	{/if}
{/block}
{block name="body"}
	{*
	you can by default get the contents from multiple lists:
	latest, most_commented, most_viewed, featured and custom
	lists created from site dashboard. These lists are available
	from the "site" varible or from the "section" variable.
	When you access via "site" variable to any list you are
	loading contents for all sections on the site. On the other
	hand, when a list is used from the section, the contents
	returned are reduced to contents included in the referenced section.
	*}
	{* get latest content from the current section *}
	{foreach $section.contents.latest->get(1, 20) as $content}
		{include "{$theme_path}/blocks/content_list_item.tpl"}
	{/foreach}
	{include "{$theme_path}/blocks/pagination_links.tpl" currentList=$section.contents.latest}
{/block}
