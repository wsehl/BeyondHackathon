<?php
?>

<script src="js/modal-fx.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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

<script>
    function openTab(evt, tabName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("content-tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" is-active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " is-active";
    }
</script>

<script>
    function ChangeLang(lang) {
        var lang;
        $.post("index.php", {
            lang: lang
        })
    };
</script>

<script type="text/javascript">
    $(function() {
        if (localStorage.getItem("myKey")) {
            var stored_select = localStorage.getItem("myKey");
            $('#' + stored_select).prop("selected", true);
            $('.' + stored_select).show();
        } else {
            $('.Nur-sultan').show();
        }
    });

    $("#selectItem").change(function() {
        $('.containerss').find('div').hide();
        var selected = $('#selectItem option:selected').attr('id');
        localStorage.setItem("myKey", selected);
        $('.' + selected).show();
        $.post("index.php", {
            city: selected
        })
    });
</script>

</body>

</html>