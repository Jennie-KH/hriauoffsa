@extends('template.main')
@section('content')


<style>
   /* Basic Styles
=================================================================== */

* {
    padding: 0;
    margin: 0;
}

html {
    overflow-y: scroll;
    height: 100%;
}

body {
    background: #F3F3F3;
    color: #333;
    border: none;
    font-weight: 400;
    margin: 0;
    padding: 0;
    width: 100%;
    min-height: 100% !important;
    height: 100%;
}

h1 {
    font-size: 32px;
    line-height: 32px;
    font-weight: bold;
}

h2 {
    font-size: 16px;
    line-height: 16px;
    font-weight: bold;
}

h3 {
    font-size: 15px;
    line-height: 15px;
}

h4 {
    font-size: 14px;
    line-height: 14px;
}

h5 {
    font-size: 13px;
    line-height: 13px;
}

h6 {
    font-size: 12px;
    line-height: 12px;
}

.logo {
    font-weight: bold;
    word-spacing: -1px;
}

.alert {
    border-radius: 0;
}

.alert .close {
    margin: -15px -10px 0 10px;
}

.table tfoot th .text-center,
.table tfoot th .text-right {
    color: #333 !important;
}

#main-con {
    min-height: 100%;
    height: 100%;
    position: relative;
}

.lt {
    width: 100%;
}

.lt td {
    vertical-align: top;
}

.lt td.sidebar-con {
    width: 250px;
    background-color: #000;
}

.sidebar-minified .lt td.sidebar-con {
    width: 0px;
}

#content {
    background-color: #F3F3F3;
    padding: 0 15px;
    transition: transform 0.2s ease-in-out 0s, margin 0.2s ease-in-out 0s;
}

#sidebar-left {
    background-color: #000;
    padding: 10px;
    transition: transform 0.2s ease-in-out 0s, width 0.2s ease-in-out 0s;
}

.sidebar-fixed {
    position: fixed;
    top: 40px;
    bottom: 40px;
    height: 100%;
    padding-bottom: 10px;
    width: 250px;
    padding-bottom: 0;
    margin-bottom: 0;
}

.content-with-fixed {
    margin-left: 0;
}

#content.sidebar-minified {
    width: 100% !important;
    border-left: 40px solid #000;
    margin-left: 0 !important;
    float: left !important;
}

#sidebar-left.minified {
    float: left !important;
}

#content.full {
    width: 100% !important;
    margin-left: 0px !important;
    margin-right: 0px !important;
    border: none !important;
}

.well {
    border: 1px solid #ddd;
    background-color: #f6f6f6;
    box-shadow: none;
    border-radius: 0px;
}

.breadcrumb {
    background: #e9ebec;
    border-radius: 0px;
    height: 40px;
    position: relative;
    border-bottom: 1px solid #dbdee0;
}

.breadcrumb>li+li.right_log:before {
    content: none;
}

.breadcrumb .right_log {
    position: absolute;
    top: 0px;
    right: 0px;
    height: 32px;
    border: none;
    padding: 10px 10px 0 0;
    text-align: right;
    max-width: 600px;
    overflow: hidden;
}

#loading {
    background: url("../images/ajax-loader.gif") no-repeat scroll 50% 10% #FFF;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999999;
}

.noMarginLeft {
    margin-left: 0px !important;
}

.noPadding {
    padding: 0px !important;
}

.box {
    border: 1px solid #dbdee0;
    margin-bottom: 15px;
}

.box .box-content .panel ol,
.box .box-content .panel ul {
    padding-left: 20px;
}

.box.noOverflow {
    overflow: hidden;
}


.box .box-header {
    background: white;
    color: #34383c;
    font-size: 16px;
    background: #f7f7f8;
    border-bottom: 1px solid #dbdee0;
    height: 40px;
}

.box .box-header h2 {
    float: left;
    padding: 10px 0px;
    margin: 0px 0px 0px 20px;
}

.box .box-header h2 i {
    border-right: 1px solid #dbdee0;
    padding: 12px 0px;
    height: 40px;
    width: 40px;
    display: inline-block;
    text-align: center;
    margin: -10px 20px -10px -20px;
    font-size: 16px;
}

.box .box-header h2 i.nb {
    border-right: 0;
    margin-right: 0;
}

.box .box-header .box-icon {
    float: right;
}

.box .box-header .box-icon a:hover {
    text-decoration: none;
}

.box .box-header .box-icon i.icon {
    display: inline-block;
    text-align: center;
    height: 40px;
    width: 40px;
    padding: 12px 0px;
    border-left: 1px solid #ced1d4;
    text-decoration: none;
}

.box-icon .choose-date {
    border-color: #ced1d4;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color -moz-use-text-color -moz-use-text-color #DBDEE0;
    border-image: none;
    border-style: none none none solid;
    border-width: 0 0 0 1px;
    height: 40px;
    padding: 3px 10px;
    width: 350px;
}

.box-icon .choose-date .input-group-addon,
.box-icon .choose-date input {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 0 none;
    box-shadow: none;
}

.box-icon .choose-date .input-group-addon {
    font-size: 12px;
    padding: 0;
}

.box-icon .choose-date .input-group-addon i {
    border: 0;
}

.box-icon .choose-date input {
    font-weight: 300;
}

.box-icon .choose-date input:focus {
    box-shadow: none;
    outline: 0 none;
}

.box .btn-tasks {
    list-style: none;
    margin-bottom: 0;
}

.box .btn-tasks li {
    float: right;
}

.box .btn-tasks li li {
    float: none;
}

.box .box-content {
    padding: 20px;
    background: white;
}

.box .box-content p.introtext {
    background: #F9F9F9;
    margin: -20px -20px 20px -20px;
    padding: 10px;
    border-bottom: 1px solid #DBDEE0;
}

.box .box-content.no-padding {
    background: white;
    padding: 1px 0;
}

.small-box {
    margin-bottom: 20px;
    -webkit-box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.75);
    box-shadow: 1px 1px 2px 0px rgba(50, 50, 50, 0.75);
}

.small-box h3,
.small-box a,
.small-box p {
    text-align: center;
    text-decoration: none;
    color: #FFF;
}

.small-box h3 {
    font-size: 30px;
    line-height: 30px;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 1);
}

.small-box h4 {
    color: rgba(255, 255, 255, 0.4);
    font-weight: normal;
}

.small-box .icon {
    position: absolute;
    top: -10px;
    right: -5px;
    font-size: 155px;
    color: rgba(255, 255, 255, 0.2);
}

.avatar {
    border: 5px solid #FFF;
    outline: 1px solid #DBDEE0;
    width: 100%;
}

.version {
    display: block;
    margin-top: -9px;
    font-weight: bold;
    font-size: 8px;
    float: right;
    font-family: "Times New Roman", Times, serif;
    color: #FFF;
    width: 50px;
    margin-left: -40px;
}


/* Bootstrap Overwrites
=================================================================== */

input {
    box-shadow: none;
}

.input-group-addon {
    padding: 3px;
    border-radius: 0;
}

.enlarge .img-thumbnail {
    max-width: none;
}

.img-thumbnail {
    border-radius: 0;
}

.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:last-child>.btn,
.input-group-btn:last-child>.dropdown-toggle,
.input-group-btn:first-child>.btn:not(:first-child) {
    border-radius: 0;
}

.form-inline label,
.form-inline label.checkbox,
label.checkbox {
    margin-top: 5px;
}

.panel {
    margin-bottom: 15px;
    border-radius: 0;
    box-shadow: none;
}

.modal-content,
.popover,
.tooltip-inner {
    border-radius: 0;
    width: auto;
}

.wide-tip .tooltip-inner {
    max-width: none;
    width: 100%;
}


/*.modal-header {
    background: #428BCA;
    color: #FFF;
} */

.modal-header .close {
    margin-top: -12px;
    /*color: #FFF;
    text-shadow: none;*/
    opacity: 0.4;
}

.close:hover,
.close:focus {
    opacity: 0.7;
}

.modal-title {
    text-transform: uppercase;
    font-weight: bold;
}

.bootbox .modal-footer {
    border: none;
    text-align: center;
}

.has-feedback .form-control {
    padding-right: 0px;
}

.form-control-feedback {
    top: 8px !important;
    right: 5px !important;
    width: auto;
}

.btn,
.form-control {
    border-radius: 0 !important;
}

.btn,
.form-control {
    border-radius: 0 !important;
}

.popover,
.tooltip {
    width: auto;
}

.panel-heading {
    border-radius: 0;
    font-weight: bold;
}

.form-inline label.checkbox div {
    margin-top: -5px;
}

.form-inline select.form-control {
    width: 100%;
}

select.form-control optgroup {
    border: 1px solid #0044cc;
}

select.form-control option {
    padding: 5px 8px;
}

.table th,
.table td {
    vertical-align: middle !important;
}

.table>thead:first-child>tr:first-child>th,
.table>thead:first-child>tr:first-child>td,
.table-striped thead tr.primary:nth-child(odd) th {
    background-color: #052c65;
    color: white;
    border-color: #357EBD;
    border-top: 1px solid #357EBD;
    text-align: center;
}

.table-responsive {
    margin-bottom: 0;
}

