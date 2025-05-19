<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Application Status Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            background-color: #f8f9fa;
            font-family: "Noto Serif", serif;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 80px;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .logo-img {
            height: 60px;
            object-fit: contain;
        }

        .dashboard-title {
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .status-card {
            background-color: #ffffff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
            padding: 20px;
            transition: all 0.3s ease;
        }

        .status-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .status-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .status-box {
            width: 110px;
            height: 110px;
            border-radius: 12px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 10px 5px;
            border: 2px solid #ccc;
            text-align: center;
            font-size: 14px;
        }

        .status-box i {
            font-size: 22px;
            margin-bottom: 6px;
        }

        .card-title i {
            color: #0d6efd;
        }

        @media (max-width: 767px) {
            .status-box {
                width: 100px;
                height: 100px;
                font-size: 12px;
            }

            .status-box i {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light bg-white ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/Images/passport-1.webp" alt="Logo" class="logo-img">
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-3"><a href="/admin/dashboard" class="nav-link">Dashboard</a></li>
                <li class="nav-item me-3"><a href="/application/new" class="nav-link me-3">View All</a></li>
                <li class="nav-item"><a href="/admin/logout" class="nav-link">Logout</a></li>
            </ul>

        </div>
    </header>

    <?php
    // Helper functions
    function formatTableName($table)
    {
        return ucwords(str_replace('_', ' ', $table));
    }

    function getStatusIcon($status)
    {
        return match ($status) {
            'registered' => 'fa-user-plus',
            'pending' => 'fa-hourglass-half',
            'approved' => 'fa-circle-check',
            'rejected' => 'fa-circle-xmark',
            'info_requested' => 'fa-circle-info',
            default => 'fa-question-circle',
        };
    }

    function getOutlineClass($status)
    {
        return match ($status) {
            'registered' => 'border-secondary text-secondary',
            'pending' => 'border-warning text-warning',
            'approved' => 'border-success text-success',
            'rejected' => 'border-danger text-danger',
            'info_requested' => 'border-info text-info',
            default => 'border-dark text-dark',
        };
    }
    ?>

    <div class="container py-4">
        <h1 class="dashboard-title">Application Status Overview Dashboard</h1>
        <div class="row g-4">
            <?php foreach ($statusCounts as $table => $counts):
                $countMap = [
                    'registered' => 0,
                    'pending' => 0,
                    'approved' => 0,
                    'rejected' => 0,
                    'info_requested' => 0
                ];

                foreach ($counts as $count) {
                    $countMap[$count['application_status']] = $count['count'];
                }

                $typeName = formatTableName($table);
            ?>
                <div class="col-md-6">
                    <div class="status-card">
                        <h5 class="card-title mb-3">
                            <i class="fas fa-id-card me-2"></i><?= $typeName ?>
                        </h5>
                        <div class="status-grid">
                            <?php foreach ($countMap as $status => $count): ?>
                                <div class="status-box <?= getOutlineClass($status) ?>">
                                    <i class="fas <?= getStatusIcon($status) ?>"></i>
                                    <div class="fw-semibold"><?= ucfirst(str_replace('_', ' ', $status)) ?></div>
                                    <div><?= $count ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <br><br>
    <hr>
</body>

</html>