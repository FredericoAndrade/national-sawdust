        <footer>
            <div id="logo">
                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/themes/national-sawdust/img/logo.svg" alt=""></a>
            </div>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="<?php bloginfo('url'); ?>/wp-content/themes/national-sawdust/js/plugins.js"></script>
        <script src="<?php bloginfo('url'); ?>/wp-content/themes/national-sawdust/js/main.js"></script>

        <!-- Google Analytics -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <?php wp_footer(); ?>
    </body>
</html>