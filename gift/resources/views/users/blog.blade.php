<div class="form-group">
    <label for="password">Password</label>
    <div class="input-group">
        <input id="password" type="password" class="form-control" name="password" required>
        <div class="input-group-append">
            <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                <i class="fa fa-eye-slash" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        var icon = this.querySelector('i');
        icon.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
    });
</script>
