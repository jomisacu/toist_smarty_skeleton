# toist_smarty_skeleton
Este es un skeleton para construir un tema compatible con el sitio [toist.net](https://www.toist.net).

# Directorios
Este paquete contiene un grupo de archivos para ayudarte a crear temas. Debes prestar atencion especial a la carpeta templates, ya que es aqui donde reside el tema que estas creando y es la carpeta cuyo contenido debes comprimir y subir en formato zip para publicar tu tema.

## Archivos requeridos
Para que un tema sea considerado como valido debe contener al menos los siguientes archivos:
* index_page.tpl
* index_content.tpl
* index_section.tpl
* index_list.tpl

### index_page.tpl
Este archivo sera usado para mostrar las páginas del sitio web. Por ejemplo, la seccion "nosotros" del sitio.

### index_content.tpl
Este archivo será usado para mostrar los artículos del sitio web.

### index_section.tpl
Este archivo se usa para mostrar las paginas de inicio de los sitios. 

### index_list.tpl
Este archivo se usa para mostrar listados de articulos. 

### El archivo theme.json
La finalidad de este archivo es definir los recursos del tema. No es estrictamente necesario, pero si queremos agregar multiples plantillas para articulos, páginas y secciones o si queremos especificar donde estan las miniaturas del tema, debemos entonces agregarlo. El aspecto de este archivo se muestra a continuación:

```json
{
  "sections": [
    {
      "name": "Default home aspect",
      "file": "index_section.tpl"
    }
  ],

  "pages": [
    {
      "name": "Default page aspect",
      "file": "index_page.tpl"
    }
  ],

  "contents": [
    {
      "name": "Default article aspect",
      "file": "index_content.tpl"
    }
  ],

  "lists": [
    {
      "name": "Default list aspect",
      "file": "index_list.tpl"
    }
  ],

  "previews": [
    {
      "file": "previews/thumb.jpg",
      "title": "The thumb",
      "description": "This is the thumb that will be used on lists"
    },
    {
      "file": "previews/home.jpg",
      "title": "Home",
      "description": "This is the home preview"
    },
    {
      "file": "previews/page.jpg",
      "title": "Page",
      "description": "This is the page preview"
    }
  ]
}
```
# Variables disponibles
## section
Una seccion en un sitio web, representa un contexto. Y va a deterinar la forma en que se va a mostrar el sitio. Imagina las secciones como portadas (paginas de inicio), que pueden ser publicadas bajo urls especificas. Veamos un ejemplo. Imagina que en tu sitio web tienes varias secciones: juegos y peliculas. Puedes acceder a ellas a traves de las urls http://www.example.com/juegos/ y http://www.example.com/peliculas/ respectivamente. Al entrar en cada url, podrias ver listados de noticias diferentes, diapositivas diferentes, un diseño diferente, etc., etc.

La variable section sirve para acceder a todos los datos del contexto actual. Los atributos expuestos por la variable section son los siguientes: title, domain, path, is_default, permanent_url, url_permanent, menus, contents.

#### section.title
Guarda el titulo de la seccion. A continuacion, se muestra como establecer un titulo personalizado en la pagina segun la seccion:
```smarty
{* usar la seccion para construir un titulo de pagina personalizado *}
<title>{$section.title} - Example.com</title>

```

#### section.domain
Sirve para acceder al dominio en que esta definida la seccion actual. Por ejemplo, el sitio web example.com podria definir dos secciones "juegos" y "peliculas" y desplegar estas bajo sub dominios diferentes, juegos.example.com y peliculas.example.com respectivamente. 

#### section.path
La porcion de la url que sigue al dominio es el path de la url actual (la que se encuentra en la barra de direcciones de nuestro navegador), incluyendo la barra (/) del inicio. Por ejemplo, en la url https://example.com/una/ruta/en/el/sitio/ el path, hace referencia a "/una/ruta/en/el/sitio/".
 
#### section.is_default
Nos sirve para saber si la seccion actual es la predeterminada.

#### section.permanent_url y section.url_permanent (ambos)
Este valor representa la url completa a traves de la cual accedemos a la seccion. Si la seccion tiene un dominio y un path, la combinacion de ambos dara como resultado la url permanente de la seccion. Notese que cuando hablamos de la url permanente de la seccion nos referimos a la url que nos lleva al inicio de esta. Los contenidos publicados en la seccion tienen su propia url permanente, que a su vez, incluye la url permanente de la seccion.

#### section.menus
Como hemos dicho antes, una seccion representa un contexto. Para brindar el mayor nivel de persolizacion a las diferentes secciones del sitio web, podemos personalizar los menus segun la seccion en la que nos encontremos. Asi, el menu "main_menu", puede desplegar diferentes opciones de menu segun la seccion en la que nos encontremos. Veamos un ejemplo:
````smarty
{* usando $section.menus para acceder a los menus del sitio *}
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
````

#### section.contents
section.contents nos sirve para acceder a los articulos de nuestro sitio. Expone las listas de contenidos definidas en el sitio web. Por defecto existen cuatro listas: latest, featured, most_commented y most_viewed. Tambien, estan disponibles las listas creadas por el usuario y listas basadas en categorias. Veamos un ejemplo.
````smarty
{* mostrar los ultimos (usando la lista lates: section.contents.latest) 20 articulos publicados en la seccion actual *}
{foreach $section.contents.latest->get(1, 20) as $content}
	<article class="post">
		<figure>
    		<img src="{$url->image_url($content.image_square_id, 200, 100)}" alt="{$content.title}">
    		<figcaption>{$content.title}</figcaption>
    	</figure>
    	<header>
    		<time datetime="{$content.publication_date}">{$date->format('%d/%m/%Y', $content.publication_date_int)}</time>
    		<h1><a href="{$content.permanent_url}">{$content.title}</a></h1>
    	</header>
    	<section>
    		<p>{$content.description}</p>
    	</section>
    	<footer>
    		<small>{$content.comments_count}</small>
    	</footer>
	</article>
{/foreach}
````

## page and current_page
Nos sirven para acceder al numero de pagina actual. Es util cuando estamos mostrando listados de articulos.

## currentList
Expone la lista de contenidos donde estan agrupados los articulos que se estan desplegando en la pagina.

## site
Expone los datos del sitio web. A traves de sta variable tenemos acceso a los siguientes datos: language_iso_code, language_name, name, title, logo, site_title, company_email, company_name, company_phone, company_address, section, menus, contents.

## lang
La variable lang nos sirve para traducir el texto del tema al idioma de nuestro sitio.

## content
Si nos encontramos en un articulo, esta variable guarda todos los detalles del articulo. Veamos un ejemplo.
```smarty
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
	</section>
</article>
```
# Helpers
Los helpers son objetos que nos ayudan (de ahi el nombre helpers) a realizar acciones puntuales y de cierto ambito. Los helpers disponibles se listan a continuacion.

## date
Lo usamos para formatear fechas. Una lista completa de las opciones disponibles para el helper "date" esta disponible [aqui](https://www.php.net/manual/es/function.strftime.php). Para ofrecer nombres mas amigables a las opciones de formato de fecha hemos creado algunos alias. Estos se listan a continuacion:

* %year equivale a %Y
* %year_short => %Y
* %month equivale a %m
* %month_short equivale a %m
* %month_name equivale a %B
* %month_name_short equivale a %b
* %day equivale a %d
* %day_short equivale a %#d (windows)
* %day_short equivale a %e
* %day_name equivale a %A
* %day_name_short equivale a %a
* %hour_24 equivale a %H
* %hour equivale a %I
* %hour_12 equivale a %I
* %minute equivale a %M
* %second equivale a %S

Veamos un ejemplo:
```smarty
...
<footer>
	<small>Writed by John Smith at {$date->format('%d/%m/%Y', $content.publication_date_int)}</small>
</footer>
...

```


## url
Este helper nos ayuda a crear urls. Hay disponibles 3 metodos hasta el momento: image_url, css_url y js_url. A continuaci&oacute;n un par de ejemplos.

creando la url para la imagen "square" de un articulo usando un ancho de 200 pixeles y una altura de 100 pixeles
````smarty
<img src="{$url->image_url($content.image_square_id, 200, 100)}" />
````

incluyendo el css y js de nuestro tema
````smarty
<head>
	<link rel="stylesheet" href="{$url->css_url('css/style.css', $css_version)}">
	<script type="text/javascript" src="{$url->js_url('scripts/main.js', $js_version)}"></script>
</head>

````
## ads
Este helper es solo una comodidad para inlcuir bloques de anuncio. Los bloques de anuncio se manejan desde el dashboard del sitio web.

Intentando incluir un bloque de anuncios con un tama&ntilde;o aceptable para un ancho de 900 pixeles y una altura de 100 pixeles.
````smarty
<div class="ad">
	{$ads->get(900, 100)}
</div>

````
