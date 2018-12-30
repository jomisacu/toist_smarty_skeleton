<article>
	<figure>
		<img src="{$content.thumb_url}?width=200&height=100" alt="{$content.title}">
		<figcaption>{$content.title}</figcaption>
	</figure>
	<header>
		<time datetime="{$content.publication_date}">{$date->format($content.publication_date_int, '%d/%m/%Y')}</time>
		<h1><a href="{$content.permanent_url}">{$content.title}</a></h1>
	</header>
	<section>
		<p>{$content.description}</p>
	</section>
	<footer>
		<small>{$content.comments_count}</small>
	</footer>
</article>