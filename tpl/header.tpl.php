<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>MPD Webinterface</title>	

	<link rel="stylesheet" type="text/css" href="media/style.css" />
</head>
<body>

<div class="container">
	<div class="meta">
		<p>mpd <?=$mpd->mpd_version?></p>
	</div>
	<div class="navi">
		<ul>
			<li><a href="?a=prev"><img src="media/icons/control_rewind.png" alt="Previous" /></a></li>
			<? if($mpd->state == 'pause' || $mpd->state == 'stop') { ?>
			<li><a href="?a=play"><img src="media/icons/control_play.png" alt="Play" /></a></li>
			<? } else { ?>
			<li><a href="?a=pause"><img src="media/icons/control_pause.png" alt="Pause" /></a></li>
			<? } ?>
			<li><a href="?a=stop"><img src="media/icons/control_stop.png" alt="Stop" /></a></li>
			<li><a href="?a=next"><img src="media/icons/control_fastforward.png" alt="Fastforward" /></a></li>
		</ul>
	</div>

