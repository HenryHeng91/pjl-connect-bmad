<template>
  <Head>
    <title>Dashboard</title>
  </Head>
  <div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p class="mt-4">Welcome, {{ $page.props.auth.user.name }}</p>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
</script>
