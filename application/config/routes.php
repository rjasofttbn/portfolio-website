<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'frontend/Frontend/index';
$route['dashboard'] = "dashboard/home";
$route['revenuestatus-monthyear'] = "dashboard/home/revenuestatus_monthyear";
$route['yearmonthly-salesamount'] = "dashboard/home/yearmonthly_salesamount";
$route['yearmonth-todays-sales'] = "dashboard/home/yearmonth_todays_sales";
$route['login'] = "dashboard/auth/index";
$route['login-process'] = "dashboard/auth/login_process";
$route['password-update'] = 'dashboard/auth/password_update';
$route['logout'] = "dashboard/auth/logout";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//=========== its for frontend start =============
$route['about'] = 'frontend/Frontend/bdtask_about';
$route['case_studies'] = 'frontend/Frontend/bdtask_case_studies';
$route['case_studies-detail/(:any)'] = 'frontend/Frontend/bdtask_case_studies_detail/$1';
$route['media'] = 'frontend/Frontend/bdtask_media';
$route['author'] = 'frontend/Frontend/bdtask_author';
$route['blog'] = 'frontend/Frontend/bdtask_blog';
$route['blog/(:any)'] = 'frontend/Frontend/bdtask_blog/$1';
$route['blog-detail/(:any)'] = 'frontend/Frontend/bdtaskblog_detail/$1';
$route['contact'] = 'frontend/Frontend/bdtask_contact';
//=========== its for frontend start sub menus of services =============
$route['production'] = 'frontend/Frontend/bdtask_production';
$route['branding'] = 'frontend/Frontend/bdtask_branding';
$route['sales_marketing'] = 'frontend/Frontend/bdtask_sales_marketing';
$route['coaching'] = 'frontend/Frontend/bdtask_coaching';
$route['investment'] = 'frontend/Frontend/bdtask_investment';

//search
$route['blog-filter'] = 'frontend/Frontend/blog_filter';



// // $route['about'] = 'frontend/Frontend/about';
// $route['privacy-policy'] = 'frontend/Frontend/privacy_policy';
// $route['terms-condition'] = 'frontend/Frontend/terms_condition';
// $route['course-quick-view'] = 'frontend/Frontend/course_quick_view';
// $route['course-details/(:any)/(:any)'] = 'frontend/Frontend/course_details/$1/$2';
// $route['add-to-cart'] = 'frontend/Frontend/add_to_cart/';
// $route['cart-update'] = 'frontend/Frontend/update_cart/';
// $route['cart-delete'] = 'frontend/Frontend/cart_delete/';
// $route['add-to-mycourse'] = 'frontend/Frontend/add_to_mycourse';
// $route['exam-course'] = 'frontend/Frontend/exam_course';
// $route['exam-course-details'] = 'frontend/Frontend/exam_course_details';
// $route['faculty-info/(:any)'] = 'frontend/Frontend/faculty_info/$1';
// $route['faculties'] = 'frontend/Frontend/faculties/';
// $route['faculties/(:any)'] = 'frontend/Frontend/faculties/$1';
// $route['cart'] = 'frontend/Frontend/cart';
// $route['checkout'] = 'frontend/Frontend/checkout';
// $route['confirm-order'] = 'frontend/Frontend/confirm_order';

// $route['frontend/frontend/success/(:any)'] = "frontend/frontend/success/$1";
// $route['frontend/frontend/success/(:any)/(:any)'] = "frontend/frontend/success/$1/$2";

// $route['category-course/(:any)'] = 'frontend/Frontend/category_course/$1';
// $route['my-category-course/(:any)'] = 'frontend/Frontend/my_category_course/$1';
// $route['enroll-save'] = 'frontend/Frontend/enroll_save';
// $route['subscriber-save'] = 'frontend/Frontend/subscriber_save';
// $route['courses'] = 'frontend/Frontend/courses';
// $route['courses/(:any)'] = 'frontend/Frontend/courses/$1';
// $route['popular-courses'] = 'frontend/Frontend/popular_courses';
// $route['popular-courses/(:any)'] = 'frontend/Frontend/popular_courses/$1';
// $route['free-courses'] = 'frontend/Frontend/free_courses';
// $route['free-courses/(:any)'] = 'frontend/Frontend/free_courses/$1';
// $route['review-save'] = 'frontend/Frontend/review_save';
// $route['my-course'] = 'frontend/Frontend/my_course';
// $route['my-course/(:any)'] = 'frontend/Frontend/my_course/$1';
// $route['enroll-course'] = 'frontend/Frontend/enroll_course';
// $route['enroll-course/(:any)'] = 'frontend/Frontend/enroll_course/$1';
// $route['my-category-erollcourse/(:any)'] = 'frontend/Frontend/my_category_enrollcourse/$1';
// $route['autocomplete-course-search'] = 'frontend/Frontend/autocomplete_course_search';
// $route['typeahead-search'] = 'frontend/Frontend/typeahead_search';
// $route['events'] = 'frontend/Frontend/events';
// $route['events/(:any)'] = 'frontend/Frontend/events/$1';
// $route['event-details/(:any)/(:any)'] = 'frontend/Frontend/event_details/$1/$2';
// $route['send-comment'] = 'frontend/Frontend/send_comment';

