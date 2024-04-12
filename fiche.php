<!DOCTYPE html>
<html>
<head>
    <title>Toggle Password Visibility</title>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('togglePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
    <style>
        .fas {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="POST" action="traitement.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe:</label>
        <div style="position: relative;">
            <input type="password" id="password" name="password" required>
            <i id="togglePassword" class="fas fa-eye-slash" onclick="togglePasswordVisibility()" style="position: absolute; top: 10px; right: 10px;"></i>
        </div><br><br>

        <input type="submit" name="submit" value="Envoyer">
    </form>

    <!-- Inclure Font Awesome pour utiliser les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
