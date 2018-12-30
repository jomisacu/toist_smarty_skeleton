<article>
	<header>
		<h1>{$content.title}</h1>
	</header>
	<section>
		{foreach $content.blocks as $block}
			{if $block.type == 'text'}
				<div class="text-block">
					{$block.text}
				</div>
			{elseif $block.type == 'gallery'}
				<div class="gallery{foreach $block.display_options as $display_option} {$display_option}{/foreach}">
					{foreach $block.images as $image}
						{if $image.href}
					<a href="{$image.href}">
						{/if}
						<figure>
							<img src="{$url->image_url(['id' => $image.id, 'w' => 600, 'h' => 400])}" alt="{if $image.title}{$image.title}{else}{$content.title}{/if}">
							{if $image.description}
							<figcaption>
								{$image.description}
							</figcaption>
							{/if}
						</figure>
						{if $image.href}
					</a>
						{/if}
					{/foreach}
				</div>
			{elseif $block.type == 'title'}
				<h1>{$block.text}</h1>
			{/if}
		{/foreach}
	</section>
</article>
<script>
	$(function () {
		// sets slideshows
		// anything etc etc
    });
</script>