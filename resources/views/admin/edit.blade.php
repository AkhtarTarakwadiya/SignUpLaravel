<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $user->first_name }} {{ $user->last_name }} | Admin</title>
    
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

        /* ===== Edit Card ===== */
        .edit-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2.5rem;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .card-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .card-header h2 {
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .user-avatar-large {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto 1rem;
        }

        /* ===== Form Styles ===== */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
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

        .btn-success {
            background: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background: #3ab0d5;
            transform: translateY(-2px);
        }

        /* ===== Form Validation ===== */
        .form-control.valid {
            border-color: var(--success-color);
        }

        .form-control.invalid {
            border-color: var(--danger-color);
        }

        .validation-message {
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .validation-message.valid {
            color: var(--success-color);
        }

        .validation-message.invalid {
            color: var(--danger-color);
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
            .edit-card {
                padding: 1.5rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .user-avatar-large {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .card-header h2 {
                font-size: 1.5rem;
                flex-direction: column;
                text-align: center;
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
                <a href="{{ route('admin.users') }}" class="logo">
                    <i class="fas fa-users-cog"></i>
                    Admin Panel
                </a>
                <div>
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn" style="background: white; color: var(--primary-color);">
                        <i class="fas fa-eye"></i> View User
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
                <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
                <i class="fas fa-chevron-right" style="margin: 0 10px; font-size: 0.8rem; color: var(--gray-color);"></i>
                <span>Edit User</span>
            </div>

            <!-- Edit Form Card -->
            <div class="edit-card">
                <div class="card-header">
                    <div class="user-avatar-large">
                        {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                    </div>
                    <h2>
                        <i class="fas fa-user-edit"></i> 
                        Edit {{ $user->first_name }} {{ $user->last_name }}
                    </h2>
                    <p style="color: var(--gray-color);">Update user information below</p>
                </div>

                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" id="editUserForm">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="first_name">
                                <i class="fas fa-user"></i> First Name
                            </label>
                            <input type="text" name="first_name" id="first_name" 
                                   class="form-control" 
                                   value="{{ $user->first_name }}" 
                                   placeholder="Enter first name"
                                   required>
                            <div class="validation-message" id="firstNameValidation"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="last_name">
                                <i class="fas fa-user"></i> Last Name
                            </label>
                            <input type="text" name="last_name" id="last_name" 
                                   class="form-control" 
                                   value="{{ $user->last_name }}" 
                                   placeholder="Enter last name"
                                   required>
                            <div class="validation-message" id="lastNameValidation"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" name="email" id="email" 
                               class="form-control" 
                               value="{{ $user->email }}" 
                               placeholder="Enter email address"
                               required>
                        <div class="validation-message" id="emailValidation"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone">
                            <i class="fas fa-phone"></i> Phone Number
                        </label>
                        <input type="text" name="phone" id="phone" 
                               class="form-control" 
                               value="{{ $user->phone }}" 
                               placeholder="Enter phone number"
                               required>
                        <div class="validation-message" id="phoneValidation"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="address">
                            <i class="fas fa-home"></i> Address
                        </label>
                        <textarea name="address" id="address" 
                                  class="form-control" 
                                  placeholder="Enter full address"
                                  rows="4">{{ $user->address }}</textarea>
                        <div class="validation-message" id="addressValidation"></div>
                    </div>

                    <div class="action-buttons">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update User
                        </button>
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <a href="{{ route('admin.users') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to Users List
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 User Management System. Editing user: {{ $user->first_name }} {{ $user->last_name }}</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editUserForm');
            const inputs = form.querySelectorAll('.form-control');
            
            // Form validation
            function validateField(field) {
                const value = field.value.trim();
                const validationElement = document.getElementById(field.id + 'Validation');
                
                if (field.hasAttribute('required') && value === '') {
                    field.classList.remove('valid');
                    field.classList.add('invalid');
                    validationElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> This field is required';
                    validationElement.className = 'validation-message invalid';
                    return false;
                }
                
                if (field.type === 'email' && value !== '') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        field.classList.remove('valid');
                        field.classList.add('invalid');
                        validationElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> Please enter a valid email';
                        validationElement.className = 'validation-message invalid';
                        return false;
                    }
                }
                
                if (field.id === 'phone' && value !== '') {
                    const phoneRegex = /^[\d\s\-\+\(\)]+$/;
                    if (!phoneRegex.test(value)) {
                        field.classList.remove('valid');
                        field.classList.add('invalid');
                        validationElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> Please enter a valid phone number';
                        validationElement.className = 'validation-message invalid';
                        return false;
                    }
                }
                
                // Valid
                field.classList.remove('invalid');
                field.classList.add('valid');
                validationElement.innerHTML = '<i class="fas fa-check-circle"></i> Looks good!';
                validationElement.className = 'validation-message valid';
                return true;
            }
            
            // Real-time validation
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.classList.remove('invalid');
                        document.getElementById(this.id + 'Validation').innerHTML = '';
                    }
                });
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                let isValid = true;
                inputs.forEach(input => {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });
                
                if (isValid) {
                    const submitBtn = this.querySelector('.btn-success');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
                    submitBtn.disabled = true;
                    
                    // Show success message
                    setTimeout(() => {
                        alert('User updated successfully!');
                    }, 1500);
                } else {
                    e.preventDefault();
                    alert('Please fix the errors in the form before submitting.');
                }
            });
            
            // Auto-save reminder
            let timeout;
            form.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    console.log('Auto-save: User data changed');
                }, 2000);
            });
        });
    </script>
</body>
</html>