<script setup>
import { router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import { route } from 'ziggy-js'

const page = usePage()
const user = computed(() => page.props.auth.user)

const logout = () => {
    router.post(route('logout'))
}
</script>

<template>
  <!-- Navbar -->
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
    <div class="flex items-center space-x-4">
      <span class="text-gray-600">{{ user.name }}</span>
      <img src="https://i.pravatar.cc/30" alt="avatar" class="w-8 h-8 rounded-full">
      <button
      @click="logout"
      type="submit"
        class="bg-red-500 text-white text-sm px-3 py-1 rounded hover:bg-red-600"
      >
        Logout
      </button>
    </div>
  </header>
</template>
