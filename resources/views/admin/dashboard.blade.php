<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | User Management</title>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #7209b7;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --warning-color: #f8961e;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 10px;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: var(--dark-color);
            background-color: #f5f7fb;
            line-height: 1.6;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
        }

        .logo i {
            margin-right: 10px;
            font-size: 2rem;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.5rem;
            border-radius: var(--border-radius);
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-primary {
            background: white;
            color: var(--primary-color);
        }

        .btn-primary:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-logout:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Main Content */
        .main-content {
            padding: 2rem 0;
        }

        .welcome-section {
            margin-bottom: 2rem;
        }

        .welcome-section h1 {
            color: var(--primary-color);
        }

        .welcome-section p {
            color: var(--gray-color);
            font-size: 1.1rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
        }

        .stat-card.total::before { background: var(--primary-color); }
        .stat-card.pending::before { background: var(--warning-color); }
        .stat-card.approved::before { background: var(--success-color); }
        .stat-card.rejected::before { background: var(--danger-color); }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .stat-card.total .stat-icon { color: var(--primary-color); }
        .stat-card.pending .stat-icon { color: var(--warning-color); }
        .stat-card.approved .stat-icon { color: var(--success-color); }
        .stat-card.rejected .stat-icon { color: var(--danger-color); }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--gray-color);
            font-size: 0.95rem;
        }

        /* Quick Actions */
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .action-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            text-align: center;
            transition: var(--transition);
            text-decoration: none;
            color: var(--dark-color);
        }

        .action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            color: var(--primary-color);
        }

        .action-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .action-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .action-description {
            color: var(--gray-color);
            font-size: 0.9rem;
        }

        /* Footer */
        .footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .admin-info {
                flex-direction: column;
                text-align: center;
            }
            
            .admin-actions {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .container {
                padding: 0 15px;
            }
            
            .logo {
                font-size: 1.5rem;
            }
            
            .logo i {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <i class="fas fa-users-cog"></i>
                    Admin Dashboard
                </a>
                
                <div class="admin-info">
                    <div style="text-align: right;">
                        <div style="font-weight: 500; font-size: 1.1rem;">Welcome, Admin</div>
                        <div style="font-size: 0.85rem; opacity: 0.9;">{{ Auth::guard('admin')->user()->email }}</div>
                    </div>
                    
                    <div class="admin-actions">
                        <a href="{{ route('admin.users') }}" class="btn btn-primary">
                            <i class="fas fa-users"></i> Manage Users
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-logout">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <h1><i class="fas fa-tachometer-alt"></i> Dashboard Overview</h1>
                <p>Manage and monitor all user registrations from here</p>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card total">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">{{ $totalUsers }}</div>
                    <div class="stat-label">Total Registered Users</div>
                </div>

                <div class="stat-card pending">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number">{{ $pendingUsers }}</div>
                    <div class="stat-label">Pending Approval</div>
                </div>

                <div class="stat-card approved">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number">{{ $approvedUsers }}</div>
                    <div class="stat-label">Approved Users</div>
                </div>

                <div class="stat-card rejected">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-number">{{ $rejectedUsers }}</div>
                    <div class="stat-label">Rejected Users</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <h2 style="color: var(--primary-color);">
                <i class="fas fa-bolt"></i> Quick Actions
            </h2>
            
            <div class="actions-grid">
                <a href="{{ route('admin.users') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="action-title">Review Pending</div>
                    <div class="action-description">
                        {{ $pendingUsers }} users awaiting approval
                    </div>
                </a>

                <a href="{{ route('admin.users') }}?status=approved" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="action-title">View Approved</div>
                    <div class="action-description">
                        View all approved users
                    </div>
                </a>

                <a href="{{ route('admin.users') }}?status=rejected" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-ban"></i>
                    </div>
                    <div class="action-title">View Rejected</div>
                    <div class="action-description">
                        Review rejected applications
                    </div>
                </a>

                <a href="{{ route('signup.form') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="action-title">Add New User</div>
                    <div class="action-description">
                        Register a new user manually
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 User Management System Admin Panel</p>
            <p style="margin-top: 0.5rem; font-size: 0.9rem; color: #adb5bd;">
                <i class="fas fa-shield-alt"></i> Secure Admin Portal | 
                <i class="fas fa-user"></i> Logged in as: {{ Auth::guard('admin')->user()->name }}
            </p>
        </div>
    </footer>
</body>
</html>