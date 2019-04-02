<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';

$route['404_override'] = 'welcome/error';
$route['translate_uri_dashes'] = FALSE;
######################################################Login  user information #################################
$route['display_word']='login/home';
$route['login-rocess']='login/check_login';



################################################################################################################
$route['home']='welcome';
$route['run_id']='cron_file';
$route['user_dashboard_index']='login/user_dashboard';
$route['user_dashboard_final_index']='login/user_dashboard_final';










###########################################################################################################################
#
#													User Admin Controller
#
############################################################################################################################
$route['user-admin']='adminuser/user_admin';
$route['user-admin-home']='adminuser/user_admin_home';
##############################################################################################################################
########################################## ###################################################################################
#
#								Admin ( Create ,view ,update , delete, active , in active ) user 							 #
#
##############################################################################################################################
$route['admin-view-user']='adminuser/viewusers';
$route['admin-add-users']='adminuser/admin_add_users';
$route['admin-user-change_password/(:any)/(:any)']='adminuser/admin_user_change_password/$1/$2';
$route['admin-add-users-save-password']='adminuser/admin_add_users_save_password';
$route['admin-add-users-save']='adminuser/admin_add_users_save';
#################################################################################################################################
#################################################################################################################################
#
#								admin ( Create , view , update , delete, active / incative ) Project							#
#
#################################################################################################################################
$route['admin-view-project']='adminuser/viewproject';
$route['admin-view-project-closed']='adminuser/viewproject_closed';
$route['admin-add-project']='adminuser/admin_add_projects';
$route['get-check-job-code-information']='adminuser/ajax_job_code';
$route['admin-add-project-save']='adminuser/admin_add_project_save';
$route['admin-project-view-details/(:any)/(:any)']="adminuser/admin_view_project_details/$1/$2";
$route['admin-project-view-details-complete/(:any)/(:any)']="adminuser/admin_view_project_details_comp/$1/$2";
$route['remove-users-delete-project/(:any)/(:any)/(:any)/(:any)']="adminuser/admin_remove_users_delete_project/$1/$2/$3/$4";
$route['admin-assign-user-project/(:any)/(:any)/(:any)/(:any)']="adminuser/admin_add_assign_user_project/$1/$2/$3/$4";
$route['admin-add-assign-userto_project']='adminuser/admin_add_assign_userto_project';
$route['admin-edit-user-project/(:any)/(:any)/(:any)']='adminuser/admin_edit_user_project/$1/$2/$3';// not completed

#################################################################################################################################
#
#								ADMIN(SECTION CREATE VIEW ACTIVE INACTIVE EDIT DELETE)
#
######################################################################################################################################
$route['admin-view-section']='adminuser/admin_view_section';
$route['admin-add-section']='adminuser/admin_add_section';
$route['admin-add-section-save']='adminuser/admin_add_section_save';
$route['change-section-status/(:any)/(:any)/(:any)']='adminuser/admin_change_status_section/$1/$2/$3';
$route['edit-section-info/(:any)/(:any)']='adminuser/admin_edit_section_info/$1/$2';
$route['admin-edit-section-save']='adminuser/admin_edit_section_save';
######################################################################################################################################
#
#								Admin Create activity edit delete activity change status
#
######################################################################################################################################
$route['admin-view-activity']='adminuser/admin_view_activity';
$route['admin-add-activity']='adminuser/admin_add_activity';
$route['admin-add-activity-save']='adminuser/admin_add_activity_save';
$route['change-activity-status/(:any)/(:any)/(:any)']='adminuser/admin_change_status_activity/$1/$2/$3';
$route['edit-activity-info/(:any)/(:any)']='adminuser/admin_edit_activity_info/$1/$2';
$route['admin-edit-activity-save']='adminuser/admin_edit_activity_save';
######################################################################################################################################
#
#							ADMIN CATEGORY SECTION (VIEW INSERT UPDATE DELETE STSTATUS)
#
######################################################################################################################################
$route['admin-view-category']='adminuser/admin_view_category';
$route['admin-add-category']='adminuser/admin_add_category';
$route['admin-add-category-save']='adminuser/admin_add_category_save';
$route['change-category-status/(:any)/(:any)/(:any)']='adminuser/admin_change_status_category/$1/$2/$3';
$route['edit-category-info/(:any)/(:any)']='adminuser/admin_edit_category_info/$1/$2';
$route['admin-edit-category-save']='adminuser/admin_edit_category_save';
#####################################################################################################################################
#
#										Admin  other charges edit delete create view status
#
#####################################################################################################################################
$route['admin-view-other-charges']='adminuser/admin_view_other_charges';
$route['admin-add-Other-charges']='adminuser/admin_add_Other_charges';
$route['admin-add-Other-charges-save']='adminuser/admin_add_Other_charges_save';
$route['change-Other-charges-status/(:any)/(:any)/(:any)']='adminuser/admin_change_status_Other_charges/$1/$2/$3';
$route['edit-Other-charges-info/(:any)/(:any)']='adminuser/admin_edit_Other_charges_info/$1/$2';
$route['admin-edit-other-charge-save']='adminuser/admin_edit_Other_charges_save';
######################################################################################################################################
#
# 											Admin material item create update delete view status
#
######################################################################################################################################
$route['admin-view-Material-Item']='adminuser/admin_view_Material_Item';
$route['admin-add-Material-Item']='adminuser/admin_add_Material_Item';
$route['admin-add-Material-Item-save']='adminuser/admin_add_Material_Item_save';
$route['admin-view-Material-Item-info/(:any)/(:any)']='adminuser/admin_view_Material_Item_info/$1/$2';
$route['edit-Material-Item-info/(:any)/(:any)']='adminuser/admin_edit_Material_Item_info/$1/$2';
$route['change-Material-Item-status/(:any)/(:any)/(:any)']='adminuser/admin_change_Material_Item_status/$1/$2/$3';
$route['admin-edit-Material-Item-save']='adminuser/admin_edit_Material_Item_save';
#####################################################################################################################################
#
# 											Admin vendor registration create edit view status add operation
#
#####################################################################################################################################
$route['admin-view-vendors']='adminuser/admin_view_vendors';
$route['admin-add-vendors']='adminuser/admin_new_vendors';
$route['admin-add-vendors-save']='adminuser/admin_new_vendors_save';
$route['admin-view-vendor-info/(:any)/(:any)']='adminuser/admin_view_vendors_info/$1/$2';
$route['change-vendor-status/(:any)/(:any)/(:any)']='adminuser/admin_change_vendor_status/$1/$2/$3';
$route['admin-edit-vendor-details/(:any)/(:any)']='adminuser/admin_admin_edit_vendor_details/$1/$2';
$route['admin-assign-vendor-operation/(:any)/(:any)']='adminuser/admin_assign_vendor_operation/$1/$2';
$route['admin-vendor-new-operation']='adminuser/admin_vendor_new_operation';
$route['admin-edit-vendor-save']='adminuser/admin_edit_vendor_save';

