<? if($status != 'stopped') { ?>
<p><span class="label">Current:</span> <?=CURRENTARTIST ?> - <?=CURRENTTRACK?> (<?=CURRENTTIME?>/<?=CURRENTLENGTH?>)</p>
<? } ?>

<div class="playlist">
<? foreach($mpd->playlist as $song) { ?>
	<? if($song['Artist'] != NULL && $song['Title'] != NULL) { ?>
		<? if((CURRENTID-5) == $song['Id']) { ?> 

		<p>
			<a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">
				x<!--<img src="media/icons/bullet_red.png" alt="remove" />-->
			</a>
			<a href="?a=start&amp;id=<?=$song['Id']?>" name="current">
				<?=$song['Artist']?> - <?=$song['Title']?> <span class="label">(<?=date('i:s', $song['Time'])?>)</span> 
			</a>
		</p>

		<? } elseif(CURRENTID == $song['Id']) { ?>

		<p class="current">
                	<span class="marker">
				&nbsp;
			</span>
		        <a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">
                                x<!--<img src="media/icons/bullet_red.png" alt="remove" />-->
                        </a>

			<a href="?a=start&amp;id=<?=$song['Id']?>">
				<?=$song['Artist']?> - <?=$song['Title']?> <span class="label">(<?=date('i:s', $song['Time'])?>)</span>
			</a>
		</p>	

		<? } else { ?>

		<p>
			<a href="?a=remove&amp;id=<?=$song['Id']?>" title="Remove this song" class="removeid">
                                x<!--<img src="media/icons/bullet_red.png" alt="remove" />-->
                        </a>
			<a href="?a=start&amp;id=<?=$song['Id']?>">
				<?=$song['Artist']?> - <?=$song['Title']?> <span class="label">(<?=date('i:s', $song['Time'])?>)</span>
			</a>
		</p>

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
