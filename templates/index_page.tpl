{extends file="_layout.tpl"}
{block name="body"}
	<div style="display: grid;grid-template-columns: auto auto">
	<section>
	{include "{$theme_path}/blocks/content_detail.tpl"}
	</section>
	<aside style="background: whitesmoke;">
		<h1>The page has an aside</h1>
	</aside>
	</div>
{/block}