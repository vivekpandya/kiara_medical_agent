<style type="text/css">
   i.icon-question-sign-modal {
   font-size: 18px;
   margin-top: 3.5px;
   }
   .icon-question-sign-modal:before {
   content: "\f059";
   }
</style>
<div class="panel-body pan">
   <form method="post" id="exportSettingFormData" enctype="multipart/form-data" class=" ng-pristine ng-valid">
      <input type="hidden" id="report_type" name="report_type" value="<?php echo $report_type; ?>">
      <input type="hidden" id="purpose" name="purpose" value="<?php echo $purpose; ?>">
      <input type="hidden" name="dcc_id" value="<?php echo $dcc_id; ?>">
      <input type="hidden" name="fps_id" id="fps_id" value="<?php echo $id; ?>">
      <fieldset>
         <div class="pop-12span">
            <?php if ($report_type != 'CLINICAL_MARS' && $report_type != 'CLINICAL_ADLS' && $report_type != 'CLINICAL_CAREPLAN' && $report_type != 'CLINICAL_CAREPLAN_CHECKLIST' && $report_type != 'CLINICAL_CUSTOM_CAREPLAN' && $report_type != 'CLINICAL_SPECIAL_CARE' && $report_type != 'ACTIVITY_ADLS' && $report_type != 'CLINICAL_SCHEDULE' && $report_type != 'ACTIVITY_NAME' && $report_type != "ACTIVITY_SCHEDULE" && $report_type != "FOOD_SERVED" && $report_type != "FOOD_SCHEDULE" && $report_type != "FOOD_DIET_PLAN" && $report_type != "FOOD_DIET_MENU" && $report_type != "ADMIN_FOOD" && $report_type != "ADMIN_NURSING" && $report_type != "ADMIN_ACTIVITY" && $report_type != "CLIENT_IMMUNIZATION" && $report_type != "CLIENT_NOTES" && $report_type != "CLIENT_CAREPLAN" && $report_type != "CLIENT_CAREPLAN_CHECKLIST" && $report_type != "CLIENT_CAREPLAN_CUSTOM" && $report_type != "CLIENT_ASSESSMENT" && $report_type != "CLIENT_IADL_ASSESSMENT" && $report_type != "CLIENT_VITAL" && $report_type != "CLIENT_MARS" && $report_type != "CLIENT_ADLS" && $report_type != "FACESHEET_CONTACTS" && $report_type != "FACESHEET_PHARMACIST" && $report_type != "FACESHEET_PHYSICIAN" && $report_type != "FACESHEET_ELIGIBILITY" && $report_type != "CLIENT_HOSPITALIZATION" && $report_type != "CLIENT_INCIDENT" && $report_type != "CLIENT_DOCUMENTS" && $report_type != "CLIENT_ORDERS" && $report_type != "CLIENT_ATTENDANCE" && $report_type != "REPORT_ACTIVITY_LOG" && $report_type != "REPORT_ADMISSION_CLINICAL_PRO_MISSING" && $report_type != "REPORT_ADMISSION_MISSING_NOTES" && $report_type != "USER_DOCUMENTS" && $report_type != "REPORT_SUSPENSION" && $report_type != "REPORT_REFERRAL_ADMITTED" && ($report_type == "CLIENT_INCIDENT" && $purpose == 'PRINT') ) { ?>
            <div class="row">
               <label><b>Report Sorting </b></label>
               <div class="span6" style="margin-left:0px;">
                  <label class="control-label">Sorting By :</label>
                  <select name="default_sorting" class="form-control">
                     <option value="">Select Sorting By</option>
                     <?php
                        if (!empty($export_settings)) {
                            foreach ($export_settings as $key => $value) {
                                if ($value->is_selected == 'YES') {
                        ?>
                     <option value="<?php echo $value->column_key; ?>" <?php
                        if ($value->column_key == $default_sorting) {
                            echo "selected";
                        }
                        ?>><?php echo $value->column_name; ?></option>
                     <?php
                        }
                        }
                        }
                        ?>
                  </select>
               </div>
               <div class="span6" style="margin-left:0px;">
                  <label class="control-label">Sorting Type :</label>
                  <select name="sorting_type" class="form-control">
                     <option value="ASC" <?php
                        if ($sorting_type == 'ASC') {
                            echo 'selected';
                        }
                        ?>>Ascending</option>
                     <option value="DESC" <?php
                        if ($sorting_type == 'DESC') {
                            echo 'selected';
                        }
                        ?>>Descending</option>
                  </select>
               </div>
            </div>
            <?php } ?>
            <?php if($purpose !='EXPORT' && $purpose != 'COLUMN'){ ?>
            <div class="row" style="margin-top: 10px;">
               <div class="span6" style="margin-left:0px;">
                  <label class="control-label">Page Setup :</label>
                  <select name="page_setup" id="page_setup" class="form-control">
                     <option value="A4" <?php
                        if ($page_setup == 'A4') {
                            echo 'selected';
                        }
                        ?>>A4</option>
                     <option value="A11" <?php
                        if ($page_setup == 'A11') {
                            echo 'selected';
                        }
                        ?>>A11</option>
                     <option value="A3" <?php
                        if ($page_setup == 'A3') {
                            echo 'selected';
                        }
                        ?>>A3</option>
                  </select>
               </div>
               <?php if($report_type == 'CARENOTE_ASSESSMENT' || $report_type == 'CLIENT_IADL_ASSESSMENT' || $report_type == 'CLIENT_BA_ASSESSMENT'){?>
               <div class="span6" style="margin-left:0px;">
                  <label class="control-label">Orientation :</label>
                  <select name="orientation" id="orientation" class="form-control">
                     <option value="Landscape" <?php
                        if ($orientation == 'Landscape') {
                            echo 'selected';
                        }
                        ?>>Landscape</option>
                     
                  </select>
               </div>
            <?php } else {?>
               <div class="span6" style="margin-left:0px;">
                  <label class="control-label">Orientation :</label>
                  <select name="orientation" id="orientation" class="form-control">
                     <option value="Landscape" <?php
                        if ($orientation == 'Landscape') {
                            echo 'selected';
                        }
                        ?>>Landscape</option>
                     <option value="Portrait" <?php
                        if ($orientation == 'Portrait') {
                            echo 'selected';
                        }
                        ?>>Portrait</option>
                  </select>
               </div>
            <?php }?>
            </div>
            <?php if($report_type == 'REPORT_CAREGIVER_PAYMENT'){?>
            <div class="row" style="margin-top: 10px;">
               <div class="span6" style="margin-left: 0px;">
                    <div class="control-group">
                        <label for="inputStatus" class="control-label">Email Setting</label>
                        <div class="controls">
                            <?php
                            $selected = "No";
                            if (isset($email_setting)) {
                                $selected = $email_setting;
                            }
                            ?>
                            <div class="input-append">
                                <label class="radio inline">
                                    <input name="email_setting" type="radio" <?php if ($selected === "Yes") { ?>checked="checked" <?php } ?> value="Yes"> Yes
                                </label>

                                <label class="radio inline">
                                    <input name="email_setting" type="radio" <?php if ($selected === "No") { ?>checked="checked" <?php } ?> value="No"> No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         <?php } ?>
            <div class="row" style="margin-top: 10px;">
               <div class="span6" style="margin-left:0px;">
                  <label for="int_date" class="control-label"><b>Report Print Settings:</b></label>
                  <div class="controls">
                     <div class="input-append">
                        <div class="span6" style="margin-left:0px;">
                           <label class="control-label" style="display:inline-block;">Header & Footer required:</label>
                           <label class="checkbox inline" style="padding-top:0px;">
                           <input type="checkbox" class="cen_export_columns checkbox1" name="hf_required" value="YES" <?php
                              if ($print_hf == 'YES') {
                                  echo 'checked';
                              }
                              ?> style="margin-left:0px;" /></label>
                        </div>
                     </div>
                  </div>
               </div>
               <?php if($report_type == 'REPORT_STIPEND_PAYMENT_RECORD'){?>
                  <div class="span6" style="margin-left:0px;">
                     <label class="control-label">Invoice Template :</label>
                     <select name="report_template" id="report_template" class="form-control">
                        <option value="Summary" <?php
                           if ($report_template == 'Summary') {
                               echo 'selected';
                           }
                           ?>>Summary</option>
                        <option value="Detail" <?php
                           if ($report_template == 'Detail') {
                               echo 'selected';
                           }
                           ?>>Detail</option>
                     </select>
                  </div>
               <?php } ?>
            </div>
            <div class="row">
               <div class="span12" style="margin-left:0px;">
                  <label class="control-label">Logo :</label>
                  <input name="logo" id="logo" class="form-control" type="file"><br />
                  <i style="font-size:12px;">(Image must be of size 100px * 100px)</i>
                  <?php
                     if (isset($logo) && !empty($logo)) {
                         echo "<br/><a href='" . base_url() . "uploads/form_print_logo/" . $id . "/" . $logo . "' title='Logo' target='_blank'>" . $logo . "</a> </span>";
                     }
                     ?>
                  <p id="p_fps_logo" class="error"></p>
               </div>
               
               <!-- <div class="span6">
                  <label class="control-label">Logo Alignment :</label>
                  <select name="logo_align" class="form-control">
                     <option value="left" <?php (isset($logo_align)&& $logo_align == 'left') ? 'selected' : ''; ?>>Left</option>
                     <option value="right" <?php (isset($logo_align)&& $logo_align == 'right') ? 'selected' : ''; ?>>Right</option>
                     <option value="center" <?php (isset($logo_align)&& $logo_align == 'center') ? 'selected' : ''; ?>>Center</option>
                 </select>
               </div> -->
            </div>
            <div class="row">
               <div class="span12" style="margin-left:0px;">
                  <label class="control-label">Header :</label>
                  <textarea id="header_description" placeholder="Header" rows="5" class="form-control ckeditor" name="header_description" style="background-color:#fff;width: 95%;"><?php echo isset($header_description) ? $header_description : ""; ?></textarea>
               </div>
            </div>
            <div class="row">
               <div class="span12" style="margin-left:0px;">
                  <label class="control-label">Footer :</label>
                  <textarea id="footer_description" placeholder="Footer" rows="5" class="form-control ckeditor" name="footer_description" style="background-color:#fff;width: 95%;"><?php echo isset($footer_description) ? $footer_description : ""; ?></textarea>
               </div>
            </div>
            <?php } ?>
            <?php if($report_type == 'CARENOTE_ASSESSMENT' && $purpose == 'PRINT'){?>
               <div class="row">
               <div class="span6 ml-0">
                 
                  <div class="controls">
                     <div class="input-append">
                        <div class="span12 ml-0" style="margin-left:0px;">
                           <label class="control-label" style="display:inline-block;text-align: left;font-weight: bold;">Client Info required for every page:</label>
                           <label class="checkbox inline" style="padding-top:0px;">
                           <input type="checkbox" class="cen_export_columns checkbox1" name="cli_info_required" value="YES" <?php
                              if ($print_cli_info == 'Yes') {
                                  echo 'checked';
                              }
                              ?> style="margin-left:0px;" /></label>
                        </div>
                     </div>
                  </div>
               </div>
               <?php 
               $show_required = getCareNoteSettingDataByID($dcc_id, 'caregiver_questions');
               if(isset($show_required) && $show_required->caregiver_questions == "Yes"){?>
               <div class="span6 ml-0">
                 
                  <div class="controls">
                     <div class="input-append">
                        <div class="span12 ml-0" style="margin-left:0px;">
                           <label class="control-label" style="display:inline-block;text-align: left;font-weight: bold;">Caregiver Questions:</label>
                           <label class="checkbox inline" style="padding-top:0px;">
                           <input type="checkbox" class="cen_export_columns checkbox1" name="caregiver_questions" value="YES" <?php
                              if ($print_caregiver_questions == 'Yes') {
                                  echo 'checked';
                              }
                              ?> style="margin-left:0px;" /></label>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
            <?php }

            if ($report_type == 'MARS_PROFILE'){
                  ?>
                  <br/><br/>
                  <div class="row">
                     <div class="span12 ml-0">
                        <div class="controls">
                           <div class="input-append">
                              <div class="span12 ml-0" style="margin-left:0px;">
                                 <label class="control-label" style="display:inline-block;text-align: left;font-weight: bold;">Show Profile Details:</label>
                                 <label class="checkbox inline" style="padding-top:0px;">
                                 <input type="checkbox" class="cen_export_columns checkbox1" name="profile_setting" value="YES" <?php
                                    if ($profile_setting == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> style="margin-left:0px;" /></label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="span12 ml-0">
                        <div class="controls">
                           <div class="input-append">
                              <div class="span12 ml-0" style="margin-left:0px;">
                                 <label class="control-label" style="display:inline-block;text-align: left;font-weight: bold;">Show Insulin Details:</label>
                                 <label class="checkbox inline" style="padding-top:0px;">
                                 <input type="checkbox" class="cen_export_columns checkbox1" name="insulin_setting" value="YES" <?php
                                    if ($insulin_setting == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> style="margin-left:0px;" /></label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="span12 ml-0">
                        <div class="controls">
                           <div class="input-append">
                              <div class="span12 ml-0" style="margin-left:0px;">
                                 <label class="control-label" style="display:inline-block;text-align: left;font-weight: bold;">Show Diagnosis Details:</label>
                                 <label class="checkbox inline" style="padding-top:0px;">
                                 <input type="checkbox" class="cen_export_columns checkbox1" name="diagnosis_setting" value="YES" <?php
                                    if ($diagnosis_setting == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> style="margin-left:0px;" /></label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="span12 ml-0">
                        <div class="controls">
                           <div class="input-append">
                              <div class="span12 ml-0" style="margin-left:0px;">
                                 <label class="control-label" style="display:inline-block;text-align: left;font-weight: bold;">Show Prior Auth Details (Payer Details):</label>
                                 <label class="checkbox inline" style="padding-top:0px;">
                                 <input type="checkbox" class="cen_export_columns checkbox1" name="payer_setting" value="YES" <?php
                                    if ($payer_setting == 'YES') {
                                        echo 'checked';
                                    }
                                    ?> style="margin-left:0px;" /></label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br/><br/>
                  <?php
               } 
            ?>
            <?php
               if ($report_type == 'CLINICAL_MARS' || $report_type == 'CLINICAL_ADLS' || $report_type == 'CLINICAL_CAREPLAN' || $report_type == 'CLINICAL_CAREPLAN_CHECKLIST' || $report_type == 'CLINICAL_CUSTOM_CAREPLAN' || $report_type == 'CLINICAL_SPECIAL_CARE' || $report_type == 'ACTIVITY_ADLS' || $report_type == 'CLINICAL_SCHEDULE' || $report_type == 'ACTIVITY_NAME' || $report_type == "ACTIVITY_SCHEDULE" || $report_type == "FOOD_SERVED" || $report_type == "FOOD_SCHEDULE" || $report_type == "FOOD_DIET_PLAN" || $report_type == "FOOD_DIET_MENU" || $report_type == "ADMIN_FOOD" || $report_type == "ADMIN_NURSING" || $report_type == "ADMIN_ACTIVITY" || $report_type == "CLIENT_IMMUNIZATION" || $report_type == "CLIENT_NOTES" || $report_type == "CLIENT_CAREPLAN" || $report_type == "CLIENT_CAREPLAN_CHECKLIST" || $report_type == "CLIENT_CAREPLAN_CUSTOM" || $report_type == "CLIENT_ASSESSMENT"  || $report_type == "CLIENT_VITAL" || $report_type == "CLIENT_MARS" || $report_type == "CLIENT_ADLS" || $report_type == "FACESHEET_CONTACTS" || $report_type == "FACESHEET_PHARMACIST" || $report_type == "FACESHEET_PHYSICIAN" || $report_type == "FACESHEET_ELIGIBILITY" || $report_type == "CLIENT_HOSPITALIZATION" || $report_type == "CLIENT_INCIDENT" || $report_type == "CLIENT_DOCUMENTS" ||  $report_type == "CLIENT_ORDERS" || $report_type == "CLIENT_ATTENDANCE" || $report_type == "REPORT_ACTIVITY_LOG" || $report_type == "REPORT_ADMISSION_CLINICAL_PRO_MISSING" || $report_type == "REPORT_ADMISSION_MISSING_NOTES" || $report_type == "REPORT_REFERRAL" || $report_type == "REPORT_WEEKLY_HRS" || $report_type == "REPORT_REFERRAL_ORGANIZATION" || $report_type == "REPORT_CLOSED_CASE" || $report_type == "REPORT_CASE_PROFILE" || ($report_type == "REPORT_DISCHARGE" && $purpose != 'COLUMN') || ($report_type == "REPORT_ADMISSION" && $purpose != 'COLUMN')) {
               } else {
               ?>
            <div class="row" style="margin-top: 10px;">
               <div class="span12" style="margin-left:0px;">
                   <?php if($report_type != 'MARS_PROFILE'){?>
                  <label for="int_date" class="control-label"><b>Report Column Labels:</b></label>
                   <?php } else { ?>
                     <label for="int_date" class="control-label"><b>Medication Details Column Label Settings:</b></label>
                   <?php }?>
                  <div class="controls">
                     <div class="input-append">
                        <table id="tblSrc" style="width:95%" class="table table-striped table-bordered">
                           <tr>
                              <th></th>
                              <th>Label name</th>
                              <th width="20%">Priority</th>
                           </tr>
                           <?php
                              $unique_column_key = array();
                              if (!empty($export_settings)) {
                                  foreach ($export_settings as $key => $value) {
                                      if (!in_array($value->unique_column_key, $unique_column_key)) {
                              ?>
                           <tr>
                              <?php
                                 if ($value->unique_column_key == "officeTime" || $value->unique_column_key == "overTime" || $value->unique_column_key == "onTime" || $value->unique_column_key == 'lateBy') {
                                 ?>
                              <td>
                                 <label class="checkbox inline">
                                 <input type="checkbox" class="tas_column_settings checkbox1" name="is_selected[<?php echo $value->setting_id; ?>]" value="YES" <?php     if ($value->is_selected == 'YES') {   echo 'checked';  }  ?> onclick="handleCheckbox(this, '<?php echo str_replace(' ', '_', $value->unique_column_key); ?>')" /></label>
                              </td>
                              <td><input type="text" name="column_name[<?php echo $value->setting_id; ?>]" style="width: 90%" value="<?php echo $value->column_name; ?>" required onkeyup="handleColumnNamebox(this, '<?php echo str_replace(' ', '_', $value->unique_column_key); ?>')"></td>
                              <td>
                                 <input type="text" class="form-control span1 tas_column_settings_p updatetextval1" name="priority[<?php echo $value->setting_id; ?>]" value="<?php echo $value->priority; ?>" onkeyup="handleTextbox(this, '<?php echo str_replace(' ', '_', $value->unique_column_key); ?>')" />
                                 &nbsp;
                                 <?php if($report_type == 'REPORT_STIPEND_PAYMENT_RECORD' && isset($value->instruction) && $value->instruction != ''){?>
                                 <i style="font-size:18px;cursor:pointer;" id="show-option" title="<?php echo (isset($value->instruction)) ? $value->instruction : '';?>" class="icon-question-sign-modal"></i>
                                 <?php } ?>
                              </td>
                              <?php
                                 } else {
                                 ?>
                              <td>
                                 <label class="checkbox inline">
                                 <input type="checkbox" class="tas_column_settings checkbox1" name="is_selected[<?php echo $value->setting_id; ?>]" value="YES" <?php  if ($value->is_selected == 'YES') {  echo 'checked';  }  ?> /></label>
                              </td>
                              <td><input type="text" name="column_name[<?php echo $value->setting_id; ?>]" style="width: 90%" value="<?php echo $value->column_name; ?>" required></td>
                              <td>
                                 <input type="text" class="form-control span1 tas_column_settings_p updatetextval1" name="priority[<?php echo $value->setting_id; ?>]" value="<?php echo $value->priority; ?>" />
                                 &nbsp;
                                 <?php if($report_type == 'REPORT_STIPEND_PAYMENT_RECORD' && isset($value->instruction) && $value->instruction != ''){?>
                                 <i style="font-size:18px;cursor:pointer;" id="show-option" title="<?php echo (isset($value->instruction)) ? $value->instruction : '';?>" class="icon-question-sign-modal"></i>
                                 <?php } ?>
                              </td>
                              <?php
                                 }
                                 ?>
                           </tr>
                           <?php
                              } else {
                              ?>
                           <tr style="display: none;">
                              <td>
                                 <label class="checkbox inline">
                                 <input type="checkbox" class="tas_column_settings checkbox1" name="is_selected[<?php echo $value->setting_id; ?>]" value="YES" <?php  if ($value->is_selected == 'YES') {   echo 'checked';  }  ?> id="<?php echo 'chk_' . str_replace(' ', '_', $value->unique_column_key); ?>" /></label>
                              </td>
                              <td><input type="text" name="column_name[<?php echo $value->setting_id; ?>]" value="<?php echo $value->column_name; ?>" required class="<?php echo 'cl_' . str_replace(' ', '_', $value->unique_column_key); ?>"></td>
                              <td>
                                 <input type="text" class="form-control span1 tas_column_settings_p updatetextval1" name="priority[<?php echo $value->setting_id; ?>]" value="<?php echo $value->priority; ?>" id="<?php echo 'pr_' . str_replace(' ', '_', $value->unique_column_key); ?>" />
                                 &nbsp;
                                 <?php if($report_type == 'REPORT_STIPEND_PAYMENT_RECORD' && isset($value->instruction) && $value->instruction != ''){?>
                                 <i style="font-size:18px;cursor:pointer;" id="show-option" title="<?php echo (isset($value->instruction)) ? $value->instruction : '';?>" class="icon-question-sign-modal"></i>
                                 <?php } ?>
                              </td>
                           </tr>
                           <?php
                              }
                              $unique_column_key[] = $value->unique_column_key;
                              }
                              }
                              ?>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?php } 
               ?>
         </div>
      </fieldset>
   </form>
</div>
<script>
   if ($("input[name='logo_setting']:checked").val() == "Y") {
       $("#logoaligndiv").show();
   }
   
   $('input[type=radio][name=logo_setting]').change(function() {
       var current_val = this.value;
       if (current_val == 'Y') {
           $("#logoaligndiv").show();
       } else {
           $("#logoaligndiv").hide();
       }
   });
   $("#show-option").tooltip({
           show: {
               effect: "slideDown",
               delay: 250
           }
       });
</script>
<script>
   //    $("#applyToallcheckin").click(function () {
   //        $(".tas_column_settings").prop('checked', $(this).prop('checked'));
   //        for (i = 1; i < 4; i++) {
   //            updatetextval(i);
   //        }
   //    });
   //
   //    $('.tas_column_settings').click(function () {
   //        if ($(".tas_column_settings").length == $(".tas_column_settings:checked").length) {
   //            $("#applyToallcheckin").prop("checked", true);
   //        } else {
   //            $("#applyToallcheckin").prop("checked", false);
   //        }
   //    });
   
   function updatetextval(id) {
       if ($(".checkbox" + id).prop('checked') == true) {
           $(".updatetextval" + id).attr('disabled', 'false');
           $(".updatetextval" + id).removeAttr("disabled");
       } else {
           $(".updatetextval" + id).attr("disabled", "disabled");
       }
   }
   
   $("document").ready(function() {
       $("#logo").change(function() {
           if (!isValid("logo", "", "validImageextension", "Allowed extensions for Logo are *.png, *.jpeg, *.jpg, *.gif, *.bmp")) {} else {
               validImagedimentionCheckIn("logo", function(sizeAttributes) {
                   if (sizeAttributes == 1) {
                       $('#p_fps_logo').show();
                       $('#p_fps_logo').html("Logo must be of size 100px * 100px");
                       $('#logo').focus();
                   } else {
                       $('#p_fps_logo').hide();
                       $('#p_fps_logo').html("");
                   }
               });
           }
       });
   });
   <?php if($purpose !='EXPORT' && $purpose != 'COLUMN'){ ?>
      CKEDITOR.replace('footer_description', {
          fullPage: false,
          allowedContent: true,
          enterMode: CKEDITOR.ENTER_BR
      });
      CKEDITOR.replace('header_description', {
          fullPage: false,
          allowedContent: true,
          enterMode: CKEDITOR.ENTER_BR
      });
   <?php } ?>
</script>