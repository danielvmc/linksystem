<head>
    <title>Loading...</title>
</head>
<?php
Redis::incr('links.clicks.' . $link);
?>
<script>
window.location = '{{ $realLink }}';
</script>