// $route['student-dashboard'] = 'frontend/frontend/dashboard';
// $route['profile-data-update'] = 'frontend/Frontend/profile_data_update';
// $route['quiz-test-form'] = 'frontend/Frontend/quiz_test_form';
// $route['show-coursequiz'] = 'frontend/Frontend/show_coursequiz';
// $route['submit-quiz'] = 'frontend/Frontend/submit_quiz';
// $route['quiz-result/(:any)'] = 'frontend/Frontend/quiz_result/$1';
// $route['quiz-result'] = 'frontend/Frontend/quiz_result';
// $route['show-quiz-result'] = 'frontend/Frontend/show_quiz_result';
// $route['change-student-picture'] = 'frontend/Frontend/change_student_picture';
// $route['student-profile-picture-update'] = 'frontend/Frontend/student_profile_picture_update';
// $route['student-payment-info'] = 'frontend/Frontend/student_payment_info';
// $route['student-paymentinfo-update'] = 'frontend/Frontend/student_paymentinfo_update';
// $route['student-change-password'] = 'frontend/Frontend/student_change_password';
// $route['student-password-update'] = 'frontend/Frontend/student_password_update';

// //============ its for frontend close  ==========
// //=========== its for customer panel ============
// $route['login-form'] = 'frontend/Frontend/login_form';
// $route['student-register-form'] = 'frontend/Frontend/student_register_form';
// $route['faculty-register-form'] = 'frontend/Frontend/faculty_register_form';
// $route['register-save'] = 'frontend/Frontend/register_save';
// $route['checkout-unique-mailcheck'] = 'frontend/Frontend/checkout_unique_mailcheck';
// $route['testPusher'] = 'frontend/Frontend/testPusher';
// $route['forgotpassword-form'] = 'frontend/Frontend/forgotpassword_form';
$route['forgot-password-send'] = 'dashboard/auth/forgot_password_send';

//============ its for dashboard start ==========
//=============== its for category =============
$route['category'] = 'dashboard/Category/index';
$route['category/(:any)'] = 'dashboard/Category/index/$1';
$route['category-save'] = 'dashboard/Category/category_save';
$route['category-edit/(:any)'] = 'dashboard/Category/category_edit/$1';
$route['category-update'] = 'dashboard/Category/category_update';
$route['category-delete'] = 'dashboard/Category/category_delete';
$route['category-search'] = 'dashboard/Category/category_search';


//=========== its for portfolio module ==========
$route['add-blog'] = 'dashboard/Blog/index';
$route['blog-save'] = 'dashboard/Blog/blog_save';
$route['blog-list'] = 'dashboard/Blog/blog_list';
$route['blog-edit/(:any)'] = 'dashboard/Blog/blog_edit/$1';
$route['blog-update'] = 'dashboard/Blog/blog_update';
$route['blog-delete'] = 'dashboard/Blog/blog_delete';
$route['blog-inactive'] = 'dashboard/Blog/blog_inactive';
$route['blog-active'] = 'dashboard/Blog/blog_active';
// //=============== its for blog =============
// $route['add-blog'] = 'dashboard/Blog/index';
// $route['blog/(:any)'] = 'dashboard/Blog/index/$1';
// $route['blog-save'] = 'dashboard/Blog/category_save';
// $route['blog-edit/(:any)'] = 'dashboard/Blog/category_edit/$1';
// $route['blog-update'] = 'dashboard/Blog/category_update';
// $route['blog-delete'] = 'dashboard/Blog/category_delete';
// $route['blog-search'] = 'dashboard/Blog/category_search';


