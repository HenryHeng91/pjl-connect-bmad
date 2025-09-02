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
      <div id="telegram-login-pjlconnect_bot"></div>
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

onMounted(() => {
  const script = document.createElement('script');
  script.src = 'https://telegram.org/js/telegram-widget.js?22';
  script.async = true;
  script.setAttribute('data-telegram-login', 'pjlconnect_bot');
  script.setAttribute('data-size', 'large');
  script.setAttribute('data-auth-url', '/login/telegram/callback');
  script.setAttribute('data-request-access', 'write');
  document.getElementById('telegram-login-pjlconnect_bot').appendChild(script);
});
</script>
