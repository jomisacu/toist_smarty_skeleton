<script>
    {if isset($thread_identifier)}
    // TOIST CONFIGURATION
    var toist_site_id = {$site.id};
    var toist_thread_identifier = '{$thread_identifier}';
    var toist_thread_container_id = '{if isset($thread_container_id)}{$thread_container_id}{else}comments{/if}';

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://static.toist.net/comments.min.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    {else}
    document.getElementById(toist_thread_container_id).innerHTML = '<h1>YOUR COMMENTS APPEARS HERE</h1>';
    {/if}
</script>