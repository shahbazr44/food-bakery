<?php
  if ( post_password_required() )
      return;

 $get_author_id = get_current_user_id() ? get_current_user_id() : '';
 $get_author_gravatar = get_avatar_url($get_author_id);
 $image_id='';
 if($get_author_gravatar==''){
     $get_author_gravatar = trailingslashit(get_template_directory_uri()).'libs/images/no-user.png';
 }

$user = get_user_by( 'id', $get_author_id );
$user_name  = "";
 if(!empty($user)){

     $user_name   =   $user->display_name;

 }


  ?>


<?php if ( have_comments() ) : ?>
    <div class="res-blog2-commnt-area">
        <div class="heading-panel">
            <h3><?php echo esc_html__('Recent Reviews', 'foodzone'); ?></h3>
        </div>

        <?php   wp_list_comments( array( 'callback' => 'foodzone_custom_comments'));?>

    </div>

<?php endif;
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>


        <?php endif;
		   $user_identity = '';
		   $aria_req = ( $req ? " aria-required='true'" : '' );
		   $args = array(
               'fields' => apply_filters(
                   'comment_form_default_fields', array(
                       'author' =>'
					<div class="row theme-row">
					<div class="col-lg-6">
					<div class="form-group">
					<label for="author">'. esc_html__( 'Your Name','foodzone' ) . ( $req ? '<span class="required">*</span>' : '' )  .' </label>
					<span class="wrap">
					<input type="text" id="author" name="author" class="form-control" value="' .
                           esc_attr( $commenter['comment_author'] ) . '" '. $aria_req . '>
					</span></div></div>',
                       'email'  => '
					<div class="col-lg-6">
					<div class="form-group">
					<label for="email">'. esc_html__( 'Your Email', 'foodzone' ) . ( $req ? '<span class="required">*</span>' : '' ). '</label>
					<span class="wrap">
					<input type="text" id="email" name="email" class="form-control" ' . $aria_req .' value="' . esc_attr(  $commenter['comment_author_email'] ) .'"></span></div></div></div>',
                    'number' =>'
                    <div class="row theme-row">
                     <div class="col-lg-12">
                     <div class="form-group">
                     <label for="numbers">'. esc_html__( 'Your Number','foodzone' ) . ( $req ? '<span class="required">*</span>' : '' )  .' </label>
                     <span class="wrap">
					<input type="text" id="number" name="numbers" class="form-control" value="' .
                        esc_attr( $commenter['comment_author'] ) . '" '. $aria_req . '>
					</span>
					</div>
                     </div>
                    </div>'
                   )
               ),

               'comment_field' => '
			   <div class="theme-row">
			   <div class="col-lg-12">
                     <div class="form-group">
					<label for="comment">'. esc_html__( 'Your Comment', 'foodzone' ) .'</label>
					<span class="wrap">
						<textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
					</span>
			   </div></div></div>',

               'comment_notes_after' => '',
               'comment_notes_before' => '',
               'logged_in_as' => '<p>'. sprintf(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">%4$s</a>','foodzone' ),admin_url( 'profile.php' ),$user_name,wp_logout_url( apply_filters( 'the_permalink', get_permalink())) ,esc_html__('Log out','foodzone')) . '</p>',
               'title_reply' => '',
               'class_submit' => 'btn btn-theme',
               'label_submit' => esc_html__('Post Comment','foodzone'),


           );
		  if (!comments_open())
          {
          }
          else
          {
              ?>



          </form>
              <div class="res-post-comment">
                  <div class="heading-panel">

                      <h3><?php echo esc_html__('Post Your Commment', 'foodzone'); ?></h3>
                  </div>
                  <?php
                  comment_form($args);
                  ?>
              </div>
              <?php
          }
		  ?>




