<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->first_name }} {{ $user->last_name }} | User Details</title>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        /* ===== CSS Variables ===== */
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #7209b7;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 10px;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* ===== Reset & Base Styles ===== */
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== Header & Navigation ===== */
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

        .nav-actions {
            display: flex;
            gap: 1rem;
        }

        /* ===== Main Content ===== */
        .main-content {
            padding: 2rem 0;
        }

        /* ===== Breadcrumb ===== */
        .breadcrumb {
            margin-bottom: 2rem;
            padding: 1rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* ===== User Profile Card ===== */
        .profile-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: bold;
            margin: 0 auto 1rem;
            border: 5px solid rgba(255, 255, 255, 0.3);
        }

        .profile-name {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            opacity: 0.9;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .profile-status {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .profile-body {
            padding: 2rem;
        }

        /* ===== Details Grid ===== */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .detail-card {
            background: var(--light-color);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            transition: var(--transition);
        }

        .detail-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .detail-card h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .detail-item {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .detail-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .detail-label {
            font-weight: 500;
            color: var(--gray-color);
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
        }

        .detail-value {
            font-size: 1.1rem;
            color: var(--dark-color);
        }

        /* ===== Action Buttons ===== */
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--light-gray);
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(67, 97, 238, 0.3);
        }

        .btn-secondary {
            background: var(--light-gray);
            color: var(--dark-color);
        }

        .btn-secondary:hover {
            background: #dee2e6;
        }

        .btn-warning {
            background: var(--warning-color);
            color: white;
        }

        .btn-warning:hover {
            background: #e6891a;
            transform: translateY(-2px);
        }

        /* ===== Footer ===== */
        .footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 2rem;
        }

        /* ===== Responsive Styles ===== */
        @media (max-width: 768px) {
            .profile-header {
                padding: 1.5rem;
            }
            
            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }
            
            .profile-name {
                font-size: 1.5rem;
            }
            
            .details-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .profile-body {
                padding: 1.5rem;
            }
            
            .nav-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('admin.users') }}" class="logo">
                    <i class="fas fa-users-cog"></i>
                    Admin Panel
                </a>
                <div class="nav-actions">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn" style="background: white; color: var(--primary-color);">
                        <i class="fas fa-edit"></i> Edit User
                    </a>
                    <a href="{{ route('admin.users') }}" class="btn" style="background: rgba(255, 255, 255, 0.2); color: white;">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="{{ route('admin.users') }}"><i class="fas fa-home"></i> Users</a> 
                <i class="fas fa-chevron-right" style="margin: 0 10px; font-size: 0.8rem; color: var(--gray-color);"></i>
                <span>User Details</span>
            </div>

            <!-- User Profile Card -->
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                    </div>
                    <h1 class="profile-name">{{ $user->first_name }} {{ $user->last_name }}</h1>
                    <div class="profile-email">
                        <i class="fas fa-envelope"></i> {{ $user->email }}
                    </div>
                    <div class="profile-status">
                        <i class="fas fa-circle" style="color: #4cc9f0; font-size: 0.7rem;"></i> Active User
                    </div>
                </div>

                <div class="profile-body">
                    <div class="details-grid">
                        <!-- Personal Information -->
                        <div class="detail-card">
                            <h3><i class="fas fa-user-circle"></i> Personal Information</h3>
                            <div class="detail-item">
                                <div class="detail-label">Full Name</div>
                                <div class="detail-value">{{ $user->first_name }} {{ $user->last_name }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Email Address</div>
                                <div class="detail-value">{{ $user->email }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Phone Number</div>
                                <div class="detail-value">{{ $user->phone }}</div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="detail-card">
                            <h3><i class="fas fa-address-card"></i> Contact Details</h3>
                            <div class="detail-item">
                                <div class="detail-label">Address</div>
                                <div class="detail-value">{{ $user->address }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Member Since</div>
                                <div class="detail-value">
                                    {{ date('F d, Y', strtotime($user->created_at ?? now())) }}
                                </div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Last Updated</div>
                                <div class="detail-value">
                                    {{ date('F d, Y', strtotime($user->updated_at ?? now())) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit User
                        </a>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure you want to delete this user?')">
                                <i class="fas fa-trash"></i> Delete User
                            </button>
                        </form>
                        <a href="{{ route('admin.users') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to Users List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 User Management System. Viewing details for {{ $user->first_name }} {{ $user->last_name }}.</p>
        </div>
    </footer>

    <script>
        // Add animation to profile card
        document.addEventListener('DOMContentLoaded', function() {
            const profileCard = document.querySelector('.profile-card');
            profileCard.style.opacity = '0';
            profileCard.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                profileCard.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                profileCard.style.opacity = '1';
                profileCard.style.transform = 'translateY(0)';
            }, 100);
        });

        // Print user details
        function printUserDetails() {
            window.print();
        }
    </script>
</body>
</html>