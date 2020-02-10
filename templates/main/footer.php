
<!--</div>-->
</main>


<footer>

<?php /*block('menu');*/ ?>

<?php block('footer'); ?>

<?php block('copyright'); ?>


<?php block('mobile-menu'); ?>


</footer>
<?php
	pop_up( 'service' );
	pop_up( 'callback' );
	pop_up( 'complete' );
	pop_up( 'login' );
	pop_up( 'policy' );
	pop_up( 'photoswipe' );
?>
</body>
<?php get_links(); ?>

<!-- Core JS file -->
<script src="/plugins/photoswipe4/photoswipe.min.js"></script> 
<!--  UI JS file  -->
<script src="/plugins/photoswipe4/photoswipe-ui-default.min.js"></script>
 
<script src="/plugins/photoswipe4/main.js"></script>


</html>
