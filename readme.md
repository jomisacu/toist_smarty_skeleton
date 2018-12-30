# json file explanation

El archivo theme.json contiene informacion sobre el tema. Esta informacion es necesaria cuando queremos especificar opciones avanzadas en los temas. Por ejemplo, si un tema dispone de varias plantillas para mostrar las "secciones", estas deben listarse bajo el indice "sections" del archivo theme.json.

# Incluir multiples plantillas para secciones
```json
{
	"sections": [
		{
			"name": "A descriptive name for a 'section' detail template ",
			"file": "index_section.tpl"
		},
		{
			"name": "A descriptive name for a extra 'section' detail template ",
			"file": "index_section2.tpl"
		}   
	]
}

```
# Incluir multiples plantillas para detalle de contenido
```json
{
	"contents": [
		{
		  "name": "A descriptive name for a 'content' detail template",
		  "file": "index_content.tpl"
		},
		{
		  "name": "A descriptive name for a extra 'content' detail template",
		  "file": "index_content2.tpl"
		}   
	]
}
```
# Incluir multiples plantillas para pagina
```json
{
	"pages": [
		{
		  "name": "A descriptive name for a 'page' detail template",
		  "file": "index_page.tpl"
		},
		{
		  "name": "A descriptive name for a extra 'content' detail template",
		  "file": "index_page.tpl"
		}   
	]
}
```

# El archivo templates/lang.xml
En este archivo iran las frases de idioma utilizadas en el tema. Puedes ir agregando frases de idioma 
# El archivo lang.pending.xml
En este archivo se iran creando las frases de idioma que vas usando en el tema. Puedes simplemente cuando termines copiar este archivo dentro de la carpeta templates y renombrarlo en lnag.xml