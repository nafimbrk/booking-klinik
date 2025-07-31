<script setup>
import { useForm } from '@inertiajs/vue3';
import Layout from '../Layout/Layout.vue';
import { route } from 'ziggy-js';

const props = defineProps({
    doctor: Object,
})

console.log(props.doctor);


const form = useForm({
    name: props.doctor.user.name,
    email: props.doctor.user.email,
    specialization: props.doctor.specialization,
    bio: props.doctor.bio,
});

const editDoctor = () => {
    form.put(route('doctors.update', props.doctor.id))
}

</script>

<template>
    <Layout>
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
      <h1 class="text-2xl font-semibold mb-4">Edit Dokter</h1>
      <form @submit.prevent="editDoctor" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
          <input
            type="text"
            id="name"
            v-model="form.name"
            class="mt-1 px-3 py-1.5 text-sm block w-full rounded-md border border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required
          />
        </div>

        <div>
    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
    <input
      type="email"
      id="email"
      v-model="form.email"
      class="mt-1 px-3 py-1.5 text-sm block w-full rounded-md border border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
      required
    />
  </div>

        <div>
          <label for="specialization" class="block text-sm font-medium text-gray-700">Spesialis</label>
          <input
            type="text"
            id="specialization"
            v-model="form.specialization"
            class="mt-1 px-3 py-1.5 text-sm block w-full rounded-md border border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required
          />
        </div>

        <div>
          <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
          <textarea
            id="bio"
            v-model="form.bio"
            rows="4"
            class="mt-1 px-3 py-1.5 text-sm block w-full rounded-md border border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            placeholder="Tuliskan bio singkat dokter..."
          ></textarea>
        </div>

        <div class="flex justify-end">
          <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
          >
            Tambah
          </button>
        </div>
      </form>
    </div>
    </Layout>
</template>
