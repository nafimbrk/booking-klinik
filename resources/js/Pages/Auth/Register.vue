<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const form = useForm({
  name: "",
  email: "",
  password: ""
});

const storeRegister = () => form.post(route('register.store'));
</script>

<template>
  <Head title="Register Akun" />

  <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 p-6 space-y-6">
      <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Akun</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Untuk mengakses sistem booking klinik</p>
      </div>

      <form @submit.prevent="storeRegister" class="space-y-4">
        <!-- Name -->
        <div>
          <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
          <input
            type="text"
            id="name"
            v-model="form.name"
            class="w-full px-4 py-2 text-sm rounded-lg border focus:ring-2 focus:ring-blue-500 focus:outline-none bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600"
          />
          <p v-if="form.errors.name" class="mt-1 text-red-500 text-xs italic">{{ form.errors.name }}</p>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input
            type="email"
            id="email"
            v-model="form.email"
            class="w-full px-4 py-2 text-sm rounded-lg border focus:ring-2 focus:ring-blue-500 focus:outline-none bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600"
          />
          <p v-if="form.errors.email" class="mt-1 text-red-500 text-xs italic">{{ form.errors.email }}</p>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input
            type="password"
            id="password"
            v-model="form.password"
            class="w-full px-4 py-2 text-sm rounded-lg border focus:ring-2 focus:ring-blue-500 focus:outline-none bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600"
          />
          <p v-if="form.errors.password" class="mt-1 text-red-500 text-xs italic">{{ form.errors.password }}</p>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition duration-200 text-sm"
        >
          Daftar
        </button>

        <!-- Login Redirect -->
        <p class="text-sm text-center text-gray-600 dark:text-gray-300">
          Sudah punya akun?
          <Link :href="route('login')" class="text-blue-600 hover:underline dark:text-blue-400 ml-1">Login</Link>
        </p>
      </form>
    </div>
  </div>
</template>
