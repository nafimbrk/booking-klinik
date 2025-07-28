<script setup>
import { useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import Layout from "../Layout/Layout.vue";
import vSelect from "vue3-select";
import "vue3-select/dist/vue3-select.css";

const props = defineProps({
  schedule: Object,
  doctors: Object
});

const form = useForm({
  doctor_id: props.schedule.doctor_id,
  day: props.schedule.day,
  start_time:props.schedule.start_time,
  end_time:props.schedule.end_time,
});

const createSchedule = () => {
  form.post(route("schedules.store"));
};
</script>

<template>
  <Layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
      <h1 class="text-2xl font-semibold mb-4">Tambah Jadwal</h1>
      <form @submit.prevent="createSchedule" class="space-y-4">

        <!-- Dokter -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Dokter</label>
          <v-select
            :options="props.doctors"
            label="name"
            :reduce="doctor => doctor.id"
            v-model="form.doctor_id"
            placeholder="Pilih Dokter"
            class="text-sm"
          />
        </div>

        <!-- Hari -->
        <div>
          <label for="day" class="block text-sm font-medium text-gray-700">Hari</label>
          <input
            type="text"
            id="day"
            v-model="form.day"
            placeholder="Contoh: Senin"
            class="mt-1 px-3 py-1.5 text-sm block w-full rounded-md border border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required
          />
        </div>

        <!-- Waktu Mulai -->
        <div>
          <label for="start_time" class="block text-sm font-medium text-gray-700">Mulai</label>
          <input
            type="time"
            id="start_time"
            v-model="form.start_time"
            class="mt-1 px-3 py-1.5 text-sm block w-full rounded-md border border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required
          />
        </div>

        <!-- Waktu Selesai -->
        <div>
          <label for="end_time" class="block text-sm font-medium text-gray-700">Selesai</label>
          <input
            type="time"
            id="end_time"
            v-model="form.end_time"
            class="mt-1 px-3 py-1.5 text-sm block w-full rounded-md border border-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required
          />
        </div>

        <!-- Tombol Submit -->
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
