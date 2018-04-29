<template>
    <nav class="navbar is-white is-shadowless">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Acme Company
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" />
                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item">
                            Dashboard
                        </a>
                        <a class="navbar-item">
                            Profile
                        </a>
                        <a class="navbar-item">
                            Settings
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="/logout">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

</template>

<script>
export default {
  name: "Navbar"
};
</script>