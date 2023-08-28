<style>
    
html {
    --theme: rgb(91, 213, 210);
    --theme-ecriture:  rgb(86, 86, 86);
    --background-theme: rgb(241, 241, 241);
}


body {
    margin: 0;
    font-family: 'Lucida Fax';
    line-height: 1.4;
    background-color: var(--background-theme);
    transition: all .5s;
}
a {
    text-decoration: none;
    color: inherit;
}

.grid {
    display: grid;
    grid-template-columns: 300px 1fr;
}

.topbar {
    display: block;
    background-color: var(--theme);
    padding: 15px 12px;
    position: fixed;
    top: 0;
    left: 300px;
    box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.36);
    right: 0;
    z-index: 1;
    border-left: solid 4px rgb(0, 0, 0);
    grid-column-start: 3;
}

.navbar {
    display: flex;
    justify-content: space-between;
    color: azure;
}
.nav-link {
    display: flex;
    justify-content: space-between;
    margin-left: 22px;
}
.navbar a {
    padding: 8px 6px;
    transition: all .4s;
    margin-left: 2%;
}
.navbar-title {
    display: inline-block;
    font-family: 'Castellar';
    margin-right: 8%;
    font-size: 18px;
}
.navbar a:hover {
    color: var(--theme-ecriture);
}



.main {
    padding: 20px;
    padding-right: 50px;
    margin-top: 8%;
    background-color: rgba(236, 236, 236, 0.322);
}
/*

.grid {
    display: grid;
    grid-template-columns: 1fr 250px;
}
.header {
    grid-column-start: 1;
    grid-column-end: 3;
    height: 80px;
    box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.36);
}

.main, 
.sidebar {
    height: 800px;
}
.banner {
    height: 350px;
    grid-column-start: 1;
    grid-column-end: 3;
}

.footer {
    grid-column-start: 1;
    grid-column-end: 3;
    height: 100px;
}

*/

.table tr .title{
    color: rgb(91, 213, 210);
}

.table tr .title:hover{
    text-decoration: underline;
}


.button {
    margin-left: 5px;
    margin-right: 5px;
    display: inline-block;
    color: azure;
    padding: 12px 8px;
    background-color: var(--theme);
    border-radius: 3px;
    margin-bottom: 5px;
    margin-top: 5px;
    transition: all .4s;
    border: none;
}
.navbar .logout {
    background-color: var(--background-theme);
    padding: 8px 12px;
    color: var(--theme);
    border-radius: 5px;
    margin-right: 5%;
    transition: .6s;
    border: none;
}


.navbar .logout:hover {
    background-color: var(--theme);
    color: azure;
    cursor: pointer;
}

.button_danger {
    background-color: red;
    font-family:  'Lucida Fax';
    font-size: 1.05rem;
    border: none;
    display: inline;
}

.action {
    display: flex;
    justify-content: space-around;
}

tbody td:nth-child(1) {
    min-width: 400px;
}

.button_add {
    margin-bottom: 6%;
}

.button:hover {
    color: #000;
    cursor: pointer;
}

.link {
  color: rgba(13, 172, 150, 1);
}


.link:hover{
    text-decoration: underline;
}

.main h1,
.main table
{
    text-align: center;
}
.main-title {
    margin-bottom: 35px;
    font-size: 2.5rem;
}

.sidebar_admin {
    background-color: white;
    border-radius: 5px;
    position: relative;
    box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.36);
}
.sidebar_admin .sidebar_admin_title{
    display: block;
    position: fixed;
    background-color: var(--theme);
    padding: 18.8px 12px;
    top: 0;
    left: 0;
    right: calc(100% - 300px);
    font-family: "Castellar";
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.36);
    font-size: 1.5rem;
    margin: 0;
    transition: .5s;
}
.sidebar_admin .sidebar_admin_title:hover{
    color: var(--theme-ecriture);
    cursor: pointer;
}
.sidebar_admin_content li{
    transition: all .4s;
    list-style: none;
    padding: 15px;
    border-right: solid 4px transparent;
    font-size: 1.2rem;
}
.sidebar_admin_content ul{
    margin: 0;
    padding: 0;
}
.sidebar_admin_content li:hover{
    background-color: var(--theme);
    color: azure;
    border-right: solid 4px #000;
}
.sidebar_admin_content .active {
    text-decoration: underline;
}
.sidebar_admin_content {
    margin-top: 35%;
    line-height: 2.5;
}

