<article>
	<figure>
		<img src="{$url->image_url($content.image_square_id, ['w' => 200, 'h' => 100])}" alt="{$content.title}">
		<figcaption>{$content.title}</figcaption>
	</figure>
	<header>
		<time datetime="{$date->format('%Y-%m-%d %H:%minute:%second', $content.publication_date_int)}">{$date->format('%d/%m/%Y', $content.publication_date_int)}</time>
		<h1><a href="{$content.permanent_url}">{$content.title}</a></h1>
	</header>
	<section>
		<p>{$content.description}</p>
	</section>
	<footer>
		<small>{$content.comments_count}</small>
	</footer>
</article>