.table-responsive .form-inline select.form-control {
    width: auto;
}

.table-responsive .form-inline select.form-control option {
    padding: 0;
}

.table-hover>tbody>tr:hover>td,
.table-hover>tbody>tr:hover>th {
    background-color: #D9EDF7;
    border-color: #AFD9EE;
}

.table-hover>tbody>tr.warning:hover>td,
.table-hover>tbody>tr.warning:hover>th {
    border-color: #F0E1A0;
}

.table-hover>tbody>tr.danger:hover>td,
.table-hover>tbody>tr.danger:hover>th {
    border-color: #ebbbbb;
}

.nav-tabs>li.active>a.tab-grey,
.nav-tabs>li.active>a.tab-grey:hover,
.nav-tabs>li.active>a.tab-grey:focus {
    background-color: #F7F7F8;
}

.table-borderless>thead>tr>th,
.table-borderless>tbody>tr>th,
.table-borderless>tfoot>tr>th,
.table-borderless>thead>tr>td,
.table-borderless>tbody>tr>td,
.table-borderless>tfoot>tr>td {
    border-top: none;
}

.table td p:last-child {
    margin-bottom: 0;
}

.redactor_box,
.redactor_toolbar {
    background: none;
    border-color: #CCC;
}

.redactor_toolbar li.redactor_separator {
    border-left: 1px solid #CCC;
    border-right: 0;
}

.redactor_toolbar li {
    padding: 1px 0 0 1px;
}

.has-error label {
    color: #A94442;
}

.has-success label {
    color: #2b542c;
}

.has-error .btn-file {
    background: #A94442;
    border-color: #843534;
}


/* Colors and Backgrouds
=================================================================== */

.blue {
    color: #052c65 !important;
}

.lightBlue {
    color: #5BC0DE !important;
}

.green {
    color: #bdea74 !important;
}

.mGreen {
    color: #16a085 !important;
}

.darkGreen {
    color: #78cd51 !important;
}

.pink {
    color: #e84c8a !important;
}

.orange {
    color: #fa603d !important;
}

.lightOrange {
    color: #fabb3d !important;
}

.purple {
    color: #8e44ad !important;
}

.red {
    color: #ff5454 !important;
}

.yellow {
    color: #eae874 !important;
}

.white {
    color: white !important;
}

.grey {
    color: #b2b8bd !important;
}

.black {
    color: #000000 !important;
}

.bblue {
    background: #428BCA !important;
}

.blightBlue {
    background: #5BC0DE !important;
}

.bgreen {
    background: #bdea74 !important;
}

.bmGreen {
    background: #16a085 !important;
}

.bdarkGreen {
    background: #78cd51 !important;
}

.bpink {
    background: #e84c8a !important;
}

.borange {
    background: #fa603d !important;
}

.blightOrange {
    background: #fabb3d !important;
}

.bpurple {
    background: #8e44ad !important;
}

.bred {
    background: #ff5454 !important;
}

.byellow {
    background: #eae874 !important;
}

.bwhite {
    background: white !important;
}

.bgrey {
    background: #b2b8bd !important;
}

.blightGrey {
    background: #e9ebec !important;
}

.bblack {
    background: #000000 !important;
}

.clearfix {
    *zoom: 1;
}

.clearfix:before,
.clearfix:after {
    display: table;
    content: "";
    line-height: 0;
}

.clearfix:after {
    clear: both;
}

a:focus {
    outline: 0;
}


/* Header Styles
=================================================================== */

/* .navbar {
    margin: 0;
    min-height: 40px;
    border: none;
    background: #000;
    border-radius: 0px;
    z-index: 2;
} */
/* 
.navbar a {
    color: #7b7b7b;
}

.navbar a i {
    margin-top: 2px;
}

.navbar #search {
    position: relative;
    background: #282b2e;
    height: 30px;
    border: 1px solid #111;
    border-radius: 2px;
    margin: 5px;
}

.navbar #search input {
    margin: 5px 0;
    width: 90%;
    background: transparent;
    border: none;
    color: white;
}

.navbar #search i {
    position: absolute;
    top: 8px;
    right: 10px;
    color: white;
}

a.navbar-brand {
    text-align: left;
    padding: 9px 0 10px 10px !important;
}

a.navbar-brand span {
    color: #fff;
    text-shadow: none;
}

a.navbar-brand.noBg {
    background: transparent;
    border-bottom: none;
} */

.btn-visible-sm .btn {
    color: #FFF;
    width: auto !important;
    padding: 8px 0 8px 15px;
}

.btn-visible-sm .navbar-toggle {
    position: static;
    top: auto;
    margin: 0;
}

.header-nav {
    position: relative;
    padding: 0px;
    color: #fff !important;
    background: #000 !important;
}

.header-nav .btn {
    display: inline-block;
    margin: 0px;
    font-size: 15px;
    text-align: center;
    background: transparent;
    border: none;
    border-radius: 0px;
    box-shadow: none;
}

.header-nav a.btn {
    position: relative;
    height: 30px;
    min-width: 40px;
    width: auto;
    background: #40454a;
    color: #fff !important;
    text-shadow: none !important;
    padding: 5px 10px !important;
    margin: 5px 3px;
    border-radius: 0px;
    font-size: 12px;
}

.header-nav a.btn .number {
    position: absolute;
    font-size: 8px;
    line-height: 10px;
    top: 0;
    right: 0;
    height: 10px;
    width: 10px;
}

.header-nav a.btn.btn-cart {
    border-radius: 2px !important;
}

.header-nav a.btn.account {
    background: transparent;
    height: 40px;
    width: auto;
    padding: 10px 10px 5px 10px !important;
    margin: 0 0 0 3px;
}

.header-nav a.btn.account .mini_avatar {
    max-height: 36px !important;
    margin: -8px 10px -10px 0px;
    float: left;
}

.header-nav a.btn:hover {
    background: #282b2e;
}

.header-nav .user {
    display: inline-block;
    text-align: left;
    margin-top: -5px;
    padding: 0px;
}

.header-nav .user .hello {
    display: block;
    font-size: 11px;
    font-weight: bold;
}

.header-nav .user .name {
    display: block;
    margin-top: -6px !important;
    font-size: 13px;
}

.dropdown-menu {
    list-style: none;
    text-shadow: none;
    border-radius: 0px;
}

.dropdown-menu .divider {
    margin: 2px 0;
}

.dropdown-menu li a i {
    padding-right: 10px;
}

.dropdown-menu-sub-footer {
    text-align: center;
    cursor: pointer;
    background: #F9F9F9;
    padding: 5px;
    border-top: 1px solid rgba(0, 0, 0, 0.15);
}

ul.cart li {
    min-width: 300px;
}

ul.cart li {
    font-size: 12px;
    padding: 5px 0;
}


/* Navigation Styles
=================================================================== */

a#main-menu-toggle {
    width: 40px;
    height: 40px;
    color: white;
    z-index: 1000;
    padding: 8px 13px;
    font-size: 16px;
    text-shadow: none;
    text-decoration: none;
    cursor: pointer;
}

a#main-menu-toggle.close {
    opacity: 1;
    padding: 10px 13px !important;
}

a#main-menu-act {
    display: block;
    border-bottom: 1px solid #111;
    width: 100%;
    margin: 30px 0;
    position: relative;
    text-decoration: none;
}

a#main-menu-act i {
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: -10px;
    width: 20px;
    height: 20px;
    background: #111;
    font-size: 14px;
    padding: 3px 0px;
    color: #CCC;
    text-align: center;
}

a#main-menu-act i:hover {
    background: #222;
    color: #6f7880;
}

.taskProgress {}

.nav-collapse {}

.dropmenu {}

.submenu {}

.sidebar-nav>ul {
    margin: -9px -25px;
    border: none;
    padding-bottom: 1px;
    font-size: 14px;
    white-space: nowrap;
}

.sidebar-nav>ul>li {}

.sidebar-nav>ul>li>ul,
.sidebar-nav>ul>li>ul>li>ul,
.sidebar-nav>ul>li>ul>li>ul>li>ul {
    list-style: none;
    display: none;
    margin: 0;
    padding: 0;
}

.nav.main-menu>li>a,
.nav.main-menu>li>ul>li>a,
.nav.main-menu>li>ul>li>ul>li>a,
.nav.main-menu>li>ul>li>ul>li>ul>li>a {
    margin: 0px;
    height: 40px;
    padding: 1px 0 0 0;
    color: #CCC;
    border: none;
    border-bottom: 1px solid #111;
    background: #000;
    border-radius: 0px;
    text-decoration: none;
    display: block;
    position: relative;
}

.nav.main-menu>li>a .chevron,
.nav.main-menu>li>ul>li>a .chevron,
.nav.main-menu>li>ul>li>ul>li>a .chevron,
.nav.main-menu>li>ul>li>ul>li>ul>li>a .chevron {
    font-family: 'FontAwesome';
    position: absolute;
    top: 2px;
    right: -5px;
    height: 40px;
    width: 40px;
    padding: 12px 0px;
    display: inline-block;
    text-align: center;
    font-size: 10px;
    color: #b2b8bd !important;
}

