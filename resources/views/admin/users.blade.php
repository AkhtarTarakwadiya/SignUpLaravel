<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List | Admin Panel</title>
    
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
            --warning-color: #f8961e;
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== Header & Navigation ===== */
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
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

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* ===== Main Content ===== */
        .main-content {
            padding: 2rem 0;
        }

        /* ===== Page Header ===== */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header h1 {
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            text-align: center;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            line-height: 1;
        }

        .stat-label {
            color: var(--gray-color);
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        /* ===== Table Styles ===== */
        .table-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 300px;
        }

        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 0.95rem;
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-color);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        .table thead {
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
        }

        .table th {
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            border: none;
        }

        .table tbody tr {
            transition: var(--transition);
            border-bottom: 1px solid var(--light-gray);
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-name {
            font-weight: 500;
        }

        .user-email {
            font-size: 0.85rem;
            color: var(--gray-color);
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
        }

        .status-inactive {
            background-color: rgba(108, 117, 125, 0.1);
            color: var(--gray-color);
        }

        /* ===== Action Buttons ===== */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }

        .btn-view {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success-color);
        }

        .btn-view:hover {
            background-color: var(--success-color);
            color: white;
        }

        .btn-edit {
            background-color: rgba(248, 150, 30, 0.1);
            color: var(--warning-color);
        }

        .btn-edit:hover {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-delete {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--danger-color);
        }

        .btn-delete:hover {
            background-color: var(--danger-color);
            color: white;
        }

        /* ===== Footer ===== */
        .footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 2rem;
        }

        /* ===== Pagination ===== */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            padding: 1.5rem;
            border-top: 1px solid var(--light-gray);
        }

        .pagination .btn {
            background-color: var(--light-gray);
            color: var(--dark-color);
        }

        .pagination .btn.active {
            background-color: var(--primary-color);
            color: white;
        }

        /* ===== Responsive Styles ===== */
        @media (max-width: 992px) {
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .table-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                justify-content: center;
            }
            
            .page-header {
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (max-width: 576px) {
            .stats-cards {
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
                <a href="#" class="logo">
                    <i class="fas fa-users-cog"></i>
                    Admin Panel
                </a>
                <div class="admin-info">
                    <div class="admin-avatar">AD</div>
                    <div>
                        <div style="font-weight: 500;">Admin User</div>
                        <div style="font-size: 0.85rem; opacity: 0.9;">Administrator</div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1><i class="fas fa-users"></i> Registered Users</h1>
                <div style="display: flex; gap: 1rem;">
                    {{-- <a href="{{ route('signup') }}" class="btn" style="background: var(--primary-color); color: white;">
                        <i class="fas fa-plus"></i> Add New User
                    </a> --}}
                    <button class="btn" style="background: var(--success-color); color: white;" onclick="exportUsers()">
                        <i class="fas fa-download"></i> Export
                    </button>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="stats-cards">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <div class="stat-number">{{ count($users) }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-user-check"></i>
                    <div class="stat-number">{{ count($users) }}</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-user-clock"></i>
                    <div class="stat-number">0</div>
                    <div class="stat-label">Pending</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-chart-line"></i>
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Growth</div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="table-container">
                <div class="table-header">
                    <h3 style="margin: 0; color: var(--primary-color);">All Users</h3>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Search users...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="usersTable">
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            {{ strtoupper(substr($user->first_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="user-name">{{ $user->first_name }} {{ $user->last_name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <span style="display: inline-block; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $user->address }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-active">Active</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-view">
                                            <i class="fas fa-eye"></i> Show
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-delete" onclick="return confirmDelete()">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (if needed) -->
                {{-- @if($users->hasPages())
                <div class="pagination">
                    @if($users->onFirstPage())
                    <button class="btn" disabled><i class="fas fa-chevron-left"></i> Previous</button>
                    @else
                    <a href="{{ $users->previousPageUrl() }}" class="btn"><i class="fas fa-chevron-left"></i> Previous</a>
                    @endif

                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <a href="{{ $users->url($i) }}" class="btn {{ $users->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor

                    @if($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="btn">Next <i class="fas fa-chevron-right"></i></a>
                    @else
                    <button class="btn" disabled>Next <i class="fas fa-chevron-right"></i></button>
                    @endif
                </div>
                @endif --}}
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 User Management System Admin Panel. All rights reserved.</p>
            <p style="margin-top: 0.5rem; font-size: 0.9rem; color: #adb5bd;">
                <i class="fas fa-server"></i> Server: Online | <i class="fas fa-database"></i> Users: {{ count($users) }}
            </p>
        </div>
    </footer>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#usersTable tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });

        // Confirm delete
        function confirmDelete() {
            return confirm('Are you sure you want to delete this user? This action cannot be undone.');
        }

        // Export users (simulated)
        function exportUsers() {
            alert('Export functionality would be implemented here. Users exported successfully!');
        }

        // Add row hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.table tbody tr');
            rows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</body>
</html>