//============ its for course ============
$route['add-course'] = 'dashboard/Course/index';
$route['course-save'] = 'dashboard/Course/course_save';
$route['course-list'] = 'dashboard/Course/course_list';
$route['course-list/(:any)'] = 'dashboard/Course/course_list/$1';
$route['course-filter'] = 'dashboard/Course/course_filter';
$route['course-edit/(:any)'] = 'dashboard/Course/course_edit/$1';
$route['course-update'] = 'dashboard/Course/course_update';
$route['course-inactive'] = 'dashboard/Course/course_inactive';
$route['course-active'] = 'dashboard/Course/course_active';
$route['course-delete'] = 'dashboard/Course/course_delete';
$route['category-wise-course'] = 'dashboard/Course/category_wise_course';
$route['single-invoice/(:any)'] = 'dashboard/Course/single_invoice/$1';
$route['addsection-form'] = 'dashboard/Course/addsection_form';
$route['section-save'] = 'dashboard/Course/section_save';
$route['editsection-form'] = 'dashboard/Course/editsection_form';
$route['section-update'] = 'dashboard/Course/section_update';
$route['section-delete'] = 'dashboard/Course/section_delete';
$route['addlesson-form'] = 'dashboard/Course/addlesson_form';
$route['get-video-details'] = 'dashboard/Course/get_video_details';
$route['lesson-save'] = 'dashboard/Course/lesson_save';
$route['editlesson-form'] = 'dashboard/Course/editlesson_form';
$route['lesson-update'] = 'dashboard/Course/lesson_update';
$route['lesson-delete'] = 'dashboard/Course/lesson_delete';
$route['purchased-course-list'] = 'dashboard/Course/student_sales_course';
$route['purchased-course-list/(:any)'] = 'dashboard/Course/student_sales_course/$1';
$route['student-salescourse-filter'] = 'dashboard/Course/student_salescourse_filter';
$route['faculty-sales-course'] = 'dashboard/Course/faculty_sales_course';
$route['faculty-salescourse-filter'] = 'dashboard/Course/faculty_salescourse_filter';
$route['commission-list'] = 'dashboard/Course/commission_list';
$route['commission-list/(:any)'] = 'dashboard/Course/commission_list/$1';
$route['faculty-wise-course'] = 'dashboard/Course/faculty_wise_course';
$route['course-wise-courseinfo'] = 'dashboard/Course/course_wise_courseinfo';
$route['faculty-course-commission'] = 'dashboard/Course/faculty_course_commission';
$route['faculty-revenue'] = 'dashboard/Course/faculty_revenue';
$route['faculty-revenue/(:any)'] = 'dashboard/Course/faculty_revenue/$1';
$route['yearmonthly-myrevenue'] = 'dashboard/Course/yearmonthly_myrevenue';
$route['faculty-course-revenue/(:any)'] = 'dashboard/Course/faculty_course_revenue/$1';
$route['faculty-course-revenue/(:any)/(:any)'] = 'dashboard/Course/faculty_course_revenue/$1/$2';
$route['pay-form'] = 'dashboard/Course/pay_form';
$route['pay-with-paypal-submit'] = 'dashboard/Course/pay_with_paypal_submit';
$route['admin-revenue'] = 'dashboard/Course/admin_revenue';
$route['admin-revenue/(:any)'] = 'dashboard/Course/admin_revenue/$1';
$route['photo-resize-form'] = 'dashboard/Course/photo_resize_form';
$route['photo-resize-submit'] = 'dashboard/Course/photo_resize_submit';
$route['csrf-generator'] = 'dashboard/Course/csrf_generator';

//=========== its for student module ==========
$route['add-student'] = 'dashboard/Students/index';
$route['student-save'] = 'dashboard/Students/student_save';
$route['student-list'] = 'dashboard/Students/student_list';
$route['student-list/(:any)'] = 'dashboard/Students/student_list/$1';
$route['students-filter'] = 'dashboard/Students/students_filter';
$route['student-edit/(:any)'] = 'dashboard/Students/student_edit/$1';
$route['student-update'] = 'dashboard/Students/student_update';
$route['student-delete'] = 'dashboard/Students/student_delete';
$route['student-inactive'] = 'dashboard/Students/student_inactive';
$route['student-active'] = 'dashboard/Students/student_active';