.nav.main-menu>li>a .chevron.opened:after,
.nav.main-menu>li>ul>li>a .chevron.opened:after,
.nav.main-menu>li>ul>li>ul>li>a .chevron.opened:after,
.nav.main-menu>li>ul>li>ul>li>ul>li>a .chevron.opened:after {
    height: 100%;
    width: 100%;
    content: "\f077";
    text-shadow: none;
}

.nav.main-menu>li>a .chevron.closed:after,
.nav.main-menu>li>ul>li>a .chevron.closed:after,
.nav.main-menu>li>ul>li>ul>li>a .chevron.closed:after,
.nav.main-menu>li>ul>li>ul>li>ul>li>a .chevron.closed:after {
    height: 100%;
    width: 100%;
    content: "\f078";
    text-shadow: none;
    color: #b2b8bd !important;
}

.nav.main-menu>li>a>i,
.nav.main-menu>li>ul>li>a>i {
    margin-right: 10px;
    height: 38px;
    width: 40px;
    padding: 13px 0px;
    display: inline-block;
    text-align: center;
}

.nav.main-menu>li>ul>li>a>i,
.nav.main-menu>li>ul>li>ul>li>a>i,
.nav.main-menu>li>ul>li>ul>li>ul>li>a>i {
    height: 38px;
    width: 40px;
    padding: 13px 0px;
    display: inline-block;
    text-align: center;
    font-size: 13px;
}

.nav.main-menu>li>ul>li>a {
    background: #111;
    border-bottom: 1px solid #222;
}

.nav.main-menu>li>ul>li>ul>li>a {
    background: #222;
    border-bottom: 1px solid #333;
}

.nav.main-menu>li>ul>li>ul>li>ul>li>a {
    background: #333;
    border-bottom: 1px solid #444;
}

.nav.main-menu>li>a:hover,
.nav.main-menu>li>ul>li>a:hover,
.nav.main-menu>li>ul>li>ul>li>a:hover,
.nav.main-menu>li>ul>li>ul>li>ul>li>a:hover {
    background: #000;
    box-shadow: none;
    border-radius: 0px;
    margin: 0;
}

.nav.main-menu>li>a:hover,
.nav.main-menu>li>ul>li>a:hover {
    background: #000;
    box-shadow: none;
    border-radius: 0px;
}

.nav.main-menu>li>a:hover,
.nav.main-menu>li>ul>li>a:hover {
    border: none;
    border-bottom: 1px solid #111;
    color: white;
}


/*.nav.main-menu > li.active {
    border-left: 5px solid #ff5454;
}*/

.nav.main-menu>li.active>a:hover,
.nav.main-menu>li.active>ul>li>a:hover {
    color: white;
}

.nav.main-menu>li:first-child>a {
    margin-top: -1px;
    border-radius: 0px;
}

.nav.main-menu>li:last-child>a {
    border-radius: 0px;
    border-bottom: 0;
}

#sidebar-left.minified {
    width: 40px !important;
    margin-right: -40px;
}

#sidebar-left.minified .sidebar-nav>ul>li {
    position: relative;
}

#sidebar-left.minified .sidebar-nav>ul>li>a {
    width: 40px;
    position: relative;
}

#sidebar-left.minified .sidebar-nav>ul>li>a.open {
    /*cursor: default;*/
}

#sidebar-left.minified .sidebar-nav>ul>li>a .chevron {
    display: none;
    position: absolute;
    left: 198px;
    z-index: 1000;
}

#sidebar-left.minified .sidebar-nav>ul>li>a .text {
    position: absolute;
    z-index: 1000;
    background: #000;
    min-height: 40px;
    width: 170px;
    padding: 8px 15px;
    border: 1px solid #222;
    top: 0px;
    left: 39px;
    display: none !important;
    font-weight: bold;
}

.pointer {
    cursor: pointer;
}

#sidebar-left.minified .sidebar-nav>ul>li>ul {
    display: none !important;
}

#sidebar-left.minified .sidebar-nav>ul>li:hover>a {
    position: relative;
}

#sidebar-left.minified .sidebar-nav>ul>li:hover>a .chevron {
    display: inline-block;
}

#sidebar-left.minified .sidebar-nav>ul>li:hover>a .text {
    position: absolute;
    z-index: 1000;
    background: #000;
    min-height: 41px;
    width: 200px;
    padding: 8px 15px;
    border: 1px solid #222;
    top: 0px;
    left: 39px;
    display: block !important;
    margin-top: -1px;
}

#sidebar-left.minified .sidebar-nav>ul>li:hover>ul {
    display: block !important;
    position: absolute;
    top: 40px;
    left: 39px;
    z-index: 1000;
    width: 200px;
    background: #000;
    border: 1px solid #222;
    border-bottom: none;
}

#sidebar-left.minified .sidebar-nav>ul>li:hover>ul>li>a .text {
    position: absolute;
    z-index: 1000;
    min-height: 40px;
    padding: 8px 15px 8px 0;
    top: 0px;
    left: 39px;
    display: block !important;
}

.nav.main-menu>li.active>a,
#sidebar-left.minified .sidebar-nav>ul>li.active>a .text {
    background: #428BCA;
    color: white;
    border-color: #428BCA;
}

.nav.main-menu>li.active>a:hover {
    background: #428BCA;
    color: white;
    border-color: #428BCA;
    cursor: default;
}

.nav.main-menu>li>ul>li.active>a,
.nav.main-menu>li>ul>li>ul>li.active>a,
.nav.main-menu>li>ul>li>ul>li>ul>li.active>a {
    background: #5BC0DE;
    color: white;
    border-color: #5BC0DE;
    cursor: default;
}

.nav.main-menu>li.active>a>i,
.nav.main-menu>li>ul>li.active>a>i,
.nav.main-menu>li>ul>li>ul>li.active>a>i,
.nav.main-menu>li>ul>li>ul>li>ul>li.active>a>i {
    color: white;
}

#sidebar-left.minified .sidebar-nav>ul>li.active>ul {
    border-top: 0;
}

#sidebar-left.minified .sidebar-nav>ul>li.active>li>a {
    border-color: #5BC0DE;
}

@media (max-width: 991px) {
    /*.table-responsive {
        width: 100%;
        overflow-y: scroll;
        overflow-x: scroll;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        border: 1px solid #dddddd;
        -webkit-overflow-scrolling: touch;
    }*/
    .table-responsive .table td:last-child,
    .table-responsive .table th:last-child {
        display: none;
    }
    .table-responsive .reports-table th:last-child,
    .table-responsive .reports-table td:last-child {
        display: table-cell !important;
    }
    .table-responsive .col-md-6.text-left,
    .table-responsive .col-md-6.text-right {
        text-align: center !important;
    }
    .table-responsive .table.dfTable td:last-child,
    .table-responsive .table.dfTable th:last-child,
    .modal-body .table-responsive .table th:last-child,
    .modal-body .table-responsive .table td:last-child {
        display: table-cell;
    }
    .order-table th:last-child,
    .order-table td:last-child {
        display: table-cell !important;
    }
}


/* Tabs Styles
=================================================================== */

.nav-tabs li a {
    border-color: #dbdee0;
    border-radius: 0px;
    background: #e9ebec;
    margin: 6px -1px -6px 0px;
    line-height: 1;
}

.nav-tabs li a:hover {
    border-color: #dbdee0;
    background: #dbdee0;
}

.nav-tabs li.active>a {
    line-height: 1.428571429;
    margin: 0 -1px 0 0;
}

.nav-tabs .dropdown-menu>li>a {
    clear: both;
    background: #FFF;
    color: #333;
    display: block;
    font-weight: 400;
    line-height: 1.42857;
    padding: 3px 20px;
    white-space: nowrap;
    margin: 0;
}

.nav-tabs .dropdown-menu>li>a:hover {
    background: #F5F5F5;
}

.nav-tabs .dropdown-menu>li.active>a {
    background: #428bca;
    color: #FFF;
    margin: 0;
}


/* Box Styles
=================================================================== */

.box .tab-content {
    background: white;
    border: 1px solid #dbdee0;
    border-top: none;
    padding: 10px;
}

.box .tab-pane {
    border: 1px solid #dbdee0;
    border-top: 0;
    padding: 10px;
    margin-top: -1px;
}

.tab-content .box {
    border-top: none;
}

.box-header .nav-tabs {
    border: none;
    float: right;
}

.box-header .nav-tabs li a {
    background: transparent;
    border: none;
    border-left: 1px solid #ced1d4;
    border-radius: 0px;
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    font-weight: 300;
    padding: 11px 15px;
    height: 40px;
}

.box-header .nav-tabs li.active>a {
    background: white;
    border: none;
    border-left: 1px solid #ced1d4;
}

.box-header .nav-tabs li:hover {
    border: none;
}

.box-header .nav-tabs li:last-child {
    margin-right: 3px;
}

.box-content .tab-content {
    background: transparent;
    border: none;
    padding: 0;
}


/*.box .select2-container { width: 100%; }*/


/* Footer Styles
=================================================================== */

footer {
    background: #000;
    color: white;
    height: 40px;
    padding: 12px 20px 18px 20px !important;
    margin: 0 !important;
    /*position: absolute;
    bottom: 0;*/
    width: 100%;
    font-size: 12px;
}

