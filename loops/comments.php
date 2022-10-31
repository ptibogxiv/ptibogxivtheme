<?php

// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
  die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
  <div class="alert alert-warning">
    <?php _e('This post is password protected. Enter the password to view comments.', 'ptibogxivtheme'); ?>
  </div>
<?php
  return;
}
// End do not delete section

if (have_comments()) : ?>

<ol class="commentlist">
  <?php wp_list_comments('type=comment&callback=ptibogxivtheme_comment');?>
</ol>

<p class="text-muted">
  <?php paginate_comments_links(); ?>
</p>

<?php
  else :
	  if (comments_open()) :
      echo '<div class="alert alert-info" role="alert">' . __('Be the first to write a comment.', 'ptibogxivtheme') . '</div>';
		else :
	    echo '<div class="alert alert-alert" role="alert">' . __('Comments are closed.', 'ptibogxivtheme') . "</div>";
		endif;
	endif;
?>

<?php if (comments_open()) : ?>
<section id="respond"><div class="card border-light <?php if(!get_theme_mod( 'ptibogxivtheme_shadowcontent' )): ?>shadow-lg<?php endif; ?>" style="<?php echo ptibogxivtheme_gradient(); ?>"><div class="card-body">
  <h3><?php comment_form_title(__('Comment', 'ptibogxivtheme'), __('Responses to %s', 'ptibogxivtheme')); ?></h3>
  <p><?php cancel_comment_reply_link(); ?></p>
  <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
  <p><?php if (get_option('doliloginmodal')=='1') {       
printf(__('You must be <a href="#" data-bs-toggle="modal" data-bs-target="#DoliconnectLogin">logged in</a> to post a comment.', 'ptibogxivtheme'));
} else {printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'ptibogxivtheme'), wp_login_url(get_permalink()).'?redirect_to='.get_permalink());} ?></p>
  <?php else : ?>
  <form action="<?php echo site_url('/wp-comments-post.php') ?>" method="post" id="commentform"> 
    <?php if (is_user_logged_in()) : ?>
    <p>
      <?php if (function_exists('doliconnecturl')) {printf(__('Logged in as', 'ptibogxivtheme') . ' <a href="'.doliconnecturl('doliaccount').'" >'.$user_identity.'</a>.'); } 
      else {printf(__('Logged in as', 'ptibogxivtheme') . ' <a href="%s/wp-admin/profile.php">%s</a>.', get_option('url'), $user_identity);} ?>
    <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'ptibogxivtheme'); ?>"><?php echo __('Logout', 'ptibogxivtheme') . ' <i class="fas fa-sign-out-alt fa-fw"></i>'; ?></a>
    </p>
    <?php else : ?>
    <div class="form-group">
      <label for="author"><?php _e('Your name', 'ptibogxivtheme'); if ($req) echo ' <span class="text-muted">' . __('(required)', 'ptibogxivtheme') . '</span>'; ?></label>
      <input type="text" class="form-control" name="author" id="author" placeholder="<?php _e('Your name', 'ptibogxivtheme'); ?>" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true" required'; ?>>
    </div>
    <div class="form-group">
      <label for="email"><?php _e('Your email address', 'ptibogxivtheme'); if ($req) echo ' <span class="text-muted">' . _e('(required, but will not be published)', 'ptibogxivtheme') . '</span>'; ?></label>
      <input type="email" class="form-control" name="email" id="email" placeholder="<?php _e('Your email address', 'ptibogxivtheme'); ?>" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true" required'; ?>>
    </div>
    <div class="form-group">
      <label for="url"><?php echo __('Your website', 'ptibogxivtheme') . ' <span class="text-muted">' . __('if you have one (not required)', 'ptibogxivtheme') . '</span>'; ?></label>
      <input type="url" class="form-control" name="url" id="url" placeholder="<?php _e('Your website url', 'ptibogxivtheme'); ?>" value="<?php echo esc_attr($comment_author_url); ?>">
    </div>
    <?php endif; ?>
    <div class="form-floating mb-2">
      <textarea name="comment" class="form-control" id="comment" placeholder="<?php _e('Your comment', 'ptibogxivtheme'); ?>" style="height: 150px" aria-required="true" required></textarea>
      <label for="comment"><?php _e('Your comment', 'ptibogxivtheme'); ?></label>
    </div>
    <div class="d-grid gap-2"><input name="submit" class="btn btn-secondary" type="submit" id="submit" value="<?php _e('Submit comment', 'ptibogxivtheme'); ?>"></div>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; ?></div></div>
</section>
<?php endif; ?>
