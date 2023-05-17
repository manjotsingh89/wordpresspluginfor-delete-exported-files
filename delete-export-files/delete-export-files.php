<?php

/*
Plugin Name:  Delete Export Files by Manjot Singh
Plugin URI:   https://www.wordpress.com 
Description:  A plugin to control the server resources & delete the unwanted export files. 
Version:      1.0
Author:       Manjot 
Author URI:   https://www.wordpress.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

 

function delete_custom_plugin_register_settings() {

    register_setting('delete_custom_plugin_options_group', 'delete_account_type');
    register_setting('delete_custom_plugin_options_group', 'delete_duration');
     register_setting('delete_custom_plugin_options_group', 'delete_status');
 
    
}




add_action('admin_init', 'delete_custom_plugin_register_settings');



function delete_export_files_plugin_setting_page() {
 
   add_options_page('Delete Export Files Plugin', 'Delete Export Files Setting', 'manage_options', 'delete-export-files', 'delete_custom_page_html_form');
  
}

add_action('admin_menu', 'delete_export_files_plugin_setting_page');



function delete_custom_page_html_form() { ?>
    <div class="wrap">
        <h2>Delete Export Files Plugin</h2><br>
        <form method="post" action="options.php">
            <?php settings_fields('delete_custom_plugin_options_group'); ?>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <style>
      textarea
      {
          height:250px !important;
      }
      
  </style>
  
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Plugin Settings</a></li>
  
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
   <table class="form-table">
                <tr>
                    <th><label for="first_field_id">Duration (in months):</label></th>
                    <td>
                        <select  class="form-control" id="delete_duration" name="delete_duration">
<?php $month = ["1", "3", "6"];?>

<?php foreach($month as $v){?>
<option <?php if(get_option('delete_duration')==$v){?>selected<?php }?> value="<?php echo $v;?>"><?php echo $v;?> Months</option>
<?php }?>

</select>
 
</td>
                </tr>

           
                
                
                  <tr>
                    <th><label for="third_field_id">Account Type:</label></th>
                    <td>
                        <input type='radio' class="regular-text" id="delete_account_type" name="delete_account_type" value="1" <?php if(get_option('delete_account_type')=='1'){?>checked<?php }?>> Active Users 
                        
                         <input type='radio' class="regular-text" id="delete_account_type" name="delete_account_type" value="0"  <?php if(get_option('delete_account_type')=='0'){?>checked<?php }?>> Cancelled Users
                        
                        
                        
                      

                        
                    </td>
                </tr>
                
                
                  <tr>
                    <th><label for="third_field_id">Plugin Status:</label></th>
                    <td>
                        <input type='radio' class="regular-text" id="delete_status" name="delete_status" value="1" <?php if(get_option('delete_status')=='1'){?>checked<?php }?>> Active 
                        
                         <input type='radio' class="regular-text" id="delete_status" name="delete_status" value="0"  <?php if(get_option('delete_status')=='0'){?>checked<?php }?>> Not Active 
                        
                        
                        
                      

                        
                    </td>
                </tr>
                
                
                
                
                
                
                
                
                
            </table>
  </div>
  
  
</div>


            

            <?php submit_button(); ?>
    </div>
<?php } ?>