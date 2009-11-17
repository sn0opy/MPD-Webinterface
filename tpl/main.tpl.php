<? if($status != 'stopped') { ?>
<p><span class="label">Current:</span> <?=CURRENTARTIST ?> - <?=CURRENTTRACK?></p>
<? } ?>

<div class="playlist">
<? foreach($mpd->playlist as $song) { ?>
	<? if($song['Artist'] != NULL && $song['Title'] != NULL) { ?>
		<? if((CURRENTID-5) == $song['Id']) { ?> 
		<p><a href="?a=start&amp;id=<?=$song['Id']?>" name="current"><?=$song['Artist']?> - <?=$song['Title']?> <span class="removeid"><a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song"><img src="media/icons/cross.png" alt="remove" /></a></span></a></p>
		<? } elseif(CURRENTID == $song['Id']) { ?>
		<span style="padding: 2px; float: left; display: block; width: 1px; background: #B3D9FF; margin-right:10px;">&nbsp;</span><p class="current"><a href="?a=start&amp;id=<?=$song['Id']?>" title="Album: <?=$song['Album']?>"><?=$song['Artist']?> - <?=$song['Title']?> <span class="removeid"><a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song"><img src="media/icons/cross.png" alt="remove" /></a></span></a></p>	
		<? } else { ?>
		<p><a href="?a=start&amp;id=<?=$song['Id']?>" title="Album: <?=$song['Album']?>"><?=$song['Artist']?> - <?=$song['Title']?> <span class="removeid"><a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song"><img src="media/icons/cross.png" alt="remove" /></a></span></a></p>
		<? } ?>
	<? } ?>
<? } ?>
</div>
<div style="float: right;">Status: <?=$status?> | Songs: <?=$mpd->playlist_count?></div>
<div class="add">
	<form action="./" method="post">
		<input type="text" name="toadd" onclick="if(this.value=='Add dir or songs'){this.value='';}" onblur="if(this.value==''){this.value='Add dir or songs';}" value="Add dir or songs" /> <a href="?a=clearpl" title="Clear playlist"><img src="media/icons/table_row_delete.png" alt="Clear Playlist" /></a>
	</form>
</div>
