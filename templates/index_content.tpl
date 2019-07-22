{extends file="_layout.tpl"}
{block name="body"}
	<article>
		<header>
			<h1>{$content.title}</h1>
		</header>
		<section>
			{include "blocks/content_blocks.tpl" content=$content}
		</section>
		<div id="comments"></div>
	</article>
	{include "blocks/comment_widget.tpl"}
	<script>
        $(function () {
            // sets slideshows
            // anything etc etc
        });
	</script>
{/block}