<div class="fb-page" data-href="https://www.facebook.com/pgrado.aisunerg" data-height="420" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
	<div class="fb-xfbml-parse-ignore">
		<blockquote cite="https://www.facebook.com/pgrado.aisunerg">
			<a href="https://www.facebook.com/pgrado.aisunerg">pGrado AIS UNERG</a>
		</blockquote>
	</div>
</div>


<?php $this->assign('bottom-html', '<div id="fb-root"></div>'); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
<?php $this->Html->scriptEnd(); ?>
