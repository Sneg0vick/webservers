<?php

// No direct access.
defined('_JEXEC') or die;

?>

<footer id="gkFooter">
     <div class="gkPage">
          <?php if($this->API->modules('footer_nav')) : ?>
          <div id="gkFooterNav">
               <jdoc:include type="modules" name="footer_nav" style="<?php echo $this->module_styles['footer_nav']; ?>" modnum="<?php echo $this->API->modules('footer_nav'); ?>" />
          </div>
          <?php endif; ?>
          <?php if($this->API->get('copyrights', '') !== '') : ?>
          <p id="gkCopyrights">
               <!--?php echo $this->API->get('copyrights', ''); ?-->
          </p>
          <?php else : ?>
          <?php
    $app    = JFactory::getApplication();
    $menu   = $app->getMenu();
    $lang   = JFactory::getLanguage();
    if ($menu->getActive() == $menu->getDefault($lang->getTag())) : 
?>
          <?php else : ?>
          <?php endif; ?>
          <?php endif; ?>
          <?php if($this->API->get('stylearea', '0') == '1') : ?>
          <?php endif; ?>
          <?php if($this->API->get('framework_logo', '0') == '1') : ?>
          <?php endif; ?>
     </div>
</footer>
