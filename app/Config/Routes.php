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

$routes->get('/student/login', 'Login::student');
$routes->post('/student/login', 'Login::student');

$routes->get('/teacher_signup', 'Signup::teacher');
$routes->post('/teacher_signup', 'Signup::teacher');

$routes->get('/student/signup', 'Signup::student');
$routes->post('/student/signup', 'Signup::student');

$routes->group('', ['filter' => 'AuthTeacher'], function ($routes) {
    $routes->get('/teacher_home', 'Home::teacher');
    $routes->get('/teacher/edit/profile', 'Edit::teacher');
    $routes->post('/teacher/edit/profile', 'Edit::teacher');
    $routes->get('/teacher/upload/photo', 'Upload::teacherUploadPhoto');
    $routes->post('/teacher/upload/photo', 'Upload::teacherUploadPhoto');
    $routes->get('/teacher_viewclass/(:num)', 'Home::teacherViewClass/$1');
    $routes->post('/teacher_viewclass/(:num)', 'Home::teacherViewClass/$1');
    $routes->get('/teacher/delete/class/(:num)', 'Delete::teacherDeleteClass/$1');
    $routes->post('/teacher/delete/class/(:num)', 'Delete::teacherDeleteClass/$1');
    $routes->post('/teacher/delete/announcement/(:num)', 'Delete::teacherDeleteAnnouncement/$1');
    $routes->get('/teacher/confirm/remove/student/(:num)', 'Delete::teacherRemoveStudentFromClass/$1');
    $routes->post('/teacher/confirm/remove/student/(:num)', 'Delete::teacherRemoveStudentFromClass/$1');
    $routes->get('/teacher_addcourse', 'Course::addCourse');
    $routes->post('/teacher_addcourse', 'Course::addCourse');
    $routes->get('/teacher/confirm/logout', 'Logout::teacherConfirmLogout');
});

$routes->group('', ['filter' => 'AuthStudent'], function ($routes) {
    $routes->get('/student/home', 'Home::student');
    $routes->get('/student/edit/profile', 'Edit::student');
    $routes->post('/student/edit/profile', 'Edit::student');
    $routes->get('/student/viewclass/(:num)', 'Home::studentViewClass/$1');
    $routes->post('/student/viewclass/(:num)', 'Home::studentViewClass/$1');
    $routes->get('/student/enroll', 'Enroll::enroll');
    $routes->post('/student/enroll', 'Enroll::enroll');
    $routes->get('/student/upload/photo', 'Upload::studentUploadPhoto');
    $routes->post('/student/upload/photo', 'Upload::studentUploadPhoto');
    $routes->get('/student/confirm/logout', 'Logout::studentConfirmLogout');
});

$routes->get('/logout', 'Logout::logout');
