<? if($status != 'stopped') { ?>
<? if($status != 'paused') { ?>
<script type="text/javascript">
	var min = <?=date('i',$times[0])?>;
	var sec = <?=date('s',$times[0])?>;
	function zeropad(n, digits) { n = n.toString(); while (n.length < digits) { n = '0' + n; } return n; }
	function cnt() { sec++; if(sec > 59) { min++; sec = 0; } document.getElementById('time').innerHTML = zeropad(min,2) + ":" + zeropad(sec,2); }
	window.setInterval(cnt, 1000);
</script>
<? } ?>
<p><span class="label">Current:</span> <?=CURRENTARTIST ?> - <?=CURRENTTRACK?> (<span id="time"><? if($status == 'paused') { echo $CURRENTTIME[0].':'.$CURRENTTIME[1].':'.$CURRENTTIME[2]; } ?></span><noscript><? echo $CURRENTTIME[0].':'.$CURRENTTIME[1].':'.$CURRENTTIME[2];?></noscript>/<? echo $CURRENTLENGTH[0].':'.$CURRENTLENGTH[1].':'.$CURRENTLENGTH[2];?>)</p>
<? } ?>

<div class="playlist">
<? foreach($mpd->playlist as $song) { ?>
	<? if($song['Artist'] != NULL && $song['Title'] != NULL) { ?>
		<? $sngtm = convertSecs($song['Time']); $songtime = ($sngtm[0] ? $sngtm[0].':' : '').$sngtm[1].':'.$sngtm[2]; ?>
		<? if((CURRENTID-5) == $song['Id']) { ?> 
		
		<p>
			<a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">x</a>
			<a href="?a=start&amp;id=<?=$song['Pos']?>" name="current">
				<?=$song['Artist']?> - <?=$song['Title']?> <span class="label">(<?=$songtime?>)</span> 
			</a>
		</p>

		<? } elseif(CURRENTID == $song['Id']) { ?>

		<p class="current songLine">
            <span class="marker">&nbsp;</span>
		    <a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">x</a>
			<a href="?a=start&amp;id=<?=$song['Pos']?>">
				<?=$song['Artist']?> - <?=$song['Title']?> <span class="label">(<?=$songtime?>)</span>
			</a>
		</p>	

		<? } else { ?>

		<p class="songLine">
			<a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">x</a>
			<a href="?a=start&amp;id=<?=$song['Pos']?>">
				<?=$song['Artist']?> - <?=$song['Title']?> <span class="label">(<?=$songtime?>)</span>
			</a>
		</p>

		<? } ?>
	<? } elseif($song['Name'] != NULL) { ?>
		<p class="songLine">
			<a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">x</a>
			<a href="?a=start&amp;id=<?=$song['Pos']?>">
				<?=$song['Name']?>
			</a>
		</p>
	<? } elseif($song['file'] != NULL) { ?>
		<p class="songLine">
			<a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">x</a>
			<a href="?a=start&amp;id=<?=$song['Pos']?>">
				<?=$song['file']?>
			</a>
		</p>
	<? } ?>
<? } ?>
</div>
<div style="float: right;" class="bottombar">
	<span class="ajaxOutput">
		<span id="outVolup">Vol ++</span>
		<span id="outVoldown">Vol --</span>
		<span id="outNext">Next song</span>
		<span id="outPrev">Previous song</span>
		<span id="outPause">Paused</span>
		<span id="outPlay">Play</span>
	</span>
	Status: <?if($status != 'stopped'): ?><a href="#current"><?=$status?></a><? else: echo $status; endif;?> | Songs: <?=$mpd->playlist_count?> | Vol: <span id="currentvol"><?=$mpd->volume?></span>%
</div>
<div class="add">
	<form action="./" method="post">
		<input type="text" name="toadd" onclick="if(this.value=='Add dir or songs'){this.value='';}" onblur="if(this.value==''){this.value='Add dir or songs';}" value="Add dir or songs" /> <a href="?a=clearpl" title="Clear playlist"><img src="media/icons/table_row_delete.png" alt="Clear Playlist" /></a>
	</form>
</div>