footer a {
    color: white;
    font-weight: bold;
}


/* Quick Links Styles
=================================================================== */

.quick-button {
    margin-bottom: -1px;
    padding: 30px 0px 10px 0px;
    font-size: 14px;
    display: block;
    text-align: center;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
    opacity: 0.9;
}

.quick-button:hover {
    text-decoration: none;
    opacity: 1;
}

.quick-button .notification {
    border-radius: 2px;
    top: -1px;
    right: -1px;
    font-size: 10px;
}

.quick-button i {
    font-size: 32px;
}

.quick-button.small {
    padding: 15px 0px 1px 0px;
    font-size: 10px;
}

.quick-button.small i {
    font-size: 20px;
}

.quick-button.small .notification {
    top: -1px;
    right: -1px;
    font-size: 7px;
    padding: 4px 5px;
}


/* Table Styles
=================================================================== */

table tr td.left,
table tr th.left {
    text-align: left;
}

table tr td.center,
table tr th.center {
    text-align: center;
}

table tr td.right,
table tr th.right {
    text-align: right;
}

table tr td .progress {
    margin: 3px 0 0 0;
}

div.dataTables_length label {
    font-weight: normal;
}

div.dataTables_length select {
    width: 75px;
}

div.dataTables_filter label {
    font-weight: normal;
}

div.dataTables_info {
    padding-top: 8px;
}

div.dataTables_paginate {
    float: none;
    margin: 0;
}

div.dataTables_paginate ul.pagination {
    margin: 2px;
}

.DTTT_selectable tbody tr {
    cursor: pointer;
}

div.DTTT .btn {
    color: #333 !important;
    font-size: 12px;
}

div.DTTT .btn:hover {
    text-decoration: none !important;
}

ul.DTTT_dropdown.dropdown-menu {
    z-index: 2003;
}

ul.DTTT_dropdown.dropdown-menu a {
    color: #333 !important;
}

ul.DTTT_dropdown.dropdown-menu li {
    position: relative;
}

.DTTT_Print .bnav,
.DTTT_Print #content {
    width: 100% !important;
    margin: 0 !important;
    background: #F3F3F3 !important;
    border: 0 !important;
    min-height: auto !important;
}

ul.DTTT_dropdown.dropdown-menu li:hover a {
    background-color: #0088cc;
    color: white !important;
}

.DTTT_Print .style-switcher {
    display: none !important;
}

div.DTTT_print_info.modal {
    height: 150px;
    margin-top: -75px;
    text-align: center;
}

div.DTTT_print_info h6 {
    font-weight: normal;
    font-size: 28px;
    line-height: 28px;
    margin: 1em;
}

div.DTTT_print_info p {
    font-size: 14px;
    line-height: 20px;
}

div.DTFC_LeftHeadWrapper table,
div.DTFC_LeftFootWrapper table,
div.DTFC_RightHeadWrapper table,
div.DTFC_RightFootWrapper table,
table.DTFC_Cloned tr.even {
    background-color: white;
}

div.DTFC_RightHeadWrapper table,
div.DTFC_LeftHeadWrapper table {
    margin-bottom: 0 !important;
    border-top-right-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}

div.DTFC_RightHeadWrapper table thead tr:last-child th:first-child,
div.DTFC_RightHeadWrapper table thead tr:last-child td:first-child,
div.DTFC_LeftHeadWrapper table thead tr:last-child th:first-child,
div.DTFC_LeftHeadWrapper table thead tr:last-child td:first-child {
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}

div.DTFC_RightBodyWrapper table,
div.DTFC_LeftBodyWrapper table {
    border-top: none;
    margin-bottom: 0 !important;
}

div.DTFC_RightBodyWrapper tbody tr:first-child th,
div.DTFC_RightBodyWrapper tbody tr:first-child td,
div.DTFC_LeftBodyWrapper tbody tr:first-child th,
div.DTFC_LeftBodyWrapper tbody tr:first-child td {
    border-top: none;
}

div.DTFC_RightFootWrapper table,
div.DTFC_LeftFootWrapper table {
    border-top: none;
}


/* Login Box & Register Box Styles
=================================================================== */

.login-box {
    max-width: 400px;
    width: 100%;
    padding: 20px;
    margin: 20px auto;
    background: #fff;
}

.login-box .header {
    color: white;
    text-align: center;
    margin: -20px -20px 20px -20px;
    padding: 15px;
    text-transform: uppercase;
}

.login-box .form-control {
    border-right: none !important;
    border-radius: 2px 0 0 2px;
}

.login-box .has-error .form-control {
    border-color: #843534;
    box-shadow: none;
}

.login-box .input-group-addon {
    height: 0px !important;
    border: 1px solid #e9ebec !important;
    background: white;
    border-radius: 0;
    border-left: 1px none !important;
    margin-left: -1px !important;
}

.login-box .has-error .input-group-addon {
    border: 1px solid #843534 !important;
    border-left: 1px none !important;
    margin-left: -1px !important;
}

.login-box label {
    margin: 10px 5px -10px 5px;
}

.login-box .form-control {
    border: 1px solid #e9ebec;
    box-shadow: none;
    border-radius: 0px;
    border-right: 0;
}

.login-box .form-control:focus {
    outline: none;
}

.login-box .confirm {
    position: relative;
    margin: 20px 0 10px -15px;
}

.login-box .confirm label {
    position: absolute;
    top: -9px;
    left: 30px;
}

.login-box button {
    margin: 15px 0px !important;
}

.login-box .close {
    margin: 0px !important;
}


/* Page loader and Misc Styles
=================================================================== */

.content-scroll {
    width: 450px;
    color: #333;
    padding: 0;
}

.top-menu-scroll {
    position: relative;
    overflow: hidden;
    max-height: 400px;
    height: auto;
    background: #FFF;
    padding: 0;
}

.oe {
    list-style: none;
}

.oe li {
    border-bottom: 1px solid #ddd;
    padding: 10px;
    color: #333;
}

.oe li:nth-child(even) {
    background-color: #f5f5f5;
}

.oe li:last-child {
    border-bottom: 0;
}

.oe li ul,
.oe li ol {
    margin-left: 15px;
}

.oe li ul li,
.oe li ol li {
    border-bottom: none;
    padding: 3px;
}

.oe li ul li:nth-child(even),
.oe li ol li:nth-child(even) {
    background-color: transparent;
}

.content-scroll .dropdown-header {
    background-color: #F5F5F5;
    border-bottom: 1px solid #ddd;
    color: #8090a0;
}

.content-scroll .dropdown-header a,
.content-scroll .dropdown-footer a {
    padding-top: 5px;
    padding-bottom: 5px;
}

.content-scroll .dropdown-footer {
    background-color: #F5F5F5;
    border-top: 1px solid #ddd;
    text-align: center;
}

.content-scroll .dropdown-content {
    display: block;
    padding: 0;
}

.select2-container-disabled .select2-chosen,
.select2-container-disabled .select2-arrow {
    cursor: not-allowed;
}

.has-error .redactor_box {
    border-color: #a94442;
}

.has-success .redactor_box {
    border-color: #2b542c;
}

.has-error .select2-container .select2-choice {
    border-color: #a94442;
}

.has-success .select2-container .select2-choice {
    border-color: #2b542c;
}

.has-error .select2-container-active .select2-choice,
.has-error .select2-container-active .select2-choices {
    border-color: #a94442;
    box-shadow: 0 0 6px #ce8483;
}

.has-success .select2-container-active .select2-choice,
.has-success .select2-container-active .select2-choices {
    border-color: #2b542c;
    box-shadow: 0 0 6px #67b168;
}

.select2-container-multi.form-control .select2-choices {
    border: none !important;
}

.select2-hidden {
    display: none !important;
}

.select2-container-multi .select2-choices .select2-search-field input.select2-active {
    background: none !important;
}

.select2-container-multi .select2-choices .select2-search-choice {
    border: 0;
    padding: 6px 6px 6px 20px;
    border-radius: 0;
    box-shadow: none;
    background: #F0E1A0;
}

.select2-container-multi .select2-search-choice-close {
    left: 5px;
    top: 6px;
}

#attrTable td,
#attrTable .delAttr,
#attrTable .attr-remove-all,
.pointer {
    cursor: pointer;
}

#attrTable td:last-child {
    cursor: default;
}

.table.barcodes td {
    padding: 30px 20px !important;
}

.table.barcodes .table-barcode {
    width: 100%;
}

.table.barcodes .table-barcode td {
    border-bottom: 1px solid #eee;
    padding: 3px !important;
}

.order-table td ol,
.order-table td ul {
    padding-left: 15px;
}

.vertical-text {
    writing-mode: tb-rl;
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    white-space: nowrap;
    display: block;
    bottom: 0;
    width: 20px;
    height: 20px;
    margin-top: -75px;
}

.global-site-notice {
    background: none repeat scroll 0 0 #ffff90;
    border-color: #cfcfcf;
    border-image: none;
    border-style: solid;
    border-width: 0 0 1px;
    color: #2f2f2f;
    font-size: 12px;
    line-height: 1.25;
    text-align: center;
    height: 55px;
}

