<template>
    <div>
        <h1>Edit Service</h1>
        <Form :service="service" :carriers="carriers" />
    </div>
</template>

<script setup>
import Form from '@/Components/Services/Form.vue';
import { defineProps } from 'vue';

defineProps({
    service: Object,
    carriers: Array,
});
</script>
