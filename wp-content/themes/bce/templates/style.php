<?php
/* 
Template Name: Style 
*/
get_header(); ?>
<section>
   <div class="container pt-5 wow custom-fadeInUp">
      <div class="big-number">0123456789</div>
      <div class="display">Display - The face of the moon was</div>
      <h1>H1 - The face of the moon was in shadow</h1>
      <h2>H2 - The face of the moon was in shadow</h2>
      <h3>H3 - The face of the moon was in shadow</h3>
      <h4>H4 - The face of the moon was in shadow</h4>
      <h5>H5 - The face of the moon was in shadow</h5>
      <h6>h6 - The face of the moon was in shadow</h6>
      <span class="text-22 d-block">Body 22 -  The face of the moon was in shadow</span>
      <span class="text-20 d-block">Body 20 -  The face of the moon was in shadow</span>
      <span class="text-18 d-block">Body 18 -  The face of the moon was in shadow</span>
      <span class="text-16 d-block">Body 16 -  The fa ce of the moon was in shadow</span>
      <span class="text-14 d-block">Body 14 -  The face of the moon was in shadow</span>
      <span class="text-12 d-block">Body 12 -  The face of the moon was in shadow</span>
      <br />
      <hr />
      <br />
      <h3>Listing</h3>
      <div class="row mb-5">
         <div class="col-md-6">
            <ul>
               <li>Smoke shops</li>
               <li>Dispensaries</li>
               <li>Liquor stores</li>
               <li>And other stores which just don’t make sense</li>
               <li>
                  #Parent Item
                  <ul>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                  </ul>
               </li>
               <li>
                  #Parent Item
                  <ol>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                  </ol>
               </li>
               <li>#Parent Item </li>
            </ul>
         </div>
         <div class="col-md-6">
            <ol>
               <li>#Parent Item </li>
               <li>#Parent Item
                  <ol>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                  </ol>
               </li>
               <li>#Parent Item
                  <ul>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                     <li>#Sub Item </li>
                  </ul>
               </li>
               <li>#Parent Item </li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-7">
         <p>Mi tincidunt elit, id quisque ligula ac diam, amet. Vel etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi, tellus tincidunt. At feugiat sapien varius id.</p>
         <p>Eget quis mi enim, leo lacinia pharetra, semper. Eget in volutpat mollis at volutpat lectus velit, sed auctor. Porttitor fames arcu quis fusce augue enim. Quis at habitant diam at. Suscipit tristique risus, at donec. In turpis vel et quam imperdiet. Ipsum molestie aliquet sodales id est ac volutpat. </p>
         </div>
      </div>
      <br />
      <hr />
      <br />
      <h3>Buttons</h3>
      <div class="row">
         <div class="col-4">
            <a href="javascript:;" class="btn btn-primary">Primary button</a>
         </div>
         <div class="col-4">
            <a href="javascript:;" class="btn btn-secondary">Secondary button</a>
         </div>
         <div class="col-4">
            <a href="#" class="btn btn-link">Primary link</a>
         </div>
         <br />
         <br />
      </div>
      <hr />
      
      <div class="p-3" style="background-color:#000;">
      <div class="row">
        <div class="col-4">
            <a href="javascript:;" class="btn btn-white">White button</a>
         </div>
         <div class="col-4">
            <a href="#" class="btn btn-link-white">White link</a>
         </div>
      </div>
      
    </div>
    
      <hr />
      <br /> 
      <h3>Small Buttons</h3>
      <div class="row">
         <div class="col-4">
            <a href="javascript:;" class="btn btn-primary btn-small">Primary button small</a>
         </div>
         <div class="col-4">
            <a href="javascript:;" class="btn btn-secondary btn-small">Secondary button small</a>
         </div>
         <div class="col-4 py-3" style="background-color:#000;">
            <a href="javascript:;" class="btn btn-white btn-small">White button small</a>
         </div>
         <br />
         <br />
      </div>
      <hr />
      <h3>Tag</h3>
      <div class="row">
         <div class="col-4">
            <a href="javascript:;" class="badge">Service/Industry Tag</a>
         </div>
         <div class="col-4">
            <a href="javascript:;" class="badge badge-small">Service/Industry Tag</a>
         </div>
         <div class="col-4">
            <a href="javascript:;" class="badge badge-fill">Remote Position</a>
         </div>
         <br />
         <br />
      </div>
      <hr />
      <br /> 
      <h3>Inputs</h3>
      <form>
         <div class="form-group">
            <div class="form-label">
               <input type="text" name="Label" class="form-control">
               <label>First Name</label>
            </div>
         </div>
         <div class="form-group">
            <div class="form-label">
               <input type="text" name="Label" class="form-control wpcf7-not-valid">
               <label>Last Name</label>
               <span class="wpcf7-not-valid-tip" aria-hidden="true">Sample error message</span>
            </div>
         </div>
         <div class="form-group">
            <div class="form-label">
               <textarea cols="40" rows="5" class="form-control"></textarea>
               <label>Message</label>
            </div>
         </div>
      </form>
      <br />
   </div>
</section>
<?php get_footer(); ?>
<script>
    document.body.classList.add("dark-header");
</script>