//=========== its for service module ==========
$route['add-service'] = 'dashboard/Service/index';
$route['service-save'] = 'dashboard/Service/service_save';
$route['service-list'] = 'dashboard/Service/service_list';
$route['service-edit/(:any)'] = 'dashboard/Service/service_edit/$1';
$route['service-update'] = 'dashboard/Service/service_update';
$route['service-delete'] = 'dashboard/Service/service_delete';
$route['service-inactive'] = 'dashboard/Service/service_inactive';
$route['service-active'] = 'dashboard/Service/service_active';

// for knowledge page start
//=========== its for knowledge module ==========
$route['add-knowledge'] = 'dashboard/Knowledge/index';
$route['knowledge-save'] = 'dashboard/Knowledge/knowledge_save';
$route['knowledge-list'] = 'dashboard/Knowledge/knowledge_list';
$route['knowledge-edit/(:any)'] = 'dashboard/Knowledge/knowledge_edit/$1';
$route['knowledge-update'] = 'dashboard/Knowledge/knowledge_update';
$route['knowledge-delete'] = 'dashboard/Knowledge/knowledge_delete';
$route['knowledge-inactive'] = 'dashboard/Knowledge/knowledge_inactive';
$route['knowledge-active'] = 'dashboard/Knowledge/knowledge_active';


//=========== its for team members module ==========
$route['team-members'] = 'dashboard/Setting/team_members';
$route['teammembers-infosave'] = 'dashboard/Setting/teammembers_infosave';
$route['teammember-edit'] = 'dashboard/Setting/teammember_edit';
$route['teammember-infoupdate'] = 'dashboard/Setting/teammember_infoupdate';
$route['teammember-delete'] = 'dashboard/Setting/teammember_delete';

//=========== its for experience module ==========
$route['add-experience'] = 'dashboard/Experience/index';
$route['experience-save'] = 'dashboard/Experience/experience_save';
$route['experience-list'] = 'dashboard/Experience/experience_list';
$route['experience-edit/(:any)'] = 'dashboard/Experience/experience_edit/$1';
$route['experience-update'] = 'dashboard/Experience/experience_update';
$route['experience-delete'] = 'dashboard/Experience/experience_delete';
$route['experience-inactive'] = 'dashboard/Experience/experience_inactive';
$route['experience-active'] = 'dashboard/Experience/experience_active';

// for media page start
//=========== its for media module ==========
$route['add-media'] = 'dashboard/Media/index';
$route['media-save'] = 'dashboard/Media/media_save';
$route['media-list'] = 'dashboard/Media/media_list';
$route['media-edit/(:any)'] = 'dashboard/Media/media_edit/$1';
$route['media-infoupdate'] = 'dashboard/Media/media_update';
// $route['media-update'] = 'dashboard/Media/media_update';
$route['media-delete'] = 'dashboard/Media/media_delete';
$route['media-inactive'] = 'dashboard/Media/media_inactive';
$route['media-active'] = 'dashboard/Media/media_active';


// for media page start
//=========== its for production module ==========
$route['production-infosave'] = 'dashboard/Production/production_save';
$route['production-list'] = 'dashboard/Production/production_list';
$route['production-edit/(:any)'] = 'dashboard/Production/production_edit/$1';
$route['production-infoupdate'] = 'dashboard/Production/production_update';
$route['production-delete'] = 'dashboard/Production/production_delete';
$route['production-inactive'] = 'dashboard/Production/production_inactive';
$route['production-active'] = 'dashboard/Production/production_active';

// for branding page start
//=========== its for branding module ==========
$route['branding-infosave'] = 'dashboard/Branding/branding_save';
$route['branding-list'] = 'dashboard/Branding/branding_list';
$route['branding-edit/(:any)'] = 'dashboard/Branding/branding_edit/$1';
$route['branding-infoupdate'] = 'dashboard/Branding/branding_update';
$route['branding-delete'] = 'dashboard/Branding/branding_delete';
$route['branding-inactive'] = 'dashboard/Branding/branding_inactive';
$route['branding-active'] = 'dashboard/Branding/branding_active';

// for investment page start
//=========== its for investment module ==========
$route['investment-infosave'] = 'dashboard/Investment/investment_save';
$route['investment-list'] = 'dashboard/Investment/investment_list';
$route['investment-edit/(:any)'] = 'dashboard/Investment/investment_edit/$1';
$route['investment-infoupdate'] = 'dashboard/Investment/investment_update';
$route['investment-delete'] = 'dashboard/Investment/investment_delete';
$route['investment-inactive'] = 'dashboard/Investment/investment_inactive';
$route['investment-active'] = 'dashboard/Investment/investment_active';

