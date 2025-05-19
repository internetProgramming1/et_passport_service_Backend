<!DOCTYPE html>
<html>

<head>
    <title>New Applications</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap');

        :root {
            --sidebar-width: 250px;
            --header-height: 80px;
            --primary-color: #005f99;
        }

        body {
            font-family: "Noto Serif", serif;
            background-color: #f8f9fa;
        }

        /* Header Styles */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            height: var(--header-height);
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .logo-img {
            height: 60px;
            object-fit: contain;
        }

        /* Sidebar Styles */
        .sidebar {
            padding-top: 30px;
            position: fixed;
            top: var(--header-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--header-height));
            background: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            z-index: 900;
        }

        .sidebar .list-group-item {
            border: none;
            border-radius: 0;
            padding: 12px 20px;
            color: #495057;
            border-left: 4px solid transparent;
        }

        .sidebar .list-group-item:hover,
        .sidebar .list-group-item.active {
            background-color: #f8f9fa;
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }

        .sidebar .list-group-item.active {
            font-weight: bold;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: calc(100vh - var(--header-height));
        }

        /* Application Cards */
        .application-card {
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .application-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .urgent-badge {
            background-color: rgb(225, 98, 111);
        }

        .normal-badge {
            background-color: rgb(60, 182, 200);
        }

        /* Details View */
        .detail-view {
            display: none;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-top: 20px;
        }

        .detail-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .detail-label {
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .detail-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .detail-section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .document-thumbnail {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ddd;
            margin-right: 10px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block !important;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/Images/passport-1.webp" class="logo-img" alt="logo">
            </a>



            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <a href="/admin/dashboard" class="nav-link">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/logout" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler sidebar-toggle d-lg-none" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="list-group list-group-flush">
            <a href="/application/new" class="list-group-item list-group-item-action active">
                <i class="fas fa-file-alt me-2"></i> New Application
            </a>
            <a href="/application/renewal" class="list-group-item list-group-item-action">
                <i class="fas fa-sync-alt me-2"></i> Renewal Applications
            </a>
            <a href="/application/lost" class="list-group-item list-group-item-action">
                <i class="fas fa-exclamation-triangle me-2"></i> Lost Application
            </a>
            <a href="/application/correction" class="list-group-item list-group-item-action">
                <i class="fas fa-edit me-2"></i> Correction Applications
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">

            <h1 class="mb-4"><i class="fas fa-file-alt me-2"></i> New Applications</h1>




            <!-- Search Form -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <form method="POST" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="app_no"
                                placeholder="Search by Application Number..."
                                value="<?= htmlspecialchars($_POST['app_no'] ?? '') ?>">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Application Display -->
            <div class="card-body">
                <?php if (isset($_POST['app_no'])): ?>
                    <!-- Search Results View -->
                    <?php if (!empty($application)): ?>
                        <div class="card application-card border-primary mb-4">
                            <div class="card-header bg-primary text-white">
                                <h2 class="mb-0"><i class="fas fa-search me-2"></i> Search Results</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Submission Date</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($application as $index => $app): ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td><?= htmlspecialchars(($app['first_name'] ?? $app['firstname'] ?? '') . ' ' . ($app['middle_name'] ?? $app['middlename'] ?? '') . ' ' . ($app['last_name'] ?? $app['lastname'] ?? '')) ?></td>
                                                    <td><?= htmlspecialchars($app['email']) ?></td>
                                                    <td><?= htmlspecialchars($app['phone']) ?></td>
                                                    <td><?= date('M d, Y H:i', strtotime($app['created_at'])) ?></td>
                                                    <td><?= isset($app['is_urgent']) ? 'Urgent' : 'Normal' ?></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary view-btn"
                                                            data-id="<?= $app['id'] ?>"
                                                            data-type="<?= isset($app['is_urgent']) ? 'urgent' : 'normal' ?>"
                                                            data-appdata="<?= htmlspecialchars(json_encode($app)) ?>">
                                                            <i class="fas fa-eye me-1"></i> View Details
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">No applications found for "<?= htmlspecialchars($_POST['app_no']) ?>".</div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>

            <!-- Application List View -->
            <div id="applicationListView">
                <!-- Urgent Applications -->
                <div class="card application-card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h2 class="mb-0"><i class="fas fa-exclamation-circle me-2"></i> Urgent Applications</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($urgentApps)): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Submission Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($urgentApps as $index => $app): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($app['first_name'] || $app['firstname'] . " " . $app['middlename'] || $app['first_name'] . " " . $app['last_name'] || $app['lastname']) ?></td>
                                                <td><?= htmlspecialchars($app['email']) ?></td>
                                                <td><?= htmlspecialchars($app['phone']) ?></td>
                                                <td><?= date('M d, Y H:i', strtotime($app['created_at'])) ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary view-btn"
                                                        data-id="<?= $app['id'] ?>"
                                                        data-type="urgent"
                                                        data-appdata="<?= htmlspecialchars(json_encode($app)) ?>">
                                                        <i class="fas fa-eye me-1"></i> View Details
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">No urgent applications found.</div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Normal Applications -->
                <div class="card application-card border-info mt-4">
                    <div class="card-header bg-info text-white">
                        <h2 class="mb-0"><i class="fas fa-file-alt me-2"></i> Normal Applications</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($normalApps)): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Submission Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($normalApps as $index => $app): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($app['firstname'] . " " . $app['middlename'] . " " . $app['lastname']) ?></td>
                                                <td><?= htmlspecialchars($app['email']) ?></td>
                                                <td><?= htmlspecialchars($app['phone']) ?></td>
                                                <td><?= date('M d, Y H:i', strtotime($app['created_at'])) ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-info text-white view-btn"
                                                        data-id="<?= $app['id'] ?>"
                                                        data-type="normal"
                                                        data-appdata="<?= htmlspecialchars(json_encode($app)) ?>">
                                                        <i class="fas fa-eye me-1"></i> View Details
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">No normal applications found.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Application Details View -->
            <div class="detail-view" id="applicationDetailView">
                <button class="btn btn-secondary mb-3" id="backButton">
                    <i class="fas fa-arrow-left me-1"></i> Back to Applications
                </button>

                <div class="card border-0 shadow-none">
                    <div class="card-header bg-white border-0">
                        <h2 class="mb-0 text-primary"><i class="fas fa-file-invoice me-2"></i> Application Details</h2>
                    </div>
                    <div class="card-body">
                        <!-- Application Info Section -->
                        <div class="detail-section">
                            <h4 class="detail-section-title">Application Information</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Application ID</div>
                                        <div class="detail-value" id="detail-id"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Application Number</div>
                                        <div class="detail-value" id="detail-no"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Application Type</div>
                                        <div class="detail-value" id="detail-type"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Category</div>
                                        <div class="detail-value" id="detail-category"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Site City</div>
                                        <div class="detail-value" id="detail-site-city"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Site Office</div>
                                        <div class="detail-value" id="detail-site-office"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Delivery Site</div>
                                        <div class="detail-value" id="detail-delivery-site"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Delivery/Appointment Date</div>
                                        <div class="detail-value" id="detail-delivery-date"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Submission Date</div>
                                        <div class="detail-value" id="detail-date"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Status</div>
                                        <div class="detail-value" id="detail-status"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information Section -->
                        <div class="detail-section">
                            <h4 class="detail-section-title">Personal Information</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Full Name</div>
                                        <div class="detail-value" id="detail-name"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Email</div>
                                        <div class="detail-value" id="detail-email"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Phone</div>
                                        <div class="detail-value" id="detail-phone"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Gender</div>
                                        <div class="detail-value" id="detail-gender"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Date of Birth</div>
                                        <div class="detail-value" id="detail-dob"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Age Category</div>
                                        <div class="detail-value" id="detail-age-category"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Birthplace</div>
                                        <div class="detail-value" id="detail-birthplace"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Adoption Status</div>
                                        <div class="detail-value" id="detail-adoption-status"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Birth Certificate No</div>
                                        <div class="detail-value" id="detail-birth-cert-no"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Nationality</div>
                                        <div class="detail-value" id="detail-nationality"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Marital Status</div>
                                        <div class="detail-value" id="detail-marital-status"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Occupation</div>
                                        <div class="detail-value" id="detail-occupation"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Information Section -->
                        <div class="detail-section">
                            <h4 class="detail-section-title">Address Information</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Region</div>
                                        <div class="detail-value" id="detail-region"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">City</div>
                                        <div class="detail-value" id="detail-city"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Subcity</div>
                                        <div class="detail-value" id="detail-subcity"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Woreda</div>
                                        <div class="detail-value" id="detail-woreda"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Kebele</div>
                                        <div class="detail-value" id="detail-kebele"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">House No</div>
                                        <div class="detail-value" id="detail-house-no"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">ID Number</div>
                                        <div class="detail-value" id="detail-id-number"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Family Information Section -->
                        <div class="detail-section">
                            <h4 class="detail-section-title">Family Information</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Mother's Name</div>
                                        <div class="detail-value" id="detail-mother-name"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Mother's Father</div>
                                        <div class="detail-value" id="detail-mother-father"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Mother's Grandfather</div>
                                        <div class="detail-value" id="detail-mother-grandfather"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Father's Name</div>
                                        <div class="detail-value" id="detail-father-name"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Father's Father</div>
                                        <div class="detail-value" id="detail-father-father"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Father's Grandfather</div>
                                        <div class="detail-value" id="detail-father-grandfather"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Spouse's Name</div>
                                        <div class="detail-value" id="detail-spouse-name"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Spouse's Father</div>
                                        <div class="detail-value" id="detail-spouse-father"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-item">
                                        <div class="detail-label">Spouse's Grandfather</div>
                                        <div class="detail-value" id="detail-spouse-grandfather"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Documents Section -->
                        <div class="detail-section">
                            <h4 class="detail-section-title">Supporting Documents</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <div class="detail-label">Birth Certificate (Front)</div>
                                        <div id="birth-certificate-front-container">
                                            <img src="" class="document-thumbnail" id="birth-certificate-front" alt="Birth Certificate Front">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <div class="detail-label">Birth Certificate (Back)</div>
                                        <div id="birth-certificate-back-container">
                                            <img src="" class="document-thumbnail" id="birth-certificate-back" alt="Birth Certificate Back">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <div class="detail-label">ID (Front)</div>
                                        <div id="id-front-container">
                                            <img src="" class="document-thumbnail" id="id-front" alt="ID Front">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <div class="detail-label">ID (Back)</div>
                                        <div id="id-back-container">
                                            <img src="" class="document-thumbnail" id="id-back" alt="ID Back">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="POST" action="">
                            <div class="card-footer bg-white border-0 d-flex justify-content-end">
                                <button class="btn btn-success me-2 update-status-btn"
                                    data-id="<?= $app['id'] ?>"
                                    data-status="approved">
                                    <i class="fas fa-check me-1"></i> Approve
                                </button>
                                <button class="btn btn-danger me-2 update-status-btn"
                                    data-id="<?= $app['id'] ?>"
                                    data-status="rejected">
                                    <i class="fas fa-times me-1"></i> Reject
                                </button>
                                <button class="btn btn-primary update-status-btn"
                                    data-id="<?= $app['id'] ?>"
                                    data-status="info_requested">
                                    <i class="fas fa-envelope me-1"></i> Request Info
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle all status update buttons
            document.querySelectorAll('.update-status-btn').forEach(button => {
                button.addEventListener('click', async function() {
                    const id = this.dataset.id;
                    const status = this.dataset.status;
                    const button = this;

                    // Show loading state
                    const originalHTML = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Processing';
                    button.disabled = true;

                    try {
                        const formData = new FormData();
                        formData.append('action', 'update_status');
                        formData.append('id', id);
                        formData.append('status', status);

                        const response = await fetch('/update-status', {
                            method: 'POST',
                            body: formData
                        });

                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }

                        const contentType = response.headers.get('content-type');
                        if (!contentType || !contentType.includes('application/json')) {
                            throw new Error("Invalid response format");
                        }

                        const data = await response.json();

                        if (!data.success) {
                            throw new Error(data.error || 'Update failed');
                        }

                        // Show success and refresh
                        showAlert('success', `Status updated to ${status.replace('_', ' ')}`);
                        setTimeout(() => window.location.reload(), 1500);
                    } catch (error) {
                        console.error('Error:', error);
                        button.innerHTML = originalHTML;
                        button.disabled = false;
                        showAlert('danger', error.message);
                    }
                });
            });

            function showAlert(type, message) {
                // Remove existing alerts first
                const existingAlerts = document.querySelectorAll('.alert');
                existingAlerts.forEach(alert => alert.remove());

                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type} alert-dismissible fade show mt-3`;
                alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
                document.querySelector('.card-body').prepend(alertDiv);
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const listView = document.getElementById('applicationListView');
            const detailView = document.getElementById('applicationDetailView');
            const backButton = document.getElementById('backButton');
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');

            // Toggle sidebar on mobile
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }

            // Handle view buttons
            document.querySelectorAll('.view-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const appData = JSON.parse(this.getAttribute('data-appdata'));
                    const isUrgent = this.getAttribute('data-type') === 'urgent';

                    // Populate basic details
                    document.getElementById('detail-id').textContent = appData.id;
                    document.getElementById('detail-no').textContent = appData.applicationNumber || appData.application_no;
                    document.getElementById('detail-type').innerHTML = isUrgent ?
                        `<span class="badge urgent-badge">Urgent</span>` :
                        `<span class="badge normal-badge">Normal</span>`;
                    document.getElementById('detail-status').textContent = appData.application_status || 'Pending';

                    // Application Information
                    document.getElementById('detail-category').textContent = appData.category || 'N/A';
                    document.getElementById('detail-site-city').textContent = isUrgent ?
                        (appData.site_city || 'N/A') : (appData.city || 'N/A');
                    document.getElementById('detail-site-office').textContent = isUrgent ?
                        (appData.site_office || 'N/A') : (appData.office || 'N/A');
                    document.getElementById('detail-delivery-site').textContent = appData.delivery_site || 'N/A';
                    document.getElementById('detail-delivery-date').textContent = isUrgent ?
                        (appData.delivery_date || 'N/A') :
                        ((appData.appointment_date || 'N/A') + ' ' + (appData.appointment_time || ''));
                    document.getElementById('detail-date').textContent = new Date(appData.created_at).toLocaleString();

                    // Personal Information
                    const fullName = isUrgent ?
                        `${appData.first_name || ''} ${appData.middle_name || ''} ${appData.last_name || ''}` :
                        `${appData.firstname || ''} ${appData.middlename || ''} ${appData.lastname || ''}`;
                    document.getElementById('detail-name').textContent = fullName.trim();
                    document.getElementById('detail-email').textContent = appData.email || 'N/A';
                    document.getElementById('detail-phone').textContent = appData.phone || 'N/A';
                    document.getElementById('detail-gender').textContent = appData.gender || 'N/A';
                    document.getElementById('detail-dob').textContent = appData.dob || 'N/A';
                    document.getElementById('detail-age-category').textContent = isUrgent ?
                        (appData.age_category || 'N/A') :
                        (appData.under18 ? 'Under 18' : '18 or Above');
                    document.getElementById('detail-birthplace').textContent = appData.birthplace || 'N/A';
                    document.getElementById('detail-adoption-status').textContent = isUrgent ?
                        (appData.adoption_status || 'N/A') :
                        (appData.adopted === '1' ? 'Yes' : 'No');
                    document.getElementById('detail-birth-cert-no').textContent = isUrgent ?
                        (appData.birth_certificate_no || 'N/A') :
                        (appData.birth_certificate === '1' ? 'Provided' : 'Not Provided');
                    document.getElementById('detail-nationality').textContent = appData.nationality || 'N/A';
                    document.getElementById('detail-marital-status').textContent = appData.marital_status || 'N/A';
                    document.getElementById('detail-occupation').textContent = appData.occupation || 'N/A';

                    // Address Information
                    document.getElementById('detail-region').textContent = appData.region || 'N/A';
                    document.getElementById('detail-city').textContent = isUrgent ?
                        (appData.city || 'N/A') : (appData.address_city || 'N/A');
                    document.getElementById('detail-subcity').textContent = appData.subcity || 'N/A';
                    document.getElementById('detail-woreda').textContent = appData.woreda || 'N/A';
                    document.getElementById('detail-kebele').textContent = appData.kebele || 'N/A';
                    document.getElementById('detail-house-no').textContent = appData.house_no || 'N/A';
                    document.getElementById('detail-id-number').textContent = isUrgent ?
                        (appData.id_number || 'N/A') : (appData.id_no || 'N/A');

                    // Family Information
                    document.getElementById('detail-mother-name').textContent = isUrgent ?
                        (appData.mother_first_name || 'N/A') : (appData.mother_first_name || 'N/A');
                    document.getElementById('detail-mother-father').textContent = isUrgent ?
                        (appData.mother_father_name || 'N/A') : (appData.mother_father_name || 'N/A');
                    document.getElementById('detail-mother-grandfather').textContent = isUrgent ?
                        (appData.mother_grandfather_name || 'N/A') : (appData.mother_grandfather_name || 'N/A');
                    document.getElementById('detail-father-name').textContent = isUrgent ?
                        (appData.father_first_name || 'N/A') : (appData.father_first_name || 'N/A');
                    document.getElementById('detail-father-father').textContent = isUrgent ?
                        (appData.father_father_name || 'N/A') : (appData.father_father_name || 'N/A');
                    document.getElementById('detail-father-grandfather').textContent = isUrgent ?
                        (appData.father_grandfather_name || 'N/A') : (appData.father_grandfather_name || 'N/A');
                    document.getElementById('detail-spouse-name').textContent = isUrgent ?
                        (appData.spouse_first_name || 'N/A') : (appData.spouse_first_name || 'N/A');
                    document.getElementById('detail-spouse-father').textContent = isUrgent ?
                        (appData.spouse_father_name || 'N/A') : (appData.spouse_father_name || 'N/A');
                    document.getElementById('detail-spouse-grandfather').textContent = isUrgent ?
                        (appData.spouse_grandfather_name || 'N/A') : (appData.spouse_grandfather_name || 'N/A');

                    // Documents
                    const birthCertFront = isUrgent ? appData.birth_certificate_front : appData.birth_certificate_front;
                    const birthCertBack = isUrgent ? appData.birth_certificate_back : appData.birth_certificate_back;
                    const idFront = isUrgent ? appData.id_front : appData.id_front;
                    const idBack = isUrgent ? appData.id_back : appData.id_back;


                    document.getElementById('birth-certificate-front').src = '/public/uploads/' + birthCertFront;

                    document.getElementById('birth-certificate-back').src = '/public/uploads/' + birthCertBack;

                    document.getElementById('id-front').src = '/public/uploads/' + idFront;

                    document.getElementById('id-back').src = '/public/uploads/' + idBack;


                    // Switch views
                    listView.style.display = 'none';
                    detailView.style.display = 'block';

                    // Update URL
                    history.pushState({
                        view: 'details'
                    }, '', `?view=details&id=${appData.id}`);
                });
            });

            // Handle back button
            backButton.addEventListener('click', function() {
                detailView.style.display = 'none';
                listView.style.display = 'block';
                history.pushState({
                    view: 'list'
                }, '', window.location.pathname);
            });

            // Handle browser back/forward
            window.addEventListener('popstate', function(event) {
                if (window.location.search.includes('view=details')) {
                    listView.style.display = 'none';
                    detailView.style.display = 'block';
                } else {
                    detailView.style.display = 'none';
                    listView.style.display = 'block';
                }
            });

            // Check initial state
            if (window.location.search.includes('view=details')) {
                listView.style.display = 'none';
                detailView.style.display = 'block';
            }

        });
    </script>
</body>

</html>