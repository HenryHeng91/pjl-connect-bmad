<template>
  <Head>
    <title>Login</title>
    <meta name="description" content="Login page">
  </Head>
  <div class="min-h-screen bg-white flex flex-col justify-center items-center">
    <h1 class="text-4xl font-bold mb-8">PJL-Connect</h1>
    <div v-if="$page.props.errors.telegram" class="text-red-500 mb-4">
      {{ $page.props.errors.telegram }}
    </div>
    <div>
      <!-- The Telegram login button will be rendered here by the script -->
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
</script>