// for coaching page start
//=========== its for coaching module ==========
$route['coaching-infosave'] = 'dashboard/Coaching/coaching_save';
$route['coaching-list'] = 'dashboard/Coaching/coaching_list';
$route['coaching-edit/(:any)'] = 'dashboard/Coaching/coaching_edit/$1';
$route['coaching-infoupdate'] = 'dashboard/Coaching/coaching_update';
$route['coaching-delete'] = 'dashboard/Coaching/coaching_delete';
$route['coaching-inactive'] = 'dashboard/Coaching/coaching_inactive';
$route['coaching-active'] = 'dashboard/Coaching/coaching_active';

// for sales_marketing page start
//=========== its for sales_marketing module ==========
$route['sales_marketing-infosave'] = 'dashboard/Sales_marketing/sales_marketing_save';
$route['sales_marketing-list'] = 'dashboard/Sales_marketing/sales_marketing_list';
$route['sales_marketing-edit/(:any)'] = 'dashboard/Sales_marketing/sales_marketing_edit/$1';
$route['sales_marketing-infoupdate'] = 'dashboard/Sales_marketing/sales_marketing_update';
$route['sales_marketing-delete'] = 'dashboard/Sales_marketing/sales_marketing_delete';
$route['sales_marketing-inactive'] = 'dashboard/Sales_marketing/sales_marketing_inactive';
$route['sales_marketing-active'] = 'dashboard/Sales_marketing/sales_marketing_active';

//=========== its for digital_media module ==========
$route['add-digital_media'] = 'dashboard/Digital_media/index';
$route['digital_media-save'] = 'dashboard/Digital_media/digital_media_save';
$route['digital_media-list'] = 'dashboard/Digital_media/digital_media_list';
$route['digital_media-edit/(:any)'] = 'dashboard/Digital_media/digital_media_edit/$1';
$route['digital_media-update'] = 'dashboard/Digital_media/digital_media_update';
$route['digital_media-delete'] = 'dashboard/Digital_media/digital_media_delete';
$route['digital_media-inactive'] = 'dashboard/Digital_media/digital_media_inactive';
$route['digital_media-active'] = 'dashboard/Digital_media/digital_media_active';

//=========== its for print media module ==========
$route['add-print_media'] = 'dashboard/Print_media/index';
$route['print_media-save'] = 'dashboard/Print_media/print_media_save';
$route['print_media-list'] = 'dashboard/Print_media/print_media_list';
$route['print_media-edit/(:any)'] = 'dashboard/Print_media/print_media_edit/$1';
$route['print_media-update'] = 'dashboard/Print_media/print_media_update';
$route['print_media-delete'] = 'dashboard/Print_media/print_media_delete';
$route['print_media-inactive'] = 'dashboard/Print_media/print_media_inactive';
$route['print_media-active'] = 'dashboard/Print_media/print_media_active';

//=========== its for media_testimonial module ==========
$route['add-media_testimonial'] = 'dashboard/Media_testimonial/index';
$route['media_testimonial-save'] = 'dashboard/Media_testimonial/media_testimonial_save';
$route['media_testimonial-list'] = 'dashboard/Media_testimonial/media_testimonial_list';
$route['media_testimonial-edit/(:any)'] = 'dashboard/Media_testimonial/media_testimonial_edit/$1';
$route['media_testimonial-update'] = 'dashboard/Media_testimonial/media_testimonial_update';
$route['media_testimonial-delete'] = 'dashboard/Media_testimonial/media_testimonial_delete';
$route['media_testimonial-inactive'] = 'dashboard/Media_testimonial/media_testimonial_inactive';
$route['media_testimonial-active'] = 'dashboard/Media_testimonial/media_testimonial_active';

//=========== its for conference_schedule module ==========
$route['add-conference_schedule'] = 'dashboard/Conference_schedule/index';
$route['conference_schedule-save'] = 'dashboard/Conference_schedule/conference_schedule_save';
$route['conference_schedule-list'] = 'dashboard/Conference_schedule/conference_schedule_list';
$route['conference_schedule-edit/(:any)'] = 'dashboard/Conference_schedule/conference_schedule_edit/$1';
$route['conference_schedule-update'] = 'dashboard/Conference_schedule/conference_schedule_update';
$route['conference_schedule-delete'] = 'dashboard/Conference_schedule/conference_schedule_delete';
$route['conference_schedule-inactive'] = 'dashboard/Conference_schedule/conference_schedule_inactive';
$route['conference_schedule-active'] = 'dashboard/Conference_schedule/conference_schedule_active';

