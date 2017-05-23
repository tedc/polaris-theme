<?php
	$row = 0;
	while(have_rows('layout')) :
		the_row();
		include(locate_template( 'builder/' .get_row_layout() .'.php', false, true ));
	$row++;
	endwhile;
?>