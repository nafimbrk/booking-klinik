<script setup>
import Sidebar from "./Partial/Sidebar.vue";
import Navbar from "./Partial/Navbar.vue";
</script>

<template>
    <div class="min-h-screen flex bg-gray-100">
        <Sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <Navbar />
            <!-- Page Content -->
            <main class="p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