//media page end

//author page start

//=========== its for conference_schedule module ==========
$route['add-author'] = 'dashboard/Author/index';
$route['author-save'] = 'dashboard/Author/author_save';
$route['author-list'] = 'dashboard/Author/author_list';
$route['author-edit/(:any)'] = 'dashboard/Author/author_edit/$1';
$route['author-update'] = 'dashboard/Author/author_update';
$route['author-delete'] = 'dashboard/Author/author_delete';
$route['author-inactive'] = 'dashboard/Author/author_inactive';
$route['author-active'] = 'dashboard/Author/author_active';

//author page end

// for case studies page start
//=========== its for knowledge module ==========
$route['add-case-studie'] = 'dashboard/Case_studie/index';
$route['case-studie-list'] = 'dashboard/Case_studie/case_studie_list';
$route['case-studie-save'] = 'dashboard/Case_studie/case_studie_save';
$route['case_studie-edit/(:any)'] = 'dashboard/Case_studie/case_studie_edit/$1';
$route['case_studie-update'] = 'dashboard/Case_studie/case_studie_update';
$route['case_studie-delete'] = 'dashboard/Case_studie/case_studie_delete';
$route['case_studie-inactive'] = 'dashboard/Case_studie/case_studie_inactive';
$route['case_studie-active'] = 'dashboard/Case_studie/case_studie_active';
// case studie close

//for about start
//=========== its for portfolio module ==========
$route['add-about'] = 'dashboard/About/index';
$route['about-save'] = 'dashboard/About/about_save';
$route['about-list'] = 'dashboard/About/about_list';
$route['about-edit/(:any)'] = 'dashboard/About/about_edit/$1';
$route['about-update'] = 'dashboard/About/about_update';
$route['about-delete'] = 'dashboard/About/about_delete';
$route['about-inactive'] = 'dashboard/About/about_inactive';
$route['about-active'] = 'dashboard/About/about_active';
// about end


//=========== its for portfolio module ==========
$route['add-portfolio'] = 'dashboard/Portfolio/index';
$route['portfolio-save'] = 'dashboard/Portfolio/portfolio_save';
$route['portfolio-list'] = 'dashboard/Portfolio/portfolio_list';
$route['portfolio-edit/(:any)'] = 'dashboard/Portfolio/portfolio_edit/$1';
$route['portfolio-update'] = 'dashboard/Portfolio/portfolio_update';
$route['portfolio-delete'] = 'dashboard/Portfolio/portfolio_delete';
$route['portfolio-inactive'] = 'dashboard/Portfolio/portfolio_inactive';
$route['portfolio-active'] = 'dashboard/Portfolio/portfolio_active';

//=========== its for testimonial module ==========
$route['add-testimonial'] = 'dashboard/Testimonial/index';
$route['testimonial-infosave'] = 'dashboard/Testimonial/testimonial_save';
$route['testimonial-list'] = 'dashboard/Testimonial/testimonial_list';
$route['testimonial-edit/(:any)'] = 'dashboard/Testimonial/testimonial_edit/$1';
$route['testimonial-infoupdate'] = 'dashboard/Testimonial/testimonial_update';
$route['testimonial-delete'] = 'dashboard/Testimonial/testimonial_delete';
$route['testimonial-inactive'] = 'dashboard/Testimonial/testimonial_inactive';
$route['testimonial-active'] = 'dashboard/Testimonial/testimonial_active';

//=========== its for faculty module ==========
$route['add-faculty'] = 'dashboard/Faculty/index';
$route['faculty-save'] = 'dashboard/Faculty/faculty_save';
$route['faculty-list'] = 'dashboard/Faculty/faculty_list';
$route['faculty-list/(:any)'] = 'dashboard/Faculty/faculty_list/$1';
$route['faculty-filter'] = 'dashboard/Faculty/faculty_filter';
$route['faculty-edit/(:any)'] = 'dashboard/Faculty/faculty_edit/$1';
$route['faculty-update'] = 'dashboard/Faculty/faculty_update';
$route['experience-delete'] = 'dashboard/Faculty/experience_delete';
$route['education-delete'] = 'dashboard/Faculty/education_delete';
$route['faculty-delete'] = 'dashboard/Faculty/faculty_delete';
$route['faculty-inactive'] = 'dashboard/Faculty/faculty_inactive';
$route['faculty-active'] = 'dashboard/Faculty/faculty_active';