.footer {
    grid-column-start: 1;
    grid-column-end: 3;
    height: 100px;
}

/** Show */

.main-show {
    text-align: justify;
    margin-top: 5%;
}
.aside-show {
    margin-top: 8%;
}
.main-show .center {
    text-align: center;
}

/**************************************** */
.grid_main {
    display: grid;
    grid-template-columns: 20px 1fr;
}


.table {
    background-color: rgb(241, 241, 241);
    grid-column-start: 1;
    grid-column-end: 3;
}

thead,
tbody,
tfoot,
tr,
td,
th {
  border-color: inherit;
  border-style: solid;
  border-width: 0;
}


thead,
tbody,
tfoot,
td,
th {
  border-bottom: rgba(13, 13, 13, 0.497) solid 2px;
  border-left: rgba(13, 13, 13, 0.497) solid 2px;
}

tr {
  border-left:  rgba(13, 13, 13, 0.497) solid 2px;
  border-right: rgba(13, 13, 13, 0.497) solid 2px;
}

.form-group {
    margin-bottom: 25px;
}

label {
    display: inline-block;
    margin-bottom: 10px;
}
            
.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}


    
.form-control:focus {
    color: #212529;
    background-color: #fff;
    border-color: rgb(51, 197, 195);
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgba(76, 205, 203, 0.512);
}


.form-control::placeholder {
  color: #6c757d;
  opacity: 1;
}
.form-control:disabled, .form-control[readonly] {
  background-color: #e9ecef;
  opacity: 1;
}

            
input,
button,
select,
optgroup,
textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

select {
    text-transform: none;
}

[role=button] {
    cursor: pointer;
}

select {
    word-wrap: normal;
}
select:disabled {
    opacity: 1;
}

.alert {
    position: relative;
    padding: 1rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}
.alert-success {
    color: #0f5132;
    background-color: #d1e7dd;
    border-color: #badbcc;
}

.alert-danger {
  color: #842029;
  background-color: #f8d7da;
  border-color: #f5c2c7;
}


.invalid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 0.875em;
  color: #dc3545;
}

.was-validated :invalid ~ .invalid-feedback,
.was-validated :invalid ~ .invalid-tooltip,
.is-invalid ~ .invalid-feedback,
.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .form-control:invalid, .form-control.is-invalid {
  border-color: #dc3545;
  padding-right: calc(1.5em + 0.75rem);
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right calc(0.375em + 0.1875rem) center;
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}
.was-validated .form-control:invalid:focus, .form-control.is-invalid:focus {
  border-color: #dc3545;
  box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}

.was-validated textarea.form-control:invalid, textarea.form-control.is-invalid {
  padding-right: calc(1.5em + 0.75rem);
  background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
}

.was-validated .form-select:invalid, .form-select.is-invalid {
  border-color: #dc3545;
}
.was-validated .form-select:invalid:not([multiple]):not([size]), .was-validated .form-select:invalid:not([multiple])[size="1"], .form-select.is-invalid:not([multiple]):not([size]), .form-select.is-invalid:not([multiple])[size="1"] {
  padding-right: 4.125rem;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e"), url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
  background-position: right 0.75rem center, center right 2.25rem;
  background-size: 16px 12px, calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}
.was-validated .form-select:invalid:focus, .form-select.is-invalid:focus {
  border-color: #dc3545;
  box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}

.was-validated .form-check-input:invalid, .form-check-input.is-invalid {
  border-color: #dc3545;
}
.was-validated .form-check-input:invalid:checked, .form-check-input.is-invalid:checked {
  background-color: #dc3545;
}
.was-validated .form-check-input:invalid:focus, .form-check-input.is-invalid:focus {
  box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}
.was-validated .form-check-input:invalid ~ .form-check-label, .form-check-input.is-invalid ~ .form-check-label {
  color: #dc3545;
}

.form-check-inline .form-check-input ~ .invalid-feedback {
  margin-left: 0.5em;
}

.was-validated .input-group .form-control:invalid, .input-group .form-control.is-invalid,
.was-validated .input-group .form-select:invalid,
.input-group .form-select.is-invalid {
  z-index: 2;
}
.was-validated .input-group .form-control:invalid:focus, .input-group .form-control.is-invalid:focus,
.was-validated .input-group .form-select:invalid:focus,
.input-group .form-select.is-invalid:focus {
  z-index: 3;
}


</style>