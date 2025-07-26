<script setup>
import Layout from '../Layout/Layout.vue';
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

defineProps({
    schedules: Object
})

</script>

<template>
        <Layout>
            <div class="max-w-6xl mx-auto px-4 py-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800">Daftar Dokter</h1>
                <Link
                    :href="route('doctors.create')"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                >
                    Tambah Dokter
                </Link>
            </div>


            <div
  v-if="$page.props.flash.success"
  class="mb-4 flex items-center justify-between rounded-lg bg-green-100 p-4 text-sm text-green-700 shadow-md"
>
  <div class="flex items-center space-x-2">
    <svg
      class="h-5 w-5 text-green-600"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      viewBox="0 0 24 24"
    >
      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
    </svg>
    <span>{{ $page.props.flash.success }}</span>
  </div>
  <button @click="$page.props.flash.success = null" class="text-green-700 hover:text-green-900">
    &times;
  </button>
</div>


            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full table-auto border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">#</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Spesialis</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Bio</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(doctor, index) in doctors"
                            :key="doctor.id"
                            class="border-t hover:bg-gray-50"
                        >
                            <td class="px-4 py-2 text-sm text-gray-800">{{ ++index }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ doctor.name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ doctor.specialization }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                {{ doctor.bio ?? 'Bio kosong' }}
                            </td>
                            <td class="px-4 py-2 text-sm flex">
                                <Link :href="route('doctors.edit', doctor.id)" class="text-blue-600 mr-2">Edit</Link>
                                <button type="button" @click="deleteDoctor(doctor.id)" class="text-red-600">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </Layout>
</template>
