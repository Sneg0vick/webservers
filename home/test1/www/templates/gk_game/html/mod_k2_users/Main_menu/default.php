<?php
/**
 * @version    2.7.x
 * @package    K2
 * @author     JoomlaWorks http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2016 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Add a reference to a CSS file
// The default path is 'media/system/css/'
//JHTML::stylesheet(rl.css, 'templates/gk_game/css/');
$document =& JFactory::getDocument();
$document->addStyleSheet("/templates/gk_game/css/rl.css",'text/css',"screen");
?>
<style type="text/css">

ul.colls { margin: 0; padding: 0; list-style-type: none; word-spacing: -1ex; }
/* 
    Firefox ниже версии 3 не знает о inline-block.
    Поэтому указываем для него -moz-inline-stack
*/
.colls li { display: -moz-inline-stack; display: inline-block; //display: inline; }
/*
    Чтобы ссылки не нажимались кликом
    по пустому месту, применим фильтр
*/
.colls a, .colls b { display: inline; word-spacing: normal; //display: inline-block; //filter: alpha(opacity=100); }
.colls a, .colls b, x:-moz-any-link { display:block; }
/*
    Если Firefox выше 2.0, Возвращаем a и b в inline
*/
.colls a, .colls b, x:-moz-any-link, x:default { display: inline; }
.colls li, .colls a, .colls b { vertical-align: top; }

/* customize */
.colls li { margin: 0 10% 0.4em 0; //margin: 0; width: 40%; //width: auto; }
.colls a, .colls b { //margin: 0 10% 0.4em 0; //width: 40%; }
.colls ul { width: 100%; }

</style>


<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2UsersBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
	<ul class="colls" id="colls2">
		<?php foreach($users as $key=>$user): ?>
		<li class="<?php echo ($key%2) ? "odd" : "even"; if(count($users)==$key+1) echo ' lastItem'; ?>">
			<div>
			<?php if($userAvatar && !empty($user->avatar)): ?>
			<a class="k2Avatar ubUserAvatar" rel="author" href="<?php echo $user->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>">
				<img src="<?php echo $user->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>" style="width:<?php echo $avatarWidth; ?>px;height:auto;" />
			</a>
			<?php endif; ?>

			<?php if($userName): ?>
			<a class="ubUserName" rel="author" href="<?php echo $user->link; ?>" style="width:100px" title="<?php echo K2HelperUtilities::cleanHtml($user->name); ?>">
				<?php echo $user->name; ?>
			</a>
			</div>
			<?php endif; ?>

			<?php if($userDescription && $user->description): ?>
			<div class="ubUserDescription">
				<?php if($userDescriptionWordLimit): ?>
				<?php echo K2HelperUtilities::wordLimit($user->description, $userDescriptionWordLimit) ?>
				<?php else: ?>
				<?php echo $user->description; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php if($userFeed || ($userURL && $user->url) || $userEmail): ?>
			<div class="ubUserAdditionalInfo">

				<?php if($userFeed): ?>
				<!-- RSS feed icon -->
				<a class="ubUserFeedIcon" href="<?php echo $user->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_USERS_RSS_FEED'); ?>">
					<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_USERS_RSS_FEED'); ?></span>
				</a>
				<?php endif; ?>

				<?php if($userURL && $user->url): ?>
				<a class="ubUserURL" rel="me" href="<?php echo $user->url; ?>" title="<?php echo JText::_('K2_WEBSITE'); ?>" target="_blank">
					<span><?php echo JText::_('K2_WEBSITE'); ?></span>
				</a>
				<?php endif; ?>

				<?php if($userEmail): ?>
				<span class="ubUserEmail" title="<?php echo JText::_('K2_EMAIL'); ?>">
					<?php echo JHTML::_('Email.cloak', $user->email); ?>
				</span>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php if($userItemCount && count($user->items)): ?>
			<h3><?php echo JText::_('K2_RECENT_ITEMS'); ?></h3>
			<ul class="ubUserItems">
				<?php foreach ($user->items as $item): ?>
				<li>
					<a href="<?php echo $item->link; ?>" title="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>">
						<?php echo $item->title; ?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<div class="clr"></div>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
