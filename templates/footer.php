	<!--footer start-->
	<footer class="site-footer">
		<div class="text-center">
			<?php
			$setting->nm_setting = 'thn_mulai';
			$setting->ambilSetting();
			
			echo $setting->setting.' - '.date('Y').' ';
			
			$setting->nm_setting = 'footer_title';
			$setting->ambilSetting();
			
			echo $setting->setting;
			?>
			<a href="?p=dashboard" class="go-top">
				<i class="fa fa-angle-up"></i>
			</a>
		</div>
	</footer>
	<!--footer end-->
</section>