######################################################################################################################################
#
# admin Technical section create view edit status change
#
#####################################################################################################################################
$route['admin-view-technical-details']='adminuser/admin_view_technical_details';
$route['admin-add-Technical']='adminuser/admin_add_Technical';
$route['get-category-technical-material']='adminuser/admin_get_category_technical_material';
$route['admin-add-technical-save']='adminuser/admin_add_Technical_save';
$route['change-Technical-status/(:any)/(:any)/(:any)']='adminuser/admin_change_Technical_status/$1/$2/$3';
$route['admin-edit-Technical-info/(:any)/(:any)']='adminuser/admin_edit_Technical_info/$1/$2';
$route['admin-edit-technical-save']='adminuser/admin_edit_technical_save';

######################################################################################################################################
#
# 										Admin vehicle create update status delete
#
######################################################################################################################################
$route['admin-view-Vehicle-details']='adminuser/admin_view_Vehicle_details';
$route['admin-add-vehicle']='adminuser/admin_add_vehicle';
$route['admin-add-vehicle-save']='adminuser/admin_add_vehicle_save';
$route['admin-edit-vehicle-info/(:any)/(:any)']='adminuser/admin_edit_vehicle_info/$1/$2';
$route['admin-edit-vehicle-save']='adminuser/admin_edit_vehicle_save';
$route['change-vehicle-status/(:any)/(:any)/(:any)']='adminuser/admin_change_vehicle_status/$1/$2/$3';


// type of vehicle
$route['admin-view-Vehicle-type-details']='adminuser/admin_view_Vehicle_type_details';
$route['admin-add-vehicle-type']='adminuser/admin_add_vehicle_type';
$route['admin-add-vehicle-type-save']='adminuser/admin_add_vehicle_type_save';
$route['admin-edit-vehicle-type-save']='adminuser/admin_edit_vehicle_type_save';

$route['change-vehicle-type-status/(:any)/(:any)/(:any)']='adminuser/admin_change_vehicle_type_status/$1/$2/$3';

$route['check_vehicle_type_status']='adminuser/check_vehicle_type_status';

$route['admin-view-Vehicle-capacity-details']='adminuser/admin_view_Vehicle_capacity_details';
$route['admin-add-vehicle-capacity']='adminuser/admin_add_vehicle_capacity';
$route['admin-add-vehicle-capacity-save']='adminuser/admin_add_vehicle_capacity_save';
$route['admin-edit-vehicle-capacity-save']='adminuser/admin_edit_vehicle_capacity_save';
$route['change-vehicle-capacity-status/(:any)/(:any)/(:any)']='adminuser/admin_change_vehicle_capacity_status/$1/$2/$3';


######################################################################################################################################
#
#												Admin Location Information  entry update status
#
#####################################################################################################################################

