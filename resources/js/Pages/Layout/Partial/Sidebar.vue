<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
</script>

<template>
    <!-- Sidebar -->
  <aside class="w-64 bg-indigo-700 text-white flex flex-col">
    <div class="p-4 text-2xl font-bold border-b border-indigo-600">
      Admin Panel
    </div>
    <nav class="flex-1 px-4 py-2 space-y-2">
      <a href="#" class="block py-2 px-3 rounded hover:bg-indigo-600">Dashboard</a>
      <a :href="route('doctors.index')" class="block py-2 px-3 rounded hover:bg-indigo-600">Dokter</a>
      <a :href="route('schedules.index')" class="block py-2 px-3 rounded hover:bg-indigo-600">Jadwal</a>
    </nav>
    <div class="p-4 border-t border-indigo-600">
      <button class="w-full text-left py-2 px-3 rounded hover:bg-indigo-600">Logout</button>
    </div>
  </aside>
</template>
