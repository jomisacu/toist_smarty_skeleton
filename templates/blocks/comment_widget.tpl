<script>
    {if $thread_identifier && $thread_container_id}
    // TOIST CONFIGURATION
    var toist_site_id = {$site.id};
    var toist_thread_identifier = '{$thread_identifier}';
    var toist_thread_container_id = '{$thread_container_id}';

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://static.toist.net/comments.min.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    {/if}
</script>