$route['admin-view-location-details']='adminuser/admin_view_location_details';
$route['admin-add-Location']='adminuser/admin_add_location';
$route['admin-add-Location-save']='adminuser/admin_add_Location_save';
$route['change-Location-status/(:any)/(:any)/(:any)']='adminuser/admin_change_Location_status/$1/$2/$3';
######################################################################################################################################
#
#   Admin New Category and material name with technical description
#
######################################################################################################################################
$route['admin-excel-upload/entry']='adminuser/admin_add_new_category_material'; // here upload new material category list
$route['admin-view-new-material-list']='adminuser/admin_view_new_material_list'; //here only material list will be shown 
$route['admin-new-material-catergory/(:any)']='adminuser/admin_new_category_material/$1'; // here it create new category and material list
$route['admin-view-new-category-list']='adminuser/admin_view_new_category_list'; //here only category list will be shown
$route['admin-view-material-more/(:any)']='adminuser/admin_view_material_details_list/$1'; // single category material list
######################################################################################################################################
#
#                                                         BU Section starts here
#
######################################################################################################################################
$route['user-bu']='buuser_old/home';

#####################################################################################################################################
#
# 												New order book
#
#####################################################################################################################################
$route['bu-view-order-book']='buuser_old/bu_view_order_book';
$route['bu-add-new-order-book']='buuser_old/bu_add_new_order_book';
$route['bu-add-new-order-book-save']='buuser_old/bu_add_new_order_book_save';
$route['bu-job-code-desc']='buuser_old/bu_job_code_desc';
$route['bu-view-order-booked-info/(:any)/(:any)']='buuser_old/bu_view_order_booked_info/$1/$2';
$route['bu-edit-order-book/(:any)/(:any)']='buuser_old/bu_edit_order_book/$1/$2';
$route['bu-edit-new-order-book-save']='buuser_old/bu_edit_new_order_book_save';




######################################################################################################################################
#
#                                                         Design User Section
#
#####################################################################################################################################
$route['user-design-home']='designuser/home';

$route['design-view-design-plan']='designuser/design_view_design_plan';
$route['design-add-new-design-plan']='designuser/design_add_new_design_plan';
$route['design-add-new-design-plan-save']='designuser/design_add_new_design_plan_save';


