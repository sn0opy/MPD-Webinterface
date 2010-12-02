<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>MPD Webinterface</title>	

	<script type="text/javascript" src="media/jquery.js"></script>
	<script type="text/javascript" src="media/mycode.js?<?=filemtime("media/mycode.js");?>"></script>
	<link rel="stylesheet" type="text/css" href="media/style.css?<?=filemtime("media/style.css");?>" />
</head>
<body>

<div class="container">
	<div class="meta">
		<p>mpd <?=$mpd->mpd_version?></p>
	</div>
	<div class="navi">
		<ul>
			<li><a href="?a=voldown" id="volDown" title="Vol down"><img src="media/icons/sound_down.png" alt="Vol down" /></a></li>
			<li><a href="?a=volup" id="volUp" title="Vol up"><img src="media/icons/sound_up.png" alt="Vol up" /></a></li>
			<li><a href="?a=prev" id="prev" title="Previous"><img src="media/icons/control_rewind.png" alt="Previous" /></a></li>
			<? if($mpd->state == 'pause' || $mpd->state == 'stop') { ?>
			<li><a href="?a=play" id="play" title="Play"><img src="media/icons/control_play.png" alt="Play" /></a></li>
			<? } else { ?>
			<li><a href="?a=pause" id="pause" title="Pause"><img src="media/icons/control_pause.png" alt="Pause" /></a></li>
			<? } ?>
			<li><a href="?a=stop" id="stop" title="Stop"><img src="media/icons/control_stop.png" alt="Stop" /></a></li>
			<li><a href="?a=next" id="next" title="Next"><img src="media/icons/control_fastforward.png" alt="Fastforward" /></a></li>
		</ul>
	</div>