.global-site-notice .notice-inner {
    background: url("../images/i_notice.gif") no-repeat scroll 10px 10px rgba(0, 0, 0, 0);
    margin: 0 auto;
    padding: 12px 0 12px 60px;
    text-align: left;
}

.focusedInput {
    border-color: rgba(82, 168, 236, 0.8);
    box-shadow: 0 0 8px rgba(82, 168, 236, 0.6);
    outline: 0 none;
}

.transparent-input {
    background: transparent;
    border: none;
    box-shadow: none;
}

.style-switcher {
    position: absolute;
    top: 82px;
    right: 12px;
    z-index: 1;
}

.stick {
    position: fixed;
    top: 0px;
}

.bold {
    font-weight: bold;
}

.padding05 {
    padding: 0 5px;
}

.padding10 {
    padding: 10px 0 !important;
}

.padding010 {
    padding: 10px 0 !important;
}

.padding1010 {
    padding: 10px !important;
}

.padding-right-10 {
    padding-right: 10px;
}

.padding-left-10 {
    padding-left: 10px;
}

.margin05 {
    margin: 0 5px;
}

.margin010 {
    margin: 10px 0 !important;
}

.margin1010 {
    margin: 10px !important;
}

.margin-right-10 {
    margin-right: 10px;
}

.margin-left-10 {
    margin-left: 10px;
}

.border-left {
    border-left: 1px solid #dbdee0;
}

.border-right {
    border-right: 1px solid #dbdee0;
}

.totals td {
    width: 16.666%;
    font-weight: bold;
}

.stick-bottom {
    position: fixed;
    bottom: 0px;
}

.nav .open>a,
.nav .open>a:hover,
.nav .open>a:focus {
    background-color: #aaa;
    outline: none;
}

.buttons .btn {
    margin-bottom: 3px;
}

.buttons .btn i {
    margin-right: 5px;
}

label {
    margin-top: 5px;
}

.product_link,
.customer_details_link,
.supplier_details_link,
.product_link2 td:first-child,
.product_link2 td:nth-child(2) {
    cursor: pointer;
}

.product_link td:first-child,
.product_link td:nth-child(2),
.product_link td:last-child,
.customer_details_link td:first-child,
.customer_details_link td:last-child,
.supplier_details_link td:first-child,
.supplier_details_link td:last-child {
    cursor: default;
}

.purchase_link,
.transfer_link,
.loan_link2,
.loan_link,
.invoice_link,
.quote_link,
.delivery_link,
.return_link,
.return_purchase_link,
.receipt_link,
.payment_link,
.payment_link2,
.payment_link3,
.invoice_link2,
.purchase_link2,
.expense_link2,
.transfer_link2,
.quote_link2,
.row_status,
.loan_status,
.adjustment_link,
.adjustment_link2 {
    cursor: pointer;
}

.purchase_link td:first-child,
.purchase_link td:nth-child(5),
.purchase_link td:nth-last-child(2),
.purchase_link td:last-child,
.transfer_link td:first-child,
.transfer_link td:nth-last-child(3),
.transfer_link td:nth-last-child(2),
.transfer_link td:last-child,
.invoice_link td:first-child,
.invoice_link td:last-child,
.invoice_link td:nth-last-child(2),
.invoice_link td:nth-child(6),
.loan_link td:first-child,
.loan_link td:last-child,
.loan_link td:nth-last-child(2),
.loan_link td:nth-child(6),
.receipt_link td:first-child,
.receipt_link td:last-child,
.quote_link td:first-child,
.quote_link td:nth-last-child(3),
.quote_link td:nth-last-child(2),
.quote_link td:last-child,
.delivery_link td:first-child,
.delivery_link td:last-child,
.delivery_link td:nth-last-child(2),
.delivery_link td:nth-last-child(3),
.adjustment_link td:first-child,
.adjustment_link td:last-child,
.adjustment_link td:nth-last-child(2),
.expense_link2 td:last-child {
    cursor: default;
}

.order:hover,
.invoice:hover,
.quote:hover {
    cursor: pointer !important;
}

.bartable td {
    width: 20%;
}

.sheettable td {
    width: 50%;
}

.text_filter,
.select_filter,
.text_filter:focus,
.select_filter:focus {
    border: 0;
    width: 100%;
    background: none;
    box-shadow: none;
    height: auto;
    padding: 0;
}

#options .form-control-feedback {
    top: -10px !important;
}

#fileList,
#cfileList,
#acfileList {
    list-style: none;
}

#fileList li,
#cfileList li,
#acfileList li {
    list-style: none;
    border: 1px solid #ccc;
    float: left;
    padding: 5px;
    text-align: center;
    margin: 5px;
}

#fileList li span,
#cfileList li span,
#acfileList li span {
    font-family: Tahoma, Geneva, sans-serif;
    font-size: 10px;
}

#fileList li span,
#cfileList li span,
#acfileList li span {
    display: block;
}

.myfileupload-buttonbar input {
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 0;
    padding: 0;
    width: 1px;
    height: 1px;
    border: solid transparent;
    border-width: 0;
    opacity: 0.0;
    filter: alpha(opacity=0);
    -o-transform: translate(250px, -50px) scale(1);
    -moz-transform: translate(-300px, 0) scale(4);
    direction: ltr;
    cursor: pointer;
}

.checkbox div {
    margin-right: 5px;
}

.ui-autocomplete-loading {
    background: #FFFFFF url("../images/loading.gif") no-repeat right center;
}

ul.enlarge {
    list-style-type: none;
    margin: 0;
    padding: 0 !important;
}

ul.enlarge li {
    display: inline-block;
    position: relative;
    z-index: 55555;
}

ul.enlarge span {
    position: absolute;
    left: -9999px;
}

ul.enlarge li:hover {
    cursor: pointer;
}

ul.enlarge li:hover span {
    bottom: 0px;
    left: 30px;
}

.no-modal-header .close {
    margin-top: -12px;
}

.loader {
    color: white;
    top: 5%;
    left: 50%;
    margin-left: -53px;
    position: fixed;
    padding: 3px;
    width: 106px;
    height: 106px;
    background: url('../images/ajax-loader.gif') no-repeat center;
    z-index: 4;
}

.blackbg {
    z-index: 3;
    background-color: #666;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
    filter: alpha(opacity=30);
    opacity: 0.3;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    position: fixed;
}

#ajaxCall {
    display: none;
    color: #000;
    background: #FFF;
    border-radius: 25px;
    top: 2%;
    right: 2%;
    position: fixed;
    width: 51px;
    height: 50px;
    z-index: 55555;
    text-align: center;
}

#ajaxCall i {
    font-size: 50px;
}

.dtBtn {
    margin: 5px 0 0 10px;
}

.dataTable {
    margin: 0 0 3px 0;
}

.dataTables_processing {
    position: absolute;
    top: 15px;
    left: 50%;
    width: 250px;
    margin-left: -125px;
    text-align: center;
    color: #999;
    font-size: 0px;
    padding: 2px 0;
    background: url('../images/loading_bar.gif') no-repeat center;
    z-index: 1000;
    height: 20px;
}

fieldset.scheduler-border {
    border: 1px solid #DBDEE0 !important;
    padding: 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.1em !important;
    font-weight: bold !important;
    text-align: left !important;
    width: auto;
    color: #428BCA;
    padding: 5px 15px;
    border: 1px solid #DBDEE0 !important;
    margin: 0;
    /*background: #DBDEE0;*/
}

.bv-form .help-block {
    margin-bottom: 0;
}

.bv-form .tooltip-inner {
    text-align: left;
}

.nav-tabs li.bv-tab-success>a {
    color: #3c763d;
}

.nav-tabs li.bv-tab-error>a {
    color: #a94442;
}

.no-help-block.has-error .help-block {
    display: none !important;
}

#codeigniter_profiler:after,
#codeigniter_profiler:before,
#codeigniter_profiler {
    width: 100% !important;
    height: auto !important;
    border: none !important;
    margin: 0 !important;
    position: absolute;
}


/* Listing page tables
=============================================================== */

#SLData,
#POData,
#PRData,
#GCData,
#POSData,
#DOData,
#QUData,
#TOData,
#PrRData,
#SRData,
#SRData,
#SlRData,
#PoRData,
#PayRData,
#RESLData,
#registerTable,
#SupData,
#CusData {
    width: 100% !important;
}

#GCData th,
#QUData th {
    width: 15%;
}

#SLData th {
    width: 13%;
}

#POData th,
#TOData th {
    width: 15%;
}

#POSData th,
#DOData th {
    width: 14%;
}

#PRData th {
    width: 9%;
}

#POData td:nth-child(6),
#POData td:nth-child(7),
#POData tfoot th:nth-child(6),
#POData tfoot th:nth-child(7),
#POData td:nth-child(5),
#POData td:nth-child(8),
#POData tfoot th:nth-child(5),
#POData tfoot th:nth-child(8) {
    width: 11%;
}

#PRData {
    width: 100% !important;
}

#PRData th:nth-child(4) {
    width: 16%;
}

#PRData th:nth-child(3) {
    width: 11%;
}

