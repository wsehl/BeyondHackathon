<?php
?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        if ($navbarBurgers.length > 0) {
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                });
            });
        }
    });
</script>
<script src="js/modal-fx.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>
    // highlight.js
    (function() {
        document.querySelectorAll('pre code').forEach(function(block) {
            hljs.highlightBlock(block);
        });
    })();
</script>
<script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

</body>

</html>