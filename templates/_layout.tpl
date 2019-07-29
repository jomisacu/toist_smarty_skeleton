{*
This file is not mandatory. Is only for explanation purposes.
Feel free to do anything you want. Add files and folders as
you want.
*}
<!doctype html>
<html lang="{$site.language_iso_code}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{block name="page_title"}{$lang.default_page_title}{/block}</title>
	<link rel="stylesheet" href="{$url->css_url('css/style.css')}">
	{block name="heders"}
		<!-- you can use this block to add styles, scripts and/or meta data in descendant templates -->
	{/block}
</head>
<body>
	<div class="main-content">
		{block name="main_menu"}
			{* use $section.menus or $menus to access to site menus. *}
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
			<!-- this is the body of the page -->
			{*
			you can by default get the contents from multiple lists:
			latest, most_commented, most_viewed, featured and custom
			lists created from site dashboard. These lists are available
			from the "site" varible or from the "section" variable.
			When you access via "site" variable to any list you are
			loading contents for all sections on the site. On the other
			hand, when a list is used from the context, the contents
			returned are reduced to contents included in the referenced context.
			*}
			{* get latest contents from all site contents *}
			{foreach $section.contents.latest as $content}
				{include "blocks/content_list_item.tpl"}
			{/foreach}
			{include "blocks/pagination_links.tpl" currentList=$section.contents.latest}
		{/block}
	</div>
{block name="scripts"}
	<!-- you can use this block to add scripts in descendant templates -->
{/block}
</body>
</html>