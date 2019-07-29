{foreach $content.blocks as $block}
	{if $block.type == 'text'}
		<div class="text-block">
			{$block.text}
		</div>
	{elseif $block.type == 'gallery'}
		<div class="{if in_array("slideshow", $block.display_options)}fotorama{/if} gallery{foreach $block.display_options as $display_option} {$display_option}{/foreach}" {if in_array("slideshow", $block.display_options)}data-nav="thumbs"{/if} data-width="100%" data-height="">

			{foreach $block.images as $image}
				<div data-img="{$url->image_url($image.id, 600,  400)}">
					{if $image.link}
					<a href="{$image.link}" data-href="{$image.link}">
						<div class="overlay">
							{if $image.title}
							<h1>{$image.title|escape}</h1>
							{/if}
							{if $image.description}
							<p>{$image.description}</p>
							{/if}
						</div>
					</a>
					{/if}
				</div>
			{/foreach}
		</div>
	{elseif $block.type == 'title'}
		<h1>{$block.text}</h1>
	{/if}
{/foreach}