$route['design-new-mr-order']='designuser/design_new_mr_order';
$route['design-add-new-mr-save']='designuser/design_add_new_mr_save';
// entry new information
$route['design-new-mr-order-first/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_first/$1/$2/$3'; //SCI
$route['design-new-mr-order-second/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_second/$1/$2/$3'; //MOI
$route['design-new-mr-order-third/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_third/$1/$2/$3';
// edit information of mr
$route['design-new-mr-order-first-edit/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_first_edit/$1/$2/$3'; //SCI
$route['design-new-mr-order-second-edit/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_second_edit/$1/$2/$3'; //MOI
$route['design-new-mr-order-third-edit/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_third_edit/$1/$2/$3';
// view information of mr
$route['design-new-mr-order-first-view/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_first_view/$1/$2/$3'; //SCI
$route['design-new-mr-order-second-view/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_second_view/$1/$2/$3'; //MOI
$route['design-new-mr-order-third-view/(:any)/(:any)/(:any)']='designuser/design_new_mr_order_third_view/$1/$2/$3';

//add new cart system
$route['item_required_session']='designuser/design_item_required_session';
// edit cart and view cart
$route['item_required_session_ids']='designuser/design_item_required_session_ids';

$route['vehicle_required_session']='designuser/design_vehicle_required_session';

$route['design-add-new-mr-save-formII']='designuser/design_add_new_mr_save_formII';
// ajax mr file upload
$route['file-upload-data']='designuser/design_file_upload_data';

// drafted mt
$route['design-user-mr-drafted-list']='designuser/design_user_mr_drafted_list';

$route['design-submitted-mr-order']='designuser/design_submitted_mr_order';

$route['design-submitted-mr-order-detail/(:any)/(:any)']='designuser/design_submitted_mr_order_detail/$1/$2';

//resubmisstion
$route['design-resubmission-mr-order']='designuser/design_resubmission_mr_order';
$route['design-resubmit-mr-order-edit/(:any)/(:any)/(:any)']='designuser/design_resubmit_mr_order_edit/$1/$2/$3';
$route['design-resubmit-new-mr-save-formII']='designuser/design_resubmit_new_mr_save_formII';

$route['design-pr-schedule']='designuser/design_pr_schedule';
$route['design-pr-schedule-complete']='designuser/design_pr_schedule_complete';
$route['design-mr-view-pr/(:any)/(:any)/(:any)/(:any)']='designusernew/design_mr_view_pr_details/$1/$2/$3/$4';
// $route['design-mr-view-pr/(:any)/(:any)/(:any)/(:any)']='designuser/design_mr_view_pr_details/$1/$2/$3/$4';
//view project pr schedule
$route['design-project-pr-schedule-view']='designuser/design_project_pr_schedule_view';
// project  new bid
$route['design-project-pr-schedule']='designusernew/design_project_pr_schedule';
$route['design-pr-schedule-api']='designusernew/design_project_pr_schedule_api';
$route['design-mr-new-create/(:any)/(:any)/(:any)']='designusernew/design_new_mr_pr_list/$1/$2/$3';
// search_material
$route['design-material-search-get']='designusernew/design_new_material_search_get';
$route['design-material-search-reset']='designusernew/design_new_material_search_reset';
// $routw['design-new-item-required-session']='designusernew/design_new_item_required_session';
$route['ajax-cart-new-services']='designusernew/design_new_cart_services';
// new file Pr attachment
$route['design-file-upload-data']='designusernew/design_file_upload_data_m';
// new material 
$route['design-user-add-new-material']='designuser/design_user_add_new_material';
$route['design-user-add-new-material-save']='designuser/design_user_add_new_material_save';
$route['design-add-new-pr-save']='designusernew/design_add_new_pr_save';
$route['design-project-pr-schedule-comment']='designusernew/design_project_pr_schedule_comment';
// ajax get view of added resubmit infromation
$route['design-user-new-resubmission-cart']='designusernew/design_user_new_resubmission_cart';

//  statsu of PR Schedule information
$route['design-project-pr-schedule-status']='designusernew/design_project_pr_schedule_status';

#####################################################################################################################################
#
#								Approver Section Is starting
#
####################################################################################################################################
$route['user-approver-home']='approveruser/home';
$route['approver-new-mr-receive']='approveruser/approver_new_mr_receive';

// view / Comment information of mr
$route['approver-new-mr-order-receive-view/(:any)/(:any)/(:any)']='approveruser/design_new_mr_order_receive_view/$1/$2/$3';
$route['approver-file-upload-data']='approveruser/approver_file_upload_data';
$route['approve_item_required_session_ids']='approveruser/approve_item_required_session_ids';
$route['approver-add-new-mr-save-formII']='approveruser/approver_add_new_mr_save_formII';
// conform or approved mr List
// approver-new-mr-order-approved-view
$route['approver-new-mr-conform']='approveruser/approver_new_mr_conform';
$route['approver-new-mr-order-approved-view/(:any)/(:any)/(:any)']='approveruser/design_new_mr_order_approved_view/$1/$2/$3';
// comment
$route['approver-resubmission-mr-order']='approveruser/approver_resubmission_mr_order';
$route['approver-new-mr-order-Comment-view/(:any)/(:any)/(:any)']='approveruser/design_new_mr_order_Comment_view/$1/$2/$3';


// new Changes in work
// 
$route['approver-project-pr']='approveruser/approver_project_pr_details';
// 
$route['approver-mr-view-pr/(:any)/(:any)/(:any)/(:any)']='approveruser/approver_mr_view_pr/$1/$2/$3/$4';
$route['approver-add-new-pr-save']='approveruser/approver_add_new_pr_save';
$route['approved-project-pr']='approveruser/approved_project_pr';
$route['approved-mr-view-pr/(:any)/(:any)/(:any)/(:any)']='approveruser/approved_mr_view_pr/$1/$2/$3/$4';
$route['approver-comment-project-pr']='approveruser/approver_comment_project_pr';
$route['approved-mr-view-comment-pr/(:any)/(:any)/(:any)/(:any)']='approveruser/approved_mr_view_comment_pr/$1/$2/$3/$4';
###########################################################################################################################################
#
#						Procurment User
#
############################################################################################################################################

$route['user-procurement-home']='procurementuser/home';

$route['procurement-new-mr-receive']='procurementuser/procurement_new_mr_receive';

$route['procurement-new-mr-order-receive-view/(:any)/(:any)/(:any)']='procurementuser/procurement_new_mr_order_receive_view/$1/$2/$3';
$route['procurement-assigned-buyer']='procurementuser/procurement_assigned_buyer';
$route['procurement-new-mr-conform']='procurementuser/procurement_new_mr_conform';

$route['procurement-assign-mr-order-receive-view/(:any)/(:any)/(:any)']='procurementuser/procurement_assign_mr_order_receive_view/$1/$2/$3';
$route['procurement-pr-schedule']='procurementuser/procurement_pr_schedule';
$route['procurement-new-pr-receive']='procurementuser/procurement_new_pr_receive';
$route['procurement-mr-view-pr/(:any)/(:any)/(:any)/(:any)']='procurementuser/procurement_mr_view_pr/$1/$2/$3/$4';
$route['procurement-new-pr-conform']='procurementuser/procurement_new_pr_conform';
$route['procurement-user-create-new-material/(:any)/(:any)/(:any)/(:any)']='procurementuser/procurement_user_create_new_material/$1/$2/$3/$4';
$route['procurement-new-pr-schedule-complete']='procurementuser/procurement_new_pr_schedule_complete';
$route['procurement-add-new-pr-save']='procurementuser/procurement_add_new_pr_save';
$route['procurement-new-pr-complete-requisition/(:any)/(:any)/(:any)/(:any)']='procurementuser/procurement_new_pr_complete_requisition/$1/$2/$3/$4';



#############################################################################################################################################
#
#												New BU Section
#
###########################################################################################################################################
$route['user-bu-home']='buuser/home';
$route['bu-create-tracking']='buuser/bu_create_tracking_new';
$route['bu-create-tracking-save']='buuser/bu_create_tracking_new_save';
$route['bu-drafted-tracking']='buuser/bu_drafted_tracking_new';
$route['bu-update-tracking-save']='buuser/bu_update_tracking_new_save';
$route['bu-edit-tracking-tool/(:any)']='buuser/bu_edit_tracking_tool/$1';
$route['bu-new-submited-tracking']='buuser/bu_submited_tracking_new';
$route['bu-view-tracking-tool/(:any)']='buuser/bu_view_tracking_tool/$1';
$route['bu-view-edit-tracking-tool/(:any)']='buuser/bu_view_edit_tracking_tool/$1';
$route['bu-pr-schedule']='buuser/bu_create_pr_schedule_new';
$route['bu-view-pr-schedule']='buuser/bu_view_pr_schedule_new';
// ajax transfer file for loading
$route['excel-upload/entry']='buuser/bu_excel_uploads_save';
$route['excel-upload/view']='buuser/bu_excel_uploads_view';
$route['bu-view-project']='buuser/bu_project_view';
//
$route['bu-mr-new-create/(:any)/(:any)/(:any)']='buuser/bu_bu_create_tracking_new/$1/$2/$3';
$route['bu-create-tracking-save_m']='buuser/bu_create_tracking_new_save_m';

//
$route['bu-view-project-old']='buuser/bu_view_project_old';

$route['bu-mr-drafted/(:any)/(:any)/(:any)/(:any)']='buuser/bu_edit_tracking_tool_m/$1/$2/$3/$4';
// $route['bu-mr-view-submit/(:any)/(:any)/(:any)/(:any)']='buuser/bu_mr_view_submit/$1/$2/$3/$4';
$route['bu-update-tracking-save-m']='buuser/bu_update_tracking_new_save_m';

$route['bu-view-edit-tracking-tool-m/(:any)/(:any)/(:any)/(:any)']='buuser/bu_view_edit_tracking_tool_m/$1/$2/$3/$4';
$route['bu-view-tracking-tool-m/(:any)/(:any)/(:any)/(:any)']='buuser/bu_view_tracking_tool_m/$1/$2/$3/$4';

// search bu user pr 
$route['bu-search-pr-no']='buuser/bu_search_pr_no';
###########################################################################################################################################
#
#                                          Buyer Section
#
############################################################################################################################################
$route['user-buyer-home']='buyeruser/home';
$route['buyer-mr-received']='buyeruser/buyer_mr_received';
$route['buyer-mr-received-m']='buyeruser/buyer_mr_received_m';

$route['buyer-technical-commercial-assign/(:any)/(:any)/(:any)/(:any)/(:any)']='buyeruser/buyer_technical_commercial_assign/$1/$2/$3/$4/$5';
$route['get-buyer-bid-check']='buyeruser/buyer_get_buyer_bid_Check';
// $route['get-buyer-bid-check']='buyeruser/buyer_get_buyer_bid_Check';

$route['buyer-drafted-bid']='buyeruser/buyer_drafted_bid';
$route['buyer-bid-edit/(:any)/(:any)']='buyeruser/buyer_bid_edit/$1/$2';
$route['buyer-bid-sent/(:any)/(:any)']='buyeruser/buyer_bid_sent/$1/$2';
$route['user-buyer-conform-send/(:any)/(:any)']='buyeruser/buyer_bid_conform_send/$1/$2';

// Bid Technical Send
$route['buyer-send-bid-tech']='buyeruser/buyer_send_bid_tech';
$route['buyer-bid-query-tech/(:any)/(:any)']='buyeruser/buyer_bid_query_tech/$1/$2';
$route['buyer-bid-send-tech-view/(:any)/(:any)']='buyeruser/buyer_bid_send_tech_view/$1/$2';
$route['buyer-query-respond-technical']='buyeruser/buyer_query_respond_technical';
// ajax mr file upload
$route['buyer-file-upload-data']='buyeruser/buyer_file_upload_data';
$route['bid-tech-entry']='buyeruser/buyer_bid_tech_entry';



// Commercial Bid In buyer
$route['bid-commerical-entry']='buyeruser/bid_commerical_entry';
$route['buyer-drafted-bid-commerical']='buyeruser/user_buyer_bid_drafted_commerical';
$route['buyer-bid-commerical-sent/(:any)/(:any)']='buyeruser/buyer_bid_sent_commerical/$1/$2';
$route['buyer-send-bid-commerical']='buyeruser/buyer_send_bid_commerical';
$route['buyer-send-bid-commerical-rank-order']='buyeruser/buyer_send_bid_commerical_rank_order';

$route['buyer-send-bid-commerical-rank-order-history']='buyeruser/buyer_send_bid_commerical_rank_order_history';

$route['buyer-send-bid-commerical-history']='buyeruser/buyer_send_bid_commerical_history';

$route['buyer-bid-send-commerical-view/(:any)/(:any)']='buyeruser/buyer_bid_send_commerical_view/$1/$2';
$route['buyer-bid-send-commerical-view-history/(:any)/(:any)']='buyeruser/buyer_bid_send_commerical_view_history/$1/$2';

$route['bid-commerical-entry-logistic']='buyeruser/buyer_bid_commerical_entry_logistic';
$route['query-panel-buyer-commerical']='buyeruser/query_panel_buyer_commerical';
$route['buyer-bid-query-commerical-intimation/(:any)/(:any)']='buyeruser/buyer_bid_query_commerical_intimation/$1/$2';
$route['buyer-bid-query-commerical-inti-notification/(:any)/(:any)']='buyeruser/buyer_bid_query_commerical_inti_notification/$1/$2';

$route['buyer-otp-verification-success/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)']='buyeruser/buyer_commerical_otp_verification_success_view/$1/$2/$3/$4/$5/$6';

$route['buyer-bid-rank-invitation-to-vendor-com']='buyeruser/buyer_bid_rank_invitation_to_vendor_com';

//new pr schudele
$route['buyer-pr-receive']='buyeruser/buyer_pr_receive';
$route['buyer-user-create-new-pr/(:any)/(:any)/(:any)/(:any)']='buyerusernew/buyer_user_create_new_pr/$1/$2/$3/$4';
//
//buyer_user new where it holds vender search information
$route['buyer-vendor-search-informations']='buyerusernew/buyer_vendor_search_informations';
$route['buyer-vendor-cart']='buyerusernew/buyer_vendor_cart';
$route['buyer-vendor-cart-show']='buyerusernew/buyer_vendor_cart_show';
$route['buyer-vendor-cart-delete-cart']='buyerusernew/buyer_vendor_cart_delete_cart';

// this for technical subission and sve infromation 
$route['Buyer-add-new-pr-save']='buyerusernew/Buyer_add_new_pr_save';

// here information of commercial bid will phace here
// 
$route['buyer-add-new-pr-comm-save']='buyerusernew/buyer_add_new_pr_comm_save';

// ajax checking for pr bid reference and bid id

$route['get-buyer-bid-check-pr']='buyeruser/buyer_get_buyer_bid_check_pr';


#################################################################################################################################
#
#Technical Evaluator section
#
##################################################################################################################################
$route['user-technical-evalutor-home']='technicalevalutor/tech_evalutor_home';
$route['user-technical-evaluator-bid-new-list']='technicalevalutor/technical_evaluator_bid_new_list';
$route['user-technical-evaluator-view-details-technical-bid-new-complete-view/(:any)/(:any)/(:any)']='technicalevalutor/technical_evaluator_view_details_technical_bid_new_complete_view/$1/$2/$3';
$route['user-technical-evaluator-view-details-technical-bid-new/(:any)/(:any)']='technicalevalutor/technical_evaluator_view_details_technical_bid_new/$1/$2';
$route['technical-evalutor-get-approved-reject/(:any)/(:any)/(:any)']='technicalevalutor/technical_evalutor_get_approved_reject/$1/$2/$3';
$route['technical-evalutor-get-approved-reject-save']='technicalevalutor/technical_evalutor_get_approved_reject_save';
$route['user-technical-evalutor-pr-receive']='technicalevalutor/user_technical_evalutor_pr_receive';
// $route['technical-user-bid-new-pr/(:any)/(:any)/(:any)/(:any)']='technicalevalutor/technical_user_create_new_material/$1/$2/$3/$4';
$route['technical-user-bid-pr-new-material/(:any)/(:any)/(:any)/(:any)/(:any)']='technicalevalutor/technical_user_bid_pr_new_material/$1/$2/$3/$4/$5';

$route['technical-view-vendor-sumission-info-pr/(:any)/(:any)/(:any)/(:any)']='technicalevalutor/technical_view_vendor_sumission_info_pr/$1/$2/$3/$4';

$router['technical-evalutor-get-approved-reject-save-pr']='technicalevalutor/technical_evalutor_get_approved_reject_save_pr';

//$route['user-technical-evalutor-pr-create-save']='technicalevalutor/technical_evalutor_pr_create_save';
$route['user-technical-evaluator-bid-old-list']='technicalevalutor/technical_evaluator_bid_old_list';
$route['tech-evalutor-logout-by-pass']='technicalevalutor/tech_evalutor_logout_bypass';
$route['tech-evalutor-logout']='technicalevalutor/tech_evalutor_logout';


#################################################################################################################################
#
#Commercial Evaluator section
#
#################################################################################################################################
$route['user-commerical-evalutor-home']='commericalevalutor/comm_evalutor_home';
$route['user-commerical-evaluator-bid-new-list']='commericalevalutor/commerical_evaluator_bid_new_list';
$route['user-commerical-evaluator-view-details-commerical-bid-new/(:any)/(:any)']='commericalevalutor/commerical_evaluator_view_details_commerical_bid_new/$1/$2';
$route['user-commerical-evaluator-view-details-commerical-bid-completed/(:any)/(:any)']='commericalevalutor/commerical_evaluator_view_details_commerical_bid_completed/$1/$2';
// $route['user-commerical-evaluator-view-details-commerical-bid-comp-view']
$route['generate-otp-bid-referecnce/(:any)/(:any)/(:any)/(:any)/(:any)']='commericalevalutor/commerical_generate_otp_bid_referecnce/$1/$2/$3/$4/$5';
$route['commerical-otp-verification']='commericalevalutor/commerical_otp_verification';
$route['commerical-otp-verification-fail/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)']='commericalevalutor/commerical_otp_verification_fail/$1/$2/$3/$4/$5/$6';
$route['commerical-otp-verification-success/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)']='commericalevalutor/commerical_otp_verification_success/$1/$2/$3/$4/$5/$6';

$route['commerical-otp-verification-success-view/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)']='commericalevalutor/commerical_otp_verification_success_view/$1/$2/$3/$4/$5/$6';

$route['commerrical-user-send-approve-nofication']='commericalevalutor/commerrical_user_send_approve_nofication';
$route['commerical-user-send-approve-nofication']='commericalevalutor/commerrical_user_Channel_send_approve_nofication';
$route['commerrical-user-send-nofication-vendor']='commericalevalutor/commerrical_user_send_approve_nofication_vendor';
$route['user-commerical-evaluator-bid-complete-list']='commericalevalutor/user_commerical_evaluator_bid_complete_list';

$route['user-commerical-evalutor-pr-create']='commericalevalutor/user_commerical_evalutor_pr_create';
$route['technical-user-create-new-material/(:any)/(:any)/(:any)/(:any)']='commericalevalutor/technical_user_create_new_material/$1/$2/$3/$4';

$route['commerrical-user-send-approve-vendor']='commericalevalutor/commerrical_user_send_approve_vendor';
$route['comm-evalutor-logout-by-pass']='commericalevalutor/comm_evalutor_logout_bypass';
$route['comm-evalutor-logout']='commericalevalutor/comm_evalutor_logout';
######################################################################################################################################
#
# Vendor section user
#
######################################################################################################################################
$route['seller/login']='vendoruser/index';
$route['seller']='vendoruser/index';
$route['vendor/login-process']='vendoruser/vendor_login_process';
$route['user-vendor-home']='vendoruser/vendor_dashboard';
$route['user-vendor-new-technical']='vendoruser/vendor_new_technical';
$route['user-vendor-query-panel/(:any)']='vendoruser/vendor_query_panel/$1';
$route['user-vendor-bid-view-technical-details/(:any)/(:any)/(:any)']='vendoruser/vendor_new_tech_view_details/$1/$2/$3';

$route['user-vendor-bid-submission']='vendoruser/vendor_bid_technical_submission';

$route['vendor-bid-query-tech']='vendoruser/vendor_bid_query_tech';
// this two pages will be removed
$route['vendor-page']='vendoruser/vendor_page';
$route['vendor-page-final']='vendoruser/vendor_page_final';
$route['user-vendor-bid-submission/(:any)']='vendoruser/vendor_tech_bid_submission/$1';
//  this is inter transfer of token for redirect
$route['user-vendor-tech-bid-submission-tokens/(:any)/(:any)/(:any)']='vendoruser/vendor_tech_bid_submission_tokens/$1/$2/$3';
$route['user-vendor-tech-bid-submission-tokens-view/(:any)/(:any)/(:any)']='vendoruser/vendor_tech_bid_submission_tokens_view/$1/$2/$3';
$route['vendor-file-upload-data']='vendoruser/vendor_file_upload_data';
$route['vendor-tech-file-new-bid-submission']='vendoruser/vendor_tech_file_new_bid_submission';


//commercial section user
$route['user-vendor-new-commerical']='vendoruser/vendor_new_commerical';
$route['user-vendor-commerical-query-panel/(:any)']='vendoruser/vendor_query_panel_commerical/$1';
$route['vendor-bid-query-commerical']='vendoruser/vendor_bid_query_commerical';
$route['user-vendor-bid-view-commerical-details/(:any)/(:any)/(:any)']='vendoruser/vendor_bid_view_commerical_details/$1/$2/$3';
$route['user-vendor-bid-submission-commerical/(:any)/(:any)/(:any)/(:any)']='vendoruser/vendor_bid_submission_commerical/$1/$2/$3/$4';
$route['user-vendor-bid-submission-commerical-save']='vendoruser/vendor_bid_submission_commerical_save_s_C';
$route['user-vendor-new-notification-list']='vendoruser/vendor_new_notification_list';
$route['vendor-view-detail-noticfaction/(:any)/(:any)']='vendoruser/vendor_view_detail_noticfaction/$1/$2';
$route['user-vendor-new-auction-list']='vendoruser/vendor_new_auction_list';
$route['vendor-rank-bid-order/(:any)/(:any)/(:any)/(:any)']='vendoruser/vendor_rank_bid_order/$1/$2/$3/$4';
// $route['user-vendor-bid-submission-commerical-save']='vendoruser/vendor_bid_submission_commerical_save_s';
// vendor_logout
// vendor_logout_bypass
$route['vendor-logout']='vendoruser/vendor_logout';
$route['vendor-logout-pass']='vendoruser/vendor_logout_bypass';
$route['vendor-change-password-view']='vendoruser/vendor_change_password_view';
$route['vendor-change-password-save']='vendoruser/vendor_change_password_save';


//  pr
$route['seller/user-vendor-home']='vendoruser/vendor_dashboard'; // dashboard list

$route['seller/user-vendor-bid-new-technical']='vendorusernew/vendor_bid_new_technical_list'; // new technical materila list for biddding information

$route['seller/user-vendor-bid-view-technical-details-pr/(:any)/(:any)']='vendorusernew/vendor_bid_new_technical_details/$1/$2';
$route['seller/user-vendor-bid-submission-bid/(:any)']='vendorusernew/vendor_bid_new_technical_details_pr/$1';
$route['seller/user-pr-vendor-tech-bid-submission-tokens/(:any)/(:any)/(:any)']='vendorusernew/vendor_bid_new_technical_submission_pr/$1/$2/$3';
$route['seller/vendor-file-upload-data-pr']='vendorusernew/vendor_file_upload_data_pr_files';
$route['seller/vendor-tech-file-new-bid-submission-info/(:any)/(:any)/(:any)']='vendorusernew/vendor_tech_file_new_bid_submission_pr_view/$1/$2/$3'; // is not complted
$route['seller/user-vendor-tech-bid-submission-tokens-info/(:any)/(:any)/(:any)']='vendorusernew/vendor_tech_bid_submission_tokens_edit/$1/$2/$3';
$route['seller/pr-vendor-tech-file-new-bid-submission']='vendorusernew/vendor_tech_file_new_bid_submission_pr';
// commerical vendor
// 
$route['seller/user-vendor-bid-new-commerical']='vendorusernew/vendor_bid_new_commerical_list';
$route['seller/user-vendor-bid-view-commerical-details-pr/(:any)/(:any)']='vendorusernew/vendor_bid_view_commerical_details_pr_details/$1/$2';// here infotmation of bid

$route['seller/user-vendor-bid-commerical-submission-bid/(:any)/(:any)']='vendorusernew/vendor_bid_view_commerical_details_pr_details_com/$1/$2';

$route['seller/user-vendor-bid-submission-commerical-save-pr']='vendorusernew/vendor_bid_submission_commerical_save_pr';

$route['seller/user-vendor-bid-commerical-submission-bid-view/(:any)/(:any)/(:any)']='vendorusernew/user_vendor_bid_commerical_submission_bid_view/$1/$2/$3';
$route['seller/user-vendor-bid-query-view/(:any)']='vendoruser/user_vendor_bid_query_view/$1';

######################################################################################################################################
#
#	Logout Of all section here
#
######################################################################################################################################
// admin logout
$route['admin-logout']='adminuser/adminlogout';
$route['admin-logout-by-pass']='adminuser/adminlogout_bypass';
// bu logout
$route['bu-logout']='buuser/bu_logout';
$route['bu-logout-by-pass']='buuser/bu_logout_bypass';
//design user logout
$route['design-logout']='designuser/design_logout';
$route['design-logout-by-pass']='designuser/design_logout_bypass';
$route['design-logout-pass']='designuser/design_logout';

$route['approve-logout']='approveruser/approver_logout';
$route['approve-logout-by-pass']='approveruser/approver_logout_bypass';

$route['procurement-logout']='procurementuser/procurement_logout';
$route['procurement-logout-by-pass']='procurementuser/procurement_logout_bypass';

$route['buy-logout']='buyeruser/buy_logout';
$route['buy-logout-by-pass']='buyeruser/buy_logout_bypass';
######################################################################################################################################
#
#							Change Password
#
######################################################################################################################################
$route['admin-change-password-module']='adminuser/admin_change_password';