//=========== its for question module ==========
$route['add-question'] = 'dashboard/Question/index';
$route['question-list'] = 'dashboard/Question/question_list';
$route['question-edit/(:any)'] = 'dashboard/Question/question_edit/$1';

//=========== its for exam module ==========
$route['add-exam'] = 'dashboard/Exam/index';
$route['exam-list'] = 'dashboard/Exam/exam_list';
$route['exam-edit/(:any)'] = 'dashboard/Exam/exam_edit/$1';

//================= its for settings module ============
$route['settings'] = 'dashboard/Setting/index';
$route['settings/(:any)'] = 'dashboard/Setting/index/1$';
$route['checkuser-uniqueemail'] = 'dashboard/User/checkuser_uniqueemail';
$route['get-unique-username'] = 'dashboard/User/get_unique_username';
$route['user-save'] = 'dashboard/User/user_save';
$route['get-userlist'] = 'dashboard/User/get_userlist';
$route['useredit-form'] = 'dashboard/User/useredit_form';
$route['user-update'] = 'dashboard/User/user_update';
$route['user-delete'] = 'dashboard/User/delete';
$route['get-menuform'] = 'dashboard/Permission_setup/index';
$route['get-menulist'] = 'dashboard/Permission_setup/menu_item_list';
$route['menu-save'] = 'dashboard/Permission_setup/menu_save';
$route['menu-edit'] = 'dashboard/Permission_setup/menu_edit';
$route['menu-update'] = 'dashboard/Permission_setup/menu_update';
$route['menu-delete'] = 'dashboard/Permission_setup/menu_delete';
$route['menu-inactive'] = 'dashboard/Permission_setup/menu_inactive';
$route['menu-active'] = 'dashboard/Permission_setup/menu_active';
$route['menu-list'] = 'dashboard/Permission_setup/menu_list';
$route['icon-load'] = 'dashboard/Permission_setup/icon_load';
$route['get-rolepermissionform'] = 'dashboard/Role/get_rolepermissionform';
$route['role-permission-save'] = 'dashboard/Role/save_create';
$route['get-rolepermissionlist'] = 'dashboard/Role/role_list';
$route['role-edit/(:any)'] = 'dashboard/role/edit_role/$1';
$route['role-delete'] = 'dashboard/role/delete_role';
$route['assign-user-role'] = 'dashboard/Role/assign_role_to_user';
$route['assign-user-role-list'] = 'dashboard/Role/assign_role_to_user_list';
$route['user-role-check'] = 'dashboard/Role/user_role_check';
$route['user-access-role-edit'] = 'dashboard/Role/edit_access_role';
$route['role-assign-delete'] = 'dashboard/Role/delete_access_role';
$route['add-language'] = 'dashboard/Language/index';
$route['language-save'] = 'dashboard/Language/addLanguage';
$route['phrase-save'] = 'dashboard/Language/phrase_save';
$route['add-phrase'] = 'dashboard/Language/add_phrase';
$route['phrase-list'] = 'dashboard/Language/phrase_list';
$route['phrase-label-edit/(:any)'] = 'dashboard/language/editPhrase/$1';
$route['phrase-label-edit/(:any)/(:any)'] = 'dashboard/language/editPhrase/$1/$2';
$route['phrase-label-search'] = 'dashboard/language/phrase_label_search';
$route['mail-config'] = 'dashboard/Setting/mail_config';
$route['mailconfig-update'] = 'dashboard/Setting/mail_config_update';
$route['sms-config'] = 'dashboard/Setting/sms_config';
$route['smsconfig-save'] = 'dashboard/Setting/sms_config_update';
$route['payment-method-list'] = 'dashboard/Setting/payment_method_list';
$route['payment-method-activeinactive'] = 'dashboard/Setting/payment_method_activeinactive';
$route['paypal-config'] = 'dashboard/Setting/paypal_config';
$route['stripe-config'] = 'dashboard/Setting/stripe_config';
$route['stripeconfig-save'] = 'dashboard/Setting/stripeconfig_save';
$route['payeer-config'] = 'dashboard/Setting/payeer_config';
$route['payeerconfig-save'] = 'dashboard/Setting/payeerconfig_save';
$route['payu-config'] = 'dashboard/Setting/payu_config';
$route['payuconfig-save'] = 'dashboard/Setting/payuconfig_save';
$route['paypalconfig-save'] = 'dashboard/Setting/paypal_setting_update';
$route['pusher-config'] = 'dashboard/Setting/pusher_config';
$route['pusherconfig-save'] = 'dashboard/Setting/pusherconfig_save';
$route['subscriber-list'] = 'dashboard/Setting/subscriber_list';

