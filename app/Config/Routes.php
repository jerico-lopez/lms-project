<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin_login', 'Login::admin');
$routes->post('/admin_login', 'Login::admin');

$routes->get('/teacher_login', 'Login::teacher');
$routes->post('/teacher_login', 'Login::teacher');

$routes->get('/student_login', 'Login::student');
$routes->post('/student_login', 'Login::student');

$routes->get('/teacher_signup', 'Signup::teacher');
$routes->post('/teacher_signup', 'Signup::teacher');

$routes->get('/student_signup', 'Signup::student');
$routes->post('/student_signup', 'Signup::student');

$routes->get('/teacher_home', 'Home::teacher');
$routes->get('/teacher/edit/profile', 'Edit::teacher');
$routes->post('/teacher/edit/profile', 'Edit::teacher');
$routes->get('/teacher/upload/profilepicture', 'Upload::teacher');
$routes->post('/teacher/upload/profilepicture', 'Upload::teacher');
$routes->get('/teacher_viewclass/(:num)', 'Home::teacherViewClass/$1');
$routes->post('/teacher_viewclass/(:num)', 'Home::teacherViewClass/$1');
$routes->get('/teacher/delete/class/(:num)', 'Delete::teacherDeleteClass/$1');
$routes->post('/teacher/delete/class/(:num)', 'Delete::teacherDeleteClass/$1');
$routes->post('/teacher/delete/announcement/(:num)', 'Delete::teacherDeleteAnnouncement/$1');
$routes->get('/teacher_addcourse', 'Course::addCourse');
$routes->post('/teacher_addcourse', 'Course::addCourse');

$routes->get('/student_home', 'Home::student');
$routes->get('/student_enroll', 'Enroll::enroll');
$routes->post('/student_enroll', 'Enroll::enroll');

$routes->get('/teacher/confirm/logout', 'Logout::confirmLogout');
$routes->get('/logout', 'Logout::logout');