#PRData th:nth-child(5),
#PRData th:nth-child(6) {
    width: 10%;
}

#PRData th:nth-child(10) {
    width: 7%;
}

#TOData td:nth-child(6),
#TOData td:nth-child(7),
#TOData td:nth-child(8),
#TOData tfoot th:nth-child(6),
#TOData tfoot th:nth-child(7),
#TOData tfoot th:nth-child(8) {
    text-align: right;
    width: 10%;
}

#GCData td:nth-child(3),
#GCData td:nth-child(4) {
    text-align: right;
}

#SLData td:nth-child(7),
#SLData td:nth-child(8),
#SLData tfoot th:nth-child(7),
#SLData tfoot th:nth-child(8),
#SLData td:nth-child(6),
#SLData tfoot th:nth-child(6),
#SLData td:nth-child(9),
#SLData tfoot th:nth-child(9),
#SLData td:nth-child(10),
#SLData tfoot th:nth-child(10) {
    width: 9% !important;
}

#SLData td:last-child,
#SLData tfoot th:last-child {
    width: 8%;
}

#POSData td:nth-child(6),
#POSData td:nth-child(7),
#POSData tfoot th:nth-child(6),
#POSData tfoot th:nth-child(7),
#POSData td:nth-child(8),
#POSData tfoot th:nth-child(8) {
    width: 10% !important;
    text-align: right;
}

#POSData td:nth-child(9),
#POSData tfoot th:nth-child(9) {
    width: 12%;
}

#DOData th:nth-child(6) {
    width: 38%;
}

#PrRData th {
    width: 10%;
}

#SRData th:first-child,
#PrRData th:nth-child(2) {
    width: 22%;
}

#PrRData td:nth-child(3),
#PrRData td:nth-child(4),
#PrRData td:nth-child(5),
#PrRData td:nth-child(6),
#PrRData td:nth-child(7) {
    text-align: right;
    width: 12%;
}

#PrRData td:nth-child(5) {
    font-weight: bold;
}

#SlRData th {
    width: 13%;
}

#SlRData th:nth-child(6),
#SlRData th:nth-child(7),
#SlRData th:nth-child(8),
#SlRData th:nth-child(9) {
    width: 9% !important;
}

#PoRData th {
    width: 13%;
}

#PoRData th:nth-child(6),
#PoRData th:nth-child(7),
#PoRData th:nth-child(8),
#PoRData th:nth-child(9) {
    width: 9%;
}

#PayRData th {
    width: 16%;
}

#PayRData th:nth-child(5),
#PayRData th:nth-child(6),
#PayRData th:nth-child(7) {
    width: 12%;
}

#PayRData td:nth-child(7) {
    text-transform: capitalize;
}

#PayRData td:nth-child(6),
#PayRData tfoot th:nth-child(6) {
    text-align: right;
}

#CusData th {
    width: 10%;
}

#CusData tfoot th:nth-child(2),
#CusData tfoot th:nth-child(3),
#CusData tfoot th:nth-child(4) {
    width: 13%;
}

#CusData td:nth-child(9) {
    text-align: right;
}

#SupData th {
    width: 12.5%;
}

#RESLData th {
    width: 15%;
}

#RESLData th:nth-child(6),
#RESLData th:nth-child(7),
#RESLData th:nth-child(8) {
    width: 8%;
}

#RESLData td:nth-child(6),
#RESLData td:nth-child(7),
#RESLData tfoot th:nth-child(6),
#RESLData tfoot th:nth-child(7) {
    text-align: right;
}

#registerTable td {
    width: 11%;
}

#registerTable td:nth-child(5),
#registerTable td:nth-child(6) {
    width: 9%;
    text-align: center;
}

#registerTable td:nth-child(4),
#registerTable td:nth-child(7) {
    width: 9%;
    text-align: right;
}

#registerTable td:nth-child(8) {
    width: 27%;
}

.table-right-left td {
    width: 16.666%;
}

.table-right-left td:nth-child(odd) {
    text-align: right;
}

.table-right-left td:nth-child(even) {
    text-align: left;
    font-weight: bold;
}

.highcharts-contextmenu hr {
    display: none;
}

.highcharts-container {
    width: 100% !important;
    height: 100% !important;
}

.two-columns th,
.two-columns td {
    width: 50%;
}

.three-columns th,
.three-columns td {
    width: 33.333%;
}

.print-only {
    display: none;
}


/* Gift card view
=================================================================== */

.card {
    width: 353px;
    height: 450px;
    border-radius: 10px;
    margin: 15px auto;
    color: #FFF;
}

.card .card_img {
    position: absolute;
    top: 0;
    left: 0;
    width: 353px;
    height: 206px;
}

.card .front {
    position: relative;
}

.card .back {
    margin-top: 230px;
    position: relative;
}

.card .middle {
    display: table-cell;
    vertical-align: middle;
    width: 353px;
    height: 206px;
}

.card .card-content {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 55555;
    height: 206px;
    width: 100%;
    display: block;
    padding: 10px;
    text-align: center;
}


/* Total Valus Blinking Style - Not all browsers support this
=================================================================== */


/*@keyframes blink {
to { color: #d43f3a; }
}
.totals_val {
color: #000;
animation: blink 1s steps(2, start) infinite;
}
@keyframes blink {
to { background: #5bc0de; }
}
.totals_val {
background: transparent;
padding: 1px 5px;
animation: blink 1s steps(2, start) infinite;
}*/


/* Higher than 1200 (desktop devices)
====================================================================== */

@media (min-width: 1200px) {
    .hidden-xs,
    .hidden-sm,
    .hidden-md,
    .hidden-lg {
        display: inline-block !important;
    }
    a.navbar-brand {
        position: absolute;
        left: 15px;
    }
    .navbar-collapse {
        max-height: 100%;
    }
    .container {
        width: 100% !important;
    }
    .container .breadcrumb {
        margin: 0px -15px 15px -15px;
        padding: 10px;
    }
}


/* Higher than 992 (desktop devices)
====================================================================== */

@media only screen and (min-width: 992px) and (max-width: 1199px) {
    .hidden-xs,
    .hidden-sm,
    .hidden-md,
    .hidden-lg {
        display: inline-block !important;
    }
    a.navbar-brand {
        position: absolute;
        left: 15px;
    }
    .navbar-collapse {
        max-height: 100%;
    }
    .container {
        width: 100% !important;
    }
    .container .breadcrumb {
        margin: -15px -15px 15px -15px;
        padding: 10px;
    }
}


/* Tablet Portrait (devices and browsers)
====================================================================== */

@media only screen and (min-width: 768px) and (max-width: 991px) {
    a#main-menu-toggle {
        margin-left: 8.334%;
    }
    a.navbar-brand {
        padding: 8px 0px !important;
        position: absolute;
        left: 15px;
    }
    a.navbar-brand span {
        font-size: 18px;
    }
    .navbar-collapse {
        max-height: 100%;
    }
    .container {
        width: 100% !important;
    }
    .container #content {
        padding: 15px;
    }
    .container .breadcrumb {
        margin: -15px -15px 15px -15px;
        padding: 10px;
    }
    .btn-navbar {
        display: none !important;
    }
    .padding05 {
        padding: 0;
    }
    .lt td.sidebar-con {
        width: 40px;
    }
    .content-scroll {
        width: 300px;
    }
}


/* All Mobile Sizes (devices and browser)
====================================================================== */

@media only screen and (max-width: 767px) {
    body:after,
    body:before {
        display: none;
    }
    a.navbar-brand {
        margin-bottom: 0px;
        max-height: 40px;
    }
    #search {
        margin-left: 10px !important;
    }
    /*.hidden-sm {
        display: inline-block !important;
    }*/
    .nav-tabs>li {
        float: none;
    }
    .nav-tabs li a {
        margin: -1px 0 0 0;
    }
    .navbar-toggle {
        position: absolute;
        top: -3px;
        right: -10px;
        z-index: 100;
        background: transparent !important;
        text-shadow: none !important;
        border: none !important;
    }
    .navbar-toggle .icon-bar {
        background: white;
    }
    .navbar-collapse {
        max-height: 100%;
        border-top: none;
        box-shadow: none;
        padding-right: 0px;
        padding-left: 0px;
    }
    .navbar-collapse.in {
        overflow: hidden;
    }
    .header-nav {
        display: none;
    }
    .header-nav li {
        float: left;
    }
    .lt td.sidebar-con {
        width: 0px;
    }
    .lt td.content-con {
        min-width: 200px !important;
        width: auto !important;
    }
    #content .breadcrumb {
        margin: -4px -5px 10px -5px;
    }
    .dataTables_wrapper label {
        width: 100%;
        margin-top: 5px;
    }
    .dataTables_wrapper .form-control {
        display: inline-block;
    }
    .padding05 {
        padding: 0;
    }
    footer {
        height: auto;
    }
}


/* Mobile Landscape Size to Tablet Portrait (devices and browsers)
====================================================================== */

