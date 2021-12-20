<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                    Laravel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <router-link exact="" :to="{name: 'posts.index'}" class="nav-link">Posts lists</router-link>

                        </li>
                        <li class="nav-item">
                            <router-link exact="" :to="{name: 'posts.create'}" class="nav-link">Add new posts</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <router-view></router-view>
        </main>
    </div>

</template>

<script>
    import Index from "./Posts/Index";
    export default {
        name: "App",
        components: {Index}
    }
</script>

<style lang="scss" scoped>
    .router-link-active {
        font-weight: bold;
        border-bottom: 2px solid gray;
        padding-bottom: 2px;
    }
</style>
