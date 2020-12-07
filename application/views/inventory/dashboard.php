 <?php echo form_open('inventory/add_items'); ?>
 <form data-abide novalidate>
   <div data-abide-error class="alert callout" style="display: none;">
     <p><i class="fi-alert"></i> There are some errors in your form.</p>
   </div>
   <div class="grid-container">
     <div class="grid-x grid-margin-x">
       <div class="cell small-12">
         <label>Field Required
           <input type="text" placeholder="type some text here" aria-describedby="example1Hint1" aria-errormessage="example1Error1" required>
           <span class="form-error">
             Yo, you had better fill this out, it's required.
           </span>
         </label>
         <p class="help-text" id="example1Hint1">Here's how you use this input field!</p>
       </div>
     </div>
   </div>
   <div class="grid-container">
     <div class="grid-x grid-margin-x">
       <fieldset class="cell large-6">
         <button class="button" type="submit" value="Submit">Submit</button>
       </fieldset>
       <fieldset class="cell large-6">
         <button class="button" type="reset" value="Reset">Reset</button>
       </fieldset>
     </div>
   </div>
 </form>