@media only screen and (min-width: 480px) and (max-width: 767px) {
    body {
        padding: 0px;
    }
    #content {
        padding: 5px;
    }
    .sidebar-nav>ul {
        margin: 0;
    }
    .dataTables_wrapper label {
        width: 100%;
        margin-top: 5px;
    }
    .dataTables_wrapper .form-control {
        display: inline-block;
    }
    #sidebar-left {
        padding: 0 !important;
    }
    .btn-group .btn {
        width: 50%;
    }
}


/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers)
=================================================================== */

@media only screen and (max-width: 479px) {
    body {
        padding: 0px;
    }
    header {
        text-align: center;
    }
    .col-xxs-12 {
        width: 100%;
    }
    a.navbar-brand {
        width: 100%;
        text-align: center;
    }
    .btn-visible-sm {
        display: inline-block !important;
        float: none !important;
    }
    .sidebar-nav>ul {
        margin: 0;
    }
    #search select {
        display: none;
    }
    #search input {
        margin-top: 5px;
        margin-left: -10px !important;
        width: 100% !important;
    }
    #content {
        padding: 5px;
    }
    .quick-button,
    .quick-button-small {
        margin-bottom: 20px;
    }
    .discussions ul li .date {
        display: none;
    }
    #sidebar-left {
        padding: 0 !important;
    }
    .btn-group .btn {
        width: 50%;
    }
}

#chart text,
.hc-tip {
    font-family: 'Ubuntu', sans-serif !important;
    font-size: 15px !important;
}


/* dtFilter
============================================ */

.dtFilter th {
    color: #999;
}

.dtFilter-filter-reset-button,
.dtFilter-filter-wrapper,
.dtFilter-filter-wrapper .dtFilter-filter {
    display: none;
}

.dtFilter-filter-wrapper:first-child {
    display: block;
    width: 100%;
}

.dtFilter-filter-wrapper .dtFilter-filter:first-child {
    display: block;
    padding: 3px 0px;
    color: #333;
    border: none;
    background: transparent;
    width: 100%;
}

.dtFilter-filter-wrapper .dtFilter-filter:first-child:focus {
    background: white;
}

.dtFilter-filter-wrapper .select2-container .select2-choice {
    height: 25px;
    line-height: 25px;
    padding: 0 0 0 3px;
    background: transparent;
    box-shadow: none !important;
}

.dtFilter-filter-wrapper .select2-container .select2-choice .select2-arrow {
    padding: 0;
    top: -2px;
    background: transparent;
}

.dtFilter-filter-wrapper .select2-container .select2-choice abbr {
    top: 5px;
}

.dtFilter-filter-wrapper .select2-dropdown-open .select2-choice {
    background: white;
}


/* Calculator
============================================= */

.calc {
    width: 200px;
    padding: 4px;
    color: #333
}

div.is-calculator,
span.is-calculator {
    position: relative
}

button.calculator-trigger {
    width: 25px;
    padding: 0
}

img.calculator-trigger {
    margin: 2px;
    vertical-align: middle
}

.calculator-keyentry {
    position: absolute;
    top: 0;
    right: 3px;
    width: 0;
    border: none;
    background: 0 0
}

.calculator-inline {
    position: relative;
    border: 1px solid #CCC;
    background-color: #f4f4f4
}

.calculator-inline .calculator-close {
    display: none
}

.calculator-rtl {
    direction: rtl
}

.calculator-prompt {
    clear: both;
    text-align: center
}

.calculator-prompt.ui-widget-header {
    margin: 2px
}

.calculator-result {
    clear: both;
    margin: 0;
    padding: 2px;
    text-align: right;
    background-color: #fff;
    border: 1px solid #CCC;
    font-size: 110%;
    overflow: hidden
}

.calculator-result span {
    display: inline-block;
    width: 100%
}

.calculator-result .calculator-formula {
    font-size: 60%
}

.calculator-focussed {
    background-color: #ffc
}

.calculator-row {
    clear: both;
    width: 100%
}

.calculator-space {
    float: left;
    margin: 2px;
    width: 28px
}

.calculator-half-space {
    float: left;
    margin: 1px;
    width: 14px
}

.calculator-row button {
    position: relative;
    float: left;
    margin: 0;
    padding: 0;
    height: 40px;
    width: 25%;
    line-height: 40px;
    text-align: center;
    cursor: pointer;
    background: #FFF;
    border: 1px solid #CCC
}

.calculator-inline .calculator-add,
.calculator-inline .calculator-clear,
.calculator-inline .calculator-divide,
.calculator-inline .calculator-multiply,
.calculator-inline .calculator-percent,
.calculator-inline .calculator-plus-minus,
.calculator-inline .calculator-subtract,
.calculator-inline .calculator-undo {
    background: #EEE
}

.calculator-inline .calculator-equals {
    background: #bdea74
}

@-moz-document url-prefix() {
    .calculator-base,
    Firefox .calculator-trig {
        text-indent: -3px
    }
}

.calculator-keystroke {
    display: none;
    width: 16px;
    height: 14px;
    position: absolute;
    left: -1px;
    top: -1px;
    color: #000;
    background-color: #fff;
    border: 1px solid #CCC;
    font-size: 80%
}

.calculator-angle .calculator-keystroke,
.calculator-base .calculator-keystroke,
.calculator-trig .calculator-keystroke {
    top: -2px;
    font-size: 95%
}

.calculator-keyname {
    width: 22px;
    font-size: 70%
}

.gallery-image {
    position: relative;
    display: inline-block;
}

.gallery-image .delimg {
    position: absolute;
    top: 0;
    right: 9px;
}

.sname {
    cursor: pointer;
}
tr th{
    font-size:12px;
}
tr td{
    font-size:12px;
    font-weight:bold;
}
.nowrap {
    white-space: nowrap;
}
</style>

