<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="copyright" content="MACode ID, https://macodeid.com/">
<title>Hospital Admin - One Health</title>

<link rel="stylesheet" href="../assets/css/maicons.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
<link rel="stylesheet" href="../assets/vendor/animate/animate.css">
<link rel="stylesheet" href="../assets/css/theme.css">

<!-- Custom Admin Styles -->
<style>
body {
    background-color: #f8f9fa;
}

.page-section {
    padding: 80px 0;
}

.admin-sidebar {
    background: #fff;
    border-right: 1px solid #e9ecef;
    min-height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    width: 250px;
    z-index: 1000;
    box-shadow: 2px 0 4px rgba(0,0,0,0.1);
}

.admin-sidebar .nav-link {
    color: #495057;
    padding: 12px 20px;
    margin: 5px 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.admin-sidebar .nav-link:hover {
    color: #007bff;
    background-color: #f8f9fa;
}

.admin-sidebar .nav-link.active {
    color: #007bff;
    background-color: #e3f2fd;
}

.admin-main {
    margin-left: 250px;
    padding: 20px;
}

.admin-header {
    background: #fff;
    border-bottom: 1px solid #e9ecef;
    padding: 15px 0;
    margin-bottom: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.btn-primary {
    background: #007bff;
    border: none;
    border-radius: 25px;
    padding: 10px 30px;
    font-weight: 600;
}

.btn-primary:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

.table {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 0;
}

.table thead th {
    background: #007bff;
    color: white;
    border: none;
    font-weight: 600;
    padding: 15px;
}

.table tbody td {
    padding: 15px;
    border-bottom: 1px solid #f8f9fa;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    padding: 12px;
    font-size: 14px;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.alert {
    border-radius: 10px;
    border: none;
    font-weight: 500;
}

.text-primary {
    color: #007bff !important;
}

@media (max-width: 768px) {
    .admin-sidebar {
        width: 100%;
        position: relative;
    }
    .admin-main, .admin-header {
        margin-left: 0;
    }
}

/* Custom table styling */
.table-responsive {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

/* Form styling */
.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
}

/* Button styling */
.btn {
    border-radius: 25px;
    font-weight: 600;
    padding: 10px 25px;
    transition: all 0.3s ease;
}

.btn-success {
    background: #28a745;
    border: none;
}

.btn-success:hover {
    background: #218838;
    transform: translateY(-2px);
}

.btn-danger {
    background: #dc3545;
    border: none;
}

.btn-danger:hover {
    background: #c82333;
    transform: translateY(-2px);
}
</style>