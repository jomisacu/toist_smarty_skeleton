{extends file="_layout.tpl"}
{block name="body"}
<div style="display: grid;grid-template-columns: auto auto">
	<section>
	{include "blocks/content_blocks.tpl"}
	</section>
	<aside style="background: whitesmoke;">
		<h1>The page has an aside</h1>
	</aside>
</div>
{/block}