<div class="box">

    <div class="box-header">

        <h2 class="blue"><i class="fa-fw fa fa-credit-card"></i><?= 'វត្តមាន' ?></h2>

        <div class="box-icon">

            <ul class="btn-tasks">

                <li class="dropdown">

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="icon fa fa-tasks tip"  data-placement="left" title="<?= 'actions' ?>"></i>

                    </a>

                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">

                        <li>

                            <a href="#" id="excel" data-action="export_excel">
    
                                <i class="fa fa-file-excel-o"></i> <?= 'export_to_excel' ?>
        
                            </a>
        
                        </li>
                
                    </ul>
                
                </li>
            
            </ul>
        
        </div>
        
    </div>

    <div class="box-content">
    
        <div class="row">

            <div class="col-lg-12">

                <p class="introtext">បញ្ជីវត្តមាន</p>

                <div class="table-responsive">

                    <table id="listAttendance" class="table table-bordered display align-middle mb-0 bg-white" width="100%">
                    
                        <thead class="custom-thead text-center">
                        
                            <tr>
                            
                                <th><input type="checkbox" name="select_multiple_id" id="select_multiple_id"></th>
                                
                                <th class="nowrap">ល.រ</th>
                                
                                <th class="nowrap">ឈ្មោះ</th>
                                
                                <th class="nowrap">កាត់សម្គាល់</th>
                                
                                <th class="nowrap">ពេលព្រឺកម៉ោងចូល</th>
                                
                                <th class="nowrap">ពេលល្ងាចម៉ោងចេញ</th>

                                <th class="nowrap">ស្ថានភាពស្កេន</th>
                                
                                <th class="nowrap">ចំនួនម៉ោងធ្វើការ</th>
                                
                                <th class="nowrap">ចំនួនម៉ោងបន្ថែម</th>
                                
                                <th class="nowrap">ចំនួនម៉ោងសរុប</th>
                                
                                <th class="nowrap">ស្ថានការណ៍</th>
                            
                            </tr>
                        
                        </thead>
                
                        <tbody>
                    
                            <?php $i=1;?>
                            
                            @foreach($attendances as $row)
                         
                            
                            <tr>
                            
                                <td><input type="checkbox" name="ids" value="{{$row->id}}"  class="checkbox_ids" id="ids" ></td>
                                
                                <td>{{$i++}}</td>
                                
                                <td class="nowrap">
                            
                                    {{$row->user_name}}
                                
                                </td>
                                
                                <td class="nowrap">
                                
                                    {{$row->card_id}}
                                
                                </td>
                                
                                <td class="nowrap">    
                                
                                    @if(isset($time_in[$row->id]))
                                    <!-- <input type="text" name="time_in" id="time_in" value="{{$time_in[$row->id]}}"> -->
                                        {{$time_in[$row->id]}}
                                    
                                    @endif
                                
                                </td>
                                
                                <td class="nowrap" >      
                                
                                    @if(isset($time_out[$row->id]))
                                       
                                    {{$time_out[$row->id]}}
                                    
                                    @else
                                    
                                        ពុំទាន់មាន
                                    
                                    @endif
                                
                                </td>
                                
                                <td class="nowrap">
                                
                                    @if(isset($time_in[$row->id])&& isset($time_out[$row->id]))
                                    
                                        បានរួចរាល់

                                    @else
                                        
                                        មិនទាន់រួចរាល់
                                    
                                    @endif
                                    
                                </td>
                                
                                <td class="nowrap">
                        
                                    <p id="demo_{{$row->id}}"></p>
                        
                                </td>

                                <td class="nowrap">
                                
                                    @if(isset($total_hours[$row->id]))
                                    
                                        {{$total_hours[$row->id]}}
                                        
                                    @else
                                    
                                        មិនទាន់មាន
                                        
                                    @endif
                                
                                </td>
                                
                        
                                <td class="nowrap">
                        
                                    @if(isset($time_in[$row->id])&& isset($time_out[$row->id]))
                            
                                        @if($total_hours[$row->id])
                                
                                            {{$total_hours[$row->id]}}
                                
                                        @else
                                    
                                            ពុំទាន់មាន
                                        
                                        @endif   
                                
                                    @else
                                    
                                        ពុំទាន់មាន
                                    
                                    @endif
                                
                                </td>
                                
                                <td class="nowrap">
                                
                                    <span class="badge badge-success rounded-pill d-inline">
                                    
                                    @if ($row->active == 1)
                                    
                                        មកធ្វ់ើការ
                                    @endif
                                    
                                    </span>
                                
                                </td>
                            
                            </tr>
                            <script>
                                $(document).ready(function(){
                                    var clockInterval; // Define clock interval globally
                                    // var startTime = new Date("{{$time_in[$row->id]}}"); // Start time
                                    // alert(startTime);
                                    // var time_in=$("#time_in").val();
                                    // alert(time_in);
                                    // Get today's date
                                    var today = new Date(); 

                                    // Set break time to today at 12:00:00
                                    var breakTime = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 12, 0, 0); 

                                    // Set evening work time to today at 14:00:00
                                    var workEvening = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 14, 0, 0);
                                    
                                    var breakAfternoon = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 16, 30, 0);

                                    function updateClock(){
                                        var startTime = new Date("{{$time_in[$row->id]}}"); //2023-01-29 08:54:42
                                        var now = new Date();
                                        var diff = now.getTime() - startTime.getTime(); // Calculate time elapsed from start
                                        
                                        now.setTime(startTime.getTime() + diff);
                                        var elapsed = new Date(diff);
                                        var hours = elapsed.getUTCHours();
                                        var minutes = elapsed.getUTCMinutes();
                                        var seconds = elapsed.getUTCSeconds();

                                        hours = hours < 10 ? '0' + hours : hours;
                                        minutes = minutes < 10 ? '0' + minutes : minutes;
                                        seconds = seconds < 10 ? '0' + seconds : seconds;

                                        var textString = hours + ':' + minutes + ':' + seconds;

                                        // Compare current time with break time
                                        if (now >= breakTime) {
                                            clearInterval(clockInterval); // Stop the clock
                                            var totalTime = calculateElapsedTime(startTime, breakTime); // Calculate total elapsed time until break
                                            $("#demo_{{$row->id}}").text("Total time until break: " + totalTime); // Update demo text
                                            // if(workEvening>breakTime){

                                            // }
                                        } else {
                                            $("#demo_{{$row->id}}").text(textString); // Update demo text with current time
                                        }
                                    
                                        //  $("#demo").text(textString); // Update demo text with current time
                                    }

                                    // Function to calculate elapsed time in HH:mm:ss format
                                    function calculateElapsedTime(startTime, endTime) {
                                        var diff = endTime.getTime() - startTime.getTime();
                                        var hours = Math.floor(diff / (1000 * 60 * 60));
                                        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

                                        hours = hours < 10 ? '0' + hours : hours;
                                        minutes = minutes < 10 ? '0' + minutes : minutes;
                                        seconds = seconds < 10 ? '0' + seconds : seconds;

                                        return hours + ':' + minutes + ':' + seconds;
                                    }

                                    clockInterval = setInterval(updateClock, 1000); // Start the clock interval

                                    updateClock(); // Initial call to display the clock
                                });
                            </script>
                            @endforeach
                        
                        </tbody>
                
                    </table>
            
                 </div>
        
            </div>

        </div>

    </div>
</div>

   <!-- checkbox_attendance -->
   <script>
        
        $(function(e){
        
            $("#select_multiple_id").click(function(){
        
                $(".checkbox_ids").prop("checked",$(this).prop("checked"));
        
            });
        
        });

        // $(document).ready(function(){

        //     function updateClock(){
                
        //         var initailDate=new Date("2024-01-28T08:00:00");
                
        //         var now=new Date();
                
        //         var diff=now.getTime()-initailDate.getTime();

        //         now.setTime(initailDate.getTime()+diff);

        //         var hours=now.getHours();
                
        //         var minutes=now.getMinutes();
                
        //         var seconds=now.getSeconds();

        //         hours = hours < 10 ? '0' + hours : hours;
                
        //         minutes = minutes < 10 ? '0' + minutes : minutes;
                
        //         seconds = seconds < 10 ? '0' + seconds : seconds;

        //         var textString=hours+':'+minutes+':'+seconds;
                

        //         $("#demo").text(textString);

        //     }
        //     setInterval(updateClock, 1000);

        //     updateClock();
        // });
        // $(document).ready(function(){
        //     var clockInterval; // Define clock interval globally
        //     var startTime = new Date("2024-01-28T08:00:00"); // Start time
        //     var breakTime = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 12, 0, 0); // Set break time to today at 12:00:00
        //     var workEvening = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 14, 0, 0); // Set break time to today at 12:00:00

        //     function updateClock(){
        //         var now = new Date();
        //         var diff = now.getTime() - startTime.getTime(); // Calculate time elapsed from start

        //         now.setTime(startTime.getTime() + diff);

        //         var hours = now.getHours();
        //         var minutes = now.getMinutes();
        //         var seconds = now.getSeconds();

        //         hours = hours < 10 ? '0' + hours : hours;
        //         minutes = minutes < 10 ? '0' + minutes : minutes;
        //         seconds = seconds < 10 ? '0' + seconds : seconds;

        //         var textString = hours + ':' + minutes + ':' + seconds;

        //         // Compare current time with break time
        //         if (now >= breakTime) {
        //             clearInterval(clockInterval); // Stop the clock
        //             var totalTime = calculateElapsedTime(startTime, breakTime); // Calculate total elapsed time
        //             $("#demo").text("Total time until break: " + totalTime); // Update demo text
        //         } else {
        //             $("#demo").text(textString); // Update demo text with current time
        //         }

               
        //     }

        //     // Function to calculate elapsed time in HH:mm:ss format
        //     function calculateElapsedTime(startTime, endTime) {
        //         var diff = endTime.getTime() - startTime.getTime();
        //         var hours = Math.floor(diff / (1000 * 60 * 60));
        //         var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        //         var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        //         hours = hours < 10 ? '0' + hours : hours;
        //         minutes = minutes < 10 ? '0' + minutes : minutes;
        //         seconds = seconds < 10 ? '0' + seconds : seconds;

        //         return hours + ':' + minutes + ':' + seconds;
        //     }

        //     clockInterval = setInterval(updateClock, 1000); // Start the clock interval

        //     updateClock(); // Initial call to display the clock
        // });
        // $(document).ready(function(){
        //     var clockInterval; // Define clock interval globally
        //     var startTime = new Date("2024-01-29T08:54:42"); // Start time

        //     // var time_in=$("#time_in").val();
        //     // alert(time_in);
        //     // Get today's date
        //     var today = new Date(); 

        //     // Set break time to today at 12:00:00
        //     var breakTime = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 12, 0, 0); 

        //     // Set evening work time to today at 14:00:00
        //     var workEvening = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 14, 0, 0);
            
        //     var breakAfternoon = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 16, 30, 0);

        //     function updateClock(){
        //         var now = new Date();
        //         var diff = now.getTime() - startTime.getTime(); // Calculate time elapsed from start

        //         now.setTime(startTime.getTime() + diff);

        //         var hours = now.getHours();
        //         var minutes = now.getMinutes();
        //         var seconds = now.getSeconds();

        //         hours = hours < 10 ? '0' + hours : hours;
        //         minutes = minutes < 10 ? '0' + minutes : minutes;
        //         seconds = seconds < 10 ? '0' + seconds : seconds;

        //         var textString = hours + ':' + minutes + ':' + seconds;

        //         // Compare current time with break time
        //         if (now >= breakTime) {
        //             clearInterval(clockInterval); // Stop the clock
        //             var totalTime = calculateElapsedTime(startTime, breakTime); // Calculate total elapsed time until break
        //             $("#demo").text("Total time until break: " + totalTime); // Update demo text

        //         } else {
        //             $("#demo").text(textString); // Update demo text with current time
        //         }
              
        //         //  $("#demo").text(textString); // Update demo text with current time
        //     }

        //     // Function to calculate elapsed time in HH:mm:ss format
        //     function calculateElapsedTime(startTime, endTime) {
        //         var diff = endTime.getTime() - startTime.getTime();
        //         var hours = Math.floor(diff / (1000 * 60 * 60));
        //         var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        //         var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        //         hours = hours < 10 ? '0' + hours : hours;
        //         minutes = minutes < 10 ? '0' + minutes : minutes;
        //         seconds = seconds < 10 ? '0' + seconds : seconds;

        //         return hours + ':' + minutes + ':' + seconds;
        //     }

        //     clockInterval = setInterval(updateClock, 1000); // Start the clock interval

        //     updateClock(); // Initial call to display the clock
        // });

       

    </script>
@endsection
