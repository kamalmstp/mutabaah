<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Mutabaah</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="description"
			content="This a Demo Progressive Web Application which will work in offline, has a splash screen add to home screen etc,."
		/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="theme-color" content="#29434d" />
		<meta name="msapplication-TileColor" content="#29434d" />
		<meta name="msapplication-TileImage" content="<?php echo base_url('assets/theme/images/icons/mstile-150x150.png');?>" />
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="apple-mobile-web-app-title" content="Progressive Web Application" />
		<meta name="application-name" content="Progressive Web Application" />
		<link rel="apple-touch-icon" href="<?php echo base_url('assets/theme/images/icons/apple-touch-icon.png'); ?>" />
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/theme/images/icons/favicon-32x32.png" sizes="32x32'); ?>" />
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/theme/images/icons/favicon-16x16.png" sizes="16x16'); ?>" />
		<link rel="manifest" href="<?php echo base_url('assets/theme/manifest.json'); ?>" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700" />
		<link rel="stylesheet" href="<?php echo base_url('assets/theme/css/styles.css'); ?>" />
	</head>

	<body>
		<div class="app app__layout">
			<header>
				<span class="header__icon">
					<svg class="menu__icon no--select" width="24px" height="24px" viewBox="0 0 48 48" fill="#fff">
						<path d="M6 36h36v-4H6v4zm0-10h36v-4H6v4zm0-14v4h36v-4H6z"></path>
					</svg>
				</span>

				<span class="header__title no--select"><?=$page_title;?></span>
			</header>

			<div class="menu">
				<div class="menu__header"></div>
				<ul class="menu__list">
					<li><a rel="noopener" href="<?=site_url();?>">Home</a></li>
					<li><a rel="noopener" href="<?=site_url('student/sholat');?>">Ibadah Harian</a></li>
					<li><a rel="noopener" href="<?=site_url('student/tugas');?>">Tugas Harian</a></li>
					<li><a rel="noopener" href="<?=site_url('student/history');?>">History</a></li>
				</ul>
			</div>
			<div class="menu__overlay"></div>

			<?php include 'student/'.$page_name.'.php'; ?>
		</div>

		<!-- JS Files  -->
		<script src="<?php echo base_url('assets/theme/js/toast.js');?>"></script>
		<script src="<?php echo base_url('assets/theme/js/main.js');?>"></script>
		<script src="<?php echo base_url('assets/theme/js/offline.js');?>"></script>
		<script src="<?php echo base_url('assets/theme/js/app.js');?>"></script>
		<script src="<?php echo base_url('assets/theme/js/push.js');?>"></script>
		<script src="<?php echo base_url('assets/theme/js/sync.js');?>"></script>
		<script src="<?php echo base_url('assets/theme/js/share.js');?>"></script>
		<script src="<?php echo base_url('assets/theme/js/menu.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/theme/js/jquery.js');?>"></script>

		<!-- My Google Analytics Report -->
		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				(i[r] =
					i[r] ||
					function() {
						(i[r].q = i[r].q || []).push(arguments);
					}),
					(i[r].l = 1 * new Date());
				(a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m);
			})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-92627241-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>
