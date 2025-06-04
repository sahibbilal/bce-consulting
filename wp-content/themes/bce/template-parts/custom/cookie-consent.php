<?php if ( get_field( 'cc_display', 'option' ) == 1 ) : ?> 
<?php $cc_policy_link = get_field( 'cc_policy_link', 'option' ); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
"palette": {
    "popup": {
    "background": "<?php the_field( 'cc_color_bkgd', 'option' ); ?>",
    "text": "<?php the_field( 'cc_color_text', 'option' ); ?>"
    },
    "button": {
    "background": "<?php the_field( 'cc_color_button_bkgd', 'option' ); ?>",
    "text": "<?php the_field( 'cc_color_button_text', 'option' ); ?>"
    }
},
"theme": "classic",
"position": "<?php the_field( 'cc_position', 'option' ); ?>",
"content": {
    "message": `<?php the_field( 'cc_message', 'option' ); ?>`,
    "dismiss": "<?php the_field( 'cc_button_label', 'option' ); ?>",
    "link": "",
    "href": ""
}
})});
</script>
<?php endif; ?>

<style>
	/* Cookie Consent */
.cc-window {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 500px;
    padding: 30px;
    text-align: left;
    border-radius: 10px;
    z-index: 999;
  }
  @media (max-width: 991px) {
    .cc-window {
      width: calc(100% - 20px);
      left: 10px;
      right: 10px;
      bottom: 10px;
    }
  }
  .cc-window.cc-invisible {
    display: none;
  }
  .cc-window .cc-message a,
  .cc-window .cc-message a.cc-link {
    color: #ffffff;
  }
  .cc-window .cc-compliance {
    text-align: center;
  }
  .cc-window a.cc-btn {
    display: block;
  }
</style>