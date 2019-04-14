{foreach $content.blocks as $block}
	{if $block.type == 'text'}
		<div class="text-block">
			{$block.text}
		</div>
	{elseif $block.type == 'gallery'}
		<div class="gallery{foreach $block.display_options as $display_option} {$display_option}{/foreach}">
			{foreach $block.images as $image}
				{if $image.link}
					<a href="{$image.link}">
				{/if}
				<figure>
					<img src="{$url->image_url($image.id, 600,  400)}" alt="{if $image.title}{$image.title}{else}{$content.title}{/if}">
					{if $image.description}
						<figcaption>
							{$image.description}
						</figcaption>
					{/if}
				</figure>
				{if $image.link}
					</a>
				{/if}
			{/foreach}
		</div>
	{elseif $block.type == 'title'}
		<h1>{$block.text}</h1>
	{/if}
{/foreach}