<div class="hcd hcd--shrink hcd--grow-lg hcd--grid"<?php scrollmagic('"class":"hcd--active","duration":0,"triggerHook":0.5'); ?>>
	<?php if(have_rows('elements')) : ?>
	<div class="hcd__cell hcd__cell--s6 hcd__cell--svg">
	<svg class="hcd__svg" viewBox="0 0 546 662">
		<symbol id="man" viewBox="0 0 290 680">
			<path fill="#282828" d="M178.9,136.5c22.9-12.2,38.6-36.3,38.6-64C217.5,32.4,185,0,145,0S72.5,32.4,72.5,72.5c0,27.8,15.6,51.9,38.6,64
	c-63.7,10-111,47.4-111,92c0,12.9,11.1,120.7,11.1,120.7c0,32.2,24.5,59,55.7,62.7l11.1,204.8c0,34.8,17.3,63.2,52.1,63.2h29.7
	c34.8,0,52.1-28.4,52.1-63.2L223,412c31.3-3.7,55.7-30.5,55.7-62.7c0,0,11.1-107.8,11.1-120.7C289.9,183.8,242.5,146.5,178.9,136.5z
	"/> 
	  	</symbol>
		<?php $e = 0; while(have_rows('elements')) : the_row('elements'); ?>
		<g class="hcd__group<?php echo ($e==0) ? ' hcd__group--active' : ''; ?>" data-element="<?php echo $e; ?>">
			<?php
				if($e <=3) {
					if($e <= 1) {
						$angle = ($e%2==0) ? 0 : 1;
					} else {
						$angle = ($e%2==0) ? 1 : 0;
					}
					
					$x = ($e%2==0) ? 140 : 546-140;
					$y = ($e>1) ? 610-165 : 165;
					$path = 'M'.$x.','.($y + 26).' A180,180,0 0 '.$angle.' 273,305';
				}
				if($e > 3 && $e <=7) {
					if($e <= 5) {
						$angle = ($e%2==0) ? 0 : 1;
					} else {
						$angle = ($e%2==0) ? 1 : 0;
					}	
					$x = ($e%2==0) ? 75 : 546-75;
					$y = ($e>5) ? 610-95 : 95;
					$path = 'M'.$x.','.($y + 26).' A200,220,0 0 '.$angle.' 273,305';
				}
				if($e > 7) {
					if($e == 8 || $e == 12) {
						$x = 0;
					}
					if($e == 9 || $e == 13) {
						$x = 195;
					}
					if($e == 10 || $e == 14) {
						$x = 546-195;
					}
					if($e == 11 || $e == 15) {
						$x = 546;
					}
					if($e < 10) {
						$angle = 0;
					}
					if($e >= 10 && $e < 12) {
						$angle = 1;
					}

					if($e >= 12 && $e < 14) {
						$angle = 1;
					}

					if($e >= 14 && $e <=15) {
						$angle = 0;
					}
					if($e > 8 && $e < 11) {
						$arc = 450;
					} elseif ($e > 12 && $e < 15) {
						$arc = 450;
					} else {
						$arc = 300;
					}

					$y = ($e>11) ? 610 : 0;
					$path = 'M'.$x.','.($y + 26).' A280,'.$arc.',0 0 '.$angle.' 273,305';
				}
			?>
			<text data-item="<?php echo $e; ?>" fill="<?php the_sub_field('colore'); ?>" class="hcd__text" text-anchor="middle" x="<?php echo $x; ?>" y="<?php 
			$plus = 20;
			if($e < 2) {
				$plus = -10;
			}
			if ($e > 3 && $e < 6) {
				$plus = -10;
			} 
			if ($e > 7 && $e < 12) {
				$plus = -10;
			}
			echo $y + 26 + $plus; ?>">
				<?php the_sub_field('nome'); ?>
			</text>
			<path data-item="<?php echo $e; ?>" class="hcd__path" d="<?php echo $path; ?>" fill="none" stroke="<?php the_sub_field('colore'); ?>"/>
			<circle data-item="<?php echo $e; ?>" r="4" cx="<?php echo $x; ?>" cy="<?php echo $y + 26; ?>" fill="<?php the_sub_field('colore'); ?>" />

		</g>
		<?php $e++; endwhile; ?>
		<use xlink:href="#man" width="28" height="70" x="259" y="<?php echo 305-35; ?>" />
	</svg>
	</div>
	<div class="hcd__cell hcd__cell--s6 hcd__cell--shrink hcd__cell--grow-lg">
		<header class="hcd__header hcd__header--shrink hcd__header--grow-md-top">
		<h2 class="hcd__title hcd__title--small-upper"><?php _e('Human-centred design'); ?></h2>
		</header>
		<div class="hcd__slider">
			<?php while(have_rows('elements')) : the_row('elements'); ?>
			<div class="hcd__item hcd__item--shrink">
				<h3 class="hcd__title hcd__title--big-upper"><strong><?php the_sub_field('nome'); ?></strong></h3>
				<div class="hcd__content">
					<?php the_sub_field('contenuto'); ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<nav class="arrows">
			<i class="icon-arrow arrows__prev"></i>
			<i class="icon-arrow arrows__next"></i>
		</nav>
	</div>
	<?php endif; ?>
</div>