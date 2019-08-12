<style>
	.float_left {
		float:left;
	}

	.float_right {
		float: right;
	}
</style>
{foreach $content.blocks as $block}
	{if $block.type == 'text'}
		<div class="text-block">
			{$block.text}
		</div>
	{elseif $block.type == 'gallery'}
		{if in_array('slideshow', $block.display_options)}
		<div class="gallery slideshow" data-nav="thumbs" data-width="100%" data-height="">
			{foreach $block.images as $image}
				<div data-img="{$url->image_url($image.id, 600,  400)}">
					{if $image.link}<a href="{$image.link}" data-href="{$image.link}">{/if}
						<div class="overlay">
							{if $image.title}
							<h1>{$image.title|escape}</h1>
							{/if}
							{if $image.description}
							<p>{$image.description|escape}</p>
							{/if}
						</div>
					{if $image.link}</a>{/if}
				</div>
			{/foreach}
		</div>
		{else}
		<div class="gallery {foreach $block.display_options as $display_option}{$display_option}{/foreach}">
			{foreach $block.images as $image}
				{if $image.link}<a href="{$image.link}">{/if}
				<figure>
					<img src="{$url->image_url($image.key, 200, 300, 'clip')}" alt="{$content.title}">
					<figcaption>
						{$image.description|escape}
					</figcaption>
				</figure>
				{if $image.link}</a>{/if}
			{/foreach}
		</div>
		{/if}
	{elseif $block.type == 'title'}
		<h1>{$block.text}</h1>
	{/if}
{/foreach}