$route['companies'] = 'dashboard/Setting/companies';
$route['company-infosave'] = 'dashboard/Setting/company_infosave';


$route['company-edit'] = 'dashboard/Setting/company_edit';
$route['company-infoupdate'] = 'dashboard/Setting/company_infoupdate';
$route['company-delete'] = 'dashboard/Setting/company_delete';

$route['slider-infosave'] = 'dashboard/Setting/slider_infosave';
$route['slider-edit'] = 'dashboard/Setting/slider_edit';
$route['slider-infoupdate'] = 'dashboard/Setting/slider_infoupdate';
$route['slide-delete'] = 'dashboard/Setting/slide_delete';




$route['aboutus-form'] = 'dashboard/Setting/aboutus_form';
$route['aboutus-save'] = 'dashboard/Setting/aboutus_save';
$route['privacy-policy-form'] = 'dashboard/Setting/privacy_policy_form';
$route['privacy-policy-save'] = 'dashboard/Setting/privacy_policy_save';
$route['termscondition-form'] = 'dashboard/Setting/termscondition_form';
$route['termscondition-save'] = 'dashboard/Setting/termscondition_save';
$route['slider-form'] = 'dashboard/Setting/slider_form';
$route['slider-info-save'] = 'dashboard/Setting/slider_info_save';
$route['currency-form'] = 'dashboard/Setting/currency_form';
$route['currency-save'] = 'dashboard/Setting/currency_save';
$route['currency-list'] = 'dashboard/Setting/currency_list';
$route['currencyedit-form'] = 'dashboard/Setting/currencyedit_form';
$route['currency-update'] = 'dashboard/Setting/update_currencyinfo';
$route['currencyinfo-delete'] = 'dashboard/Setting/currencyinfo_delete';
$route['add-appsetting'] = 'dashboard/Setting/app_setting';


//========== its for user module ==========
$route['add-user'] = 'dashboard/user/form';
$route['user-list'] = 'dashboard/user/index';

//============= its for news & events module ==============
$route['event-category'] = 'dashboard/Eventcontroller/event_category';
$route['event-category/(:any)'] = 'dashboard/Eventcontroller/event_category/$1';
$route['event-category-save'] = 'dashboard/Eventcontroller/event_category_save';
$route['eventcategory-edit'] = 'dashboard/Eventcontroller/eventcategory_edit';
$route['eventcategory-update'] = 'dashboard/Eventcontroller/eventcategory_update';
$route['event-category-delete'] = 'dashboard/Eventcontroller/event_category_delete';
$route['add-event'] = 'dashboard/Eventcontroller/add_event';
$route['events-save'] = 'dashboard/Eventcontroller/events_save';
$route['event-list'] = 'dashboard/Eventcontroller/events_list';
$route['event-edit/(:any)'] = 'dashboard/Eventcontroller/event_edit/$1';
$route['events-update'] = 'dashboard/Eventcontroller/events_update';
$route['event-delete/(:any)'] = 'dashboard/Eventcontroller/event_delete/$1';
$route['comment-list'] = 'dashboard/Eventcontroller/comment_list';
$route['comment-active'] = 'dashboard/Eventcontroller/comment_active';
$route['comment-inactive'] = 'dashboard/Eventcontroller/comment_inactive';
$route['comment-delete/(:any)'] = 'dashboard/Eventcontroller/comment_delete/$1';
$route['events-filter'] = 'dashboard/Eventcontroller/events_filter';

//set modules/config/routes.php
$modules_path = APPPATH . 'modules/';
$modules = scandir($modules_path);

foreach ($modules as $module) {
    if ($module === ' . ' || $module === ' . .
    ')
        continue;
    if (is_dir($modules_path) . ' / ' . $module) {
        $routes_path = $modules_path . $module . ' / config/routes.php';
        if (file_exists($routes_path)) {
            require($routes_path);
        } else {
            continue;
        }
    }
}
