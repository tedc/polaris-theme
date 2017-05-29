<aside class="aside aside--left"<?php scrollmagic('"class":"aside--sticky","triggerElement":".footer","triggerHook":1,"duration":0'); ?>>
    <span class="scroll scroll--upper scroll--down" <?php scrollmagic('"tween":{"autoAlpha":false},"triggerHook":1,"duration":0,"triggerElement":".footer","offset":-20'); ?>><i class="icon-arrow"></i><?php _e('Scroll', 'polaris'); ?></span>
    <span class="scroll scroll--upper scroll--up" data-scroll-to="#header"<?php scrollmagic('"tween":{"autoAlpha":true},"triggerHook":1,"duration":0,"triggerElement":".footer","offset":-20'); ?>><?php _e('Top', 'polaris'); ?><i class="icon-arrow"></i></span>
</aside>
<aside class="aside aside--right"<?php scrollmagic('"class":"aside--sticky","triggerElement":".footer","triggerHook":1,"duration":0');?>>
    <?php get_template_part( 'templates/social' ); ?>
</aside>